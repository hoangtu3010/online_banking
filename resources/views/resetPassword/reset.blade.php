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
                <p class="login-box-msg">Enter your email to retrieve password!</p>
                @if(session()->has("message"))
                    <div class="alert alert-danger">
                        {!! session()->get("message") !!}
                    </div>
                @elseif(session()->has("error"))
                    <div class="alert alert-danger">
                        {!! session()->get("error") !!}
                    </div>
                @endif
                <form id="form_in_up" class="needs-validation" action="{{url('/sendToEmail')}}" method="POST" novalidate>
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
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn button-in-up btn-block">Send to email</button>
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
