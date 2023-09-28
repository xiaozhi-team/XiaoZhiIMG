<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"/www/wwwroot/img.tuchuang/public/../app/admin/view/system/index.html";i:1533014732;s:69:"/www/wwwroot/img.tuchuang/public/../app/admin/view/common/header.html";i:1533014732;s:69:"/www/wwwroot/img.tuchuang/public/../app/admin/view/common/footer.html";i:1533014732;}*/ ?>
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
    <div class="layui-tab layui-tab-brief" lay-filter="">
        <ul class="layui-tab-title">
            <li class="layui-this">网站设置</li>
            <li>邮件配置</li>
            <li>储存方案</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-1g-6">
                        <form class="form-horizontal setConf" role="form" action="" method="post">
                            <div class="form-group">
                                <label for="web_title" class="col-sm-3 control-label">网站名称</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="web_title" name="web_title" value="<?php echo $conf['web_title']; ?>" placeholder="网站名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keywords" class="col-sm-3 control-label">关键字</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="keywords" name="keywords" value="<?php echo $conf['keywords']; ?>" placeholder="网站关键字">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-3 control-label">描述</label>
                                <div class="col-sm-9">
                                    <textarea id="description" name="description" class="form-control" rows="3" placeholder="网站描述"><?php echo $conf['description']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">关闭注册</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                        <input type="radio" name="reg_close" value="0" <?php if($conf['reg_close'] == 0): ?>checked<?php endif; ?>> 关闭
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="reg_close" value="1" <?php if($conf['reg_close'] == 1): ?>checked<?php endif; ?>> 开启
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_max_filesize" class="col-sm-3 control-label">上传限制</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="upload_max_filesize" name="upload_max_filesize" value="<?php echo $conf['upload_max_filesize']; ?>" placeholder="最大上传限制(Kb)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_max_file_count" class="col-sm-3 control-label">最大上传数</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="upload_max_file_count" name="upload_max_file_count" value="<?php echo $conf['upload_max_file_count']; ?>" placeholder="最大上传图片数量">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_images_ext" class="col-sm-3 control-label">上传拓展名</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="upload_images_ext" name="upload_images_ext" value="<?php echo $conf['upload_images_ext']; ?>" placeholder="允许的文件拓展名，逗号隔开(开头和结尾不需要逗号)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="flow_load_mode" class="col-sm-3 control-label">流加载方式</label>
                                <div class="col-sm-9">
                                    <select name="flow_load_mode" id="flow_load_mode" class="form-control">
                                        <option value="0" <?php if($conf['flow_load_mode'] == 0): ?>selected<?php endif; ?>>手动加载</option>
                                        <option value="1" <?php if($conf['flow_load_mode'] == 1): ?>selected<?php endif; ?>>下拉加载</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="img_rows" class="col-sm-3 control-label">每页显示数量</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="img_rows" name="img_rows" value="<?php echo $conf['img_rows']; ?>" placeholder="每页显示数量">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="captcha_id" class="col-sm-3 control-label">极检验证ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="captcha_id" name="captcha_id" value="<?php echo $conf['captcha_id']; ?>" placeholder="极检验证ID">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="private_key" class="col-sm-3 control-label">极检验证KEY</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="private_key" name="private_key" value="<?php echo $conf['private_key']; ?>" placeholder="极检验证KEY">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="custom_style" class="col-sm-3 control-label">自定义Style</label>
                                <div class="col-sm-9">
                                    <textarea id="custom_style" name="custom_style" class="form-control" rows="3" placeholder="自定义Css样式"><?php echo $conf['custom_style']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" id="setConf" class="btn btn-primary">修改</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="layui-tab-item">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-1g-6">
                        <form class="form-horizontal setSmtp" role="form" action="" method="post">
                            <div class="form-group">
                                <label for="smtp_host" class="col-sm-3 control-label">SMTP连接地址</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="<?php echo $conf['smtp_host']; ?>" placeholder="SMTP连接地址（不需要加http://）">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="smtp_port" class="col-sm-3 control-label">SMTP端口</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="smtp_port" name="keywords" value="<?php echo $conf['smtp_port']; ?>" placeholder="SMTP端口，默认25">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">SMTP认证</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                        <input type="radio" name="smtp_auth" value="0" <?php if($conf['smtp_auth'] == 0): ?>checked<?php endif; ?>> 关闭
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="smtp_auth" value="1" <?php if($conf['smtp_auth'] == 1): ?>checked<?php endif; ?>> 开启
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="smtp_user" class="col-sm-3 control-label">SMTP用户</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="smtp_user" name="smtp_user" value="<?php echo $conf['smtp_user']; ?>" placeholder="SMTP登录账户">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="smtp_pass" class="col-sm-3 control-label">SMTP密码</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="smtp_pass" name="smtp_pass" value="<?php echo $conf['smtp_pass']; ?>" placeholder="SMTP密码">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">开启SSL</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                        <input type="radio" name="smtp_ssl" value="0" <?php if($conf['smtp_ssl'] == 0): ?>checked<?php endif; ?>> 关闭
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="smtp_ssl" value="1" <?php if($conf['smtp_ssl'] == 1): ?>checked<?php endif; ?>> 开启
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" id="setSmtp" class="btn btn-primary">修改</button>
                                    <button type="button" id="sendTestEmail" class="btn btn-default">发送测试邮件</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="layui-tab-item">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-1g-6">
                        <label class="radio-inline">
                            <input type="radio" name="select-id" value="1"<?php if($conf['upload_scheme_id'] == 1): ?> checked<?php endif; ?>> 本地
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="select-id" value="2"<?php if($conf['upload_scheme_id'] == 2): ?> checked<?php endif; ?>> 七牛云
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="select-id" value="3"<?php if($conf['upload_scheme_id'] == 3): ?> checked<?php endif; ?>> 又拍云
                        </label>
                        <form class="form-horizontal setScheme" role="form" action="" method="post">
                            <div class="scheme scheme-1<?php if($conf['upload_scheme_id'] != 1): ?> none<?php endif; ?>">
                                <blockquote class="layui-elem-quote">本地</blockquote>
                                <p class="text-danger">本地默认无需配置，文件路径所在目录 /public</p>
                                <div class="form-group">
                                    <div class="col-sm-9">
                                        <input type="hidden" name="id" value="1">
                                        <button type="submit" class="btn btn-primary set-scheme">修改</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal setScheme" role="form" action="" method="post">
                            <div class="scheme scheme-2<?php if($conf['upload_scheme_id'] != 2): ?> none<?php endif; ?>">
                                <blockquote class="layui-elem-quote">七牛云</blockquote>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">AccessKey</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="access_key" value="<?php echo $scheme['qiniu']['access_key']; ?>" placeholder="AccessKey">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">SecretKey</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="secret_key" value="<?php echo $scheme['qiniu']['secret_key']; ?>" placeholder="SecretKey">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">储存空间名</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="bucket_name" value="<?php echo $scheme['qiniu']['bucket_name']; ?>" placeholder="储存空间名">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">外链默认域名</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="domain" value="<?php echo $scheme['qiniu']['domain']; ?>" placeholder="外链默认域名，开头加“http://”结尾不需要加“/”">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <input type="hidden" name="id" value="2">
                                        <button type="submit" class="btn btn-primary set-scheme">修改</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal setScheme" role="form" action="" method="post">
                            <div class="scheme scheme-3<?php if($conf['upload_scheme_id'] != 3): ?> none<?php endif; ?>">
                                <blockquote class="layui-elem-quote">又拍云</blockquote>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">管理员操作名</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="access_key" value="<?php echo $scheme['upyun']['access_key']; ?>" placeholder="管理员操作员名称">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">管理员操作密码</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="secret_key" value="<?php echo $scheme['upyun']['secret_key']; ?>" placeholder="操作员密码">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">服务名称</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="bucket_name" value="<?php echo $scheme['upyun']['bucket_name']; ?>" placeholder="储存空间名">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">加速域名</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="domain" value="<?php echo $scheme['upyun']['domain']; ?>" placeholder="加速域名，开头加“http://”结尾不需要加“/”">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <input type="hidden" name="id" value="3">
                                        <button type="submit" class="btn btn-primary set-scheme">修改</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    layui.use(['form', 'element'], function() {
        var form = layui.form, element = layui.element;
    });
    $('.setConf').submit(function() {
        var data = $(this).serialize();
        btnLoad('#setConf');
        $.post('', data, function(res) {
            layer.msg(res.msg, {icon: res.code ? 1 : 2});
            closeBtnLoad('#setConf', '修改');
        });
        return false;
    });
    $('.setSmtp').submit(function() {
        var data = $(this).serialize();
        btnLoad('#setSmtp');
        $.post('', data, function(res) {
            layer.msg(res.msg, {icon: res.code ? 1 : 2});
            closeBtnLoad('#setSmtp', '修改');
        });
        return false;
    });
    $('#sendTestEmail').click(function() {
        layer.prompt({title: '请输入邮箱'}, function(email, index) {
            layer.close(index);
            $.post('system/sendTestEmail', {'email': email}, function(res) {
                return layer.msg(res.msg, {icon: res.code ? 1 : 2});
            });
        });
    });
    $('[name=select-id]').click(function() {
        $('form .scheme').each(function() {
            $(this).addClass('none');
        });
        var val = $(this).val();
        $('form .scheme-' + val).removeClass('none');
    });
    $('.setScheme').submit(function() {
        btnLoad('.set-scheme');
        $.post('system/setScheme', $(this).serialize(), function(res) {
            closeBtnLoad('.set-scheme', '修改');
            return layer.msg(res.msg, {icon: res.code ? 1 : 2});
        });
        return false;
    });
</script>
</body>
</html>