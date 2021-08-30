@extends("welcome.layout-welcome")
@section("main")
    <link rel="stylesheet" href="{{asset("css/contact.css")}}">
    <div class="container">
        <div class="contact">
            <h2 class="info-content">Contacts</h2>
            <div class="title-info">
                <a href="">Home
                    <span class="i-tag"><i class="fas fa-chevron-right"></i></span>
                    <span class="title-tag">Contacts</span>
                </a>
            </div>
        </div>
        <div class="wb-wrapper-content">
            <div class="images-bg"></div>
                <div class="wrap-title-content">
                    <div style="text-align: center;width: 700px; margin-bottom: 50px">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </div>
                    <div class="content-tag-contact">
                            <div class="sc_icons_item">
                                <div class="icon_title">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="sc_icons_type">
                                    <span>Adress:</span>
                                    <div class="sc_icons_item_description">
                                        <h6>New York, Street Avenue</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="sc_icons_item" style="padding: 0 20px 0 20px ">
                                <div class="icon_title">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="sc_icons_type">
                                    <span>E-mail:</span>
                                    <div class="sc_icons_item_description">
                                        <h6>info@example.com</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="sc_icons_item">
                                <div class="icon_title">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="sc_icons_type">
                                    <span>Phone:</span>
                                    <div class="sc_icons_item_description">
                                        <h6>800-123-4567</h6>
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
            <form action="">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <input style="border-radius: 20px" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your name">
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <input style="border-radius: 20px" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your email">
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"></label>
                                    <textarea style="border-radius: 20px" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your massager"></textarea>
                                </div>
                            </div>
                        </div>
                        <p>I agree that my submitted data is being collected and stored
                        </p>
                        <div style="text-align: center">
                            <button class="btn btn-outline-primary" style="border-radius: 20px">Send Message</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
