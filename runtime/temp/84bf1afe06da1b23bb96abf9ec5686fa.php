<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/www/wwwroot/img.tuchuang/public/../app/admin/view/index/index.html";i:1533014732;}*/ ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simpic - 后台管理</title>
    <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
<style type="text/css">
    body { width: 100%; height: 100%; padding: 65px 0 0; }
    /*body { margin-left: 0; margin-top: 0; margin-right: 0; margin-bottom: 0; overflow: hidden; }*/
    .navbar-brand { color: #fff!important; }
    a { color: #333; transition: all .3s; -webkit-transition: all .3s; text-decoration: none; }
    .lk-this > a { color: #fff!important; }
    .lk-this:after {
        position: absolute;
        left: 0;
        top: 0;
        width: 0;
        height: 3px;
        background-color: #5FB878;
        transition: all .2s;
        -webkit-transition: all .2s;
    }
    .lk-this:after {
        content: '';
        top: auto;
        bottom: 0;
        width: 100%;
    }
    .navbar-inverse { border: 0px; }
    #main {
        width: 100%;
        height: 100%;
        border: none;
    }
    .main {  }

    @media screen and (max-width: 768px) {
        .lk-this:after { display: none; }
        .main {
            padding-right: 0px;
            padding-left: 0px;
        }
    }
</style>
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Navbar</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0)"><i class="fa fa-leaf fa-fw"></i> Simpic</a>
        </div>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav menu">
                <li class="lk-this"><a href="<?php echo url('/console'); ?>" target="main"><i class="fa fa-home fa-fw"></i> 控制台</a></li>
                <li><a href="<?php echo url('/users'); ?>" target="main"><i class="fa fa-users fa-fw"></i> 用户管理</a></li>
                <li><a href="<?php echo url('/picture'); ?>" target="main"><i class="fa fa-picture-o fa-fw"></i> 图片管理</a></li>
                <li><a href="<?php echo url('/theme'); ?>" target="main"><i class="fa fa-puzzle-piece fa-fw"></i> 主题管理</a></li>
                <li><a href="<?php echo url('/system'); ?>" target="main"><i class="fa fa-cog fa-fw"></i> 系统设置</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i> <?php echo $admin['username']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--<li><a href="javascript:void(0)">修改资料</a></li>
                        <li class="divider"></li>-->
                        <li><a href="<?php echo url('index/logout'); ?>">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container main">
    <iframe id="main" name="main" src="<?php echo url('/console'); ?>"></iframe>
</div>
</body>
    <script type="text/javascript" src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="_layui_layui.js"></script>
    <script type="text/javascript">
        var menu = $('.menu li');
        menu.click(function() {
            layer.load(2);
            menu.each(function() {
                $(this).removeClass('lk-this');
            })
            $(this).addClass('lk-this');
            var a = $(this).children('a');
            $('title').html(a.text() + ' - <?php echo $conf['web_title']; ?> - 后台管理');
            a.attr('data-url');
        });
        layui.use('layer', function() {
            var layer = layui.layer;
            $('#main').on('load', function() {
                layer.closeAll('loading');
            });
        });
    </script>
</html>