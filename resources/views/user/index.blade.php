@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject">员工管理</span>
                    </div>
                    <div class="actions">
                        <form action="{{ route('users.index') }}" method="get">
                            <div class="input-group input-large">
                                <input name="name" value="{{ $name or '' }}" type="text" class="form-control input-sm" placeholder="输入员工姓名">
                                <span class="input-group-btn">
                                    <button class="btn btn-sm green" style="margin-right: 10px;" type="submit">搜索</button>
                                </span>
                                <span class="input-group-btn">
                                    <a href="{{ route('users.create') }}" class="btn btn-sm blue" type="button">
                                        <i class="fa fa-plus"></i> 创建
                                    </a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="portlet-body">
                    @include('layouts.message')
                    <div class="table-scrollable">
                        <table class="table table-hover table-light">
                            <thead>
                            <tr>
                                <th> 标识号 </th>
                                <th> 姓名 </th>
                                <th> 账号 </th>
                                <th> 操作 </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->username   }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', ['id'=>$list->id]) }}" class="btn btn-xs blue"><i class="fa fa-edit"></i> 编辑</a>
                                        <a href="{{ route('users.reset', ['id'=>$list->id]) }}" class="btn btn-xs yellow"  data-method="POST" data-confirm="确认重置?重置后无法撤销!" ><i class="fa fa-lock"></i> 重置密码</a>
                                        <a href="{{ route('users.destroy', ['id'=>$list->id]) }}" class="btn btn-xs red"  data-method="DELETE" data-confirm="确认删除?删除后无法撤销!" ><i class="fa fa-trash"></i> 删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        {{ $lists->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection