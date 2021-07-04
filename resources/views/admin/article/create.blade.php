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
            <label class="layui-form-label required">标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" lay-verify="required" lay-reqtext="标题不能为空" placeholder="请输入标题" value="" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">分类</label>
            <div class="layui-input-block">
                <select name="cate_id">
                    @foreach($cate as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">作者</label>
            <div class="layui-input-block">
                <input type="text" name="user" placeholder="请输入文章作者" value="" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">内容</label>
            <div class="layui-input-block">
                <div id="editor" style="margin: 5px 0 5px 0"></div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">标签</label>
            <div class="layui-input-block">
                <input type="text" name="tag" placeholder="请输入标签" value="" class="layui-input">
                <div class="layui-form-mid layui-word-aux">多个标签请用英文逗号隔开,列如：张三,李四</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">状态</label>
            <div class="layui-input-block">
                <input type="checkbox" checked="" name="status" lay-skin="switch" value="1" lay-filter="switchTest" lay-text="ON|OFF">
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
        layui.use(['form','wangEditor'], function () {
            var form = layui.form,
                wangEditor = layui.wangEditor,
                layer = layui.layer;

            var editor = new wangEditor('#editor');
            editor.customConfig.uploadImgServer = "../api/upload.json";
            editor.customConfig.uploadFileName = 'image';
            editor.customConfig.pasteFilterStyle = false;
            editor.customConfig.uploadImgMaxLength = 5;
            editor.customConfig.customAlert = function (info) {
                layer.msg(info);
            };
            editor.create();

            //监听提交
            form.on('submit(saveBtn)', function (data) {
                data.field.content = editor.txt.html()
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
