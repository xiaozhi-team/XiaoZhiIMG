## XiaoZhi IMG系统

## XiaoZhiIMG是一个简约的PHP图床系统，支持拖动上传，管理用户，管理图片，自由调整网站主题。

## 安装教程：
***


1. 下载，上传至web运行环境，解压。
2. 设置运行目录为 public。
3. 配置伪静态规则：
    ##### Nginx：
    <pre>
    location / {
        if (!-e $request_filename) {
        	rewrite ^(.*)$ /index.php?s=$1 last; break;
    	}
    }
    </pre>

    ##### Apache:
    <pre><IfModule mod_rewrite.c>
    Options +FollowSymlinks -Multiviews
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ index.php?s=$1 [QSA,PT,L]
    </IfModule>

    </pre>

4. 访问首页，未安装自动跳转至安装页面，根据页面提示安装即可。

## 安装环境：
建议PHP版本:**PHP7.2**

##### 下面的宝塔默认会自动安装

数据库驱动:MySQLi

网络通信库:cURL

查看是否安装：软件商店-打开相对应PHP-phpinfo

里面如果对应的显示**Yes**就是安装开启了

## 程序特性：

 - Layui框架
 - 支持七牛云、又拍云上传
 - 直接拖动图片上传
 - 多用户单独管理
 - 用户中心图片流加载

## 原程序（不再维护）：

 - 项目：兰空图床
 - 作者：WispX
 - 源项目：https://gitee.com/wispx/lsky

## 反馈建议：

你可以直接提交lssues来说明你的问题。
