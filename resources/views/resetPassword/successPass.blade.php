<!doctype html>
<html lang="en">
<x-head/>

<style>
    body {
        background-color: #383f48 !important;
    }

    .card {
        background-color: #272c33;
        color: #ecf1f3;
    }

    .login-card-body {

    }

    .login-box-msg {
        margin: 15px 0;
        font-size: 20px;
    }

    .form-material {
        background-color: rgba(0, 0, 0, 0);
        background-position: center bottom, center calc(100% - 2px);
        background-repeat: no-repeat;
        border-top: none;
        border-left: none;
        border-bottom: 1px solid #95a5a6;
        color: #000915;
        background-size: 0 2px, 100% 1px;
        transition: background 0s ease-out 0s;
    }

    .form-material:focus {
        background-image: linear-gradient(rgb(32, 174, 227), rgb(32, 174, 227)), linear-gradient(rgb(56, 63, 72), rgb(56, 63, 72));
        box-shadow: none;
        float: none;
        background-size: 100% 2px, 100% 1px;
        outline: 0 none;
        transition-duration: 0.3s;
        background-color: rgba(0, 0, 0, 0);
    }

    label:not(.form-check-label):not(.custom-file-label) {
        font-weight: 500;
    }

    .icheck-info {
        font-size: 14px;
    }

    .login-box {
        width: 410px;
        padding-bottom: 125px;
    }

    .forgot-pass {
        margin: 25px 0;
    }

    .forgot-pass a {
        color: #fff;
    }

    .forgot-pass a:hover {
        color: #3D3D3D;
    }

    .sign-up{
        padding-top: 30px;
        font-size: 14px;
        align-content: center;
    }

    .login-background{
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -999;
        position: fixed;
    }

    .login-img-left{
        position: absolute;
        left: 0;
        width: 30%;
        bottom: -30px;
        z-index: -99;
    }

    .login-img-right{
        position: absolute;
        right: 0;
        max-width: 52%;
        z-index: -99;
    }

</style>

<body class="login-page" style="min-height: 496.8px">
<div class="login-box">
    <div class="login-logo">
        <img src="{{url("imgs/logo.png")}}" width="100" height="100" alt="logo">
    </div>
    <div class="card">
        <div class="card login-card-body" style="background-color: white;color: black">
            <p class="login-box-msg">Thay đổi mật khẩu thành công </p>
            <div style="text-align: center">
                Quay trở về trang đăng nhập click  <a href="/login">Đăng nhập</a>
            </div>
        </div>
    </div>
    <div class="login-background">
        <div class="login-img-left">
            <img src="https://midnight.growcrm.io/public/images/login-1.png" class="login-images">
        </div>
        <div class="login-img-right">
            <img src="https://midnight.growcrm.io/public/images/login-2.png" alt="login-images">
        </div>
    </div>
</div>
</body>
<x-script/>
</html>