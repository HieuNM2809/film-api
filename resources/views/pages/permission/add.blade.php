@extends('master')
@section('title')
    Danh hiệu
@endsection
@section('content')
    <div id="content-container">
        <div id="page-title">
            <h1 class="page-header text-overflow">DEV- Backend</h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="#">Thêm danh hiệu</a></li>
        </ol>
        <div class="row" style="display:flex; justify-content:center;">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thêm danh hiệu</h3>
                    </div>

                    <!--Block Styled Form -->
                    <!--===================================================-->
                    <form action="{{ route($table . '.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="id_group_permission">Tên nhóm quyền</label>
                                        <select required class="form-control" id="id_group_permission"
                                            name="id_group_permission">
                                            <option></option>
                                            @foreach ($dataForeign['groupPermission'] as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên quyền</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1">Quyền xem</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                            name="view">
                                        <label class="form-check-label" for="exampleCheck1">Được xem</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1">Quyền tạo</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                            name="create">
                                        <label class="form-check-label" for="exampleCheck1">Được tạo</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1">Quyền sửa</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                            name="edit">
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
