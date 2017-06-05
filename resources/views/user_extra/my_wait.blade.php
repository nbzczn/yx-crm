@extends('layouts.master')

@section('style')
    <link href="{{ asset('vendor/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject">稍后联系数据</span>
                    </div>
                </div>
                <div class="portlet-body ">
                    @include('layouts.message')
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="companies">
                        <thead>
                        <tr>
                            <th class="id">编号</th>
                            <th class="min-name">企业名称</th>
                            <th class="min-contact">联系电话</th>
                            <th class="none">企业地址</th>
                            <th class="none">企业描述</th>
                            <th class="actions">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugin')
    <script src="{{ asset('vendor/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
@endsection

@section('script')
    <script>
        initCompanies({{ $user_id }});
        function initCompanies(user_id) {
            $('#companies').DataTable({
                "ordering":  false,
                "processing": false,
                "serverSide": true,
                "bDestroy": true,
                "searching": false,
                "bAutoWidth": false,
                "lengthChange": false,
                // set the initial value
                "pageLength": 15,
                "pagingType": "bootstrap_full_number",
                "columnDefs": [{  // set default column settings
                    'orderable': false,
                    'targets': [0]
                }, {
                    "searchable": false,
                    "targets": [0]
                }],
                "info": false ,
                "ajax": {
                    "url": "{{ url('/ajax/companies_wait_handle') }}" + '?user_id=' + user_id,
                    "type": "post",
                },
                "columns": [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'contact'},
                    {data: 'address'},
                    {data: 'description'},
                    {
                        "data":"",
                        "className":"text-center",
                        "render": function ( data, type, row ) {
                            var msg = '';
                            msg += '<a href="{{ url('/users/set_fail') }}?id='+row.id+'" class="btn btn-xs yellow"  data-method="POST" data-confirm="确认标记为失败, 标记后后无法撤销!" > <i class="fa fa-flag"></i> 标记失败</a>';
                            msg += '<a href="{{ url('/users/set_success') }}?id='+row.id+'" class="btn btn-xs green"  data-method="POST" data-confirm="确认标记为已联系, 标记后后无法撤销!" > <i class="fa fa-flag"></i> 标记成功</a>';
                            return msg;
                        }
                    }
                ],
                buttons: [
//                    { extend: 'print', className: 'btn dark btn-outline' },
//                    { extend: 'pdf', className: 'btn green btn-outline' },
//                    { extend: 'csv', className: 'btn purple btn-outline ' }
                ],

                // setup responsive extension: http://datatables.net/extensions/responsive/
                responsive: {
                    details: {

                    }
                },
                "language": {
                    "sZeroRecords": "对不起，查询不到相关数据！",
                    "paginate": {
                        "first": '首页',
                        "last": '末页',
                        "previous": '上一页',
                        "next": '下一页'
                    }
                },

            });
        }
    </script>
@endsection