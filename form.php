<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>我要学PHP</title>
    <!-- 网页头部区 -->
    <head>
        <!-- CSS样式区 -->
        <style>

        </style>
        <!-- JS代码区 -->
        <script>
            
        </script>
    </head>

    <!-- 网页主体区 -->
    <body>
        <?php
            // 设置显示错误
            ini_set('display_errors', 1);
            error_reporting(E_ALL | E_STRICT);
            
    
            if( isset($_GET["cb"]) && is_array($_GET["cb"]))
            {
                print "这是个数组";
                print  $_GET['cb'] ;
            }

        ?>
    </body>
</html>