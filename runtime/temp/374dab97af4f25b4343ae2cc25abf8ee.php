<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:51:"../app/index/view/theme/XiaoZhiIMG/index/index.html";i:1695913354;s:53:"../app/index/view/theme/XiaoZhiIMG/common/header.html";i:1695913401;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title><?php echo $conf['web_title']; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $conf['keywords']; ?>" />
    <meta name="description" content="<?php echo $conf['description']; ?>" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link rel="stylesheet" type="text/css" href="/static/themes/XiaoZhiIMG/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="/static/themes/XiaoZhiIMG/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/themes/XiaoZhiIMG/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="/static/themes/XiaoZhiIMG/css/animate.min.css">
    <script type="text/javascript" src="/static/themes/XiaoZhiIMG/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/themes/XiaoZhiIMG/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/static/themes/XiaoZhiIMG/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/themes/XiaoZhiIMG/js/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="/static/themes/XiaoZhiIMG/js/popper.min.js"></script>
    <script type="text/javascript" src="/static/themes/XiaoZhiIMG/js/chart.min.js"></script>
    <script type="text/javascript" src="/static/themes/XiaoZhiIMG/js/main.min.js"></script>
    <script type="text/javascript" src="_layui_layui.js"></script>
    <script type="text/javascript" src="_js_main.js"></script>
</head>
<body>
<!--页面loading-->
<div id="lyear-preloader" class="loading">
  <div class="ctn-preloader">
    <div class="round_spinner">
      <div class="spinner"></div>
      <img src="/static/images/avatar.jpg" alt="">
    </div>
  </div>
</div>
<!--页面loading end-->
<div class="lyear-layout-web">
  <div class="lyear-layout-container">
    <!--左侧导航-->
    <aside class="lyear-layout-sidebar">

      <!-- logo -->
      <div id="logo" class="sidebar-header">
        <a href="index.html"><img src="/static/images/preview.jpg" title="LightYear" alt="LightYear" /></a>
      </div>
      <div class="lyear-layout-sidebar-info lyear-scroll">

        <nav class="sidebar-main">

          <ul class="nav-drawer">
            <li class="nav-item active">
              <a href="index.html">
                <i class="mdi mdi-home-city-outline"></i>
                <span>首页</span>
              </a>
            </li>
            <li>
              <a href="index.html">
                <i class="mdi mdi-account"></i>
                <span>登录</span>
              </a>
            </li>
            <li>
              <a href="index.html">
                <i class="mdi mdi-account"></i>
                <span>注册</span>
              </a>
            </li>
          </ul>
        </nav>

        <div class="sidebar-footer">
          <p class="copyright">
            <span>Copyright &copy; 2018-2023. </span>
            <a target="_blank" href="http://www.bixiaguangnian.com">笔下光年</a>
            <span> All rights reserved.</span>
          </p>
        </div>
      </div>

    </aside>
    <!--End 左侧导航-->

    <!--头部信息-->
    <header class="lyear-layout-header">

      <nav class="navbar">

        <div class="navbar-left">
          <div class="lyear-aside-toggler">
            <span class="lyear-toggler-bar"></span>
            <span class="lyear-toggler-bar"></span>
            <span class="lyear-toggler-bar"></span>
          </div>
        </div>

        <ul class="navbar-right d-flex align-items-center">
          <!--个人头像内容-->
          <li class="dropdown">
            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="dropdown-toggle">
              <img class="avatar-md rounded-circle" src="/static/images/avatar.jpg" />
              <span style="margin-left: 10px;">笔下光年</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="mdi mdi-delete"></i>
                  <span>清空缓存</span>
                </a>
              </li>
            </ul>
          </li>
          <!--End 个人头像内容-->
        </ul>

      </nav>

    </header>
    <!--End 头部信息-->

    <!--页面主要内容-->
    <main class="lyear-layout-content">

      <div class="container-fluid">

        <div class="row">

          <div class="col">
            <div class="card">
              <div class="card-header">
                <div class="card-title">IMAGE</div>
              </div>
              
              <form enctype="multipart/form-data">
              <div class="card-body">
                      
          <input id="img" type="file" class="form-control" data-overwrite-initial="false" data-min-file-count="1" data-max-file-count="10" name="img" accept="image/*" required>
        </div>
        
      </form>
              <div class="card-body">
                <canvas class="js-chartjs-bars"></canvas>
              </div>
            </div>
          </div>



        </div>

      </div>

    </main>
    <!--End 页面主要内容-->
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

</body>
</html>
