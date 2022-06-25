@extends('master')
@section('title')
 Trang chủ
@endsection
@section('content')
<div id="content-container">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">DEV- Backend</h1>

    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="#">Trang chủ</a></li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->




    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <!--Tiles - Bright Version-->
        <!--===================================================-->
        <div class="row">
            <div class="col-sm-6 col-lg-3">

                <!--Registered User-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div class="panel media pad-all">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                        <i class="fa fa-user fa-2x"></i>
                        </span>
                    </div>

                    <div class="media-body">
                        <p class="text-2x mar-no text-thin">241</p>
                        <p class="text-muted mar-no">Registered User</p>
                    </div>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

            </div>
            <div class="col-sm-6 col-lg-3">

                <!--New Order-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div class="panel media pad-all">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-sm icon-circle bg-info">
                        <i class="fa fa-shopping-cart fa-2x"></i>
                        </span>
                    </div>

                    <div class="media-body">
                        <p class="text-2x mar-no text-thin">543</p>
                        <p class="text-muted mar-no">New Order</p>
                    </div>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

            </div>
            <div class="col-sm-6 col-lg-3">

                <!--Comments-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div class="panel media pad-all">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                        <i class="fa fa-comment fa-2x"></i>
                        </span>
                    </div>

                    <div class="media-body">
                        <p class="text-2x mar-no text-thin">34</p>
                        <p class="text-muted mar-no">Comments</p>
                    </div>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

            </div>
            <div class="col-sm-6 col-lg-3">

                <!--Sales-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div class="panel media pad-all">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-sm icon-circle bg-danger">
                        <i class="fa fa-dollar fa-2x"></i>
                        </span>
                    </div>

                    <div class="media-body">
                        <p class="text-2x mar-no text-thin">654</p>
                        <p class="text-muted mar-no">Sales</p>
                    </div>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

            </div>
        </div>
        <!--===================================================-->
        <!--End Tiles - Bright Version-->



        <div class="row">
            <div class="col-lg-7">

            </div>
            <div class="col-lg-5">
                <!--Chat Widget-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div class="panel">
                    <!--Chat widget body-->
                    <div id="demo-chat-body" class="collapse in">
                        <div class="nano" style="height:500px">
                            <div class="nano-content pad-all">
                                <ul class="list-unstyled media-block">
                                    <li class="mar-btm">
                                        <div class="media-left">
                                            <img src="img/av1.png" class="img-circle img-sm" alt="Profile Picture">
                                        </div>
                                        <div class="media-body pad-hor">
                                            <div class="speech">
                                                <a href="#" class="media-heading">John Doe</a>
                                                <p>Hello Lucy, how can I help you today ?</p>
                                                <p class="speech-time">
                                                <i class="fa fa-clock-o fa-fw"></i>09:23AM
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mar-btm">
                                        <div class="media-right">
                                            <img src="img/av4.png" class="img-circle img-sm" alt="Profile Picture">
                                        </div>
                                        <div class="media-body pad-hor speech-right">
                                            <div class="speech">
                                                <a href="#" class="media-heading">Lucy Doe</a>
                                                <p>Hi, I want to buy a new shoes.</p>
                                                <p class="speech-time">
                                                    <i class="fa fa-clock-o fa-fw"></i> 09:23AM
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mar-btm">
                                        <div class="media-left">
                                            <img src="img/av1.png" class="img-circle img-sm" alt="Profile Picture">
                                        </div>
                                        <div class="media-body pad-hor">
                                            <div class="speech">
                                                <a href="#" class="media-heading">John Doe</a>
                                                <p>Shipment is free. You'll get your shoes tomorrow!</p>
                                                <p class="speech-time">
                                                    <i class="fa fa-clock-o fa-fw"></i> 09:25
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mar-btm">
                                        <div class="media-right">
                                            <img src="img/av4.png" class="img-circle img-sm" alt="Profile Picture">
                                        </div>
                                        <div class="media-body pad-hor speech-right">
                                            <div class="speech">
                                                <a href="#" class="media-heading">Lucy Doe</a>
                                                <p>Wow, that's great!</p>
                                                <p class="speech-time">
                                                    <i class="fa fa-clock-o fa-fw"></i> 09:27
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mar-btm">
                                        <div class="media-right">
                                            <img src="img/av4.png" class="img-circle img-sm" alt="Profile Picture">
                                        </div>
                                        <div class="media-body pad-hor speech-right">
                                            <div class="speech">
                                                <a href="#" class="media-heading">Lucy Doe</a>
                                                <p>Ok. Thanks for the answer. Appreciated.</p>
                                                <p class="speech-time">
                                                <i class="fa fa-clock-o fa-fw"></i> 09:28
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mar-btm">
                                        <div class="media-left">
                                            <img src="img/av1.png" class="img-circle img-sm" alt="Profile Picture">
                                        </div>
                                        <div class="media-body pad-hor">
                                            <div class="speech">
                                                <a href="#" class="media-heading">John Doe</a>
                                                <p>You are welcome! <br/> Is there anything else I can do for you today?</p>
                                                <p class="speech-time">
                                                    <i class="fa fa-clock-o fa-fw"></i> 09:30
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mar-btm">
                                        <div class="media-right">
                                            <img src="img/av4.png" class="img-circle img-sm" alt="Profile Picture">
                                        </div>
                                        <div class="media-body pad-hor speech-right">
                                            <div class="speech">
                                                <a href="#" class="media-heading">Lucy Doe</a>
                                                <p>Nope, That's it.</p>
                                                <p class="speech-time">
                                                    <i class="fa fa-clock-o fa-fw"></i> 09:31
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mar-btm">
                                        <div class="media-left">
                                            <img src="img/av1.png" class="img-circle img-sm" alt="Profile Picture">
                                        </div>
                                        <div class="media-body pad-hor">
                                            <div class="speech">
                                                <a href="#" class="media-heading">John Doe</a>
                                                <p>Thank you for contacting us today</p>
                                                <p class="speech-time">
                                                    <i class="fa fa-clock-o fa-fw"></i> 09:32
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>



                        <!--Chat widget footer-->
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-xs-9">
                                    <input type="text" placeholder="Enter your text" class="form-control chat-input">
                                </div>
                                <div class="col-xs-3">
                                    <button class="btn btn-primary btn-block" type="submit">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Chat Widget-->

            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End page content-->


</div>
@endsection
