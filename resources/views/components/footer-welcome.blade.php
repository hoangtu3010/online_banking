<footer>
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo-footer">
                        <img src="{{ url('imgs/logo.png') }}" alt="logo"> <span><i style="color: #fff; font-weight: 500; font-size: 1.2em">Fox</i> <i style="color: #95a5a6; font-weight: 400; font-size: 1.2em">Banking</i></span>
                    </div>
                    <p class="footer-links">
                        <a href="{{url("/")}}" class="link-1">Home</a>

                        <a href="{{url("/blog")}}">Blog</a>

                        <a href="{{url("/about-us")}}">About</a>

                        <a href="{{url("/contact-us")}}">Contact</a>
                    </p>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="social-icon" href=""><i class="ion-social-facebook"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="social-icon" href=""><i class="ion-social-twitter"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="social-icon" href=""><i class="ion-social-instagram"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="social-icon" href=""><i class="ion-social-snapchat"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="footer-section">
                        <li>Contact Us</li>
                        <div class="border-cate"></div>
                        <li>
                            <i class="ion-ios-location"></i>
                            <p><a href="">8 Tôn Thất Thuyết <br> Mỹ Đình 2, Cầu Giấy, Hà Nội</a></p>
                        </li>
                        <li>
                            <i class="ion-ios-telephone"></i>
                                <p><a href="tel: +84 999-999-999">+84 999-999-999</a></p>
                        </li>
                        <li>
                            <i class="ion-email"></i>
                            <p><a href="mailto: onlinebankingn4@gmail.com" style="color: lightblue">onlinebankingn4@gmail.com</a></p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="footer-feedback">
                        <div class="form-feedback">
                            <div class="feedback-title">
                                <h5 class="text-center" style="color: #fff; padding: 10px 0">Send a message here!</h5>
                            </div>
                            <form id="feedback-controls" class="needs-validation" action="{{url("/send-feedback")}}" method="post" novalidate>
                                @csrf
                                <div class="form-group">
                                    <div class="controls">
                                        <input name="name" type="text" class="form-control" value="" placeholder="Your Name" required />
                                        <i class="fa fa-user"></i>
                                        <div class="invalid-feedback">
                                            Please enter name.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <input name="email" type="email" class="form-control" value="" placeholder="Your Email" required />
                                        <i class="fa fa-envelope"></i>
                                        <div class="invalid-feedback">
                                            Please enter email.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <textarea rows="5" name="message" class="form-control" placeholder="Your Message" required></textarea>
                                        <i class="fa fa-comment"></i>
                                        <div class="invalid-feedback">
                                            Please enter message.
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-outline-warning w-100" type="submit">
                                    <i class="fa fa-paper-plane"></i> Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-extra">
        <span>Copyright &copy; 2021-2022 <a href="{{url("/")}}}">Online Banking</a>.</span>
        All rights reserved.
    </div>
</footer>
