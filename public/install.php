<?php
/*  
欢迎使用XiaoZhiIMG系统
开发时间:2018年7月31日
修改时间:2023年9月28日（明天就是中秋节了，祖大家中秋快乐）
Github开源项目地址:https://github.com/xiaozhi-team/XiaoZhiIMG
喜欢就点个Star(●'◡'●)
有问题请提交提交lssues ~~~///(^v^)\\\~~~
改自：https://github.com/xinyewl/Simpic
Github Team:https://github.com/xiaozhi-team/
Gitee:https://gitee.com/xiaozhi_boy/xiaozhi-img/
演示站(我自己再在用):http://img.xz.hmyidc.cn/(后面可能会更换)
QQ:1876907451(有任何问题可以问我)
PHP/HTML我不是很懂，有bug希望大佬能解答
*/
$config_file = '../app/db.php';
$stop = isset($_GET['stop']) ? $_GET['stop'] : 1;
$action = isset($_GET['action']) ? $_GET['action'] : false;
if(file_exists($config_file) && !empty(file_get_contents($config_file)) && $stop != 3) {
    die('你已安装成功，重新安装请清空当前域名/app/db.php');
} elseif (!file_exists($config_file)) {
    die('缺失db.php文件，请上传（重写安装请直接上传空文件）');
}
switch ($stop) {
    case 1:
        $is['curl'] = function_exists('curl_init');
        $is['mysqli'] = class_exists('mysqli');
        //$is['zipArchive'] = class_exists('ZipArchive');
        $is['config_writable'] = is_writable($config_file);
        $is['pic_writable'] = is_writable('./');
        $php_version = explode('-', phpversion());
        $php_version = $php_version[0];
        $is['php_version_gt530'] = strnatcasecmp($php_version, '5.3.0') >= 0 ? true : false;
        break;
    case 2:
        if($action == 'conn') {
            $email = isset($_POST['admin_email']) ? $_POST['admin_email'] : false;
            $user = isset($_POST['admin_user']) ? $_POST['admin_user'] : false;
            $pass = isset($_POST['admin_pass']) ? $_POST['admin_pass'] : false;
            $db_host = isset($_POST['db_host']) ? $_POST['db_host'] : false;
            $db_user = isset($_POST['db_user']) ? $_POST['db_user'] : false;
            $db_pass = isset($_POST['db_pass']) ? $_POST['db_pass'] : false;
            $db_base = isset($_POST['db_base']) ? $_POST['db_base'] : false;
            $db_port = isset($_POST['db_port']) ? $_POST['db_port'] : false;
            @$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_base, $db_port);
            @$mysqli->set_charset("utf8");
            if (mysqli_connect_errno()) {
                $msg = "数据库连接出错，请检查数据库配置是否正确";
                break;
            }
            $db_config_content = "<?php\r\n/**\r\n * 数据库连接配置\r\n */\r\n\$db = [\r\n    // 服务器地址\r\n    'hostname'        => '{$db_host}',\r\n    // 数据库名\r\n    'database'        => '{$db_base}',\r\n    // 用户名\r\n    'username'        => '{$db_user}',\r\n    // 密码\r\n    'password'        => '{$db_pass}',\r\n    // 端口\r\n    'hostport'        => '{$db_port}',\r\n];";
            if (!@file_put_contents($config_file, $db_config_content)) {
                $msg = "数据库配置写入db.php文件失败!";
                break;
            }
            if (!file_exists("install.sql")) die("缺少程序安装文件（install.sql）！");
            $sql = file_get_contents("install.sql");
            $mysqli->multi_query($sql . " INSERT INTO `lk_user` VALUES (1,'{$email}','{$user}','" . md5("LK{$pass}") . "','','','127.0.0.1','127.0.0.1'," . time() . ",'');");
            header('location: ?stop=3');
        }
        break;
    case 3:
        break;
    default:
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>安装程序 - XiaoZhiIMG</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style type="text/css">
    body { background-color: #e2e2e2; }
    .container { margin-top: 70px; margin-bottom: 70px; }
    .main { background-color: #fff; border-radius: 2px; padding: 10px; }
    @media screen and (max-width: 768px) {
        .container { margin-top: 10px; }
    }
</style>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-1g-6 col-sm-offset-3 col-md-offset-3 col-1g-offset-3">
            <div class="main">
                <?php if($stop == 2) { ?>
                <h2>安装XiaoZhiIMG - 连接数据库</h2><hr>
                <?php if(!empty($msg)) { ?>
                <div class="alert alert-danger" role="alert"><?php echo $msg; ?></div>
                <?php } ?>
                <form method="post" action="?stop=2&action=conn">
                    <input type="hidden" name="t" value="true">
                    <div class="form-group">
                        <label for="db_host">数据库连接地址</label>
                        <input type="text" class="form-control" required id="db_host" name="db_host" value="127.0.0.1" placeholder="数据库连接地址">
                    </div>
                    <div class="form-group">
                        <label for="db_base">数据库名</label>
                        <input type="text" class="form-control" required id="db_base" name="db_base" value="dbname" placeholder="数据库名">
                    </div>
                    <div class="form-group">
                        <label for="db_user">数据库用户名</label>
                        <input type="text" class="form-control" required id="db_user" name="db_user" value="dbusername" placeholder="数据库用户名">
                    </div>
                    <div class="form-group">
                        <label for="db_pass">数据库密码</label>
                        <input type="text" class="form-control" required id="db_pass" name="db_pass" value="dbpassword" placeholder="数据库密码">
                    </div>
                    <div class="form-group">
                        <label for="db_port">数据库连接端口</label>
                        <input type="text" class="form-control" required id="db_port" name="db_port" value="3306" placeholder="数据库连接端口">
                    </div>
                    <div class="form-group">
                        <label for="admin_email">后台管理邮箱</label>
                        <input type="text" class="form-control" required id="admin_email" name="admin_email" value="admin@qq.com" placeholder="管理员邮箱">
                    </div>
                    <div class="form-group">
                        <label for="admin_user">后台管理账号</label>
                        <input type="text" class="form-control" required id="admin_user" name="admin_user" value="admin" placeholder="管理员账号">
                    </div>
                    <div class="form-group">
                        <label for="admin_pass">管理员密码</label>
                        <input type="text" class="form-control" required id="admin_pass" name="admin_pass" value="123456" placeholder="管理员密码">
                    </div>
                    <button type="submit" class="btn btn-default btn-block">下一步</button>
                </form>
                <?php } elseif ($stop == 3) { ?>
                <h2>安装成功 - XiaoZhiIMG</h2><hr>
                <?php if(!empty($msg)) { ?>
                    <div class="alert alert-danger" role="alert"><?php echo $msg; ?></div>
                <?php } ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                <img width="100%" src="./static/images/logo.png">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <h3>安装成功</h3>
                        <?php  
                        // 获取当前访问的目录路径  
                        $currentDirectory = __DIR__;  
  
                        // 构建要删除的文件路径  
                        $filePath1 = $currentDirectory . '/install.php';  
                        $filePath2 = $currentDirectory . '/install.sql';  
  
                        // 检查文件是否存在  
                        if (file_exists($filePath1)) {  
                            // 删除 install.php 文件  
                            if (unlink($filePath1)) {  
                                echo 'install.php 文件已成功删除。<br>';  
                            } else {  
                                echo '删除 install.php 文件时发生错误，请手动删除。<br>';  
                            }  
                        } else {  
                            echo 'install.php 文件不存在。';  
                        }  
                        // 检查文件是否存在  
                        if (file_exists($filePath2)) {  
                           // 删除 install.sql 文件  
                            if (unlink($filePath2)) {  
                                echo 'install.sql 文件已成功删除。<br>';  
                            } else {  
                                echo '删除 install.sql 文件时发生错误，请手动删除。<br>';  
                            }  
                        } else {  
                            echo 'install.spl 文件不存在。<br>';  
                        }  
                        ?>
                                <a href="/" class="btn btn-default">访问前台</a>
                                <a href="/admin.php" class="btn btn-default">访问后台</a>
                                <p class="text-danger">后台地址为当前域名+/admin.php</p>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                <h2>安装检测 - XiaoZhiIMG</h2><hr>
                <?php if(!empty($msg)) { ?>
                    <div class="alert alert-danger" role="alert"><?php echo $msg; ?></div>
                <?php } ?>
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th class="text-center">函数</th>
                        <th class="text-center">状态</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>PHP版本 &gt; 7.2</td>
                        <td>
                            <?php if($is['php_version_gt530']) { ?>
                            <span class="text-success glyphicon glyphicon-ok-sign" aria-hidden="true"></span> 支持
                            <?php } else { ?>
                            <span class="text-danger glyphicon glyphicon-remove-sign" aria-hidden="true"></span> 不支持
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Curl</td>
                        <td>
                            <?php if($is['curl']) { ?>
                            <span class="text-success glyphicon glyphicon-ok-sign" aria-hidden="true"></span> 支持
                            <?php } else { ?>
                            <span class="text-danger glyphicon glyphicon-remove-sign" aria-hidden="true"></span> 不支持
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Mysqli</td>
                        <td>
                            <?php if($is['mysqli']) { ?>
                            <span class="text-success glyphicon glyphicon-ok-sign" aria-hidden="true"></span> 支持
                            <?php } else { ?>
                            <span class="text-danger glyphicon glyphicon-remove-sign" aria-hidden="true"></span> 不支持
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>图片存放目录</td>
                        <td>
                            <?php if($is['pic_writable']) { ?>
                            <span class="text-success glyphicon glyphicon-ok-sign" aria-hidden="true"></span> 可写
                            <?php } else { ?>
                            <span class="text-danger glyphicon glyphicon-remove-sign" aria-hidden="true"></span> 不可写
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>配置文件</td>
                        <td>
                            <?php if($is['config_writable']) { ?>
                            <span class="text-success glyphicon glyphicon-ok-sign" aria-hidden="true"></span> 可写
                            <?php } else { ?>
                            <span class="text-danger glyphicon glyphicon-remove-sign" aria-hidden="true"></span> 不可写
                            <?php } ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <a class="btn btn-default btn-block" <?php if(!$is['php_version_gt530'] || !$is['curl'] || !$is['mysqli'] || !$is['pic_writable'] || !$is['config_writable']) { ?>disabled<?php } else { ?>href="?stop=2"<?php } ?>>下一步</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
    <footer class="footer-container">  
        <p>©2018-2024 XiaoZhiIMG 版权所有.<br>By <a href="https://github.com/xiaozhi-team/">XiaoZhiTeam</a> · 开源地址:<a href="https://github.com/xiaozhi-team/XiaoZhiIMG">GITHUB</a></p>  
    </footer> 
</body>
    <style>  

        .footer-container {  

            text-align: center;  

            margin: 0 auto;  

            padding: 20px;  

            width: 100%;  

            background-color: #f2f2f2;  

        }  

    </style>  
<script type="text/javascript" src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
