<!doctype html>
<html lang="en">
<x-head/>
<link rel="stylesheet" href="{{asset("css/in-up-style.css")}}">
<body class="login-page" style="min-height: 496.8px">
<div class="container-fluid">
    <div class="row">
        <div class="bgr-left col-md-8">
            <div class="sign-in-up">
                <a href="{{route("login")}}" class="switcher-in-up">
                    Login
                </a>
                <a href="{{route("register")}}" class="switcher-in-up">
                    Sign Up
                </a>
            </div>
            <div class="fxt-intro">
                <div class="sub-text">
                    Welcome
                </div>
                <h1><span style="color: #333">Fox</span> <i style="color: #f8911c">Banking</i></h1>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card login-card-body">
                <div class="login-logo">
                    <img src="{{url("imgs/logo.png")}}" width="100" height="100" alt="logo">
                </div>
                <form id="form_in_up" class="needs-validation" action="{{ route('login')}}" method="POST" novalidate>
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <input name="email" type="email" class="form-control form-material" placeholder="Email"
                                   required>
                            <i class="fa fa-envelope"></i>
                            <div class="invalid-feedback" style="position: absolute; bottom: -20px">
                                Please enter email.
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <input name="password" type="password" class="form-control form-material"
                                   placeholder="Password" required>
                            <i class="fas fa-lock"></i>
                            <div class="forgot-pass">
                                <a href="{{url("/quen-mat-khau")}}">Forgot Password</a>
                            </div>
                            <div class="invalid-feedback" style="position: absolute; bottom: -25px">
                                Please enter password.
                            </div>
                        </div>
                    </div>
                    @if($errors->any())
                        <h4 class="text-red">{{$errors->first()}}</h4>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn button-in-up btn-block">Sign In</button>
                        </div>
                        <div class="col-md-6">
                            <div class="checkbox-remember">
                                <input id="checkbox-remember" type="checkbox">
                                <label for="checkbox-remember">Keep me logged in</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="social-icon-in-up">
                <ul class="nav justify-content-around">
                    <li class="nav-item">
                        <a class="social-icon-in-up" href=""><i class="ion-social-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="social-icon-in-up" href=""><i class="ion-social-twitter"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="social-icon-in-up" href=""><i class="ion-social-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="social-icon-in-up" href=""><i class="ion-social-snapchat"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
<x-script/>
</html>
