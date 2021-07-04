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
            <label class="layui-form-label required">名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" lay-verify="required" lay-reqtext="分类名称不能为空" placeholder="请输入分类名称" value="{{ $cate->name }}" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">code</label>
            <div class="layui-input-block">
                <input type="text" name="code" placeholder="请输入url code" value="{{ $cate->code }}" class="layui-input">
                <div class="layui-form-mid layui-word-aux">用于url</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">排序</label>
            <div class="layui-input-block">
                <input type="text" name="order" placeholder="请输入排序" value="{{ $cate->order }}" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">父级ID</label>
            <div class="layui-input-block">
                <input type="text" name="parentId" placeholder="请输入父级ID" value="{{ $cate->parentId }}" class="layui-input">
                <input type="hidden" name="id" value="{{ $cate->id }}">
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
                $.post('../update',data.field)
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
