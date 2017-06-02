@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject">编辑员工信息</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided">
                            <a href="{{ route('users.index') }}" class="btn btn-sm dark">
                                <i class="fa fa-arrow-left"></i>
                                返回
                            </a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body form">
                    @include('layouts.message')
                    <form action="{{ route('users.update', ['id'=>$user->id]) }}" method="post" class="form-horizontal form-bordered form-row-stripped">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-body">

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3"> <span class="text-danger">* </span>用户名 </label>
                                <div class="col-md-9">
                                    <span class="form-control-static">
                                        {{ $user->username }}
                                    </span>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3"> <span class="text-danger">* </span>姓名 </label>
                                <div class="col-md-9">
                                    <input type="text" value="{{ old('name', $user->name) }}" name="name" placeholder="请输入姓名" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">
                                        <i class="fa fa-check"></i> 提交</button>
                                    <a href="{{ route('users.index') }}" class="btn default">返回</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection