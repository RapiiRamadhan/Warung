@extends('layouts.app')

@section('content')

<section class="checkout">
    <div class="row">
        <!-- Alamat Pengiriman Section -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2>Alamat Pengiriman</h2>
                    <form id="checkout-form" action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Pengiriman untuk (nama):</label>
                            <input type="text" id="name" name="nama" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. HP:</label>
                            <input type="text" id="no_hp" name="no_hp" value="{{ Auth::user()->phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <select name="kota" id="city-select" required>
                                <option value="">Select City</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="shipping-cost-input">Ongkos Kirim:</label>
                            <input type="number" id="shipping-cost-input" name="ongkos_kirim" value="{{ number_format($shippingCost, 0, ',', '.') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="subtotal">Subtotal:</label>
                            <input type="number" id="subtotal" name="subtotal" value="{{ number_format($subtotal, 0, ',', '.') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="total-input">Total:</label>
                            <input type="number" id="total-input" name="total" value="{{ number_format($total, 0, ',', '.') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <textarea id="alamat" name="alamat" required>{{ Auth::user()->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pengiriman">Tanggal Pengiriman:</label>
                            <input type="date" id="tanggal_pengiriman" name="tanggal_pengiriman" required>
                        </div>                        
                        <div class="form-group">
                            <label for="catatan">Catatan:</label>
                            <textarea id="catatan" name="catatan"></textarea>
                        </div>
                    </form>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            // Fetch cities on page load
                            $.ajax({
                                url: '{{ route("checkout.getCities") }}',
                                method: 'GET',
                                success: function(data) {
                                    data.forEach(city => {
                                        $('#city-select').append(new Option(city.city_name, city.city_id));
                                    });
                                }
                            });

                            // Calculate shipping cost when city is selected
                            $('#city-select').change(function() {
                                const cityId = $(this).val();
                                if (cityId) {
                                    $.ajax({
                                        url: '{{ route("checkout.calculateShipping") }}',
                                        method: 'POST',
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            city_id: cityId,
                                        },
                                        success: function(data) {
                                            const shippingCost = (parseFloat(data.shipping_cost) * 1000).toFixed(0);
                                            $('#shipping-cost').text(shippingCost.replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                                            $('#shipping-cost-input').val(shippingCost);

                                            const subtotal = parseFloat({{ $subtotal }}).toFixed(0, ',', '.');
                                            const total = (parseFloat(subtotal) + parseFloat(shippingCost)).toFixed(0);
                                            $('#total').text(total.replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                                            $('#total-input').val(total);
                                        }
                                    });
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        
        <!-- Ringkasan Belanja Section -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2>Ringkasan Belanja</h2>
                    <div>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Produk</span>
                                <span>Subtotal</span>
                            </li>
                            @foreach($cartItems as $cartItem)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <small class="text-muted">{{ $cartItem['quantity'] }}x {{ $cartItem->product->name }}</small>
                                    </div>
                                    <span class="text-muted">Rp {{ number_format($cartItem->product->price * $cartItem->quantity, 0, ',', '.') }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Ongkos Kirim</span>
                                <span>Rp <span id="shipping-cost">{{ number_format($shippingCost, 0, ',', '.') }}</span></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between total">
                                <span>Total</span>
                                <span>Rp <span id="total">{{ number_format($total, 0, ',', '.') }}</span></span>
                            </li>
                        </ul>
                    </div>
                    <button id="pay-now-button" type="button" class="btn btn-primary">Bayar Sekarang</button>
                    <script>
                        document.getElementById('pay-now-button').onclick = function() {
                            document.getElementById('checkout-form').submit(); // Submit the form
                        };
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
