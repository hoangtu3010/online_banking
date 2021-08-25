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
                <p class="text-center tag">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                </p>
            <div class="content-tag-contact">
                <div class="sc_icons_item">
                    <div class="icon_title">
                        <i class="fas fa-home"></i>
                    </div>

                    <h4 class="sc_icons_type">
                        <span>Adress:</span>
                        <div class="sc_icons_item_description">
                            <span>New York, Street Avenue</span>
                        </div>
                    </h4>
                </div>

                <div class="sc_icons_item">
                    <div class="icon_title">
                        <i class="far fa-envelope"></i>
                    </div>
                    <h4 class="sc_icons_type">
                        <span>E-mail:</span>
                        <div class="sc_icons_item_description">
                            <span>info@example.com</span>
                        </div>
                    </h4>
                </div>

                <div class="sc_icons_item">
                    <div class="icon_title">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h4 class="sc_icons_type">
                        <span>Phone:</span>
                        <div class="sc_icons_item_description">
                            <span>800-123-4567</span>
                        </div>
                    </h4>
                </div>
            </div>



            </div>
        </div>

        <div class="message-content">
            <h3 class="messsage-info">
                Send Message
            </h3>
            <div class="row">
                <div class="col-md-6">
                    <form class="form-message">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form class="form-message">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>

                <button class="btn btn-primary tag-button">Send message</button>

            </div>



        </div>

    </div>
@endsection
