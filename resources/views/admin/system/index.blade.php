@extends('admin.layouts.layout')
@section('style')
    <style>
        .layui-input-block{
            padding-right: 10px;
        }
        .layui-form{
            margin-top:10px;
        }
    </style>
@endsection
@section('content')
    <div class="layui-form layuimini-form">
        <div class="layui-form-item">
            <label class="layui-form-label required">网站名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" lay-verify="required" lay-reqtext="名称不能为空" placeholder="请输入名称" value="@if(isset($system->name)){{ $system->name }} @endif" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">URL</label>
            <div class="layui-input-block">
                <input type="text" name="url" placeholder="请输入URL" value="@if(isset($system->url)){{ $system->url }} @endif" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">关键词</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入内容" name="keywords" class="layui-textarea">@if(isset($system->keywords)){{ $system->keywords }} @endif</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">描述</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入内容" name="description" class="layui-textarea">@if(isset($system->description)){{ $system->description }} @endif</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">LOGO</label>
            <div class="layui-input-block">
                <input type="text" name="logo" placeholder="请输入logo" value="@if(isset($system->logo)){{ $system->logo }} @endif" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">统计代码</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入内容" name="tongji" class="layui-textarea">@if(isset($system->tongji)){{ $system->tongji }} @endif</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-normal" lay-submit lay-filter="saveBtn">确认保存</button>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        layui.use(['form'], function () {
            var form = layui.form,
                layer = layui.layer;

            //监听提交
            form.on('submit(saveBtn)', function (data) {
                $.post('system',data.field)
                    .done(function(d){
                        layer.msg('提交成功');
                    })
                    .fail(function(e){
                        layer.msg(errorMsgFormat(e), {icon: 9});
                    });

                return false;
            });

        });
    </script>
@endsection
