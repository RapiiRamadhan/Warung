@extends('layouts.app')

@section('content')
    <!--banner-->
    <section class="hero bg-image">
        <div class="hero-inner">
          <div class="container">
            <div class="banner-text">
              <img src="img/Logo.png" alt="Warung Makan Pak Bilal">
              <h1>Order Catering &amp; Take away</h1>
              <p>Mau makan enak yang tidak bikin kantong bolong, cobain deh
                <br>aneka masakan rumahan mantap di Warung Pak Bilal</p>
            </div>
          </div>
        </div>
    </section>

    <!--about-->
    <section class="about-home">
        <div class="container">
            <div class="about-home-content">
                <img src="img/about.png" alt="Warung Makan Pak Bilal">
                <p>Warung Makan Pak Bilal adalah bisnis kuliner yang menawarkan berbagai hidangan 
                rumahan sederhana yang populer di kalangan penduduk Kota Semarang dengan 
                beragam pilihan menu yang dikenal oleh masyarakat. Warung makan tersebut 
                terletak di Pujasera Pasar Bulu, tepatnya di Jalan  Suyudono, Semarang. Sejak tahun 
                1999, Warung Makan Pak Bilal telah  berdiri. Awalnya berjualan di pinggir trotoar 
                jalan sebelum akhirnya  dipindahkan ke Pujasera Pasar Bulu. Jam operasionalnya 
                dimulai dari pukul 10.00 WIB hingga selesai pada pukul 16.00 WIB.</p>
            </div>
        </div>
    </section>

    <section class="food-menu">
        <div class="container">
            <div class="card-heading">
                <H1>Menu Rekomendasi</H1>
                <p class="text-wrapper">Cara termudah untuk memesan makanan favorit Anda</p>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    @if ($product->id == 1)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    @if ($product->image)
                                        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    @endif
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-number">{{ number_format($product->price, 0, ',', '.') }}</p>
                                    <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($products as $product)
                    @if ($product->id == 2)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    @if ($product->image)
                                        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    @endif
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-number">{{ number_format($product->price, 0, ',', '.') }}</p>
                                    <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($products as $product)
                    @if ($product->id == 3)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    @if ($product->image)
                                        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    @endif
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-number">{{ number_format($product->price, 0, ',', '.') }}</p>
                                    <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($products as $product)
                    @if ($product->id == 13)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    @if ($product->image)
                                        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    @endif
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-number">{{ number_format($product->price, 0, ',', '.') }}</p>
                                    <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($products as $product)
                    @if ($product->id == 15)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    @if ($product->image)
                                        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    @endif
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-number">{{ number_format($product->price, 0, ',', '.') }}</p>
                                    <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($products as $product)
                    @if ($product->id == 8)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    @if ($product->image)
                                        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    @endif
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-number">{{ number_format($product->price, 0, ',', '.') }}</p>
                                    <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($products as $product)
                    @if ($product->id == 9)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    @if ($product->image)
                                        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    @endif
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-number">{{ number_format($product->price, 0, ',', '.') }}</p>
                                    <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($products as $product)
                    @if ($product->id == 10)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    @if ($product->image)
                                        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    @endif
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-number">{{ number_format($product->price, 0, ',', '.') }}</p>
                                    <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="div-mx-auto">
                    <a href="{{ route('products.index') }}" class="button-4">
                        <div class="text-wrapper-8">Show All Menu</div>
                    </a>
                </div>   
            </div>             
        </div>
    </section>
                
@endsection

