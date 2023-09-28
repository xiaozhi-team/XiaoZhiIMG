<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"/www/wwwroot/img.tuchuang/public/../app/admin/view/console/index.html";i:1533014732;s:69:"/www/wwwroot/img.tuchuang/public/../app/admin/view/common/header.html";i:1533014732;s:69:"/www/wwwroot/img.tuchuang/public/../app/admin/view/common/footer.html";i:1533014732;}*/ ?>
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
<div class="">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <div class="wp-panel">
            <i class="fa fa-picture-o" style="background-color: #00c0ef !important;"></i>
            <div class="wp-word">
                <span><?php echo $data['img_num']; ?></span>
                <cite>图片数量</cite>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3">
        <div class="wp-panel">
            <i class="fa fa-picture-o" style="background-color: #dd4b39 !important;"></i>
            <div class="wp-word">
                <span><?php echo $data['add_img_num']; ?></span>
                <cite>今日新增图片</cite>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3">
        <div class="wp-panel">
            <i class="fa fa-users" style="background-color: #00a65a !important;"></i>
            <div class="wp-word">
                <span><?php echo $data['user_num']; ?></span>
                <cite>用户总数</cite>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3">
        <div class="wp-panel">
            <i class="fa fa-user-plus" style="background-color: #f39c12 !important;"></i>
            <div class="wp-word">
                <span><?php echo $data['add_user_num']; ?></span>
                <cite>今日新增用户</cite>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3">
        <div class="wp-panel">
            <i class="fa fa-tasks" style="background-color: #009688 !important;"></i>
            <div class="wp-word">
                <span><?php echo $data['occupy']; ?> mb</span>
                <cite>占用储存</cite>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="system sysNotice">
            <blockquote class="layui-elem-quote title">最新公告<i class="iconfont icon-new1"></i></blockquote>

            <table class="layui-table" lay-skin="line">
                <colgroup>
                    <col>
                    <col width="150">
                </colgroup>
                <tbody class="hot_news">
                    <?php if(count($data['notice']) > 0): foreach($data['notice']['data'] as $k => $v): ?>
                    <tr>
                        <td align="left"><a class="notice" data-id="<?php echo $k; ?>"><?php echo $v['title']; ?></a><span class="none noticeDetails notice-<?php echo $k; ?>"><?php echo $v['content']; ?><cite><?php echo $v['date']; ?></cite></span></td>
                        <td class="notice-date"><?php echo $v['date']; ?></td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td align="left">公告获取失败或暂时没有公告</td>
                        <!--<td></td>-->
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="notice sysNotice">
            <blockquote class="layui-elem-quote title">系统基本参数</blockquote>
            <table class="layui-table">
                <colgroup>
                    <col width="150">
                    <col>
                </colgroup>
                <tbody>
                <tr>
                    <td>操作系统</td>
                    <td class=""><?php echo PHP_OS; ?></td>
                </tr>
                <tr>
                    <td>运行环境</td>
                    <td class=""><?php echo \think\Request::instance()->server('server_software'); ?></td>
                </tr>
                <tr>
                    <td>请求端口</td>
                    <td class=""><?php echo \think\Request::instance()->server('server_port'); ?></td>
                </tr>
                <tr>
                    <td>通信协议</td>
                    <td class=""><?php echo \think\Request::instance()->server('server_protocol'); ?></td>
                </tr>
                <tr>
                    <td>当前版本</td>
                    <td class="">v<?php echo $conf['version']; ?></td>
                </tr>
                <tr>
                    <td>网站域名</td>
                    <td class=""><?php echo \think\Request::instance()->server('server_name'); ?></td>
                </tr>
                <tr>
                    <td>服务器IP</td>
                    <td class=""><?php echo gethostbyname(\think\Request::instance()->server('http_host')); ?></td>
                </tr>
                <tr>
                    <td>剩余空间</td>
                    <td class=""><?php echo $data['disk_free_space']; ?> Mb</td>
                </tr>
                <tr>
                    <td>上传文件限制</td>
                    <td class=""><?php echo $data['upload_max_filesize']; ?></td>
                </tr>
                <tr>
                    <td>执行时间限制</td>
                    <td class=""><?php echo $data['max_execution_time']; ?> 秒</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.notice').click(function() {
        layer.closeAll();
        var t = $(this);
        layer.open({
            title: t.text(),
            type: 1,
            anim: 4,
            shade: 0,
            area: ['420px', '240px'], //宽高
            content: $('.notice-' + $(this).attr('data-id'))
        });
    });
</script>
</body>
</html>