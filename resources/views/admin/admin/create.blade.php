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
            <label class="layui-form-label required">用户名</label>
            <div class="layui-input-block">
                <input type="text" name="username" lay-verify="required" lay-reqtext="用户名不能为空" placeholder="请输入用户名" value="" class="layui-input">
                <div class="layui-form-mid layui-word-aux">请填写用户名</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">密码</label>
            <div class="layui-input-block">
                <input type="password" name="password" lay-verify="required" lay-reqtext="密码不能为空" placeholder="请输入密码" value="" class="layui-input">
                <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
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
                $.post('create',data.field)
                    .done(function(d){
                        layer.msg('提交成功', function () {
                            var iframeIndex = parent.layer.getFrameIndex(window.name);
                            parent.layer.close(iframeIndex);
                            window.parent.location.reload();
                        });
                    })
                    .fail(function(e){
                        layer.msg(errorMsgFormat(e), {icon: 9});
                    });

                return false;
            });

        });
    </script>
@endsection
