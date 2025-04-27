<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $category = ProductCategory::where('business_id', auth()->user()->business_id)->get();
        return view('product.index', compact('category'));
    }
    public function productCategory()
    {

        return view('product.category');
    }
    public function addDataProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sku' => 'required|max:255|unique:products,sku',
            'product_name' => 'required|max:255,product_name',
            'product_category' => 'required',
            'stock' => 'required|numeric',
            'unit' => 'required',
            'price_clean' => 'required|integer',
            'cost_price_clean' => 'required|integer',
        ], [
            'sku.required' => 'SKU wajib diisi.',
            'sku.unique' => 'SKU sudah ada, gunakan SKU yang lain',
            'sku.max:100'   => 'SKU maksimal 100 karakter.',
            'product_name.required' => 'Nama produk wajib diisi.',
            'product_name.max:100'   => 'Nama produk maksimal 100 karakter.',
            'product_category.required' => 'Pilih category product',
            'stock.required' => 'Jumlah produk wajib diisi.',
            'stock.number'   => 'Jumlah produk harus berupa angka.',
            'unit.required'   => 'Pilih satuan.',
            'price_clean.required'   => 'Harga beli harus di isi',
            'price_clean.number'   => 'Harga beli harus berupa angka',
            'cost_price_clean.required'   => 'Harga jual harus di isi',
            'cost_price_clean.number'   => 'Harga jual harus berupa angka',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        Product::create([
            'category_id' => $request->product_category,
            'sku' => $request->sku,
            'product_name' => $request->product_name,
            'stock' => $request->stock,
            'unit' => $request->unit,
            'price' => $request->price_clean,
            'cost_price' => $request->cost_price_clean,
            'business_id' => auth()->user()->business_id,
            'operator' => auth()->user()->email,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Kategori berhasil ditambahkan.'
        ]);
    }
    public function addDataCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string|max:255,category_name',
        ], [
            'category_name.required' => 'Nama kategori wajib diisi.',
            'category_name.string'   => 'Nama kategori harus berupa teks.',
            'category_name.max'      => 'Nama kategori maksimal 255 karakter.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        ProductCategory::create([
            'category_name' => $request->category_name,
            'business_id' => auth()->user()->business_id,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Kategori berhasil ditambahkan.'
        ]);
    }
    public function getDataCategory(Request $request)
    {
        if ($request->ajax()) {
            $categoryProduct = ProductCategory::select(['id', 'category_name', 'created_at', 'updated_at']);

            return DataTables::of($categoryProduct)
                ->addIndexColumn()
                ->addColumn('action', function ($categoryProduct) {
                    return '
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary shadow btn-xs sharp me-1 btn-edit" data-id="' . $categoryProduct->id . '" data-name="' . $categoryProduct->category_name . '">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-danger shadow btn-xs sharp btn-delete" data-id="' . $categoryProduct->id . '">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>';
                })
                ->rawColumns(['photo', 'action'])
                ->make(true);
        }
    }
    public function destroyCategory($id)
    {
        try {
            $category = ProductCategory::findOrFail($id);

            $productCount = Product::where('category_id', $category->id)->count();

            if ($productCount > 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Kategori tidak bisa dihapus karena sudah digunakan di produk.'
                ]);
            }
            $category->delete();

            return response()->json([
                'status' => true,
                'message' => 'Kategori berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            \Log::error("Error deleting category: " . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus kategori.'
            ], 500);
        }
    }
    public function destroyProduct($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return response()->json([
                'status' => true,
                'message' => 'Product berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            \Log::error("Error deleting category: " . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus kategori.'
            ], 500);
        }
    }
    public function updateCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|max:100',
        ], [
            'category_name.required' => 'Nama kategori harus di isi',
            'category_name.max:100' => 'Nama kategori maksimal 100 karakter',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        try {
            $category = ProductCategory::findOrFail($request->category_id);
            $category->category_name = $request->category_name;
            $category->save();

            return response()->json([
                'status' => true,
                'message' => 'Kategori berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui kategori.'
            ], 500);
        }
    }
    public function updateProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sku' => 'required|max:255,sku',
            'product_name' => 'required|max:255,product_name',
            'product_category' => 'required',
            'stock' => 'required|numeric',
            'unit' => 'required',
            'price_clean' => 'required|integer',
            'cost_price_clean' => 'required|integer',
        ], [
            'sku.required' => 'SKU wajib diisi.',
            'sku.max:100'   => 'SKU maksimal 100 karakter.',
            'product_name.required' => 'Nama produk wajib diisi.',
            'product_name.max:100'   => 'Nama produk maksimal 100 karakter.',
            'product_category.required' => 'Pilih category product',
            'stock.required' => 'Jumlah produk wajib diisi.',
            'stock.number'   => 'Jumlah produk harus berupa angka.',
            'unit.required'   => 'Pilih satuan.',
            'price_clean.required'   => 'Harga beli harus di isi',
            'price_clean.number'   => 'Harga beli harus berupa angka',
            'cost_price_clean.required'   => 'Harga jual harus di isi',
            'cost_price_clean.number'   => 'Harga jual harus berupa angka',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        try {
            $category = Product::where('sku', $request->sku)->first();
            $category->category_id = $request->product_category;
            $category->product_name = $request->product_name;
            $category->stock = $request->stock;
            $category->unit = $request->unit;
            $category->price = $request->price_clean;
            $category->cost_price = $request->cost_price_clean;
            $category->business_id = auth()->user()->business_id;
            $category->operator = auth()->user()->email;
            $category->save();

            return response()->json([
                'status' => true,
                'message' => 'Produk berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui Produk.'
            ], 500);
        }
    }
    public function getDataProduct(Request $request)
    {
        if ($request->ajax()) {
            $businessId = auth()->user()->business_id;

            $product = Product::select([
                'products.id',
                'products.sku',
                'products.product_name',
                'products.stock',
                'products.unit',
                'products.barcode',
                'products.price',
                'products.cost_price',
                'products.category_id',
                'users.name',
                'products.created_at',
                'products.updated_at',
                'category_product.category_name'
            ])
                ->join('category_product', 'category_product.id', '=', 'products.category_id')
                ->join('users', 'users.email', '=', 'products.operator')
                ->where('products.business_id', $businessId)
                ->get();

            return DataTables::of($product)
                ->addIndexColumn()
                ->addColumn('action', function ($product) {
                    return '
                        <div class="d-flex">
                            <button type="button" class="btn btn-primary shadow btn-xs sharp me-1 btn-edit" data-sku="' . $product->sku . '" data-name="' . $product->product_name . '" data-stock="' . $product->stock . '" data-price="' . $product->price . '" data-costprice="' . $product->cost_price . '" data-unit="' . $product->unit . '" data-category="' . $product->category_id . '">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button type="button" class="btn btn-danger shadow btn-xs sharp btn-delete" data-id="' . $product->id . '" >
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
