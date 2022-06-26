@extends('master')
@section('title')
    Sửa thẻ
@endsection
@section('content')
    <div id="content-container">
        <div id="page-title">
            <h1 class="page-header text-overflow">DEV- Backend</h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="#">Sửa thẻ</a></li>
        </ol>
        <div class="row" style="display:flex; justify-content:center;">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thêm thẻ</h3>
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
                                        <label for="idUser">Tên người dùng</label>
                                        <select required class="form-control" id="idUser" name="idUser">
                                            @foreach ($dataForeign['user'] as $item)
                                                <option value="{{ $item->id }}" {{ isset($id) && $data->parent == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên thẻ</label>
                                        <input type="text" class="form-control" name="name" required value="{{ isset($id) ? $data->name : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Số thẻ</label>
                                        <input type="number" class="form-control" name="cartNumber" required
                                        required value="{{ isset($id) ? $data->cart_number : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày hết hạn</label>
                                        <input type="date" class="form-control" placeholder="dd-mm-yyyy"
                                            name="dateExpired" required value="{{ isset($id) ? date_format(date_create($data->date_expired),"Y-m-d") : '' }}">
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
                                                src="{{ isset($id) ? '../../../credit_cart/' . $data->avatar : '' }}">
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
