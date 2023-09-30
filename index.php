<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>我要学PHP</title>
    
    <!-- PHP代码区开始区 -->
    <?php
        ob_start();
    ?>
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
                max-width: 1000px;
                margin-left: auto;
                margin-right: auto;
            }
            ._body::after {
                clear: both;
                content: "";
                display: block;
            }
        </style>
    </head>

    <body>
        <div class="_body">
            <!-- 表单代码开始区 -->
                <?php
                    include("./小块件模板++/顶导航栏.html");
                    include("./小块件模板++/左导航栏.html");
                    include("./小块件模板++/目录树.html");
                    include("./小块件模板++/右导航栏.html");
                    include('./小块件模板++/管理模板++/设置网站样式++.php');
                ?>
            <!-- 表单代码结束区 -->
        </div>
        <div>
                <?php
                    include("./小块件模板++/页脚.html");
                ?>
        </div>
        <!-- <button onclick="">你哈</button> -->

        <script>
            // 获取内容的高度，将其作为左右栏的高度
            adjustSize();
            function adjustSize(){
                var _content_ = document.getElementById('_content_');
                const _left_bar_height = window.getComputedStyle(_content_).height;
                var _left_bar_ = document.getElementById('_left_bar_');
                var _right_bar_ = document.getElementById('_right_bar_');
                
                // alert(_left_bar_height);
                _left_bar_.style.height = _left_bar_height;
                _right_bar_.style.height = _left_bar_height;
            }
            // 在窗口调整大小时执行的函数
            window.onresize = function(){
                adjustSize();
            }
        </script>
        
    </body>

</html>