@extends('master')
@section('title')
    Gửi tin nhắn nội bộ
@endsection
@section('css')
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css'>
    <link rel='stylesheet' href='{{ asset('assets/css/styleMesage.css') }}'>
@endsection
@section('content')
    <!--CONTENT CONTAINER-->
    <div id="content-container">
        <!--Page Title-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Gửi tin nhắn nội bộ</h1>
        </div>
        <div id="page-content">
            <div class="panel panel-colorful main-message">
                <div class="panel-body">
                    <div class="row" style="display:flex;">
                        <div class="col-lg-8" style="margin:auto;">
                            <div class="container login" style="width: 30%;">
                                <div class="container d-flex justify-content-center">
                                    <div class="row">
                                        <div class="card">
                                            <div class="card-header"  >
                                                <strong>Login</strong>
                                            </div>
                                            <div class="card-body">
                                                <form name="login" id="login">
                                                    <div class="row">
                                                        <div class="col">
                                                            <span class="profile-img">
                                                                <i class='fas fa-user-circle' style='font-size:120px'></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <hr> <!-- other content  -->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <div class="input-group " style="width: 100%;">
                                                                    <input class="form-control" placeholder="Name"
                                                                        id="name" name="name" type="name"
                                                                        autofocus>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                    <div class="input-group " style="width: 100%;">
                                                                        <div class="input-group-prepend" style="width: 40px;">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <i class='fas fa-user-secret'></i>
                                                                            </span>
                                                                        </div>
                                                                        <input class="form-control" placeholder="Password" id="loginPassword" name="loginPassword" type="password">
                                                                    </div>
                                                                </div> -->
                                                            <div class="form-group">
                                                                <input type="button"
                                                                    class="btn btn-lg btn-success btn-block submit"
                                                                    id="login_m" value="Vào phòng chat">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <a href="#" onClick="">I forgot my password!</a> -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container home">
                                <div class="row clearfix" >
                                    <div class="col-lg-12">
                                        <div class="card chat-app">
                                            <div id="plist" class="people-list">
                                                <div class="input-group">
                                                    <h4>Các thành viên trong nhóm</h4>
                                                </div>
                                                <ul class="list-unstyled chat-list mt-2 mb-0 lisUserOnline">
                                                    <!-- <li class="clearfix">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Vincent Porter</div>
                                                                {{--  <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>  --}}
                                                            </div>
                                                        </li>
                                                        <li class="clearfix active">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Aiden Chavez</div>
                                                                <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                                            </div>
                                                        </li> -->
                                                    <!-- <li class="clearfix">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Mike Thomas</div>
                                                                <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                                            </div>
                                                        </li> -->
                                                    <!-- <li class="clearfix">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Christian Kelly</div>
                                                                <div class="status"> <i class="fa fa-circle offline"></i> left 10 hours ago </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Monica Ward</div>
                                                                <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Dean Henry</div>
                                                                <div class="status"> <i class="fa fa-circle offline"></i> offline since Oct 28
                                                                </div>
                                                            </div>
                                                        </li> -->
                                                </ul>
                                            </div>
                                            <div class="chat">
                                                <div class="chat-header clearfix">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                        </div>
                                                        <div class="col-lg-6 hidden-sm text-right chat-header-user">
                                                            <!-- <a href="javascript:void(0);" class="btn btn-outline-secondary"><i
                                                                        class="fa fa-camera"></i></a>
                                                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i
                                                                        class="fa fa-image"></i></a> -->
                                                            <div>
                                                                <a href="javascript:void(0);" data-toggle="modal"
                                                                    data-target="#view_info">
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                        alt="avatar">
                                                                </a>
                                                                <div class="chat-about">
                                                                    <h6 id="nameMe" class="m-b-0">Aiden Chavez</h6>
                                                                    {{--  <small>Last seen: 2 hours ago</small>  --}}
                                                                </div>
                                                            </div>
                                                            <a id="logout" href="javascript:void(0);"
                                                                class="btn btn-outline-warning">Tài khoản của bạn</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-history">
                                                    <ul class="m-b-0 listMessage">
                                                    </ul>
                                                </div>
                                                <div class="chat-message clearfix">
                                                    <div id="typing" style="color: #c3c3c3;display: none;"><img
                                                            width="40px;" src="LoadEllipsis.gif" alt=""> Hiếu
                                                        đang gõ chữ</div>
                                                    <div class="input-group mb-0" style="display:flex;">
                                                        <input id="valSend" type="text" class="form-control"
                                                            placeholder="Nhập văn bản ở đây...">
                                                        <div id="btnSend" class="input-group-prepend" style="font-size: 20px;margin: 2px;">
                                                            <span class="input-group-text"><i
                                                                    class="fa fa-send"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END CONTENT CONTAINER-->
@endsection
