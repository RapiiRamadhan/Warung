<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="register">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="frame-1">
                        <div class="frame-2">
                            <div class="card">
                                <div class="overlap-group">
                                    <h1>REGISTER</h1>
                                    <img src="{{ asset('img/line4.png') }}" alt="line4">
                                    <div class="card-text">Warung Makan Pak Bilal</div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group1 row">
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group2 row">
                                            <div class="col-md-6">
                                                <input id="phone_number" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Nomor Hp">

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group3 row">
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group4 row">
                                            <div class="col-md-6">
                                                <div class="password-toggle">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
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

                                        <div class="form-group5 row">
                                            <div class="col-md-6">
                                                <div class="password-confirm-toggle">
                                                    <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                                                    <label for="password-confirm-toggle" class="password-confirm-toggle-label">
                                                        <i class="fas fa-eye"></i>
                                                    </label>
                                                </div>
                                        
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>                                        

                                        <div class="form-group6 row">
                                            <div class="col-md-6">
                                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" placeholder="Alamat">{{ old('address') }}</textarea>

                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group7 row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
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
        const passwordConfirmToggleLabel = document.querySelector('.password-confirm-toggle-label');
        const passwordConfirmToggleInput = document.querySelector('#password-confirm');;

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

        passwordConfirmToggleLabel.addEventListener('click', () => {
            if (passwordConfirmToggleInput.type === 'password') {
                passwordConfirmToggleInput.type = 'text';
                passwordConfirmToggleLabel.querySelector('i').classList.remove('fa-eye');
                passwordConfirmToggleLabel.querySelector('i').classList.add('fa-eye-slash');
            } else {
                passwordConfirmToggleInput.type = 'password';
                passwordConfirmToggleLabel.querySelector('i').classList.remove('fa-eye-slash');
                passwordConfirmToggleLabel.querySelector('i').classList.add('fa-eye');
            }
        });
    </script>

</body>
</html>