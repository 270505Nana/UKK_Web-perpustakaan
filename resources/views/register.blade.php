<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>REGISTER</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css')}}">
</head>
    <body class="hold-transition login-page">
        <div class="login-box">

            <div class="card card-outline card-dark">
                <div class="card-header text-center">
                    <h2 class="h1"><b>REGISTER</b></h2>
                </div>

                <div class="card-body">
                    <form action="/registeruser" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama" required value="{{old('name')}}">
                            <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-users"></span>
                                    </div>
                            </div>

                             <!-- error -->
                             @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }} 
                                </div>
                            @enderror
                        </div>

                        <div class="input-group mt-4">
                            <input type="email" class="form-control rounded-top @error('email') is-invalid @enderror" name="email"  placeholder="Email" required value="{{old('email')}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>     
                            </div>

                            <!-- error -->
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }} 
                                </div>
                            @enderror

                        </div>

                        <div class="input-group mt-4">
                            <input type="password" class="form-control @error('password') is-invalid @enderror " name="password"  placeholder="Password" required >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>

                            
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }} 
                                </div>
                            @enderror

                        </div>

                        <div class="row mt-3">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>         

                            <div class="col-10" style="width:100%">
                                <button type="submit" class="btn btn-dark btn-block">Daftar</button>
                            </div>
                        </div>
                        
                    </form>

                    <p class="mb-0">
                        <a href="/" class="text-center">Sudah punya akun? Login!</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('template/../../plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('template/../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('template/../../dist/js/adminlte.min.js')}}"></script>
    </body>
</html>
