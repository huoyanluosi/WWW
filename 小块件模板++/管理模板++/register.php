<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>我要学PHP</title>
    <!-- 网页头部区 -->
    <head>
        <!-- CSS样式区 -->
        <style>
            body {
                background: url('http://localhost/图片文件夹++/蔚蓝海洋.png') no-repeat;
                background-size: cover;
                box-sizing: border-box;
            }
            #PasswordForm {
                width: fit-content; height: fit-content;
                left: 0;right:0; top:0; bottom: 0;
                margin: auto;
                position: absolute;
                text-align: center;
                color:white; 
            }
            #PasswordForm span{
                width: 220px;
                display: inline-block;
                text-align: right;
            }
            #PasswordForm input[type = "text"] {
                color: snow; font-size: 1em;
                width: 300px;
                padding: 5px;
                background: transparent; border-top:transparent; border-left:transparent; border-right:transparent;
            }
            @keyframes mymove
            {
                0% {top: -200px;}
                25% {top: -150px;}
                50% {top: -100px;}
                75% {top: -50px;}
                100% {top: -0px;}
            }
            #PasswordForm .logging_submit input{
                width: 100%;
                padding: 10px;
                box-shadow: 2px 2px 10px 10px greenyellow;
            }

        </style>
        
        <!-- # 这个是使用本地文件保持账号信息的（现在不用它，而使用的是数据库） -->
        <!-- <?php
                # 存储用户信息
                $users_info_div = "../users/";      // 基址
                $users_info = "users.txt";      // 账号和密码文件
                $file_path = $users_info_div . $users_info;     // 账号和密码文件的路径
                if(!is_dir($users_info_div) AND !is_file($users_info_div) ) {mkdir($users_info_div); print "创建目录完成";}       // 创建用户账号数据的父目录
                if(!is_dir($file_path) AND !is_file($file_path) ) {touch($file_path); print "创建文件完成";}       // 在父目录下创建用户账号信息文件

                if($_SERVER['REQUEST_METHOD'] == 'GET'){
                    if( !empty($_GET["USER"]) AND !empty($_GET["PASSWD1"]) AND !empty($_GET["PASSWD2"]) AND ($_GET["PASSWD1"]==$_GET["PASSWD2"]) ) {
                        # 创建用户家目录（目录名为账户名）
                        $userhome = $_GET['USER'];     // 家目录名
                        $user_path = $users_info_div . $userhome;       // 家目录路径
                        if(!is_dir($user_path) AND !is_file($user_path) ) {mkdir($user_path); print "已创建用户家目录";}       // 若该路径不存在时创建用户家目录
                        $user_data =  $_GET['USER'] . "\t\t"  . md5(trim($_GET['PASSWD1'])) . "\t\t" .$userhome . PHP_EOL;
                        # 若用户已存在，则不需要写入文件了（因为用户名和用户家目录一样，且密码又是使用md5加密的，故使用strstr()函数判断用户存在与否就可以了）
                        # 存在一些缺陷，字符串包含的问题。
                        if( !strstr(file_get_contents($file_path), $_GET['USER']) ){
                            file_put_contents($file_path, $user_data, FILE_APPEND | LOCK_EX );      // 写入信息
                        }else {print "<p style='left:0; right:0; text-align:center; color:white; position:absolute; animation:mymove 3s; animation-timing-function:ease-in-out;'> !警告 你输入的账号已存在</p>";}
                    }
                }
        ?> -->

    </head>

    <!-- 网页主体区 -->
    <body>
        <form id="PasswordForm" action="http://localhost/小块件模板++/管理模板++/将账号密码保持在数据库中.php" method="get">
            <p> <span>输入你的名字：</span> <input type='text' name='NAME'/> </p>
            <p> <span>输入你的地址：</span> <input type='text' name='ADDRESS'/> </p>
            <p> <span>输入你想要注册的账号：</span> <input type='text' name='USER'/> </p>
            <p> <span>输入你想要使用的密码：</span> <input type='text' name='PASSWD1'/> </p>
            <p> <span>重复输入你想要使用的密码：</span> <input type='text' name='PASSWD2'/> </p>
            <p class="logging_submit"> <input type="submit" value="提交" /></p>
        </form>

    </body>
</html>