<link rel="stylesheet" href="{{asset("css/about_us.css")}}">

@extends("welcome.layout-welcome")
@section("main")
    <div class="container" style="margin-top: 70px">
        <div class="contact">
            <h2 class="info-content">About us</h2>
            <div class="title-info">
                <a href="/">Home
                    <span class="i-tag"><i class="fas fa-chevron-right"></i></span>
                    <span class="title-tag">About us</span>
                </a>
            </div>
        </div>
        <div class="about-main">
            <div class="about-top">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{asset("../imgs/img_about.png")}}" alt="">
                    </div>
                    <div class="col-md-7" style="padding-left: 80px">
                        <h1 class="about-title"><b>Who We Are</b></h1>
                        <p class="child-title">Fox Banking is a strong bank in terms of management, transparency in information, convenience and service provision to fulfill its mission, as an organization, a solid and reliable partner.</p>
                        <p>
                            Strong financial potential, fast growth rate, modern technology, diversified product portfolio and constantly improved service quality, this is the foundation for FoxBanking (FB) to develop strongly. in the direction of becoming a leading modern multi-functional bank. In addition to providing financial solutions to meet all needs of customers, FB is proud to bring value and ensure practical benefits for partners, shareholders, as well as build welfare regimes and the best working environment for the staff.
                        </p>
                    </div>
                </div>
            </div>
            <div class="about-foot">
                <div class="row">
                    <div class="col-md-7" style="padding-right: 80px">
                        <h1 class="about-title"><b>Our app</b></h1>
                        <p class="child-title">The product helps users manage money, time, the first utilities of the package. Absolute security.</p>
                        <ul>
                            <li>Sign up convenient use
                            </li>
                            <li>Help people manage different bank accounts
                            </li>
                            <li>Transfer money between banks with preferential fees
                            </li>
                            <li>Provides transaction history information.
                            </li>
                            <li>Offer new savings packages with high incentives.
                            </li>
                            <li>Absolute security with OTP and OTP time
                            </li>
                            <li>Easy password recovery via login email
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-5">
                        <img src="{{asset("../imgs/img_about2.png")}}" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
