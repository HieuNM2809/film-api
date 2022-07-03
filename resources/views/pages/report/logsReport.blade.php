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

    <link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!--CONTENT CONTAINER-->
    <div id="content-container">
        <!--Page Title-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Lịch sử đăng nhập và sử dụng của user</h1>
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
                                        <label class="col-sm-5 control-label">Tên đăng nhập</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="name" name="name" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Thời gian login Agent Map</label>
                                        <div class="col-sm-6">
                                            <input placeholder="Ngày (Từ - Đến)" id="timeLogin" class="form-control tooltips date-range" data-placement="top" data-original-title="Tìm kiếm theo ngày tạo" readonly="" name="timeLogin" type="text" value="{{ $dateRange }}" autocomplete="off">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Chức năng truy cập</label>
                                        <div class="col-sm-6">
                                            <select id="status_filter" class="custom_filter form-control" name="typeFunction">
                                                <option value="">--Tất cả--</option>
                                                <option value="permision">Phân quyền</option>
                                                <option value="viewMap">View map</option>
                                                <option value="agentReport">Agent report</option>
                                                <option value="attentionReport">Attention report</option>
                                                <option value="editMap">Edit map</option>
                                                <option value="logs">Logs</option>
                                                <option value="changeCondition">Thay đổi điều kiện</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Thời gian truy cập</label>
                                        <div class="col-sm-6">
                                            <input placeholder="Ngày (Từ - Đến)" id="timeAccess" class="form-control tooltips date-range" data-placement="top" data-original-title="Tìm kiếm theo ngày tạo" readonly="" name="timeAccess" type="text" value="{{ $dateRange }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input class="btn btn-default" id="filter-form" type="submit"  value="Tìm kiếm">
                                        <a href="{{ url('admin/login-usage-history') }}" class="btn btn-default" title="Làm mới">Làm mới</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-body">
                    <table id="table-data" class="add-niftycheck" data-toggle="table" data-locale="vi-VN"
                        data-toolbar="#table-toolbar" data-url='{{url('admin/login-usage-history')}}'
                        data-search="true" data-show-refresh="false" data-show-columns="true" data-pagination="true"
                         data-page-size="25" data-query-params="queryParams" >
                        {{--  data-side-pagination="server" data-page-size="25" data-query-params="queryParams" >  --}}
                        <thead style="background: #5fa2dd; color: white;">
                            <tr>
                                <th scope="col" data-field="stt"  data-sortable="true">STT</th>
                                <th scope="col" data-field="name" data-sortable="true">Tên đăng nhập</th>
                                <th scope="col" data-field="timeLogin" data-sortable="true">Thời gian login Agent Map</th>
                                <th scope="col" data-field="timeFunction" data-sortable="true">Chức năng truy cập</th>
                                <th scope="col" data-field="timeAccess" data-sortable="true">Thời gian truy cập</th>
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

                    {{--  $table.on('load-success.bs.table', function() {
                        $('#rowTotal').html($table.bootstrapTable('getOptions').totalRows);
                    });  --}}

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
                        '<a href="{{url('/admin/edit-user')}}/' + value + '" ',
                        'class="add-tooltip btn btn-primary btn-icon icon-lg btn-xs" data-placement="top" data-original-title="Sửa">',
                        '<i class="fa fa-pencil"></i></a>'
                    ].join('');

                    var groupBtn = [
                        '<a href="{{url('/admin/user/permision')}}/' + value + '" ',
                        'class="add-tooltip btn btn-warning btn-icon icon-lg btn-xs" data-placement="top" data-original-title="Thêm nhóm quyền">',
                        '<i class="fa fa-users"></i></a>'
                    ].join('');
                    var removeBtn = [
                        '<a href="#" onclick="deleteItems([' + value + '], event)"',
                        'class="add-tooltip btn btn-danger btn-icon icon-lg btn-xs" data-placement="top" data-original-title="Xóa">',
                        '<i class="fa fa-trash-o"></i></a>'
                    ].join('');


                    return [editBtn, groupBtn, removeBtn].join(' ');
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

                function removeItems(items, e) {
                    if (e) e.preventDefault();
                    if (confirm('Xác nhận thao tác đổi trạng thái?')) {
                        var url = 'http://omniagent.fpt.net/backend/user/changeStatus';
                        var data = {
                            '_token': '{{ csrf_token() }}',
                            'ids': items
                        };
                        $.ajax({
                            type: "POST",
                            url: url,
                            async: false,
                            data: data,
                            dataType: "json",
                            success: function(data) {
                                notifyMsg(data.msg);
                                $('#table-data').bootstrapTable('refresh');
                            }
                        });
                    }
                }

                function deleteItems(items, e) {
                    if (e) e.preventDefault();
                    if (confirm('Xác nhận xóa người dùng?')) {
                        var url = '{{url("/backend/user/delete")}}';
                        var data = {
                            '_token': '{{ csrf_token() }}',
                            'ids': items
                        };
                        $.ajax({
                            type: "POST",
                            url: url,
                            async: false,
                            data: data,
                            dataType: "json",
                            success: function(data) {
                                notifyMsg(data.msg);
                                $('#table-data').bootstrapTable('refresh');
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

                function loginAs(items, e) {
                    if (e) e.preventDefault();
                    if (confirm('Đăng nhập vào thành viên này?')) {
                        var url = 'http://omniagent.fpt.net/backend/login-as';
                        var data = {
                            '_token': '{{ csrf_token() }}',
                            'id': items[0]
                        };
                        $.ajax({
                            type: "POST",
                            url: url,
                            async: false,
                            data: data,
                            dataType: "json",
                            success: function(data) {
                                if (data.status === 0) {
                                    notifyMsg(data.msg);
                                } else {
                                    location.reload();
                                }
                            }
                        });
                    }
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

@section('js')

    <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/date.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var d = new Date();
        var time = d.getTime();

        var today = new Date();
        var beginOfLastMonth = moment().subtract(1, 'months');
        var options = {
            autoApply: true,
            locale: {
                format: 'DD/MM/YYYY',
                applyLabel: "Xong",
                cancelLabel: "Hủy",
                fromLabel: "Từ",
                toLabel: "Đến",
                customRangeLabel: "Tùy chỉnh",
                weekLabel: "W",
                daysOfWeek: [
                    "CN",
                    "T2",
                    "T3",
                    "T4",
                    "T5",
                    "T6",
                    "T7"
                ],
                monthNames: [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Tháng 10",
                    "Tháng 11",
                    "Tháng 12"
                ],
                firstDay: 1,
            },
            ranges: {
                "Hôm nay": [
                    today,
                    today
                ],
                "Hôm qua": [
                    moment().subtract(1, 'day'),
                    moment().subtract(1, 'day')
                ],
                "7 ngày gần đây": [
                    moment().subtract('days', 7),
                    today
                ],
                "30 ngày gần đây": [
                    moment().subtract(30, 'days'),
                    today
                ],
                "Tháng này": [
                    moment().format("01/MM/YYYY"),
                    moment().daysInMonth() + moment().format("/MM/YYYY")
                ],
                "Tháng trước": [
                    beginOfLastMonth.format("01/MM/YYYY"),
                    moment(beginOfLastMonth).endOf('month')
                ]
            },
            alwaysShowCalendars: true,
            maxDate: today,
            opens: 'right',
            //autoUpdateInput: false,
            };

        $(document).ready(function () {
            $('.date-range').daterangepicker(options, function(start, end) {
                $('.date-range').val(moment(start).format('DD/MM/YYYY') + ' - ' + moment(end).format('DD/MM/YYYY'));
            });
        });
    </script>
@endsection
