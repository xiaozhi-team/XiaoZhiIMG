## XiaoZhiIMG

改于兰空图床


### 安装教程：
***


1. 下载，上传至web运行环境，解压。
2. 设置运行目录为 public。
3. 配置Rewrite规则：
    ##### Nginx：
    <pre>
    location / {
        if (!-e $request_filename) {
        	rewrite ^(.*)$ /index.php?s=$1 last; break;
    	}
    }
    </pre>

    ##### Apache:
    Apache直接使用.htaccess即可

4. 访问首页，未安装自动跳转至安装页面，根据页面提示安装即可。

## 程序特性

 - 仿SM.MS图床上传路径

 - 最新Layui框架

 - 仿SM.MS图床首页

 - 支持七牛云、又拍云上传

 - 直接拖动图片上传

 - 多用户单独管理

 - 用户中心图片流加载

## 原程序（不维护了）

 - 项目：兰空图床
 - 作者：WispX
 - 作者博客：https://www.wispx.cn/
 - 源项目：https://gitee.com/wispx/lsky

## 反馈建议

你可以直接提交lssues来说明你的问题。
