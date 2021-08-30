@extends("welcome.layout-welcome")
@section("main")
    <link rel="stylesheet" href="{{asset("css/about-us.css")}}">
    <div class="container" style="margin-top: 70px">
        <div class="row">
            <h1 style="font-size: 50px">Ưu điểm và lợi ích  </h1>
        </div>
        <div class="row" style="margin-top: 30px">
            <div class="col-md-5">
                <img src="https://noithathoaphat.pro/img/uploads/images/blog/T12-2015/mach-ban-tu-the-ngoi-lam-viec-dung-chuan-min.jpg" alt="" width="100%">
            </div>
            <div class="col-md-7" style="padding-left: 80px">
                <h1 style="font-size: 50px ;letter-spacing: normal"><b>Người dùng</b></h1>
                <h5 style="color: #84848c">Sản phẩm giúp người dùng quản lí tiền bạc, thời gian, các gói đầu tư thuận tiện nhất. Bảo mật an toàn tuyệt đối .</h5>
                <h5>Ưu điểm :</h5>
                <ul>
                    <li>Đăng kí đăng nhập sử dụng tiện lợi
                    </li>
                    <li>Giúp mọi người quản lí các tài khoản ngân hàng của nhiều tài khoản ngân hàng khác nhau.
                    </li>
                    <li>Chuyển tiền giữa các ngân hàng với nhau với mức phí ưu đãi
                    </li>
                    <li>Cung cấp thông tin lịch sử các cuộc giao dịch .
                    </li>
                    <li>Cung cấp các gói gửi tiền mới ưu đãi cao .
                    </li>
                    <li>Bảo mật tuyệt đối với OTP và OTP time
                    </li>
                    <li>Lấy lại mật khẩu dễ dàng qua email đăng nhập
                    </li>
                </ul>
            </div>
        </div>
        <div class="row" style="margin-top: 90px">
            <div class="col-md-7">
                <h1 style="font-size: 50px ;letter-spacing: normal"><b>Người quản lí</b></h1>
                <h5 style="color: #84848c">Quản lí dữ liệu các tài khoản,  .</h5>
                <h5>Ưu điểm :</h5>
                <ul>
                    <li> Tìm kiếm khách hàng theo tên, điện thoại tùy ý
                    </li>
                    <li>Thay đổi thông tin người dùng
                    </li>
                    <li>Thay đổi trạng thái hoạt động của từng tài khoản
                    </li>
                    <li>Tạo ra các gói gửi tiết kiệm và thay đổi lãi xuất tùy vào tình điều kiện
                    </li>
                    <li>Trả lời khiếu nại khách hàng
                    </li>
                    <li>Và tạo thông tin trên trang chủ
                    </li>
                </ul>
            </div>
            <div class="col-md-5">
                <img src="https://www.bravo.com.vn/Uploads/_images/Online/SEO/Yen_D9.jpg" alt="" width="100%"   >
            </div>
        </div >
        <div class="row" style="margin-bottom: 70px;margin-top: 50px;text-align: center">
            <form>
                <a class="btn btn-outline-danger" href="">Đăng kí để dùng ngay</a>
            </form>
        </div>
    </div>
@endsection
