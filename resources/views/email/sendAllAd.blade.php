@extends('master')
@section('title')
    Gửi quảng cáo
@endsection
@section('content')
    <div id="content-container">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Gửi quảng cáo</h1>
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
                        <form class="panel-body form-horizontal form-padding" action="{{ url('admin/send-mail') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="TieuDe" value="{{ old('TieuDe') }}"
                                    placeholder="Tiêu đề" />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="demo" name="TomTat" class="form-control ckeditor" rows="3">
                                {{ old('TomTat') }}
                             </textarea>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" value="{{ old('link') }}" name="link" placeholder="Link" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="nhapTaiKhoan" id="nhapTaiKhoan">
                                <label for="nhapTaiKhoan">Nhập tài khoản email gửi</label>
                                <br /> <i style="color: red">Nhập nhiều tài khoản email cách nhau bằng dấu phẩy</i>
                                <input type="text" disabled="" class="form-control" id="taikhoan" name="taiKhoan"
                                    placeholder="Tài khoản bạn muốn gửi" />
                            </div>
                            <button type="submit" class="btn btn-default">Gửi</button>
                            <a  href="{{ url('admin/send-mail') }}" class="btn btn-default">Làm mới</a>
                            <form>
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
    $(document).ready(function(){
        $('#nhapTaiKhoan').change(function(){
            if($(this).is(":checked")){
                $('#taikhoan').removeAttr('disabled');
            }else{
                $('#taikhoan').attr('disabled',"")
            }
        });
    });
</script>
@endsection
