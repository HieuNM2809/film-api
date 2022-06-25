@extends('master')
@section('title')
    Thêm bình luận
@endsection
@section('content')
    <div id="content-container">
        <div id="page-title">
            <h1 class="page-header text-overflow">DEV- Backend</h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="#">Thêm bình luận</a></li>
        </ol>
        <div class="row" style="display:flex; justify-content:center;">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thêm bình luận</h3>
                    </div>

                    <!--Block Styled Form -->
                    <!--===================================================-->
                    <form action="{{ route($table.'.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="idComment">Bình luận cha</label>
                                        <select class="form-control" id="idComment" name="idComment">
                                            <option></option>
                                            @foreach ($dataForeign['comment'] as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->content }}
                                                </option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="idPost">Bài Viết</label>
                                        <select class="form-control" id="idPost"  required name="idPost">
                                            @foreach ($dataForeign['post'] as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" style="height:254px;">
                                        <label for="">Ảnh đại diện</label>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="image_input_Avatar"
                                                onchange="LoadImage(this, '#image_Avatar')" name="image"
                                                accept="image/gif, image/jpeg, image/png">
                                            <img id="image_Avatar" alt="your image"
                                                style="border: 2px solid; {{ isset($id) ? '' : 'display:none;' }} height:200px;"
                                                src="{{ isset($id) ? 'Avatar/'.$data->Avatar : ''}}"
                                                >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Nội dung bình luận</label>
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
