@extends('master')
@section('title')
    Danh sách User
@endsection
@section('css')
    <style type="text/css">
        .bootstrap-select {
            margin: 0;
        }

        .toolbar-filter {
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 5px
        }

        .form-control,
        .btn {
            padding: 3px 6px
        }

        .panel-body {
            padding: 10px
        }

        .form-horizontal .control-label {
            padding-top: 3px;
        }

        .panel {
            margin-bottom: 10px
        }

        .fixed-table-container {
            border-radius: 0;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
        }

        @media (min-width: 992px) {
            #page-content {
                padding: 5px 5px 0;
            }
        }

    </style>
    <script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
    <link href="{!! asset('backend/plugins_v2/bootstrap-table/bootstrap-table.min.css') !!}" rel="stylesheet">

    <link href="{{ asset('assets/nifty/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/nifty/css/nifty.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/nifty/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{!! asset('backend/plugins_v2/bootstrap-table/bootstrap-table.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins_v2/bootstrap-table/locale/bootstrap-table-vi-VN.min.js') !!}"></script>
@endsection

@section('content')
    <!--CONTENT CONTAINER-->
    <div id="content-container">
        <!--Page Title-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Danh sách User</h1>
        </div>
        <!--End page title-->
        <!--Breadcrumb-->
        <!--<ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Library</a></li>
                  <li class="active">Data</li>
                 </ol>-->
        <!--End breadcrumb-->
        <div id="page-content">


            <div class="panel panel-primary panel-colorful">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" class="form-horizontal" id="frmFilter" onSubmit="return false;"  style="min-height: 100px;display: flex;justify-content: space-evenly;">
                                @csrf
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Tên người dùng</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="name" name="name" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Email</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="email" name="email" type="email">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">CNND</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="identity_card" name="identity_card" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Kỹ năng</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="skills" name="skills" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input class="btn btn-default" id="filter-form" type="submit"  value="Tìm kiếm">
                                        <a href="{{ url('admin/user-v2') }}" class="btn btn-default" title="Làm mới">Làm mới</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-body">
                    <div id="table-toolbar" class="fixed-table-toolbar">
                        <a href='{{url("admin/user-v2/create")}}'  class="btn btn-primary btn-labeled fa fa-plus" style="background-color: green;">Thêm</a>
                        <a href="{{ url('admin/export-user') }}" class="btn btn-primary btn-labeled fa  fa-file-arrow-down" title="Xuất Excel">Xuất Excel</a>
                    </div>
                    <div class="fixed-table-toolbar"><span><b>Tổng số dòng:</b></span> <span id="rowTotal"></span></div>
                    <table id="table-data" class="add-niftycheck" data-toggle="table" data-locale="vi-VN"
                        data-toolbar="#table-toolbar" data-url='{{url('admin/user-v2')}}'
                        data-search="true" data-show-refresh="false" data-show-columns="true" data-pagination="true"
                         data-page-size="10" data-query-params="queryParams" >
                        {{--  data-side-pagination="server" data-page-size="25" data-query-params="queryParams" >  --}}
                        <thead style="background: #5fa2dd; color: white;">
                            <tr>
                                <th scope="col" data-field="id" >ID</th>
                                <th scope="col" data-field="name" data-sortable="true">Tên</th>
                                <th scope="col" data-field="email" data-sortable="true">Email</th>
                                <th scope="col" data-field="identity_card" data-sortable="true">CNND</th>
                                <th scope="col" data-field="birthday" data-sortable="true">Ngày sinh</th>
                                <th scope="col" data-field="avatar" data-sortable="true" data-formatter="formatImage">Hình ảnh</th>
                                <th scope="col" data-field="skills" data-sortable="true">Kỹ năng</th>
                                <th scope="col" data-field="created_at" data-sortable="true">Ngày tham gia</th>
                                <th scope="col" data-field="id" data-align="center" data-formatter="actionColumnEdit"> Công cụ</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <script type="text/javascript">

                var $table = $('#table-data');
                console.log($table);

                $('#frmFilter').submit(function() {
                    return formGo();
                });

                $(document).ready(function() {

                    $("#reset-page").click(function() {
                        var url = window.location.href;
                        window.location = url;
                    });

                    $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function() {
                        $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
                        $delete.prop('disabled', !$table.bootstrapTable('getSelections').length);
                    }).on('load-success.bs.table', function() {
                        var tooltip = $('.add-tooltip');
                        if (tooltip.length) tooltip.tooltip();
                    });

                    // select_filter
                    // $('.custom_filter').chosen({width:'100%'});
                    $('.custom_filter').on('change', function(evt, params) {
                        $table.bootstrapTable('refresh');
                    });

                    $table.on('load-success.bs.table', function() {
                        $('#rowTotal').html($table.bootstrapTable('getOptions').totalRows);
                    });

                    $('#dept_id').change(function() {
                        var val = $(this).val();
                        if (val == '') {
                            $('#pos_id option,#user_group_id option').removeClass('hide');
                            $('#user_group_id').prop('disabled', false);
                            $('#user_group_id option').addClass('hide');
                        } else {
                            $('#pos_id').val('');
                            $('#pos_id option').addClass('hide');
                            $('#pos_id option[data-parent="' + val + '"]').removeClass('hide');
                            $('#user_group_id').val('');
                            $('#user_group_id option').addClass('hide');
                            $('#user_group_id option[data-parent="' + val + '"]').removeClass('hide');
                            if ($('#user_group_id option').not('.hide').size() < 1) {
                                $('#user_group_id').prop('disabled', true);
                                return true;
                            };
                            $('#user_group_id').prop('disabled', false);
                        }

                    });
                });

                function actionColumnEdit(value, row, index) {
                    var editBtn = [
                        '<a href="{{url('/admin/user-v2')}}/' + value + '" ',
                        'class="add-tooltip btn btn-primary btn-icon icon-lg btn-xs" data-placement="top" data-original-title="Sửa">',
                        '<i class="fa fa-pencil"></i></a>'
                    ].join('');
                    var removeBtn = [
                        '<a href="#" onclick="deleteItems(' + value + ', event)"',
                        'class="add-tooltip btn btn-danger btn-icon icon-lg btn-xs" data-placement="top" data-original-title="Xóa">',
                        '<i class="fa fa-trash-o"></i></a>'
                    ].join('');
                    return [editBtn , removeBtn].join(' ');
                }
                function formatImage(value, row, index) {
                    var img = [
                        '<img src="{{  asset("User/") }}/' + value + '" ',
                        ' width="50" height="50" >'
                    ].join('');
                    return [img].join(' ');
                }

                function formatProcessStatus(value, row, index) {

                    if (value === 'unpublish') {
                        return '<span class="label label-sm label-primary">Không hoạt động</span>'
                    } else if (value === 'publish') {
                        return '<span class="label label-sm label-success">Hoạt động</span>'
                    } else {
                        return '<span class="label label-sm label-danger">Đã xóa</span>';
                    }
                }

                function formatOnline(value, row, index) {
                    if (value == 1) {
                        return '<span class="label label-sm label-success">Online</span>';
                    } else if (value == 0) {
                        return '<span class="label label-sm label-danger">Offline</span>'
                    }
                }



                function deleteItems(items, e) {
                    if (e) e.preventDefault();
                    if (confirm('Xác nhận xóa người dùng?')) {
                        var url = '{{url("/admin/user-v2")}}/'+ items;
                        var data = {
                            '_token': '{{ csrf_token() }}'
                        };
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            async: false,
                            data: data,
                            dataType: "json",
                            success: function(data) {
                                alert(data.message);
                                $table.bootstrapTable('destroy').bootstrapTable().bootstrapTable('selectPage', 1);
                            }
                        });
                    }
                }

                /*function queryParams(params) {
                    params.status = $('#status_filter').val();
                    params.level_group = $('#role_filter').val();
                    params.user_name = $('#user_name').val();
                    params.email = $('#email').val();
                    params.dept_id = $('#dept_id').val();
                    params.pos_id = $('#pos_id').val();
                    params.user_group_id = $('#user_group_id').val();
                    return params;
                }*/

                function queryParams(params) {
                    $('#frmFilter :input').each(function(i, e) {
                        var name = $(e).attr('name');
                        if (typeof name !== typeof undefined && name !== false) {
                            if ($(e).attr('type') != 'radio' || $(e).is(':checked')) {
                                params[name] = $(e).val();

                            }
                        }
                    });

                    return params;
                }

                function formatFiledJson(value, row, index) {
                    if (value) {
                        var obj = jQuery.parseJSON(value);
                        var name = '';
                        $.each(obj, function(key, value) {
                            name += ', ' + value;
                        });
                        return name.substring(1);
                    }
                    return '';
                }

                function formGo() {
                    /*$('#status_filter').val('').selectpicker('refresh');
                    $('#role_filter').val('').selectpicker('refresh');*/
                    $table.bootstrapTable('destroy').bootstrapTable().bootstrapTable('selectPage', 1);
                    return false;
                }
            </script>
        </div>
    </div>
    <!--END CONTENT CONTAINER-->
@endsection
