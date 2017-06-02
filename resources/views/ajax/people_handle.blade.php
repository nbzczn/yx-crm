<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">选择员工</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="peoples">
                <thead>
                    <tr>
                        <th class="col-sm-2 text-center">选择</th>
                        <th class="col-sm-5">姓名</th>
                        <th class="col-sm-5">账号</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">关闭</button>
    <button type="button" class="btn blue" onclick="handleModalSubmit()">确定</button>
</div>


<script>
    initPeople();

    function handleModalSubmit() {

        var $selected = $("[name='select_radio']:checked");
        var data = {
            id: $selected.val(),
            text: $selected.data('text')
        }

        handleModalSelect(data)

    }


    function initPeople() {
        $('#peoples').DataTable({
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
                "url": "{{ url('/ajax/people_handle') }}",
                "type": "get"
            },
            "columns": [
                {
                    "data":"",
                    "className":"text-center",
                    "render": function ( data, type, row ) {
                        var msg = '<label class="mt-radio mt-radio-outline"><input class="position_radio" type="radio" value="'+row.id+'" data-text="'+row.name+'" name="select_radio"><span></span></label>';
                        return msg;
                    }
                },
                {data: 'name'},
                {data: 'username'}
            ],
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