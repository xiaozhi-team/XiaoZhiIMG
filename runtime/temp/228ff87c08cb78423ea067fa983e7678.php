<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/www/wwwroot/img.tuchuang/public/../app/admin/view/login/index.html";i:1533014732;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Simpic - 登录</title>
    <link rel="stylesheet" type="text/css" href="_layui_css/layui.css" />
</head>
    <style type="text/css">
        html {
            width:100%;height:100%;
            background-image: -webkit-radial-gradient(-20% 140%, ellipse , rgba(255,144,187,.6) 30%,rgba(255,255,227,0) 50%), -webkit-linear-gradient(top, rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-radial-gradient(60% 40%,ellipse, #d9e3e5 10%,rgba(44,70,76,.0) 60%), -webkit-linear-gradient(-45deg, rgba(18,101,101,.8) -10%,#d9e3e5 80% );
        }
        body{margin:0;width:100%;height:100%;}
        .btn-block{width:100%}
        .shadow{background-color:rgba(0,0,0,.42);-webkit-box-shadow:0 3px 3px -2px rgba(0,0,0,.2),0 3px 4px 0 rgba(0,0,0,.14),0 1px 8px 0 rgba(0,0,0,.12);box-shadow:0 3px 3px -2px rgba(0,0,0,.2),0 3px 4px 0 rgba(0,0,0,.14),0 1px 8px 0 rgba(0,0,0,.12)}
        .login{position:absolute;top:50%;left:50%;z-index:99;margin:-150px 0 0 -170px;padding:20px;width:300px;border-radius:4px;background-color:rgba(0,0,0,.5);color:#fff}
        .text-center{text-align:center}
        h1{margin:20px auto;font-weight:700;font-size:30px;font-family:Georgia}
    </style>
    <body>
    <div class="login shadow">
        <h1 class="text-center">Simpic</h1>
        <form class="layui-form" action="" method="post">
            <div class="layui-form-item">
                <input type="text" name="user" required  lay-verify="required" placeholder="请输入账号" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-item">
                <input type="password" name="password" required  lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-item">
                <button id="embed-submit" class="layui-btn btn-block" lay-submit lay-filter="sign-in">登录</button>
            </div>
        </form>
    </div>
    </body>
    <script type="text/javascript" src="_layui_layui.js"></script>
    <script type="text/javascript">
        layui.use('form', function() {
            var form = layui.form,$ = layui.$;
            form.on('submit(sign-in)', function(data) {
                $.post('', data.field, function(res) {
                    if(res.code) return window.location.href = '/admin.php';
                    layer.alert(res.msg);
                    return false;
                });
                return false;
            });
        });
    </script>
</html>