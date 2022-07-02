@extends('master')
@section('title')
    Thêm User
@endsection
@section('css')
@endsection
@section('content')
    <div id="content-container">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Thêm mới User</h1>

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
                            <h3 class="panel-title"></h3>
                        </div>


                        <!-- BASIC FORM ELEMENTS -->
                        <!--===================================================-->
                        <form class="panel-body form-horizontal form-padding">

                            {{-- <!--Static-->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Static</label>
                                <div class="col-md-6"><p class="form-control-static">Username</p></div>
                            </div> --}}

                            <!--Tên đăng nhập-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Tên đăng nhập <span style="color: red;">(*)</span></label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" placeholder="Tên đăng nhập">
                                    {{-- <small class="help-block">Vui lòng nhập tên</small> --}}
                                </div>
                            </div>

                            <!--Email -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email" >Email <span style="color: red;">(*)</span></label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" placeholder="Email">
                                    {{-- <small class="help-block">Vui lòng nhập Email</small> --}}
                                </div>
                            </div>

                            <!--Tên đầy đủ-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="fullName">Tên đầy đủ <span style="color: red;">(*)</span></label>
                                <div class="col-md-6">
                                    <input type="text" id="fullName" class="form-control" placeholder="Tên đầy đủ">
                                    {{-- <small class="help-block">Tên đầy đủ</small> --}}
                                </div>
                            </div>

                            <!--Mã nhân viên-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="employeeCode">Mã nhân viên <span style="color: red;">(*)</span></label>
                                <div class="col-md-6">
                                    <input type="text" id="employeeCode" class="form-control" placeholder="Mã nhân viên">
                                </div>
                            </div>

                            <!--Ngày sinh-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="birthDay">Ngày sinh <span style="color: red;">(*)</span></label>
                                <div class="col-md-6">
                                    <input type="date" id="birthDay" class="form-control" style="line-height:unset;"
                                        placeholder="Ngày sinh">
                                </div>
                            </div>

                            <!--sdt-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="phone">Số điện thoại <span style="color: red;">(*)</span></label>
                                <div class="col-md-6">
                                    <input type="text" id="phone" class="form-control" placeholder="Số điện thoại">
                                </div>
                            </div>

                            <!--IP Phone-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="ipPhone">IP Phone</label>
                                <div class="col-md-6">
                                    <input type="text" id="ipPhone" class="form-control" placeholder="IP Phone">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-3 control-label">Vị trí <span style="color: red;">(*)</span></label>
                                <div class="col-md-6 selectpicker-group">
                                    <select name="position" class="selectpicker">
                                        <option value="">--Vui lòng chọn--</option>
                                        <option value="0">BGĐ</option>
                                        <option value="1">Trưởng Phòng</option>
                                        <option value="2">Phó Phòng</option>
                                        <option value="3">Trưởng ca</option>
                                        <option value="4">Trưởng nhóm</option>
                                        <option value="5">View map</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-3 control-label">Tình trạng</label>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <!-- Inline radio buttons -->
                                        <label class="form-radio form-normal" style="width: 125px;"><input type="radio" checked="" name="status"
                                                value="0">Hoạt động</label>
                                        <label class="form-radio form-normal" style="width: 125px;"><input type="radio" name="status" value="1">
                                            Không hoạt động</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-3 control-label">Vùng miền</label>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <!-- Inline radio buttons -->
                                        <label class="form-radio form-normal" style="width: 125px;"><input type="radio" checked="" name="location"
                                                value="hcm">HCM</label>
                                        <label class="form-radio form-normal" style="width: 125px;"><input type="radio" name="location"
                                                value="hni">HNI</label>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group pad-ver">
                                <label class="col-md-3 control-label">Vị trí</label>
                                <div class="col-md-6">
                                    <div class="col-md-6 pad-no form-block">

                                        <!-- Checkboxes -->
                                        <div class="checkbox">
                                            <label class="form-checkbox form-normal form-primary active"><input type="checkbox" checked=""> Option 1 (pre-checked)</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="form-checkbox form-normal form-primary"><input type="checkbox"> Option 2</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="form-checkbox form-normal form-primary"><input type="checkbox"> Option 3</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 pad-no form-block">

                                        <!-- Icon Checkboxes -->
                                        <div class="checkbox">
                                            <label class="form-checkbox form-icon active"><input type="checkbox" checked=""> Option 1 (pre-checked)</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="form-checkbox form-icon"><input type="checkbox"> Option 2</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="form-checkbox form-icon"><input type="checkbox"> Option 3</label>
                                        </div>

                                    </div>
                                </div>
                            </div> --}}
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-7 col-sm-offset-5">
                                        <button class="btn btn-info btn-labeled fa fa-save fa-lg disabled" type="submit">Lưu</button>
                                        <button class="btn btn-warning btn-labeled fa fa-repeat fa-lg" type="reset">Làm
                                            mới</button>
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
