@extends('layouts.master')

@section('content')
    <div class="row">
        @include('layouts.message')
        @if(Auth::user()->id == 1 || Auth::user()->id == 2)
            <div class="col-md-4">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('admin.all_payed') }}">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{ $all_payed or 0 }}">{{ $all_payed or 0 }} </span>
                            条
                        </div>
                        <div class="desc"> 已付款数据</div>
                    </div>
                </a>
            </div>
        @else

            <div class="col-md-4">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('users.my') }}">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{ $daiban or 0 }}">{{ $daiban or 0 }} </span>
                            条
                        </div>
                        <div class="desc"> 待办数据</div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a class="dashboard-stat dashboard-stat-v2 red" href="{{ route('users.my_success') }}">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{ $chenggong or 0 }}">{{ $cgl or 0 }} </span>
                            条
                        </div>
                        <div class="desc"> 成功数据</div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a class="dashboard-stat dashboard-stat-v2 green" href="{{ route('users.payed') }}">
                    <div class="visual">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{ $yifukuan or 0 }}">{{ $yifukuan or 0 }} </span>
                            条
                        </div>
                        <div class="desc"> 已付款数据 </div>
                    </div>
                </a>
            </div>
        @endif

    </div>
@endsection
