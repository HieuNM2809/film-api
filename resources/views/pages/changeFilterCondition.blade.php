@extends('master')
@section('title')
    Thay đổi điều kiện lọc
@endsection
@section('css')
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
    </script>
@endsection
@section('content')
    <div id="content-container">
        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Thay đổi điều kiện lọc</h1>

            <!--Searchbox-->
            {{--  <div class="searchbox">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..">
                    <span class="input-group-btn">
                        <button class="text-muted" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>  --}}
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->

        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Attention Report</h3>
                        </div>


                        <!--Input Size-->
                        <!--===================================================-->
                        <form class="form-horizontal" method="post" action="change-filter-condition">
                            @csrf
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="notReadFilter">Điều kiện Not Ready >=
                                    </label>
                                    <div class="col-sm-6">
                                        <div class="col-md-12 col-sm-12 timer-container">
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <input id="notReadFilter" class="form-control required" type="text" name="notReadFilter"
                                                        value="00:00:00" />
                                                    <label for="notReadFilter" class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="talkingFilter" class="col-sm-3 control-label">Điều kiện Talking ></label>
                                    <div class="col-sm-6">
                                        <div class="col-md-12 col-sm-12 timer-container">
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <input id="talkingFilter" class="form-control required" type="text" name="talkingFilter"
                                                        value="00:00:00" />
                                                    <label for="talkingFilter" class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $('[name="notReadFilter"]').datetimepicker({
                                        format: 'HH:mm:ss'
                                    });
                                    $('[name="talkingFilter"]').datetimepicker({
                                        format: 'HH:mm:ss'
                                    });
                                </script>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-7 col-sm-offset-5">
                                        <button class="btn btn-info btn-labeled fa fa-save fa-lg" type="submit">Lưu</button>
                                        <button class="btn btn-warning btn-labeled fa fa-repeat fa-lg" type="reset">Trở lại</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--===================================================-->
                        <!--End Input Size-->


                    </div>
                </div>
            </div>
        </div>
        <!--===================================================-->
        <!--End page content-->


    </div>
@endsection
