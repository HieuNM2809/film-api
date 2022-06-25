@extends('master')
@section('title')
    Trang chủ
@endsection
@section('content')
    <div id="content-container">
        <div id="page-title">
            <h1 class="page-header text-overflow">DEV- Backend</h1>

        </div>
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
        </ol>
        <div id="page-content">
            <div class="dashboard-wrapper">
                <div class="container-fluid  dashboard-content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: #fff">
                            <div class="card">
                                <div class="card-header" style="display: flex; justify-content: space-between;">
                                    <h5 class="card-title">{{ucfirst($table) ?? ""}} Table</h5>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <a href="{{ route($table.'.create') }}">
                                                <button type="submit" class="btn btn-default">

                                                    <i class="far fa-plus-square"></i>
                                                    <span style="padding-left: 5px">
                                                        Thêm tài khoản</span>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="background-color: #32404e; color: #fff">
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên người dùng</th>
                                                <th scope="col">nội dung</th>
                                                <th scope="col">Trả lời bình luận</th>
                                                <th scope="col">Bài đăng</th>
                                                <th scope="col">Ảnh</th>
                                                <th scope="col">Ngày tạo</th>
                                                <th scope="col">Ngày sửa</th>
                                                <th scope="col">Ngày sửa</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->user->name}}</td>
                                                <td>{{$item->content}}</td>
                                                <td>{{$item->parent}}</td>
                                                <td>{{$item->post->title}}</td>
                                                <td><img height="150px"
                                                    src="Avatar/{{ $item->image }}" alt=""></td>
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
                                    </table>
                                </div>
                                <div class="card-footer clearfix" style="display: flex; justify-content: flex-end;">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
