<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:46:"../app/index/view/theme/default/reg/index.html";i:1533014732;s:50:"../app/index/view/theme/default/common/header.html";i:1695913437;s:50:"../app/index/view/theme/default/common/footer.html";i:1533014732;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title><?php echo $conf['web_title']; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $conf['keywords']; ?>" />
    <meta name="description" content="<?php echo $conf['description']; ?>" />
    <link rel="stylesheet" type="text/css" href="_layui_css/layui.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/bootstrap-fileinput/4.4.3/css/fileinput.min.css" />
    <link rel="stylesheet" type="text/css" href="_css_main.css" />
    <script type="text/javascript" src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.bootcss.com/bootstrap-fileinput/4.4.3/js/fileinput.min.js"></script>
    <script type="text/javascript" src="//cdn.bootcss.com/bootstrap-fileinput/4.4.3/js/locales/zh.min.js"></script>
    <script type="text/javascript" src="_layui_layui.js"></script>
    <script type="text/javascript" src="_js_main.js"></script>
</head>
    <!-- 自定义style -->
    <style type="text/css">
        <?php echo $conf['custom_style']; ?>
    </style>
<body>
    <nav class="header navbar navbar-default navbar-inverse navbar-fixed-top layui-nav layui-bg-cyan" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                    <span class="sr-only">navbar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><i class="fa fa-leaf fa-fw"></i> Simpic</a>
            </div>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav navbar-left">
                    <!--<li><a href="/">首页</a></li>-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if($user): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user['email']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo url('/user'); ?>">管理</a></li>
                            <?php if($user['id'] == 1): ?>
                            <li><a href="<?php echo url('/admin.php'); ?>">后台</a></li>
                            <?php endif; ?>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:logout()">退出</a></li>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li><a href="<?php echo url('/reg'); ?>">注册</a></li>
                    <li><a href="<?php echo url('/login'); ?>">登录</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <style type="text/css">
        .geetest_holder.geetest_wind { width: 100%!important; }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-1g-6 reg">
                <div class="lk-panel">
                    <h1 class="text-center">注册</h1>
                    <form class="layui-form" action="" method="post">
                        <div class="layui-form-item">
                            <input type="email" name="email" required lay-verify="required" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-item">
                            <input type="text" name="username" required lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-item">
                            <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-item">
                            <input type="password" name="passwords" required lay-verify="required" placeholder="请输入确认密码" autocomplete="off" class="layui-input">
                        </div>
                        <?php if(!$conf['reg_close']): ?>
                        <div class="layui-form-item">
                            <div id="embed-captcha"></div>
                            <p id="wait">正在加载验证码......</p>
                        </div>
                        <?php endif; ?>
                        <div class="layui-form-item">
                            <button class="layui-btn btn-block" id="sign-up" lay-submit="" lay-filter="sign-up"<?php if($conf['reg_close']): ?> disabled>已关闭注册<?php else: ?>>注册<?php endif; ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="_js_gt.js"></script>
<script type="text/javascript">
    layui.use('form', function() {
        var form = layui.form;
        $.ajax({
            // 获取id，challenge，success（是否启用failback）
            url: "/reg/gtStartCaptchaServlet",
            type: "post",
            data: {'t': (new Date()).getTime()},
            dataType: "json",
            success: function (data) {
                // 使用initGeetest接口
                // 参数1：配置参数
                // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
                initGeetest({
                    gt: data.gt,
                    challenge: data.challenge,
                    new_captcha: data.new_captcha,
                    protocol: 'https://',
                    product: "popup", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                    offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                }, handlerEmbed);
            }
        });
        //监听提交
        var handlerEmbed = function (captchaObj) {
            form.on('submit(sign-up)', function(data) {
                var validate = captchaObj.getValidate();
                if (!validate) {
                    layer.msg('请完成验证', function() {});
                    return false;
                } else {
                    btnLoad('#sign-up', '注册中...');
                    $.post('', data.field, function(res) {
                        closeBtnLoad('#sign-up', '注册');
                        if(res.code) {
                            return layer.alert('注册成功', {icon: 1}, function (index) {
                                layer.close(index);
                                window.location.href = '/login';
                            });
                        }
                        return layer.alert(res.msg, {icon: 2});
                    });
                }
                return false;
            });
            // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
            captchaObj.appendTo("#embed-captcha");
            // 验证码加载完成
            captchaObj.onReady(function () {
                $("#wait").hide();
            });
        };
    });
</script>

    <footer>
        <div class="container">
            <p class="text-muted">Copyright &copy; 2018 <a href="https://github.com/xinyewl/Simpic">Simpic</a> Powered by <a href="https://www.ikxin.com">Notte</a>. All rights reserved. </p>
        </div>
    </footer>
  </body>
</html>