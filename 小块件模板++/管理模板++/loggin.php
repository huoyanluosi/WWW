<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <body>
        <?php
            
        ?>
        <!-- <form  action="./小块件模板++/管理模板++/登陆保存.php" method="get">
            <span class="close_loggin_window" onclick="loggin_window_close()" />❌</span>
            <p> <span>输入你的邮箱：</span> <input type="email" name="UserEmail" /> </p></br>
            <p> <span>输入你的邮箱的密码：</span> <input type="password" name="UserPassword" '/> </p>
            <p class="logging_submit"> <input type="submit" name="logging_submit" value="注销" onclick="return login_tip_check()" />
            <input type="submit" name="logging_submit" value="登陆" onclick="return login_tip_check()" /> </p>
            <p id="login_tip"></p>
            <p> <a href='./小块件模板++/忘记密码.php' style="color:white; bottom:0; right:0; margin: 5%;position: absolute;">忘记密码? </a> </p>
            <p> <a href='./小块件模板++/管理模板++/register.php' style="color:white; bottom:0; left:0; margin: 5%;position: absolute;">注册? </a> </p>
        </form> -->

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