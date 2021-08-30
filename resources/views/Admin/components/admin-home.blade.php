<?php
    $bankAccount = \App\Models\BankAccount::all()->count();
    $user = \App\Models\User::all()->count();
    $package = \App\Models\SavingsPackage::all()->count();
?>

@extends("Admin.layout.admin-layout")
@section("main")
    <link rel="stylesheet" href="{{asset("css/admin-home.css")}}">
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-4 col-6 box-status">
                    <!-- small box -->
                    <a href="{{url("/admin/bankAccount")}}">
                        <div class="small-box bg-bank-acc">
                            <div class="inner status-inner">
                                <h3>{{$bankAccount}}</h3>

                                <p>Bank Account</p>
                            </div>
                            <div class="icon icon-bank-acc">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <div class="process">
                                <div class="progress-bar bg-success w-100" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6 box-status">
                    <!-- small box -->
                    <a href="{{url("/admin/customer")}}">
                        <div class="small-box bg-customer">
                            <div class="inner status-inner">
                                <h3>{{$user}}</h3>

                                <p>Users</p>
                            </div>
                            <div class="icon icon-customer">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="process">
                                <div class="progress-bar bg-warning w-100" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6 box-status">
                    <!-- small box -->
                    <a href="{{url("/admin/savings-package")}}">
                        <div class="small-box bg-package">
                            <div class="inner status-inner">
                                <h3>{{$package}}</h3>

                                <p>Savings Package</p>
                            </div>
                            <div class="icon icon-package">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <div class="process">
                                <div class="progress-bar bg-danger w-100" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->

                <div class="col-lg-4 col-6 box-status">
                    <!-- small box -->
                    <a href="{{url("/admin/blog/news")}}">
                        <div class="small-box bg-news">
                            <div class="inner status-inner">
                                <h3>{{$package}}</h3>

                                <p>Savings Package</p>
                            </div>
                            <div class="icon icon-news">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="process">
                                <div class="progress-bar bg-info w-100" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
