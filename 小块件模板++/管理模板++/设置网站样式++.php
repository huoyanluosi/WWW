<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>样式设置区</title>
    
    <!-- PHP代码区开始区 -->
        <?php
                // 添加样式cookie
                if( isset($_GET['bg_color']) ){
                    setcookie( "font_size", $_GET['font_size'], time()+3600, '/', "localhost" ,1);
                }
                if( isset($_GET['font_size'])) {
                    setcookie( "font_color", $_GET['font_color'], time()+3600, '/', "localhost" ,1);
                }
                if( isset($_GET['bg_color']) ){
                    setcookie( "bg_color", $_GET['bg_color'], time()+3600, '/', "localhost" ,1);
                }
                $_GET = array();    // 之后没用$_GET了，故清空它
        ?>
    <!-- PHP代码结束区 -->

    <head>
        <style>
            /* 表单的格式 */
            form span{
                display: inline-block;
                min-width: 260px;
                color: floralwhite;
            }
            input.text,textarea.text{
                min-width: 400px;
                padding: 10px 0px;
                margin: 10px;
            }
            input[type="submit"]{
                width: 150px;
                border-radius: 20px;
                padding: 5px 0px;
            }
            /* 表格容器的样式 */
            .my_form {
                max-width: 1000px;
                border: 3px solid blue;
                text-align: center;
                font-size: 1.5em;
                margin: auto; padding: 20px 0;
                background-color: red;
            }
            /* 页面主体的样式 */
            body {
                /* 从cookie中获取样式 */
                font-size: <?php 
                    if( isset($_COOKIE['font_size']) ){
                        print $_COOKIE['font_size'] . ";";
                    }else{print "1em;";}
                ?>
                color: <?php 
                    if( isset($_COOKIE['font_color']) ){
                        print $_COOKIE['font_color'] . ";";
                    }else{print ";";}
                ?>
                background-color: <?php 
                    if( isset($_COOKIE['bg_color']) ){
                        print $_COOKIE['bg_color'] . ";";
                    }else{print "white;";}
                ?>
            }
        </style>
    </head>

    <body>
        <h1>选择适合你的风格</h1>
        
        <!-- 表单代码开始区 -->
            <div class="my_form" action="./my_form" method="get">
                <form>
                    <!-- 拿cookie里的值作为表单元素的默认值 -->
                    <span>设置你的页面背景颜色：</span> <input type="color" name="bg_color" value='<?php
                    if( isset($_COOKIE['bg_color']) ){
                        print $_COOKIE['bg_color'] ;
                    }
                    ?>' class="text"> <br/>  
                    <!-- 拿cookie里的值作为表单元素的默认值 -->
                    <span>设置你的页面字体颜色：</span> <input type="color" name="font_color" value='<?php
                    if( isset($_COOKIE['font_color']) ){
                        print $_COOKIE['font_color'] ;
                    }
                    ?>' class="text"> <br/>
                    <!-- 拿cookie里的值作为表单元素的默认值 -->       
                    <span>设置你的页面大小颜色：</span> <input type="text" name="font_size" value='<?php
                    if( isset($_COOKIE['font_size']) ){
                        print $_COOKIE['font_size'] ;
                    }
                    ?>' class="text"> <br/>
                    <!-- 添加确认按钮标签          -->
                    <input type="submit" value="确认" />
                </form>
            </div>
        <!-- 表单代码结束区 -->
                    
    </body>

</html>