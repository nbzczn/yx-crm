@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject">修改密码</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    @include('layouts.message')
                    <form action="{{ route('users.set_password') }}" method="post" class="form-horizontal form-bordered form-row-stripped">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3"> <span class="text-danger">* </span>原密码 </label>
                                <div class="col-md-9">
                                    <input type="password" value="{{ old('password', '') }}" name="password" placeholder="请输入原密码" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3"> <span class="text-danger">* </span>新密码 </label>
                                <div class="col-md-9">
                                    <input type="password" value="{{ old('newpassword', '') }}" name="newpassword" placeholder="请输入新密码" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('newpassword_confirmed') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3"> <span class="text-danger">* </span>重复新密码 </label>
                                <div class="col-md-9">
                                    <input type="password" value="{{ old('newpassword_confirmed', '') }}" name="newpassword_confirmed" placeholder="请输入新密码" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">
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