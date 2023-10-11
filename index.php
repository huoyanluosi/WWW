<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <!-- 禁止放大 -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> -->
    
    <!-- PHP代码区开始区 -->
    <?php
        ob_start();
    ?>
    <!-- PHP代码结束区 -->

    <head>
        <!-- 引用主体CSS -->
        <link rel="stylesheet" href="http://localhost/fonts/Font%20Awesome/Font%20Awesome.css"/>
        <link rel="stylesheet" href="http://localhost/fonts.css" type="text/css" >
        <link rel="stylesheet" href="http://localhost/style.css" type="text/css" />
        <script src="http://localhost/小块件模板++/管理模板++/我的JS函数库.js"></script>
        <style>

            /* 用户偏好设置 */
                /* 从cookie中获取样式 */
            ._user_preferences_,body{
                font-size: <?php 
                    if( isset($_COOKIE['font_size']) ){
                        print $_COOKIE['font_size'] . ";";
                    }else{print ";";}
                ?>
                color: <?php 
                    if( isset($_COOKIE['font_color']) ){
                        print $_COOKIE['font_color'] . ";";
                    }else{print ";";}
                ?>
                background-color: <?php 
                    if( isset($_COOKIE['bg_color']) ){
                        print $_COOKIE['bg_color'] . ";";
                    }else{print ";";}
                ?>
            }


        </style>
    </head>

    <body>
        <?php
            include("G:/game/++/phpstudy_pro/WWW/小块件模板++/LOGO.html");
        ?>
        
        
        <div id="_body" style="width:auto; height:auto; background-color:#FFFFFF;">
                <?php include("./小块件模板++/顶导航栏.html"); ?>
                <div  style="background-color: #EFF3EF;">        <!-- 当有只有边栏时, 注意要加class="grid-container" -->
                        <!-- 登陆界面 -->
                        <?php include("G:/game/++/phpstudy_pro\WWW/小块件模板++/管理模板++/登陆窗口.php");  ?>
                        <!-- 左导航栏 -->
                        <?php //include("./小块件模板++/左导航栏.html"); ?>
                        <!-- 面包屑 -->
                        <?php // include("./小块件模板++/面包屑.html"); ?>
                        <!-- 正文 -->
                        <?php //include("./小块件模板++/正文.html"); ?>
                        <?php include("G:/game/++/phpstudy_pro/WWW/小块件模板++/轮播图窗口.html"); ?>
                        <!-- 右导航栏 -->
                        <? //include("./小块件模板++/右导航栏.html"); ?>
                </div>
                <!-- 页脚 -->
                    <?php include("./小块件模板++/页脚.html"); ?>

                <!-- <?php //include("./小块件模板++/管理模板++/登陆验证.php"); ?> -->
        </div>

        <script>
            // // 获取内容的高度，将其作为左右栏的高度
            // adjustSize();
            // function adjustSize(){

            //     var _body_height = document.getElementById('_body').scrollHeight;
            //     var _PasswordFormy = document.getElementById('PasswordForm');
            //     var _PasswordFormy_height_ =_PasswordFormy.style.height;
            //     _PasswordFormy_height_ = Number(String(_PasswordFormy_height_).match(/\d+/g));
            //     // console.log(_body_height +'.'+_PasswordFormy_height_ );
            //     var Move_Y = _body_height/2 - _PasswordFormy_height_/2;
            //     _PasswordFormy.style.transform = "translateY(" + Move_Y + "px)";
            //     // console.log(_PasswordFormy.style.transform);

            // }
            // // 在窗口调整大小时执行的函数
            // window.onresize = function(){
            //     adjustSize();
            // }
            // window.onload = function(){
            //     adjustSize();
            // }
            // 登陆界面
        </script>
        
    </body>

</html>