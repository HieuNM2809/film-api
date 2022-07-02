@extends('master')
@section('title')
    Loại bài viết
@endsection
@section('content')
    <div id="content-container">
        <div id="page-title">
            <h1 class="page-header text-overflow">DEV- Backend</h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="#">Loại bài viết</a></li>
        </ol>
        <div class="row" style="display:flex; justify-content:center;">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Loại bài viết</h3>
                    </div>

                    <!--Block Styled Form -->
                    <!--===================================================-->
                    <form action="{{ route($table . '.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Loại bài viết</label>
                                        <input type="text" class="form-control" name="type" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Màu sắc</label>
                                        <input type="color" class="form-control" name="color" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Mô tả chi tiết</label>
                                        <textarea required name="description" placeholder="Mô tả" rows="13" class="form-control" style="width: 785px; height: 233px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button class="btn btn-info" type="submit">Submit</button>
                        </div>
                    </form>
                    <!--===================================================-->
                    <!--End Block Styled Form -->

                </div>
            </div>
        </div>
    </div>
@endsection
