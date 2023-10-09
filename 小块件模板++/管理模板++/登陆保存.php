<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <head>
        <script>
            // 自动返回首页
            function ResultHomePage(){
                    var T5 = 5;
                    function abc(){
                        var wait =document.getElementById('wait');
                        wait.innerHTML = T5;
                    }
                    var timer = setInterval(() => {
                        abc(); T5--;
                        if (T5 <= 0) {
                            clearInterval(timer);
                            window.location.href = 'http://localhost/';
                        }
                    }, 1000)
            }
            // // 更改用户的头像(需要到数据库读取头像的base64码)
            // function change_user_face_image{
            //     let user_face_image =document.getElementById('user_face_image');
            //     user_face_image.src = 
            // }
        </script>
    </head>
    <body onload="ResultHomePage()">
        <?php


                # 客户端提交信息时
                if($_SERVER['REQUEST_METHOD'] == 'GET'){
                    if(!empty($_GET['UserEmail']) & !empty($_GET['UserPassword'])) {
                        # 给浏览器添加COOKIE，带有COOKIE时不退出账号。
                        setcookie('UserEmail', $_GET['UserEmail'], time()+3600, '/', 'localhost', 1);
                        setcookie('UserPassword', $_GET['UserPassword'], time()+3600, '/', 'localhost', 1);

                        print '<p >你的账号已经登陆成功，<span id="wait" ></span>秒后自动回到首页，若没有自动跳转到首页，请点击这里<a href="http://localhost/">跳转</a> </p>';
                        
                    }else{
                        print '出现未知错误，请点击这里<a href="http://localhost/">跳转到首页</a>';
                    }
                }
        ?>
    
    </body>
</html>