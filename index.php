<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>我要学PHP</title>
    
    <!-- PHP代码区开始区 -->

    <!-- PHP代码结束区 -->

    <head>
        <!-- 引用主体CSS -->
        <link href="./fonts.css" rel="stylesheet" type="text/css" />
        <style>
            /* 默认样式 */
            * {
                box-sizing: border-box;
                padding: 0;
                margin: 0;
            }
            /* 页面主体内容样式 */
            body {
                width: 1000px;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>

    <body>
        <!-- 表单代码开始区 -->
            <?php
                include("./小块件模板++/顶导航栏.html");
                // include("./小块件模板++/左导航栏.html");
                // include("./小块件模板++/目录树.html");
                include("./小块件模板++/右导航栏.html");
                include("./小块件模板++/页脚.html");
            ?>
        <!-- 表单代码结束区 -->

        <!-- <h2>你好, WORLD</h2>
        <h2>你好, WORLD</h2>
        <h2>你好, WORLD</h2>
        <h2>你好, WORLD</h2>
        <P>Hello, 小度</P>
        <P>Hello, 小度</P>
        <P>Hello, 小度</P>
        <P>Hello, 小度</P> -->
    </body>

</html>