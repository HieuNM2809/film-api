@extends('master')
@section('title')
    Hashtag
@endsection
@section('content')
    <div id="content-container">
        <div id="page-title">
            <h1 class="page-header text-overflow">DEV- Backend</h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="#">Hashtag</a></li>
        </ol>
        <div class="row" style="display:flex; justify-content:center;">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">hashtag</h3>
                    </div>

                    <!--Block Styled Form -->
                    <!--===================================================-->
                    <form action="{{ isset($id) ? route($table . '.update', $id) : ''}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="id_rule">Điều kiện đạt được danh hiệu</label>
                                        <select required class="form-control" id="id_rule" name="id_rule">
                                            <option></option>
                                            @foreach ($dataForeign['ruleRank'] as $item)
                                                <option value="{{ $item->id }}">
                                                    Tên điều kiện: {{ $item->name }}. Số lượng: {{ $item->value }}.
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên danh hiệu</label>
                                        <input type="text" class="form-control" name="title" required value="{{$data->title}}">
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
                                                src="{{ isset($id) ? '../../../icon_rank/' . $data->icon : '' }}">
                                        </div>
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
