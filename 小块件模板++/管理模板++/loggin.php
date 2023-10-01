<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <head>
        <style>
            /* 登陆界面的样式 */
            #PasswordForm {
                width: 300px; height: 200px;
                background: url('../图片文件夹++/蔚蓝海洋.png') no-repeat;
                background-size: cover;
                display: none;
                left: 0;right:0; top:0; bottom: 0;
                margin: auto;
                flex-direction: column;
                justify-content: center;
                position: absolute;
                text-align: center;
                color:white; 
            }
            #PasswordForm span{
                display: inline-block;
                width: 160px;
            }
            #PasswordForm input[type='email']:checked{
                border: 10px solid red;
            }
            #PasswordForm .logging_submit input {
                /* padding: 10px; */
                padding: 3px;
                margin: 5px 20px;
            }
            /* 关闭登陆界面的按钮的样式 */
            #PasswordForm .close_loggin_window {
                width:30px; 
                right:0px; margin:10px; top:0; 
                position:absolute; 
            }
        </style>

    </head>

    <body>
        <?php
            
        ?>
        <form id="PasswordForm" action="./小块件模板++/管理模板++/登陆保存.php" method="get">
            <span class="close_loggin_window" onclick="loggin_window_close()" />❌</span>
            <p> <span>输入你的邮箱：</span> <input type="email" name="UserEmail" /> </p></br>
            <p> <span>输入你的邮箱的密码：</span> <input type="password" name="UserPassword" '/> </p>
            <p class="logging_submit"> <input type="submit" name="logging_submit" value="注销" onclick="return login_tip_check()" />
            <input type="submit" name="logging_submit" value="登陆" onclick="return login_tip_check()" /> </p>
            <p id="login_tip"></p>
            <p> <a href='./小块件模板++/忘记密码.php' style="color:white; bottom:0; right:0; margin: 10px;position: absolute;">忘记密码? </a> </p>
        </form>

        <script>
            function login_tip_check(){
                let login_tip =document.getElementById('login_tip');
                let user_mail = document.getElementsByName('UserEmail')[0].value;
                if(user_mail.search(/.+@[a-z]+\.[a-z]+/i) > -1) {
                    login_tip.innerHTML = '验证账号中';
                    return true;
                }else{
                    login_tip.innerHTML = '账号或密码为空';
                    return false;
                }
            }
        </script>
    </body>
</html>