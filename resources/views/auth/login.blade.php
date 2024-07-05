<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="log-in">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="frame-1">
                        <div class="frame-2">
                            <div class="card">
                                <div class="overlap-group">
                                    <h1>LOGIN</h1>
                                    <img src="{{ asset('img/line4.png') }}" alt="line4">
                                    <div class="card-text">Warung Makan Pak Bilal</div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}" onsubmit="return validateForm()">
                                        @csrf
                
                                        <div class="form-group1 row">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Anda') }}</label>
                
                                            <div class="col-md-6">
                                                <span class="fa-solid fa-user" style="color: #BF1010;"></span>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Anda" autofocus>
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group2 row">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                
                                            <div class="col-md-6">
                                                <div class="password-toggle">
                                                    <span class="fa-solid fa-lock" style="color: #BF1010;"></span>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                                    <label for="password-toggle" class="password-toggle-label">
                                                        <i class="fas fa-eye"></i>
                                                    </label>
                                                </div>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group3 row">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>

                                                    <div class="col-md-8 offset-md-4">
                                                        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar disini</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="form-group4 row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>
                
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                    <img class="warung-makan-pak" src="img/logo.png" />
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
    <script>
        const passwordToggleLabel = document.querySelector('.password-toggle-label');
        const passwordToggleInput = document.querySelector('#password');

        passwordToggleLabel.addEventListener('click', () => {
            if (passwordToggleInput.type === 'password') {
                passwordToggleInput.type = 'text';
                passwordToggleLabel.querySelector('i').classList.remove('fa-eye');
                passwordToggleLabel.querySelector('i').classList.add('fa-eye-slash');
            } else {
                passwordToggleInput.type = 'password';
                passwordToggleLabel.querySelector('i').classList.remove('fa-eye-slash');
                passwordToggleLabel.querySelector('i').classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>
