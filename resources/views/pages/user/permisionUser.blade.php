@extends('master')
@section('title')
    Chỉnh quyền theo chức năng User
@endsection
@section('css')
@endsection
@section('content')
    <div id="content-container">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Quản lý User</h1>

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
                            <h3 class="panel-title">Thêm quyền Username{{$id}}.tin</h3>
                        </div>

                        <!-- BASIC FORM ELEMENTS -->
                        <!--===================================================-->
                        <form class="panel-body form-horizontal form-padding">

                            <div class="form-group pad-ver">
                                {{--  <label class="col-md-3 control-label">Thêm quyền</label>  --}}
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <div class="col-md-4 pad-no form-block">

                                        <!-- Checkboxes -->
                                        <div class="checkbox">
                                            <label class="form-checkbox form-normal form-primary active"><input type="checkbox" checked=""> Phân quyền</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="form-checkbox form-normal form-primary"><input type="checkbox"> View Map</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="form-checkbox form-normal form-primary"><input type="checkbox"> Agent Report</label>
                                        </div>

                                    </div>
                                    <div class="col-md-4 pad-no form-block">

                                        <!-- Checkboxes -->
                                        <div class="checkbox">
                                            <label class="form-checkbox form-normal form-primary active"><input type="checkbox" checked="">Attention Report</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="form-checkbox form-normal form-primary"><input type="checkbox"> Edit Map</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="form-checkbox form-normal form-primary"><input type="checkbox">Lịch sử đăng nhập và sử dụng của user</label>
                                        </div>

                                    </div>
                                    <div class="col-md-4 pad-no form-block">
                                        <!-- Checkboxes -->
                                        <div class="checkbox">
                                            <label class="form-checkbox form-normal form-primary active"><input type="checkbox" checked="">Thay đổi điều kiện lọc</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-7 col-sm-offset-5">
                                        <button class="btn btn-info btn-labeled fa fa-save fa-lg" type="submit">Lưu</button>
                                        <button class="btn btn-warning btn-labeled fa fa-repeat fa-lg" type="reset">Trờ lại</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--===================================================-->
                        <!-- END BASIC FORM ELEMENTS -->
                    </div>
                </div>
            </div>

        </div>
        <!--===================================================-->
        <!--End page content-->

    </div>
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->
@endsection
