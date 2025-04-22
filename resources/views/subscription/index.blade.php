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
                          <a href="{{ route('subscription.payment-method').'/'.$plan->id }}" class="buy-btn">Beli Sekarang</a>
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
