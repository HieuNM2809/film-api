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
            <li><a href="#">Bài viết</a></li>
        </ol>
        <div id="page-content">
            <div class="dashboard-wrapper">
                <div class="container-fluid  dashboard-content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: #fff">
                            <div class="panel">
                                <div class="panel-heading" style="display: flex; justify-content: space-between;">
                                    <h5 class="panel-title">Bảng Bài viết</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-6 table-toolbar-left">
										<a href="{{ route($table.'.create') }}" id="demo-btn-addrow" class="btn btn-purple btn-labeled fa fa-plus">Thêm bài viết</a>
									</div>
                                    <div class="col-sm-6 table-toolbar-right">
										<div class="form-group">
                                            <div class="input-group mar-btm">
                                                <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                            </div>
                                            <a href="demo-btn-addrow">

                                            </a>
										</div>
									</div>
                                    <table class="table table-bordered table-striped table-hover toggle-circle default footable-loaded footable demo-foo-pagination">
                                        <thead>
                                            <tr style="background-color: #32404e; color: #fff">
                                                <th scope="col">STT</th>
                                                <th scope="col">Tiêu đề bài viết</th>
                                                <th scope="col">Nội dung</th>
                                                <th scope="col">Số lượng báo cáo</th>
                                                <th scope="col">Loại chủ đề bài viết</th>
                                                <th scope="col">Tổ chức</th>
                                                <th scope="col">Người đăng bài viết</th>
                                                <th scope="col">Ảnh bài viết</th>
                                                <th scope="col">Ngày tạo</th>
                                                <th scope="col">Ngày sửa</th>
                                                <th scope="col">Ngày xoá</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->content}}</td>
                                                <td>{{$item->number_bad_reports}}</td>
                                                <td>{{$item->titleType->type}}</td>
                                                <td>{{$item->organizations->name ?? "Cá nhân"}}</td>
                                                <td>{{$item->user->name}}</td>
                                                <td style="background-size: 200px;width:200px; {{ $item->feature_image ? "height:200px; background-position: center;" : "" }} background-repeat: no-repeat; background-image:url('../post/{{ $item->feature_image }}');"></td>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->updated_at}}</td>
                                                <td>{{$item->deleted_at}}</td>
                                                <td>
                                                    <div
                                                        style="display: flex; justify-content: space-around; align-items: center;">
                                                        <a href="{{ route($table.'.edit', $item->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        <form action="{{ route($table.'.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                style="background: transparent; border:0px; padding: 0px; margin:0px;">
                                                                <i class="fas fa-trash"
                                                                    style="color: rgb(255, 0, 0);"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="12" class="footable-visible">
                                                    <div class="text-right">
                                                        <ul class="pagination">
                                                            {{ $data->links() }}
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
