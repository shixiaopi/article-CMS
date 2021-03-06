@extends('admin.layouts.layout')
@section('content')
    <div class="layuimini-main">
        <fieldset class="table-search-fieldset">
            <legend>搜索信息</legend>
            <div style="margin: 10px 10px 10px 10px">
                <form class="layui-form layui-form-pane" action="">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">标题</label>
                            <div class="layui-input-inline">
                                <input type="text" name="title" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">作者</label>
                            <div class="layui-input-inline">
                                <input type="text" name="user" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">分类</label>
                            <div class="layui-input-inline">
                                <select name="cate_id">
                                    <option value="">请选择</option>
                                    @foreach($cate as $item)
                                        <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <button type="submit" class="layui-btn layui-btn-primary"  lay-submit lay-filter="data-search-btn"><i class="layui-icon"></i> 搜 索</button>
                        </div>
                    </div>
                </form>
            </div>
        </fieldset>
        <script type="text/html" id="toolbarDemo">
            <div class="layui-btn-container">
                <button class="layui-btn layui-btn-normal layui-btn-sm data-add-btn" lay-event="add"> 添加 </button>
                <button class="layui-btn layui-btn-danger layui-btn-sm data-add-btn" lay-event="delete"> 删除 </button>
            </div>
        </script>

        <table class="layui-hide" id="currentTableId" lay-filter="currentTableFilter"></table>

        <script type="text/html" id="tags">
            @{{# for(let i=0; i < d.tags.length; ++i){  }}
            <button type="button" class="layui-btn layui-btn-normal layui-btn-xs layui-btn-radius">@{{ d.tags[i] }}</button>
            @{{# } }}
        </script>

        <script type="text/html" id="statusBtn">
            @{{# if(d.status == 1) { }}
            <button type="button" class="layui-btn layui-btn-normal layui-btn-xs layui-btn-radius">正常</button>
            @{{# }else{ }}
            <button type="button" class="layui-btn layui-btn-danger layui-btn-xs layui-btn-radius">冻结</button>
            @{{# } }}
        </script>

        <script type="text/html" id="currentTableBar">
            <a class="layui-btn layui-btn-normal layui-btn-xs data-count-edit" lay-event="edit">编辑</a>
            <a class="layui-btn layui-btn-xs layui-btn-danger data-count-delete" lay-event="delete">删除</a>
        </script>

    </div>
@endsection
@section('scripts')
    <script>
        layui.use(['form', 'table'], function () {
            var form = layui.form,
                table = layui.table;

            table.render({
                elem: '#currentTableId',
                url: 'article/list',
                toolbar: '#toolbarDemo',
                defaultToolbar: ['filter', 'exports', 'print', {
                    title: '提示',
                    layEvent: 'LAYTABLE_TIPS',
                    icon: 'layui-icon-tips'
                }],
                cols: [[
                    {type: "checkbox", width: 50},
                    {field: 'id', width: 80, title: 'ID', sort: true},
                    {field: 'title', width: 180, title: '标题'},
                    {field: 'cate', width: 180, title: '分类'},
                    {field: 'user', width: 180, title: '作者'},
                    {field: 'tags', title: '标签', templet: "#tags"},
                    {field: 'show', width: 180, title: '点击'},
                    {field: 'status', width: 180, title: '状态', templet: '#statusBtn'},
                    {field: 'created_at', width: 180, title: '创建'},
                    {title: '操作', minWidth: 150, toolbar: '#currentTableBar', align: "center"}
                ]],
                limits: [15, 20, 25, 50, 100],
                limit: 15,
                page: true,
                skin: 'line'
            });

            // 监听搜索操作
            form.on('submit(data-search-btn)', function (data) {
                var result = JSON.stringify(data.field);

                //执行搜索重载
                table.reload('currentTableId', {
                    page: {
                        curr: 1
                    }
                    , where: {
                        searchParams: result
                    }
                }, 'data');

                return false;
            });

            /**
             * toolbar监听事件
             */
            table.on('toolbar(currentTableFilter)', function (obj) {
                if (obj.event === 'add') {  // 监听添加操作
                    var index = layer.open({
                        title: '添加文章',
                        type: 2,
                        shade: 0.2,
                        maxmin:true,
                        shadeClose: true,
                        area: ['100%', '100%'],
                        content: 'article/create',
                    });
                    $(window).on("resize", function () {
                        layer.full(index);
                    });
                } else if (obj.event === 'delete') {  // 监听删除操作
                    var checkStatus = table.checkStatus('currentTableId')
                        , data = checkStatus.data;
                    // layer.alert(JSON.stringify(data));
                    $.ajax({
                        'method': 'delete',
                        'url': 'article/delete-all',
                        'data': {data:data},
                    })
                    .done(function(d){
                        layer.msg('删除成功',function(){
                            window.location.reload();
                        });
                    })
                    .fail(function (e){
                        layer.msg(errorMsgFormat(e), {icon: 9});
                    });
                }
            });

            //监听表格复选框选择
            table.on('checkbox(currentTableFilter)', function (obj) {
                console.log(obj)
            });

            table.on('tool(currentTableFilter)', function (obj) {
                var data = obj.data;
                if (obj.event === 'edit') {

                    var index = layer.open({
                        title: '编辑文章',
                        type: 2,
                        shade: 0.2,
                        maxmin:true,
                        shadeClose: true,
                        area: ['100%', '100%'],
                        content: 'article/' + data.id + '/show',
                    });
                    $(window).on("resize", function () {
                        layer.full(index);
                    });
                    return false;
                } else if (obj.event === 'delete') {
                    layer.confirm('真的删除行么', function (index) {
                        $.ajax({
                            'method': 'delete',
                            'url' : 'article/' + data.id + '/delete'
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
                }
            });

        });
    </script>
@endsection
