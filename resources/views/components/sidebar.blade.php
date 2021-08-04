<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
<div class="sidebar">
    <div class="mannaka">
        <div class="sidebar_name_bank">
            <h4>Ngân hàng 5</h4>
        </div>
        <div class="sidebar_nameUser_image">
            <img class="sidebar_nameUser_image_img" src="https://i.vietgiaitri.com/2019/9/4/la-nguoi-thu-ba-toi-chet-dung-khi-doc-tin-nhan-anh-gui-vo-530a9a.jpg" alt="" >
            <p>
                Xin chào :
            </p>
            <div class="sidebar_nameUser_image_name"><b>{{Auth::user()->name}}</b></div>

        </div>
        <div class="sidebar_infomation">
            <div class="sidebar_infomation_list_name"><b>Danh sách tài khoản / thẻ</b></div>

            <div>Tài khoản thanh toán :</div>
            <div style="margin-bottom: 20px">0987654321</div>
            <div>Số dư</div>
            <div style="margin-bottom: 15px">0987654321$</div>
        </div>
        <div class="sidebar_telephone">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sideber_telephone_icon">
                            <i class="fas fa-phone"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                       <div class="sideber_telephone_sabisu">
                           <div style="font-size: 12px;color: #edf2f7">
                               Dịch vụ khách hàng 24/7
                           </div>
                           <div style="color: greenyellow;font-size: 20px">
                               <b>1900 19 57 68</b>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
