@extends("layout")
@section("main")
    <div class="login_register" >
        <div style="">
            <h4 style="  color: white; opacity:1;margin-top: 40px;margin-bottom: 50px">Để sử dụng hãy nhập thông tin </h4>
            <div class="">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary">Dashboard</a>
                @else
                    <a style="color: white;margin-right: 15px;width: 40px;height: 15px" href="{{ route('login') }}" class="">
                        Đăng nhập </a>

                    @if (Route::has('register'))
                        <a style="color: white;margin-left: 15px" href="{{ route('register') }}" class="">Đăng Ký</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection
