@extends('layouts.app')

@section('content')
    <section class="checkout-payment">
        <div class="container">
            <h2>Proses Pembayaran</h2>
            <p>Mohon menunggu, Anda akan diarahkan ke halaman pembayaran...</p>
        </div>
    </section>

    <!-- Midtrans Integration -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            snap.pay('{{ $snap_token }}', {
                onSuccess: function(result) {
                    window.location.href = "{{ route('checkout.success') }}";
                },
                onPending: function(result) {
                    window.location.href = "{{ route('checkout.success') }}";
                },
                onError: function(result) {
                    console.log(result);
                }
            });
        });
    </script>
@endsection
