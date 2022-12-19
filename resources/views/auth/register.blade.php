<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="/auth/style.login.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="flip" checked>
        <div class="cover preload" id="cover">
            <div class="front">
                <img src="https://png.pngtree.com/thumb_back/fh260/background/20220523/pngtree-professional-streamer-banner-e-sport-fan-image_1375154.jpg"
                    alt="">
                <div class="text">
                    <span class="text-1">A positive mind set, <br> gives you postive things</span>
                    <span class="text-2">So, got out and start your business!</span>
                </div>
            </div>

            <div class="back">
                <img src="https://png.pngtree.com/thumb_back/fh260/background/20190221/ourmid/pngtree-simple-business-office-document-image_20843.jpg"
                    alt="">
                <div class="text">
                    <span class="text-1">A big business<br> Starts small</span>
                    <span class="text-2">- Richard Branson</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email" placeholder="Email">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert" id="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="current-password" placeholder="Password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback logins" role="alert" id="error">
                                    <strong class="">{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="button input-box">
                                <input type="submit" value="{{ __('Login') }}">
                            </div>

                            <div class="forgot">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup
                                    now</label></div>
                        </div>
                    </form>
                </div>
                <div class="signup-form">
                    {{-- @if ($errors->any())
                        <input type="checkbox" id="flip" checked>
                    @endif --}}
                    <div class="title">Signup</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" placeholder="Enter your name" autocomplete="name"
                                    autofocus>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="Email" autocomplete="email">
                            </div>
                            @error('email')
                            <input type="hidden" value="1" id="sad" onLoad="yourFunctionName();">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Password" autocomplete="new-password">
                            </div>
                            @error('password')
                            <input type="hidden" value="1" id="sad" onLoad="yourFunctionName();">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input id="password-confirm" type="password" class="form-control"
                                    placeholder="Confirm Password" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Register" id="register">
                            </div>
                            <div class="text sign-up-text">Already have an account? <label for="flip">Login
                                    now</label></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
window.onload = function(e) {
    
   var sad =  document.getElementById("sad").value;
   if(sad == 1){
    document.getElementById("error").style.display= 'none';
    document.getElementById("flip").checked = true;
   }
};

</script>

</html>
