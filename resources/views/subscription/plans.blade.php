<h1>Pilih Paket Langganan</h1>

@foreach($plans as $plan)
    <form action="{{ route('checkout') }}" method="post">
        @csrf
        <div style="border: 1px solid #ddd; margin-bottom: 10px; padding: 10px;">
            <h2>{{ $plan->name }}</h2>
            <p>Harga: Rp {{ number_format($plan->price) }}</p>
            <input type="hidden" name="package_id" value="{{ $plan->id }}">
            <button type="submit">Buat Invoice & Bayar</button>
        </div>
    </form>
@endforeach
