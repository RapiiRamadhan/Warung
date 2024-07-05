<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Warung Makan Pak Bilal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="forgot">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="frame-1">
                        <div class="frame-2">
                            <div class="card">
                                <div class="overlap-group">
                                    <h1>FORGOT PASSWORD</h1>
                                    <img src="{{ asset('img/line5.png') }}" alt="line5">
                                    <div class="card-text">Masukkan email address anda</div>
                                </div>
                                <div class="card-body">
                                    @if (session('status'))
                                        <p class="alert alert-success">{{ session('status') }}</p>
                                    @endif
                                    <form action="{{ route('password.email') }}" method="POST">
                                        @csrf

                                        <div class="form-group1 row">
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan Email Address" autofocus>
                                            </div>
                                        </div>

                                        @error('email')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror

                                        <div class="form-group2 row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+51Sfjz5tj0W12G4wKS1KuTMd4Z9" crossorigin="anonymous"></script>
</body>
</html>
