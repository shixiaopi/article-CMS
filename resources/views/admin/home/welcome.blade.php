@extends('admin.layouts.layout')
@section('style')
    <style>
        .layui-top-box {padding:40px 20px 20px 20px;color:#fff}
        .panel {margin-bottom:17px;background-color:#fff;border:1px solid transparent;border-radius:3px;-webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);box-shadow:0 1px 1px rgba(0,0,0,.05)}
        .panel-body {padding:15px}
        .panel-title {margin-top:0;margin-bottom:0;font-size:14px;color:inherit}
        .label {display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:700;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em;margin-top: .3em;}
        .layui-red {color:red}
        .main_btn > p {height:40px;}
    </style>
@endsection
@section('content')
    <div class="layuimini-container">
        <div class="layuimini-main layui-top-box">
            <div class="layui-row layui-col-space10">

                <div class="layui-col-md3">
                    <div class="col-xs-6 col-md-3">
                        <div class="panel layui-bg-cyan">
                            <div class="panel-body">
                                <div class="panel-title">
                                    <span class="label pull-right layui-bg-blue">实时</span>
                                    <h5>文章统计</h5>
                                </div>
                                <div class="panel-content">
                                    <h1 class="no-margins">{{ $info['article'] }}</h1>
                                    <div class="stat-percent font-bold text-gray"><i class="fa fa-commenting"></i> {{ $info['article'] }}</div>
                                    <small>当前文章总记录数</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="layui-col-md3">
                    <div class="col-xs-6 col-md-3">
                        <div class="panel layui-bg-blue">
                            <div class="panel-body">
                                <div class="panel-title">
                                    <span class="label pull-right layui-bg-cyan">实时</span>
                                    <h5>分类统计</h5>
                                </div>
                                <div class="panel-content">
                                    <h1 class="no-margins">{{ $info['cate'] }}</h1>
                                    <div class="stat-percent font-bold text-gray"><i class="fa fa-commenting"></i> {{ $info['cate'] }}</div>
                                    <small>当前分类总记录数</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="layui-col-md3">
                    <div class="col-xs-6 col-md-3">
                        <div class="panel layui-bg-green">
                            <div class="panel-body">
                                <div class="panel-title">
                                    <span class="label pull-right layui-bg-orange">实时</span>
                                    <h5>浏览统计</h5>
                                </div>
                                <div class="panel-content">
                                    <h1 class="no-margins">1234</h1>
                                    <div class="stat-percent font-bold text-gray"><i class="fa fa-commenting"></i> 1234</div>
                                    <small>当前分类总记录数</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md3">
                    <div class="col-xs-6 col-md-3">
                        <div class="panel layui-bg-orange">
                            <div class="panel-body">
                                <div class="panel-title">
                                    <span class="label pull-right layui-bg-green">实时</span>
                                    <h5>订单统计</h5>
                                </div>
                                <div class="panel-content">
                                    <h1 class="no-margins">1234</h1>
                                    <div class="stat-percent font-bold text-gray"><i class="fa fa-commenting"></i> 1234</div>
                                    <small>当前分类总记录数</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
