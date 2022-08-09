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
        <div id="page-content">
            <div class="dashboard-wrapper">
                <div class="container-fluid  dashboard-content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: #fff">
                            <div class="panel">
                                <div class="panel-heading" style="display: flex; justify-content: space-between;">
                                    <h5 class="panel-title">Bảng loại bài viết</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-6 table-toolbar-left">
										<a href="{{ route($table.'.create') }}" id="demo-btn-addrow" class="btn btn-purple btn-labeled fa fa-plus">Thêm loại bài viết</a>
									</div>
                                    <div class="col-sm-6 table-toolbar-right">
                                        {{-- <label class="form-inline">Show
                                            <select id="demo-show-entries" class="form-control input-sm">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                            </select>
                                            entries
                                        </label> --}}
										<div class="form-group">
                                            <div class="input-group mar-btm">
                                                {{--  <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">  --}}
                                            </div>
                                            <a href="demo-btn-addrow">

                                            </a>
										</div>
									</div>
                                    <table class="table table-bordered table-striped table-hover toggle-circle default footable-loaded footable demo-foo-pagination">
                                        <thead>
                                            <tr style="background-color: #32404e; color: #fff">
                                                <th scope="col">STT</th>
                                                <th scope="col">Loại bài viết</th>
                                                <th scope="col">Màu sắc</th>
                                                <th scope="col">Mô tả</th>
                                                <th scope="col">Ngày tạo</th>
                                                <th scope="col">Ngày sửa</th>
                                                {{--  <th scope="col">Ngày xoá</th>  --}}
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->type}}</td>
                                                <td><span class="label" style="background-color: {{$item->color}}">{{$item->color}}</span></td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->updated_at}}</td>
                                                {{--  <td>{{$item->deleted_at}}</td>  --}}
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
