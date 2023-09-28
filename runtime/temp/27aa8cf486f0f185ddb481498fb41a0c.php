<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"../app/index/view/theme/default/login/index.html";i:1533014732;s:50:"../app/index/view/theme/default/common/header.html";i:1695913437;s:50:"../app/index/view/theme/default/common/footer.html";i:1533014732;}*/ ?>
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
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-1g-6 login">
                <div class="lk-panel">
                    <h1 class="text-center">登录</h1>
                    <form class="layui-form" action="" method="post">
                        <div class="layui-form-item">
                            <input type="text" name="user" required="" lay-verify="required" placeholder="请输入邮箱/用户名" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-item">
                            <input type="password" name="password" required="" lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-item">
                            <div class="pull-right">
                                <a href="javascript:forgot()">忘记密码？</a>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <button class="layui-btn btn-block" id="sign-in" lay-submit="" lay-filter="sign-in">登录</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        layui.use('form', function() {
            var form = layui.form;
            form.on('submit(sign-in)', function(data) {
                btnLoad('#sign-in', '登录中...');
                $.post('', data.field, function(result) {
                    closeBtnLoad('#sign-in', '登录');
                    if(result.code) {
                        layer.msg(result.msg, {icon: 1}, function(index) {
                            layer.close(index);
                            location.href = '/';
                        });
                    } else {
                        layer.msg(result.msg, {icon: 2});
                    }
                });
                return false;
            });
        });
    </script>
    <footer>
        <div class="container">
            <p class="text-muted">Copyright &copy; 2018 <a href="https://github.com/xinyewl/Simpic">Simpic</a> Powered by <a href="https://www.ikxin.com">Notte</a>. All rights reserved. </p>
        </div>
    </footer>
  </body>
</html>