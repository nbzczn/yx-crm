@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
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
            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $cgl or 0 }}">{{ $cgl or 0 }} </span>
                        %
                    </div>
                    <div class="desc"> 数据成功率</div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $complete or 0 }}">{{ $complete or 0 }} </span>
                        条
                    </div>
                    <div class="desc"> 已完成数据 </div>
                </div>
            </a>
        </div>
    </div>
@endsection
