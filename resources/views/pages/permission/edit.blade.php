@extends('master')
@section('title')
    Danh Hiệu
@endsection
@section('content')
    <div id="content-container">
        <div id="page-title">
            <h1 class="page-header text-overflow">DEV- Backend</h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="#">Danh Hiệu</a></li>
        </ol>
        <div class="row" style="display:flex; justify-content:center;">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Danh Hiệu</h3>
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
                                        <label for="id_group_permission">Tên nhóm quyền</label>
                                        <select required class="form-control" id="id_group_permission"
                                            name="id_group_permission">
                                            <option></option>
                                            @foreach ($dataForeign['groupPermission'] as $item)
                                                <option value="{{ $item->id }}" {{ $data->id_group_permission == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên quyền</label>
                                        <input type="text" class="form-control" name="name" required value="{{$data->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1">Quyền xem</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                            name="view"
                                            {{ $data["view"] == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheck1">Được xem</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1">Quyền tạo</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                            name="create" {{ $data["create"] == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheck1">Được tạo</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1">Quyền sửa</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                            name="edit" {{ $data["edit"] == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheck1">Được sửa</label>
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
