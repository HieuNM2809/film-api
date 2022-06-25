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
        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">
            <!--Tiles - Bright Version-->
            <!--===================================================-->
            <div class="row">
                <div class="panel-heading">
                    <h3 class="panel-title">Thống kế theo ngày</h3>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <!--Registered User-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div class="panel media pad-all">
                        <div class="media-left">
                            <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                <i class="fa-solid fa-user"></i>
                            </span>
                        </div>

                        <div class="media-body">
                            <p class="text-2x mar-no text-thin">241</p>
                            <p class="text-muted mar-no">Người dùng đăng ký mới</p>
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
                                <i class="fa-solid fa-book"></i>
                            </span>
                        </div>

                        <div class="media-body">
                            <p class="text-2x mar-no text-thin">543</p>
                            <p class="text-muted mar-no">Bài viết mới</p>
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
                                <i class="fa-solid fa-comment"></i>
                            </span>
                        </div>

                        <div class="media-body">
                            <p class="text-2x mar-no text-thin">34</p>
                            <p class="text-muted mar-no">Bình luận mới</p>
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
                                <i class="fa fa-briefcase"></i>
                            </span>
                        </div>

                        <div class="media-body">
                            <p class="text-2x mar-no text-thin">654</p>
                            <p class="text-muted mar-no">Báo cáo bài viết xấu</p>
                        </div>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                </div>
            </div>
            <!--===================================================-->
            <!--End Tiles - Bright Version-->



            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-12"><div id="container-hightChart"></div></div>
                    </div>
                    <div class="row" >
                      <div class="col-12" style="margin-top: 15px">
                        <div id="container-hightChart2"></div>
                      </div>
                    </div>
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
                                                <img src=" {{ asset('backend/img/av1.png') }}" class="img-circle img-sm"
                                                    alt="Profile Picture">
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
                                                <img src=" {{ asset('backend/img/av4.png') }}" class="img-circle img-sm"
                                                    alt="Profile Picture">
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
                                                <img src=" {{ asset('backend/img/av1.png') }}" class="img-circle img-sm"
                                                    alt="Profile Picture">
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
                                                <img src=" {{ asset('backend/img/av4.png') }}" class="img-circle img-sm"
                                                    alt="Profile Picture">
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
                                                <img src=" {{ asset('backend/img/av4.png') }}" class="img-circle img-sm"
                                                    alt="Profile Picture">
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
                                                <img src=" {{ asset('backend/img/av1.png') }}" class="img-circle img-sm"
                                                    alt="Profile Picture">
                                            </div>
                                            <div class="media-body pad-hor">
                                                <div class="speech">
                                                    <a href="#" class="media-heading">John Doe</a>
                                                    <p>You are welcome! <br /> Is there anything else I can do for you
                                                        today?</p>
                                                    <p class="speech-time">
                                                        <i class="fa fa-clock-o fa-fw"></i> 09:30
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mar-btm">
                                            <div class="media-right">
                                                <img src=" {{ asset('backend/img/av4.png') }}" class="img-circle img-sm"
                                                    alt="Profile Picture">
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
                                                <img src=" {{ asset('backend/img/av1.png') }}" class="img-circle img-sm"
                                                    alt="Profile Picture">
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
                                        <input type="text" placeholder="Enter your text"
                                            class="form-control chat-input">
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

@section('js')
    <script>
        Highcharts.chart('container-hightChart', {
            title: {
                text: 'Thông kê theo tháng'
            },
            xAxis: {
                categories: [
                    'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5',
                    'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10',
                    'Tháng 11', 'Tháng 12'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                  text: 'Số lượng',
                   align: 'middle'
                }
            },
            labels: {
            },
            series: [{
                type: 'column',
                name: 'Đăng ký mới',
                data: [3, 2, 1, 3, 4,3, 2, 1, 3, 4 , 4, 5 ]
            }, {
                type: 'column',
                name: 'Bài viết mới',
                data: [2, 3, 5, 7, 6 ,4 ,5 ,6 ,3 ,5 ,5 ,7 ]
            }, {
                type: 'column',
                name: 'Bình luận mới',
                data: [4, 3, 3, 9, 0 , 4, 3, 3, 9, 0 , 12, 8]
            }, {
                type: 'column',
                name: 'Báo xấu bài viết',
                data: [  4, 3, 3,4, 3, 3, 9, 0, 9, 0 , 12, 8]
            } ]
        });
        Highcharts.chart('container-hightChart2', {
            chart: {
              type: 'bar'
            },
            title: {
              text: 'Thông kê theo năm'
            },
            subtitle: {
              text: ''
            },
            xAxis: {
              categories: ['Đăng ký mới', 'Bài viết', 'Bình luận', 'Báo xấu'],
              title: {
                text: null
              }
            },
            yAxis: {
              min: 0,
              title: {
                text: 'Số lượng',
                align: 'middle'
              },
              labels: {
                overflow: 'justify'
              }
            },
            tooltip: {
              valueSuffix: ' Lần'
            },
            plotOptions: {
              bar: {
                dataLabels: {
                  enabled: true
                }
              }
            },
            legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'top',
              x: -40,
              y: 80,
              floating: true,
              borderWidth: 1,
              backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
              shadow: true
            },
            credits: {
              enabled: false
            },
            series: [{
              name: 'Năm 2019',
              data: [107, 31, 635, 203]
            }, {
              name: 'Năm 2020',
              data: [133, 156, 947, 408]
            }, {
              name: 'Năm 2021',
              data: [814, 841, 3714, 727]
            }, {
              name: 'Năm 2022',
              data: [1216, 1001, 4436, 738]
            }]
          });
    </script>
@endsection
