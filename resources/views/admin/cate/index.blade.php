@extends('admin.layouts.layout')

@section('style')
    <style>
        .layui-btn:not(.layui-btn-lg ):not(.layui-btn-sm):not(.layui-btn-xs) {
            height: 34px;
            line-height: 34px;
            padding: 0 8px;
        }
        .layuimini-main{
            padding-top:5px;
        }
    </style>
@endsection

@section('content')
    <div class="layuimini-container">
        <div class="layuimini-main">
            <div>
                <div class="layui-btn-group">
                    <button class="layui-btn" id="btn-expand">全部展开</button>
                    <button class="layui-btn layui-btn-danger" id="btn-fold">全部折叠</button>
                    <button class="layui-btn layui-btn-normal" id="btn-create">添加顶级分类</button>
                </div>
                <table id="munu-table" class="layui-table" lay-filter="munu-table"></table>
            </div>
        </div>
    </div>
    <!-- 操作列 -->
    <script type="text/html" id="auth-state">
        <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="create">添加子类</a>
        <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="edit">修改</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
@endsection

@section('scripts')
    <script>
        layui.use(['table', 'treetable'], function () {
            var table = layui.table;
            var treetable = layui.treetable;

            // 渲染表格
            layer.load(2);
            treetable.render({
                treeColIndex: 1,
                treeSpid: -1,
                treeIdName: 'authorityId',
                treePidName: 'parentId',
                elem: '#munu-table',
                url:'cate/list',
                page: false,
                cols: [[
                    {type: 'numbers'},
                    {field: 'name', minWidth: 200, title: '分类名称'},
                    {field: 'code', title: '菜单url'},
                    {field: 'authorityId', width: 80, align: 'center', title: 'ID'},
                    {field: 'order', width: 80, align: 'center', title: '排序号'},
                    {templet: '#auth-state', width: 220, align: 'center', title: '操作'}
                ]],
                done: function () {
                    layer.closeAll('loading');
                }
            });

            $('#btn-expand').click(function () {
                treetable.expandAll('#munu-table');
            });

            $('#btn-fold').click(function () {
                treetable.foldAll('#munu-table');
            });

            $('#btn-create').click(function () {
                createCate(0);
            });

            //监听工具条
            table.on('tool(munu-table)', function (obj) {
                var data = obj.data;
                var layEvent = obj.event;

                if (layEvent === 'del') {
                    layer.confirm('真的删除行么', function (index) {
                        $.ajax({
                            'method': 'delete',
                            'url' : 'cate/' + data.id + '/delete'
                        })
                            .done(function(d){
                                layer.msg('删除成功', function () {
                                    obj.del();
                                    layer.close(index);
                                });
                            })
                            .fail(function(e){
                                layer.msg(errorMsgFormat(e), {icon: 9});
                            });

                    });
                } else if (layEvent === 'edit') {
                    var index = layer.open({
                        title: '修改分类',
                        type: 2,
                        shade: 0.2,
                        maxmin:true,
                        shadeClose: true,
                        area: ['40%', '60%'],
                        content: 'cate/' + data.id + '/show',
                    });
                    $(window).on("resize", function () {
                        layer.full(index);
                    });
                }else if (layEvent === 'create') {
                    createCate(data.id);
                }
            });
        });
        const createCate = (parentId) => {
            var index = layer.open({
                title: '添加分类',
                type: 2,
                shade: 0.2,
                maxmin:true,
                shadeClose: true,
                area: ['40%', '60%'],
                content: 'cate/' + parentId + '/create',
            });
            $(window).on("resize", function () {
                layer.full(index);
            });
        }
    </script>
@endsection
