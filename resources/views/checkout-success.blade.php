@extends('layouts.app')

@section('content')
    <section class="checkout-success">
        <div class="container">
            <h2>Pembayaran Berhasil</h2>
            <p>Terima kasih atas pembelian Anda! Pembayaran Anda telah berhasil diproses.</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </section>
@endsection
