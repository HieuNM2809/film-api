@extends('master')
@section('title')
    Thêm User
@endsection
@section('content')
    <div id="content-container">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Thêm User</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->

        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">
            @include('layout.messageErrors')
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"></h3>
                        </div>
                        @include('layout.alert')
                        <!-- BASIC FORM ELEMENTS -->
                        <!--===================================================-->
                        <form class="frmAddUser panel-body form-horizontal form-padding" method="POST"
                            action="{{ url('admin/user-v2') }}" enctype="multipart/form-data">
                            @csrf
                            <!--Tên đăng nhập-->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tên</label>
                                <div class="col-md-6">
                                    <input type="text" required id="name" name="name" value="{{old('name') }}"
                                        class="form-control check-required" placeholder="Tên">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mật khẩu</label>
                                <div class="col-md-6">
                                    <input type="password"  required id="password" name="password" value="{{old('password') }}"
                                        class="form-control check-required" placeholder="Mật khẩu">
                                </div>
                            </div>

                            <!--Email -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email </label>
                                <div class="col-md-6">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        class="form-control check-required" placeholder="Email">
                                </div>
                            </div>

                            <!--Tên đầy đủ-->
                            <div class="form-group">
                                <label class="col-md-3 control-label">CMND</label>
                                <div class="col-md-6">
                                    <input type="text" id="identity_card" name="identity_card" value="{{ old('identity_card') }}"
                                        class="form-control check-required" placeholder="CMND">
                                </div>
                            </div>

                            <!--Mã nhân viên-->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Hình ảnh</label>
                                <div class="col-md-6">
                                    <input onchange="loadFile(event)" type="file" id="avatar" name="avatar"
                                         class="form-control check-required"
                                        placeholder="Hình ảnh">
                                    <img id="output" src="" alt="your image" width="200px" height="200px"/>
                                </div>

                            </div>
                            <!--Tên đầy đủ-->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Ngày sinh</label>
                                <div class="col-md-6">
                                    <input type="date" max="{{$today}}" id="birthday" max="" name="birthday" value="{{ old('birthday') }}"
                                        class="form-control check-required" placeholder="Ngày sinh">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Vị trí</label>
                                <div class="col-md-6">
                                   <select   class="form-control check-required"  name="id_permission" >
                                    <option value="1">User</option>
                                    <option value="2">Admin</option>
                                   </select>
                                </div>
                            </div>

                            <!--Ngày sinh-->
                            <div class="form-group">
                                <label class="col-md-3 control-label">URL</label>
                                <div class="col-md-6">
                                    <input type="text" id="url" name="url"
                                        value="{{ old('url') }}" class="form-control check-required"
                                        placeholder="URL">
                                </div>
                            </div>

                            <!--sdt-->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Vị trí</label>
                                <div class="col-md-6">
                                    <input type="tel" id="location" name="location" value="{{ old('location') }}"
                                        class="form-control check-required" placeholder="Vị trí">
                                </div>
                            </div>
                            <!--IP Phone-->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Miêu tả</label>
                                <div class="col-md-6">
                                    <input type="text" id="bio" name="bio" value="{{ old('bio') }}"
                                        class="form-control" placeholder="Miêu tả">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Học vấn</label>
                                <div class="col-md-6">
                                    <input type="text" id="currently_learning" name="currently_learning" value="{{old('currently_learning') }}"
                                        class="form-control" placeholder="Học vấn">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Kỹ năng</label>
                                <div class="col-md-6">
                                    <input type="text" id="skills" name="skills" value="{{ old('skills') }}"
                                        class="form-control" placeholder="Miêu tả">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Công ty</label>
                                <div class="col-md-6">
                                    <input type="text" id="work" name="work" value="{{ old('work') }}"
                                        class="form-control" placeholder="Công ty">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Giáo dục</label>
                                <div class="col-md-6">
                                    <input type="text" id="education" name="education" value="{{ old('education') }}"
                                        class="form-control" placeholder="Giáo dục">
                                </div>
                            </div>


                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-7 col-sm-offset-5" style="display: flex;align-items: center;">
                                        <button class="frmAddUser-btn btn btn-info btn-labeled fa fa-save fa-lg "
                                            type="submit">Lưu</button>
                                        <a href="{{ url('admin/user-v2/create') }}"
                                            class="btn btn-warning btn-labeled fa fa-repeat fa-lg"
                                            style="margin-left: 10px;" type="reset">Làm mới</a>
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
@endsection

@section('js')
<script>
    var loadFile = function(event, idLoad = 'output') {
        var output = document.getElementById(idLoad);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection
