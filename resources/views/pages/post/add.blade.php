@extends('master')
@section('title')
    Bài viết
@endsection
@section('content')
    <div id="content-container">
        <div id="page-title">
            <h1 class="page-header text-overflow">DEV- Backend</h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="#">Thêm Bài viết</a></li>
        </ol>
        <div class="row" style="display:flex; justify-content:center;">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thêm Bài viết</h3>
                    </div>

                    <!--Block Styled Form -->
                    <!--===================================================-->
                    <form action="{{ route($table . '.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="id_user">Người dùng</label>
                                        <select required class="form-control" id="id_user" name="id_user">
                                            <option></option>
                                            @foreach ($dataForeign['user'] as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="id_title_type">Loại bài viết</label>
                                        <select required class="form-control" id="id_title_type" name="id_title_type">
                                            <option></option>
                                            @foreach ($dataForeign['titleType'] as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên danh hiệu</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="id_organizations">Tổ chức</label>
                                        <select required class="form-control" id="id_organizations" name="id_organizations">
                                            <option></option>
                                            @foreach ($dataForeign['organization'] as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Tiêu đề bài viết</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" style="height:254px;">
                                        <label for="">Ảnh</label>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="image_input_Avatar"
                                                onchange="LoadImage(this, '#image_Avatar')" name="image"
                                                accept="image/gif, image/jpeg, image/png">
                                            <img id="image_Avatar" alt="your image"
                                                style="border: 2px solid; {{ isset($id) ? '' : 'display:none;' }} height:200px;"
                                                src="{{ isset($id) ? 'credit_cart/' . $data->image : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Nội dung</label>
                                        <textarea required name="content" placeholder="Nội dung" rows="13" class="form-control" style="width: 380px; height: 233px;"></textarea>
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
