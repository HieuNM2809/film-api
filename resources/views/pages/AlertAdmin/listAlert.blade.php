@extends('master')
@section('css')
    <style type="text/css">
        .bootstrap-select {
            margin: 0;
        }

        .toolbar-filter {
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 5px
        }

        .form-control,
        .btn {
            padding: 3px 6px
        }

        .panel-body {
            padding: 10px
        }

        .form-horizontal .control-label {
            padding-top: 3px;
        }

        .panel {
            margin-bottom: 10px
        }

        .fixed-table-container {
            border-radius: 0;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
        }

        @media (min-width: 992px) {
            #page-content {
                padding: 5px 5px 0;
            }
        }

    </style>
    <script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
    <link href="{!! asset('backend/plugins_v2/bootstrap-table/bootstrap-table.min.css') !!}" rel="stylesheet">

    <link href="{{ asset('assets/nifty/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/nifty/css/nifty.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/nifty/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{!! asset('backend/plugins_v2/bootstrap-table/bootstrap-table.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins_v2/bootstrap-table/locale/bootstrap-table-vi-VN.min.js') !!}"></script>
@endsection

@section('content')
    <!--CONTENT CONTAINER-->
    <div id="content-container">
        <!--Page Title-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Danh sách thông báo</h1>
        </div>
        <!--End page title-->
        <!--Breadcrumb-->
        <!--<ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Library</a></li>
                  <li class="active">Data</li>
                 </ol>-->
        <!--End breadcrumb-->
        <div id="page-content">
            {{--  <div class="panel panel-primary panel-colorful">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" class="form-horizontal" id="frmFilter" onSubmit="return false;"  style="min-height: 100px;display: flex;justify-content: space-evenly;">
                                @csrf
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Mã nhân viên</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="codeStaff" name="codeStaff" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Tên đăng nhập</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="name" name="name" type="text">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Tên đầy đủ</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="fullName" name="fullName" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Email</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="email" name="email" type="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Tình trạng</label>
                                        <div class="col-sm-6">
                                            <select id="status_filter" class="custom_filter form-control" name="status">
                                                <option value="">--Tất cả--</option>
                                                <option value="HoatDong">Hoạt động</option>
                                                <option value="KhongHoatDong">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input class="btn btn-default" id="filter-form" type="submit"  value="Tìm kiếm">
                                        <a href="{{ url('admin/list-user') }}" class="btn btn-default" title="Làm mới">Làm mới</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  --}}

            <div class="panel">
                <div class="panel-body">
                    {{--  <div class="fixed-table-toolbar"><span><b>Tổng số dòng:</b></span> <span id="rowTotal"></span></div>  --}}
                    <table id="table-data" class="add-niftycheck" data-toggle="table" data-locale="vi-VN"
                        data-toolbar="#table-toolbar" data-url='{{url('admin/show-alert')}}'
                        data-search="true" data-show-refresh="false" data-show-columns="true" data-pagination="true"
                         data-page-size="25" data-query-params="queryParams" >
                        {{--  data-side-pagination="server" data-page-size="25" data-query-params="queryParams" >  --}}
                        <thead style="background: #5fa2dd; color: white;">
                            <tr>
                                <th scope="col" data-field="stt" data-formatter="actionColumnSTT">STT</th>
                                <th scope="col" data-field="title" data-sortable="true">Tiêu đề</th>
                                <th scope="col" data-field="content" data-sortable="true">Nội dung</th>
                                <th scope="col" data-field="name" data-sortable="true">Tên người gửi</th>
                                <th scope="col" data-field="created_at" data-sortable="true">Ngày tạo</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <script type="text/javascript">

                var $table = $('#table-data');

                $('#frmFilter').submit(function() {
                    return formGo();
                });
                function actionColumnSTT(value, row, index){
                    return index +1;
                }
                function formGo() {
                    $table.bootstrapTable('destroy').bootstrapTable().bootstrapTable('selectPage', 1);
                    return false;
                }
            </script>
        </div>
    </div>
    <!--END CONTENT CONTAINER-->
@endsection
