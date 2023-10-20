<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <head>
        <!-- 引用主体CSS -->
        <link rel="stylesheet" href="http://localhost/fonts/Font%20Awesome/Font%20Awesome.css"/>
        <link rel="stylesheet" href="http://localhost/fonts.css" type="text/css" >
        <link rel="stylesheet" href="http://localhost/style.css" type="text/css" />
        <style>
            /* body {
                background: url('http://192.168.10.6/图片文件夹++/蔚蓝海洋.png') no-repeat;
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
            } */



            /* 网格布局 */
            .reg_background {
                /* background: url('http://192.168.10.6/图片文件夹++/蔚蓝海洋.png') no-repeat;
                background-size: cover;
                display: flex;
                width: 100%; */
            }

        </style>
        
        <!-- # 这个是使用本地文件保持账号信息的（现在不用它，而使用的是数据库） -->
        <!-- <?php
                // # 存储用户信息
                // $users_info_div = "../users/";      // 基址
                // $users_info = "users.txt";      // 账号和密码文件
                // $file_path = $users_info_div . $users_info;     // 账号和密码文件的路径
                // if(!is_dir($users_info_div) AND !is_file($users_info_div) ) {mkdir($users_info_div); print "创建目录完成";}       // 创建用户账号数据的父目录
                // if(!is_dir($file_path) AND !is_file($file_path) ) {touch($file_path); print "创建文件完成";}       // 在父目录下创建用户账号信息文件

                // if($_SERVER['REQUEST_METHOD'] == 'GET'){
                //     if( !empty($_GET["USER"]) AND !empty($_GET["PASSWD1"]) AND !empty($_GET["PASSWD2"]) AND ($_GET["PASSWD1"]==$_GET["PASSWD2"]) ) {
                //         # 创建用户家目录（目录名为账户名）
                //         $userhome = $_GET['USER'];     // 家目录名
                //         $user_path = $users_info_div . $userhome;       // 家目录路径
                //         if(!is_dir($user_path) AND !is_file($user_path) ) {mkdir($user_path); print "已创建用户家目录";}       // 若该路径不存在时创建用户家目录
                //         $user_data =  $_GET['USER'] . "/t/t"  . md5(trim($_GET['PASSWD1'])) . "/t/t" .$userhome . PHP_EOL;
                //         # 若用户已存在，则不需要写入文件了（因为用户名和用户家目录一样，且密码又是使用md5加密的，故使用strstr()函数判断用户存在与否就可以了）
                //         # 存在一些缺陷，字符串包含的问题。
                //         if( !strstr(file_get_contents($file_path), $_GET['USER']) ){
                //             file_put_contents($file_path, $user_data, FILE_APPEND | LOCK_EX );      // 写入信息
                //         }else {print "<p style='left:0; right:0; text-align:center; color:white; position:absolute; animation:mymove 3s; animation-timing-function:ease-in-out;'> !警告 你输入的账号已存在</p>";}
                //     }
                // }
        ?> -->
        <?php
                // print '<pre>'; print_r(scandir('../../../WWW/小块件模板++/管理模板++/将账号密码保持在数据库中.php')); print '</pre>';
                // include('../../../WWW/小块件模板++/管理模板++/将账号密码保持在数据库中.php');
        ?>
    </head>

    <body>
        <?php
            // 设置显示错误
            ini_set('display_errors', 1);
            error_reporting(E_ALL | E_STRICT);
        ?>


        <?php include(__DIR__."/../LOGO.html"); ?>
        <div class="">
                <!-- 顶导航栏 -->
                <?php include(__DIR__."/../顶导航栏.html") ?>
        </div>

        <div id="register_interface" class="PasswordForm">
            <!-- <div id="移动"> -->
                <iframe name="注册框架" width="600" height="600" frameborder="0" style="position: absolute; transform: translateX(30px);" scrolling="no" >  </iframe>
                <form action='http://localhost/%E5%B0%8F%E5%9D%97%E4%BB%B6%E6%A8%A1%E6%9D%BF++/%E7%AE%A1%E7%90%86%E6%A8%A1%E6%9D%BF++/%E5%B0%86%E8%B4%A6%E5%8F%B7%E5%AF%86%E7%A0%81%E4%BF%9D%E6%8C%81%E5%9C%A8%E6%95%B0%E6%8D%AE%E5%BA%93%E4%B8%AD.php' method="post" name="猫注册" target="注册框架" >
                    <p> <span class="左">输入你的名字：</span> <input type='text' name='NAME' class="右"/> </p>
                    <p> <span class="左">输入你的地址：</span> <input type='text' name='ADDRESS' class="右"/> </p>
                    <p> <span class="左">输入你想要账号的昵称：</span> <input type='text' name='USER' class="右"/> </p>
                    <p> <span class="左">输入你想要使用的密码：</span> <input type='text' name='PASSWD1' class="右"/> </p>
                    <p> <span class="左">重复输入你想要使用的密码：</span> <input type='text' name='PASSWD2' class="右"/> </p>
                    <div>
                        <span class="icon-31" data-id="1" style="font-size:120px; margin:20px 60px 0 60px; font-weight:900;" onclick="点击猫(this)" ></span>
                        <span class="icon-31" data-id="2" style="font-size:120px; margin:20px 60px 0 30px; font-weight:900;" onclick="点击猫(this)" ></span>
                        <span class="icon-31" data-id="3" style="font-size:120px; margin:20px 60px 0 30px; font-weight:900;" onclick="点击猫(this)" ></span>
                        <span class="icon-31" data-id="4" style="font-size:120px; margin:20px 60px 0 30px; font-weight:900;" onclick="点击猫(this)" ></span>
                    </div>
                </form>
            <!-- </div> -->
        </div>

        <script>
            // # 因为若要完美的居中，需要很好的设置span的宽度，太过麻烦。所有以下代码的功能是将span的宽度设置为所有span中宽度最大的值
            var 左 =document.getElementsByClassName('左');
            var 右 =document.getElementsByClassName('右');
            var n1 = 左.length;     var n2 = 右.length;
            // console.log(n1, n2);
            if( n1==n2 ) {
                var max_span = 0;
                for(let i=0; i<n1; i++) {
                    块 = 左[i].scrollWidth;
                    if(块>max_span) { max_span=块; }
                }
                // 设置所有的span为其类最大宽度
                // console.log(max_span);
                for(let i=0; i<n1; i++) {
                    左[i].style.width = max_span+"px";
                }
            }
            // #设计点击猫的次数
            window.点击猫次数=0;
            window.点击猫映射 = new Map();
            function 点击猫(obj=null,重置=false) {
                console.log('点击猫次数'+window.点击猫次数);
                console.log('重置'+重置);
                if(重置==true ) {
                    // console.log('重置'+重置);
                    for(let [key,val] of window.点击猫映射) {
                        val.style.transition="color 2s";
                        setTimeout(function()
                        {
                            val.style.color='white'; 
                            setTimeout(function() {
                                val.style.transition='color 0s';
                                window.点击猫次数--;
                                window.点击猫映射.delete(key)
                            }, 2000);
  
                        }, 1000);
                    }
                    return;
                }
                window.点击猫映射.set(obj.getAttribute("data-id"), obj);
                console.log(obj.getAttribute("data-id"));
                console.log(window.点击猫映射);
                if(obj.style.color == 'red') {
                    obj.style.color = 'white';
                    window.点击猫次数--;
                }else{
                    obj.style.color = 'red';
                    window.点击猫次数++;
                }
                if(window.点击猫次数==4 ) {
                    document.猫注册.submit();
                    点击猫(null, 重置=true);
                }
            }

        </script>

    </body>
</html>