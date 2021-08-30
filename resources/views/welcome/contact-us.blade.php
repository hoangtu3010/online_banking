@extends("welcome.layout-welcome")
@section("main")
    <link rel="stylesheet" href="{{asset("css/contact.css")}}">
    <div class="container">
        <div class="contact">
            <h2 class="info-content">Contacts</h2>
            <div class="title-info">
                <a href="/">Home
                    <span class="i-tag"><i class="fas fa-chevron-right"></i></span>
                    <span class="title-tag">Contacts</span>
                </a>
            </div>
        </div>
        <div class="wb-wrapper-content">
            <div class="images-bg"></div>
            <div class="wrap-title-content">
                <div style="text-align: center;width: 700px; margin-bottom: 50px">
                    Whether you’re curious about features, a free trial, or even press - we’re ready to answer any and
                    all questions.
                </div>
                <div class="content-tag-contact">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="sc_icons_item">
                                <div class="icon_title">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="sc_icons_type">
                                    <span>Adress:</span>
                                    <div class="sc_icons_item_description">
                                        <p>8 Tôn Thất Thuyết
                                            Mỹ Đình 2, Cầu Giấy, Hà Nội</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="sc_icons_item">
                                <div class="icon_title">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="sc_icons_type">
                                    <span>E-mail:</span>
                                    <div class="sc_icons_item_description">
                                        <p><a href="mailto: onlinebankingn4@gmail.com" style="color: #01579bb8">onlinebankingn4@gmail.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="sc_icons_item">
                                <div class="icon_title">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="sc_icons_type">
                                    <span>Phone:</span>
                                    <div class="sc_icons_item_description">
                                        <p><a href="tel: +84 999-999-999" style="color: #333">+84 999-999-999</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="message-content" style="margin-bottom: 50px">
            <h3 class="messsage-info" style="text-align: center">
                Send Message
            </h3>
            <form class="needs-validation" action="{{url("/send-feedback")}}" method="post" novalidate>
                @csrf
                <div class="form-group">
                    <input name="name" type="text" class="form-control" value="" placeholder="Your Name" required />
                    <div class="invalid-feedback">
                        Please enter name.
                    </div>
                </div>
                <div class="form-group">

                    <input name="email" type="email" class="form-control" value="" placeholder="Your Email" required />
                    <div class="invalid-feedback">
                        Please enter email.
                    </div>

                </div>
                <div class="form-group">

                    <textarea rows="5" name="message" class="form-control" placeholder="Your Message" required></textarea>
                    <div class="invalid-feedback">
                        Please enter message.
                    </div>

                </div>
                <button class="btn btn-outline-warning w-100" type="submit">
                    <i class="fa fa-paper-plane"></i> Send Message
                </button>
            </form>
        </div>
    </div>


@endsection
