<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<head>
    <link rel="stylesheet" href="http://localhost/fonts/Font%20Awesome/Font%20Awesome.css"/>
    <link rel="stylesheet" href="http://localhost/fonts.css" type="text/css" >
    <link rel="stylesheet" href="http://localhost/style.css" type="text/css" />
</head>
<body>

<?php
    if($dbc = @mysqli_connect('localhost','root','root')) {

        print "<p class='成功' >登陆<code class='代码'>MySQL</code>服务器成功</p>";
        // print "登陆数据库成功<pre>"; print_r($dbc); print "</pre>";

        # 尝试创建数据库
        $MY_DB = "WEB数据库";       // 要创建的数据库名字
        # 尝试执行创建的操作
        if( @mysqli_query( $dbc , "CREATE DATABASE $MY_DB") ){
            print "<p class='成功' >已创建<code class='代码'> $MY_DB </code>数据库</p>";
        }else{
            print "<p class='失败' >创建数据库时失败：<code class='代码'>" . mysqli_error($dbc) . "</code></p>";
        }

        # 选择数据库
        # 尝试执行选择数据库
        if( @mysqli_select_db($dbc, $MY_DB) ){
            print "<p class='成功' >已选择<code class='代码'> $MY_DB </code>数据库</p>";
        }else{
            print "<p class='失败'>选择数据库时失败：<code class='代码'>" . mysqli_error($dbc) . "</code></p>";
            return FALSE;
        }

        # 尝试执行创建数据表
        // $SQL_Command = "    
        //     CREATE TABLE `账号信息表` (
        //         `昵称` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
        //         `邮箱` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
        //         `手机号` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
        //         `密码` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'root',
        //         `姓名` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
        //         `地址` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        //         `注册数据时间` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        //         PRIMARY KEY (`昵称`,`邮箱`,`手机号`) USING BTREE
        //     ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        //     ";
        // if( @mysqli_query($dbc, $SQL_Command) ) {
        //     print "<p class='成功'>已创建表</p>";
        // }else{
        //     print "<p class='失败'>创建表时失败：" . mysqli_error($dbc) . "</p>";
        // }

    }else{
        # 无法连接数据库的操作
        print "<p class='失败'> 错误信息：<code class='代码'>".  mysqli_connect_error() . "</code></p>";
        return FALSE;
    }
?>




</body>
<html>