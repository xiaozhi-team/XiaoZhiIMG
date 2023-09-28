<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$

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

if (is_file($_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    if (!isset($_SERVER['PATH_INFO'])) {
        $_SERVER['PATH_INFO'] = $_SERVER['REQUEST_URI'];
    }
    require __DIR__ . "/index.php";
}
