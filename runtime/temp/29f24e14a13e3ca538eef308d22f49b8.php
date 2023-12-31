<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"/www/wwwroot/img.tuchuang/public/../app/admin/view/users/index.html";i:1533014732;s:69:"/www/wwwroot/img.tuchuang/public/../app/admin/view/common/header.html";i:1533014732;s:69:"/www/wwwroot/img.tuchuang/public/../app/admin/view/common/footer.html";i:1533014732;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>Simpic - 子窗口</title>
    <link rel="stylesheet" type="text/css" href="_layui_css/layui.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="_css_style.css" />
    <script type="text/javascript" src="_layui_layui.js"></script>
    <script type="text/javascript" src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="_js_main.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="layui-form list-per" action="" method="post">
        <div class="layui-inline">
            <div class="layui-input-inline">
                <select name="key" lay-verify="required" lay-filter="key">
                    <option value="1">Email</option>
                    <option value="2">昵称</option>
                    <option value="3">ID</option>
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <div class="layui-input-inline">
                <input type="text" name="email" id="reload" value="" placeholder="搜索..." class="layui-input">
            </div>
            <button class="layui-btn layui-btn-small layui-btn-primary" lay-submit data-type="reload">查询</button>
            <button class="layui-btn layui-btn-small layui-btn-danger" data-type="getCheckData" style="margin-left: 0;">批量删除</button>
        </div>
    </div>
    <table class="table layui-hide" id="user_list" lay-filter="user_list"></table>
    <script type="text/html" id="per">
        <a class="layui-btn layui-btn-mini" lay-event="del">删除</a>
    </script>
</div>
<script type="text/javascript">
    layui.use(['table', 'form'], function() {
        var table = layui.table, form = layui.form;

        table.render({
            elem: '#user_list',
            url: '<?php echo url("getUserList"); ?>',
            cols: [[
                {checkbox: true, fixed: true},
                {field:'id', title: 'ID', width: 80, sort: true},
                {field:'email', title: 'Email', width: 150},
                {field:'username', title: '用户名', width: 150},
                {field:'login_time', title: '最后登录时间', width: 150, sort: true},
                {field:'login_ip', title: '最后登录IP', width: 100},
                {field:'reg_ip', title: '注册IP', width: 100},
                {field:'reg_time', title: '注册时间', width: 150, sort: true},
                {field:'right', width: 100, title: '操作', align:'center', toolbar: '#per'}
            ]],
            id: 'reload',
            page: true,
            size: 'sm',
            limits: [10, 20, 30, 40, 50],
            limit: 10,
            loading: true,
        });

        var active = {
            // 搜索
            reload: function() {
                var reload = $('#reload'), where = {email: reload.val()};
                switch (parseInt($('[name=key]').val())) {
                    case 1: where = {email: reload.val()}; break;
                    case 2: where = {username: reload.val()}; break;
                    case 3: where = {id: reload.val()}; break;
                }
                table.reload('reload', {
                    where: {
                        key: where
                    }
                });
            },
            // 获取选中数据
            getCheckData: function() {
                var checkStatus = table.checkStatus('reload') ,data = checkStatus.data, arr = [];
                for (var i = 0; i < data.length; i++) {
                    arr.push(data[i].id);
                }
                if(arr.length > 0) {
                    layer.confirm('真的删除选中的' + arr.length + '个会员吗?', function(index) {
                        layer.close(index);
                        $.post("<?php echo url('users/del'); ?>", {id: arr}, function(res) {
                            table.reload('reload'); // 全局重载
                            return layer.msg(res.msg, {icon: res.code ? 1 : 2});
                        });
                    });
                } else {
                    return layer.msg('没有选中项');
                }
            }
        };

        $('.list-per .layui-btn').on('click', function() {
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
            return false;
        });

        table.on('tool(user_list)', function(obj) {
            var data = obj.data, layEvent = obj.event;
            //var tr = obj.tr;
            if(layEvent === 'del'){
                layer.confirm('真的删除么?', function(index) {
                    layer.close(index);
                    $.post("<?php echo url('users/del'); ?>", {id: data.id}, function(res) {
                        if(res.code) obj.del();
                        return layer.msg(res.msg, {icon: res.code ? 1 : 2});
                    });
                });
            }
        });

    });
</script>
</body>
</html>