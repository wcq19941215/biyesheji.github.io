<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0051)http://www.thinkcmfx.com/index.php/Admin/Main/index -->
<html>
<head>

<link href="/Public/admin/css/theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="/Public/admin/css/simplebootadminindex.min.css">
<link href="/Public/admin/css/simplebootadmin.css" rel="stylesheet">


<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
<![endif]-->

<!-- 公共 -->
<link href="/Public/common/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--     <link href="./index_files/theme.min.css" rel="stylesheet">
    <link href="./index_files/simplebootadmin.css" rel="stylesheet">
    <link href="./index_files/default.css" rel="stylesheet">
    <link href="./index_files/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <style>
        form .input-order {
            margin-bottom: 0px;
            padding: 3px;
            width: 40px;
        }

        .table-actions {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 0px;
        }

        .table-list {
            margin-bottom: 0px;
        }
    </style>
    <!--[if IE 7]>
    <link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
    <![endif]-->
    <script type="text/javascript">
        //全局变量
        var GV = {
            ROOT: "/",
            WEB_ROOT: "/",
            JS_ROOT: "public/js/",
            APP: 'Admin'/*当前应用名*/
        };
    </script>
    <script src="/Public/admin/js/load.js"></script>
<!-- 公共 -->
<script src="/Public/common/js/jquery-1.8.3.min.js"></script>
<script src="/Public/common/js/bootstrap.min.js"></script>



    <script>
        $(function () {
            $("[data-toggle='tooltip']").tooltip();
        });
    </script>
    <style>
        #think_page_trace_open {
            z-index: 9999;
        }
    </style>
    <style>
        .home_info li em,span {
            /*float: left;*/
            width: 33%;
            display: inline-block;
            font-style: normal;
        }


        li {
            display: block;
            list-style: none;
        }
    </style>
</head>
<body>
<div class="wrap">
    <!-- <div id="home_toptip"></div> -->
    <!-- <h4 class="well">系统通知</h4> -->

    <!-- <div class="home_info">
        <ul id="thinkcmf_notices">
            <li><em class="title">QQ讨论</em><span class="content">群搜索"ThinkCMF"关键字 --><!--官方QQ群② <a>316669417</a> 技术交流群：<a>242015857</a>--><!-- </span>
            </li>
        </ul>
    </div> -->
    <h4 class="well">系统信息</h4>

    <div class="home_info">
        <ul>
            <!-- <li><em>操作系统</em> <span>WINNT</span></li>
            <li><em>运行环境</em> <span>Apache/2.4.10 (Win32) OpenSSL/1.0.1i mod_fcgid/2.3.9</span></li>
            <li><em>PHP版本</em> <span>5.5.17</span></li>
            <li><em>PHP运行方式</em> <span>cgi-fcgi</span></li>
            <li><em>MYSQL版本</em> <span>5.5.40</span></li>
            <li><em>程序版本</em> <span>X2.2.1&nbsp;&nbsp;&nbsp; [<a href="http://www.thinkcmf.com/" target="_blank">ThinkCMF</a>]</span>
            </li>
            <li><em>上传附件限制</em> <span>2M</span></li>
            <li><em>执行时间限制</em> <span>30s</span></li>
            <li><em>剩余空间</em> <span></span></li> -->

            <li><em>PHP_VERSION</em> <span>php版本</span> <span><?php echo PHP_VERSION ?></span></li>

            <li><em>SYSTEMROOT</em> <span>系统启动文件夹</span> <span><?php echo ($server['SYSTEMROOT']); ?></span></li>

            <li><em>COMSPEC</em> <span>命令解释器全路径名</span> <span><?php echo ($server['COMSPEC']); ?></span></li>

            <li><em>WINDIR</em> <span>系统安装目录</span> <span><?php echo ($server['WINDIR']); ?></span></li>
            <li><em>PHP_FCGI_MAX_REQUESTS</em> <span>PHP FCGI MAX请求</span> <span><?php echo ($server['PHP_FCGI_MAX_REQUESTS']); ?></span></li>
            <li><em>PHPRC</em> <span>php启动目录</span> <span><?php echo ($server['PHPRC']); ?></span></li>
            <li><em>_FCGI_SHUTDOWN_EVENT_</em> <span></span> <span><?php echo ($server['_FCGI_SHUTDOWN_EVENT_']); ?></span></li>

            <li><em>SCRIPT_NAME</em> <span>相对于网站根目录的路径及 PHP 程序文件名称</span> <span><?php echo ($server['SCRIPT_NAME']); ?></span></li>

            <li><em>REQUEST_URI</em> <span>访问此页面所需的 URI </span> <span><?php echo ($server['REQUEST_URI']); ?></span></li>

            <li><em>QUERY_STRING</em> <span>当前文件位置</span> <span><?php echo ($server['QUERY_STRING']); ?></span></li>
            <li><em>REQUEST_METHOD</em> <span>请求方式</span> <span><?php echo ($server['REQUEST_METHOD']); ?></span></li>

            <li><em>SERVER_PROTOCOL</em> <span>通信协议</span> <span><?php echo ($server['SERVER_PROTOCOL']); ?></span></li>

            <li><em>GATEWAY_INTERFACE</em> <span>服务器使用的 CGI 规范的版本</span> <span><?php echo ($server['GATEWAY_INTERFACE']); ?></span></li>

            <li><em>REDIRECT_URL</em> <span></span> <span><?php echo ($server['REDIRECT_URL']); ?></span></li>
            <li><em>REDIRECT_QUERY_STRING</em> <span></span> <span><?php echo ($server['REDIRECT_QUERY_STRING']); ?></span></li>

            <li><em>REMOTE_PORT</em> <span>用户连接到服务器时所使用的端口</span> <span><?php echo ($server['REMOTE_PORT']); ?></span></li>

            <li><em>SCRIPT_FILENAME</em> <span>当前执行脚本的绝对路径名</span> <span><?php echo ($server['SCRIPT_FILENAME']); ?></span></li>

            <li><em>SERVER_ADMIN</em> <span>管理员信息</span> <span><?php echo ($server['SERVER_ADMIN']); ?></span></li>

            <li><em>CONTEXT_DOCUMENT_ROOT</em> <span>当前运行脚本所在的文档根目录</span> <span><?php echo ($server['CONTEXT_DOCUMENT_ROOT']); ?></span></li>

            <li><em>CONTEXT_PREFIX</em> <span></span> <span><?php echo ($server['CONTEXT_PREFIX']); ?></span></li>

            <li><em>REQUEST_SCHEME</em> <span></span> <span><?php echo ($server['REQUEST_SCHEME']); ?></span></li>

            <li><em>DOCUMENT_ROOT</em> <span>当前运行脚本所在的文档根目录</span> <span><?php echo ($server['DOCUMENT_ROOT']); ?></span></li>

            <li><em>REMOTE_ADDR</em> <span>正在浏览当前页面用户的 IP 地址</span> <span><?php echo ($server['REMOTE_ADDR']); ?></span></li>
            <li><em>SERVER_PORT</em> <span>服务器所使用的端口</span> <span><?php echo ($server['SERVER_PORT']); ?></span></li>
            <li><em>SERVER_ADDR</em> <span>服务器IP</span> <span><?php echo ($server['SERVER_ADDR']); ?></span></li>
            <li><em>SERVER_NAME</em> <span>当前运行脚本所在服务器主机的名称</span> <span><?php echo ($server['SERVER_NAME']); ?></span></li>

            <li><em>SERVER_SOFTWARE</em> <span>服务器标识的字串</span> <span><?php echo ($server['SERVER_SOFTWARE']); ?></span></li>

            <li><em>SERVER_SIGNATURE</em> <span>包含服务器版本和虚拟主机名的字符串</span> <span><?php echo ($server['SERVER_SIGNATURE']); ?></span></li>
            <li><em>SystemRoot</em> <span></span> <span><?php echo ($server['SystemRoot']); ?></span></li>
            <li><em>HTTP_COOKIE</em> <span></span> <span><?php echo ($server['HTTP_COOKIE']); ?></span></li>
            <li><em>HTTP_ACCEPT_LANGUAGE</em> <span>当前请求的 Accept-Language: 头部的内容</span> <span><?php echo ($server['HTTP_ACCEPT_LANGUAGE']); ?></span></li>

            <li><em>HTTP_ACCEPT_ENCODING</em> <span>当前请求的 Accept-Encoding: 头部的内容</span> <span><?php echo ($server['HTTP_ACCEPT_ENCODING']); ?></span></li>

            <li><em>HTTP_REFERER</em> <span>链接到当前页面的前一页面的 URL 地址</span> <span><?php echo ($server['HTTP_REFERER']); ?></span></li>

            <li><em>HTTP_ACCERT</em> <span>当前请求的 Accept: 头部的内容</span> <span><?php echo ($server['HTTP_ACCERT']); ?></span></li>

            <li><em>HTTP_USER_AGENT</em> <span>当前请求的 User_Agent</span> <span><?php echo ($server['HTTP_USER_AGENT']); ?></span></li>

            <li><em>HTTP_UPGRADE_INSECURE_REQUESTS</em> <span></span> <span><?php echo ($server['HTTP_UPGRADE_INSECURE_REQUESTS']); ?></span></li>

            <li><em>HTTP_CONNECTION</em> <span>当前请求的 Connection</span> <span><?php echo ($server['HTTP_CONNECTION']); ?></span></li>

            <li><em>HTTP_HOST</em> <span>当前请求的 Host</span> <span><?php echo ($server['HTTP_HOST']); ?></span></li>

            <li><em>REDIRECT_STATUS</em> <span></span> <span><?php echo ($server['REDIRECT_STATUS']); ?></span></li>

            <li><em>FCGI_ROLE</em> <span></span> <span><?php echo ($server['FCGI_ROLE']); ?></span></li>

            <li><em>PHP_SELF</em> <span>相对于网站根目录的路径及 PHP 程序名称</span> <span><?php echo ($server['PHP_SELF']); ?></span></li>

            <li><em>REQUEST_TIME_FLOAT</em> <span>浮点型时间戳</span> <span><?php echo ($server['REQUEST_TIME_FLOAT']); ?></span></li>
            <li><em>REQUEST_TIME</em> <span>时间戳</span> <span><?php echo ($server['REQUEST_TIME']); ?></span></li>
            <li><em>PATH_INFO</em> <span></span> <span><?php echo ($server['PATH_INFO']); ?></span></li>

        </ul>
    </div>
    <!-- <h4 class="well">发起团队</h4> -->

    <!-- <div class="home_info" id="home_devteam">
        <ul>
            <li><em>ThinkCMF</em> <a href="http://www.thinkcmf.com/" target="_blank">www.thinkcmf.com</a></li>
            <li><em>核心开发者</em> <span>老猫,Sam,Tuolaji,Codefans,睡不醒的猪,小夏,Powerless</span></li>
            <li><em>团队成员</em> <span>老猫,Sam,Tuolaji,Smile,Codefans,睡不醒的猪,Jack,日本那只猫</span></li>
            <li><em>联系邮箱</em> <span>cmf@simplewind.net</span></li>
        </ul>
    </div> -->
    <!-- <h4 class="well">贡献者</h4> -->

    <!-- <div class="">
        <ul class="inline" style="margin-left: 25px;">
            <li>Kin Ho</li>
            <li><a href="http://wzx.thinkcmf.com/" target="_blank">Powerless</a></li>
            <li>Jess</li>
            <li>木兰情</li>
            <li><a href="http://www.91freeweb.com/" target="_blank">Labulaka</a></li>
            <li><a href="http://www.syousoft.com/" target="_blank">WelKinVan</a></li>
            <li><a href="http://blog.sina.com.cn/u/1918098881" target="_blank">Jeson</a></li>
            <li>Yim</li>
            <li><a href="http://www.jamlee.cn/" target="_blank">Jamlee</a></li>
            <li><a>香香咸蛋黄</a></li>
            <li><a>小夏</a></li>
            <li><a href="http://www.xdmeng.com/" target="_blank">小凯</a></li>
            <li><a href="https://www.devmsg.com/" target="_blank">Co</a></li>
            <li><a href="http://www.rainfer.cn/" target="_blank">Rainfer</a></li>
        </ul>
    </div> -->
</div>
</body>
</html>