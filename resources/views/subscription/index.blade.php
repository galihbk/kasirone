<x-app-layout>
    @section('title', 'Langganan')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pengaturan</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Langganan</a></li>
            </ol>
        </div>
        <div class="col-12">
            <div class="row gy-4 pricing">
                @foreach ($plans as $plan)
                <div class="col-lg-4">
                  <div class="pricing-item {{ $loop->iteration % 2 == 0 ? 'featured' : '' }}">
      
                    <div class="pricing-header">
                      <h3>{{$plan->name}}</h3>
                      <h4><sup>Rp. </sup>{{ number_format($plan->price, 0, ',', '.') }}<span> / Bulan</span></h4>
                    </div>
      
                    <ul>
                        @foreach($plan->packageLists as $list)
                        @if($list->in_list == 0)
                        <li class="na"><i class="bi bi-x"></i> <span>{{$list->description}}</span></li>
                        @else
                        <li><i class="bi bi-dot"></i> <span>{{$list->description}}</span></li>
                        @endif
                        @endforeach
                    </ul>
                    <div class="text-center mt-auto">
                        <form action="{{ route('subscription.create') }}" method="post">
                          @csrf
                          <input type="hidden" name="price" value="{{ $plan->price }}">
                          <button type="submit" class="buy-btn">Beli Sekarang</button>
                        </form>
                      </div>
                  </div>
                </div>
                @endforeach
      
              </div>
        </div>
    </div>
    @section('script')
    <script>
        $(document).ready(function () {
           

        });
    </script>
@endsection
</x-app-layout>
