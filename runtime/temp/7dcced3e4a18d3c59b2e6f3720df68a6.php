<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"../app/index/view/theme/default/index/index.html";i:1533014732;s:50:"../app/index/view/theme/default/common/header.html";i:1695913437;s:50:"../app/index/view/theme/default/common/footer.html";i:1533014732;}*/ ?>
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
        <div class="fileinput lk-panel">
            <h1>Image Upload</h1>
            <form enctype="multipart/form-data">
                <div class="form-group">
                    <input id="img" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="1" data-max-file-count="10" name="img" accept="image/*">
                </div>
            </form>
        </div>
        <div id="link" class="lk-panel none">
            <ul id="navTab" class="nav nav-tabs">
                <li class="active"><a href="#urlcodes" data-toggle="tab">URL</a></li>
                <li><a href="#htmlcodes" data-toggle="tab">HTML</a></li>
                <li><a href="#bbcodes" data-toggle="tab">BBCode</a></li>
                <li><a href="#markdowncodes" data-toggle="tab">Markdown</a></li>
                <li><a href="#markdowncodes2" data-toggle="tab">Markdown with Link</a></li>
            </ul>
            <div id="navTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="urlcodes">
                    <pre style="margin-top: 5px;"><code id="urlcode"></code></pre>
                </div>
                <div class="tab-pane fade" id="htmlcodes">
                    <pre style="margin-top: 5px;"><code id="htmlcode"></code></pre>
                </div>
                <div class="tab-pane fade" id="bbcodes">
                    <pre style="margin-top: 5px;"><code id="bbcode"></code></pre>
                </div>
                <div class="tab-pane fade" id="markdowncodes">
                    <pre style="margin-top: 5px;"><code id="markdown"></code></pre>
                </div>
                <div class="tab-pane fade" id="markdowncodes2">
                    <pre style="margin-top: 5px;"><code id="markdownlinks"></code></pre>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#img").fileinput({
            uploadUrl: './',
            language: 'zh',
            allowedFileExtensions : ['<?php echo str_replace(",", "','", $conf['upload_images_ext']); ?>'],
            overwriteInitial: false,
            //browseClass: "btn btn-info",
            maxFileSize: <?php echo $conf['upload_max_filesize']; ?>,
            maxFileCount: <?php echo $conf['upload_max_file_count']; ?>,
            browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i>"
        });
        $('#img').on('fileuploaded', function(event, data, previewId, index) {
            var form = data.form, files = data.files, extra = data.extra, response = data.response, reader = data.reader;
            if(response.code == 'success') {
                if ($("#link").css("display") != 'none') {
                    $('#urlcode').append(response.data.url + "\n");
                    $('#htmlcode').append("&lt;img src=\""+ response.data.url +"\" alt=\""+ files[index].name +"\" title=\""+ files[index].name +"\" /&gt;" + "\n");
                    $('#bbcode').append("[img]"+ response.data.url +"[/img]" + "\n");
                    $('#markdown').append("!["+ files[index].name +"](" + response.data.url + ")" + "\n");
                    $('#markdownlinks').append("[!["+ files[index].name +"](" + response.data.url + ")]" +"(" + response.data.url + ")" + "\n");
                    $('#deletecode').append(response.data.delete + "\n");

                } else if (response.data.url) {
                    $("#link").show();
                    $('#urlcode').append(response.data.url + "\n");
                    $('#htmlcode').append("&lt;img src=\""+ response.data.url +"\" alt=\""+ files[index].name +"\" title=\""+ files[index].name +"\" /&gt;" + "\n");
                    $('#bbcode').append("[img]"+ response.data.url +"[/img]" + "\n");
                    $('#markdown').append("!["+ files[index].name +"](" + response.data.url + ")" + "\n");
                    $('#markdownlinks').append("[!["+ files[index].name +"](" + response.data.url + ")]" +"(" + response.data.url + ")" + "\n");
                    $('#deletecode').append(response.data.delete + "\n");
                }
            } else if (response.code == 0) {
                return layer.msg(response.msg, {icon: 2});
            }
        });
        /*$('#img').on('fileerror', function(event, data, msg) {
            console.log(msg);
        });*/
    </script>
    <footer>
        <div class="container">
            <p class="text-muted">Copyright &copy; 2018 <a href="https://github.com/xinyewl/Simpic">Simpic</a> Powered by <a href="https://www.ikxin.com">Notte</a>. All rights reserved. </p>
        </div>
    </footer>
  </body>
</html>