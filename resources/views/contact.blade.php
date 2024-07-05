@extends('layouts.app')
@section('content')

    <section class="contact">
        <div class="container">
            <div class="contact-home">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf

                        <div class="form-group1 row">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="User Name" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group2 row">
                            <label for="nomorhp" class="col-md-4 col-form-label text-md-end">{{ __('Nomor Hp') }}</label>

                            <div class="col-md-6">
                                <input id="nomorhp" type="tel" class="form-control @error('nomorhp') is-invalid @enderror" name="nomorhp" value="{{ old('nomorhp') }}" required autocomplete="nomorhp" placeholder="Nomor Hp">

                                @error('nomorhp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group4 row">
                            <label for="note" class="col-md-4 col-form-label text-md-end">{{ __('Note') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="note" name="note" required autocomplete="note" placeholder="Note">{{ old('note') }}</textarea>

                                @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group5 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Contact') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="contact-info">
                    <div class="contact-info-item">
                        <h3 class="contact-info-title">Alamat</h3>
                        <p class="contact-info-text">Pujasera Pasar Bulu<br />Jl. Suyudono No.10A</p>
                    </div>
                    <div class="contact-info-item">
                        <h3 class="contact-info-title">No. HP</h3>
                        <p class="contact-info-text">+6285701329404</p>
                    </div>
                    <div class="contact-info-item">
                        <h3 class="contact-info-title">Email</h3>
                        <p class="contact-info-text">achmadbilal783@gmail.com</p>
                    </div>
                    <div class="contact-info-item">
                        <h3 class="contact-info-title">Jam Buka</h3>
                        <p class="contact-info-text">
                            Senin s/d Kamis dan Sabtu (11.00 - 16.30 WIB)<br />
                            Jumat dan Minggu Libur
                        </p>
                    </div>
                </div>

                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.51363318651798!2d110.40658592541868!3d-6.98356501819487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b48e45102f5%3A0x80be2af0bd73727b!2sSoto%20Ayam%20Pojok%20(Bulu)%20Pak%20Supar!5e0!3m2!1sid!2sid!4v1715463284265!5m2!1sid!2sid" width="1180" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    
@endsection



