<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"/www/wwwroot/img.tuchuang/public/../app/admin/view/theme/index.html";i:1533014732;s:69:"/www/wwwroot/img.tuchuang/public/../app/admin/view/common/header.html";i:1533014732;s:69:"/www/wwwroot/img.tuchuang/public/../app/admin/view/common/footer.html";i:1533014732;}*/ ?>
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
    <div class="row">
        <?php foreach($theme as $v): ?>
        <div class="col-sm-3 col-md-3 col-1g-3">
            <div class="thumbnail">
                <img src="<?php echo $v['images']; ?>" width="100%" alt="<?php echo $v['name']; ?>">
                <div class="caption">
                    <h3><?php echo $v['name']; ?> <small><a target="_blank" href="<?php echo $v['link']; ?>"><?php echo $v['author']; ?></a></small></h3>
                    <p><?php echo $v['explain']; ?></p>
                    <p>
                        <a class="btn btn-primary btn-block use" role="button"<?php if($conf['now_theme'] == $v['key']): ?>disabled>当前使用<?php else: ?> href="javascript:use('<?php echo $v['key']; ?>')">使用<?php endif; ?></a>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<script type="text/javascript">
    function use(key) {
        btnLoad('.use', 'Loading...');
        $.post('', {'theme': key}, function(res) {
            if(res.code) {
                layer.msg(res.msg, {icon: 1}, function() {
                    return history.go(0);
                });
            }
            return layer.alert(res.msg, {icon: res.code ? 1 : 2});
        });
        closeBtnLoad('.use', '使用');
    }
</script>
</body>
</html>
