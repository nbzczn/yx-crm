@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject">数据分配</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    @include('layouts.message')
                    <form action="{{ url('/patch') }}" id="form" method="post" class="form-horizontal form-bordered form-row-stripped">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3"> 共有数据 </label>
                                <div class="col-md-9">
                                    <span class="form-control-static">
                                        {{ $count or '' }} 条
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> 其中未分配数据 </label>
                                <div class="col-md-9">
                                    <span class="form-control-static">
                                        {{ $unpatch_count or '' }} 条
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> 其中已分配数据 </label>
                                <div class="col-md-9">
                                    <span class="form-control-static">
                                        {{ $count - $unpatch_count }} 条
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> 分配数据 </label>
                                <div class="col-md-9">
                                    <div class="input-group  input-medium">
                                        <input type="number" name="number" value="{{ old('number', 1) }}" class="form-control">
                                        <span class="input-group-addon">
                                            条
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group last">
                                <label class="control-label col-md-3"> 于员工 </label>
                                <div class="col-md-9">
                                    <input type="text" name="user_name" value="{{ old('user_name', '') }}" id="user_name" onclick="selectUserHandle()" style="background-color: #efefef!important; cursor:pointer;" placeholder="点击选择员工" class="form-control input-medium" readonly>
                                    <input type="hidden" id="user_id" name="user_id" value="{{ old('user_id', 0) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" onclick="$(this).attr('disabled', true).text('分配中...');$('#form').submit();" class="btn green">
                                        <i class="fa fa-check"></i> 提交</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <!--DOC: Aplly "modal-cached" class after "modal" class to enable ajax content caching-->
    <div class="modal fade" id="personnel_handle_modal" role="basic" aria-hidden="true">
        <div class="modal-dialog" style="width:800px;">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('vendor/global/img/loading-spinner-grey.gif') }}" alt="" class="loading">
                    <span> &nbsp;&nbsp;Loading... </span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugin')
    <script src="{{ asset('vendor/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"
            type="text/javascript"></script>

@endsection

@section('script')
    <script>
        function selectUserHandle() {
            $.get('{{ url('/ajax/personnel_as_user_handle') }}').success(function (res) {
                var $modal = $('#personnel_handle_modal');
                $modal.find('.modal-content').html(res.html);
                $modal.modal('show')
            }).error(function () {
                alert('网络错误或授权错误，请刷新页面或者重新登陆')
            })
        }

        function handleModalSelect(data){
            $('#user_name').val(data.text)
            $('#user_id').val(data.id)
            var $modal = $('#personnel_handle_modal');
            $modal.modal('hide')
        }

    </script>
@endsection