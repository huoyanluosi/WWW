<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <head>
        <link rel="stylesheet" href="http://localhost/fonts/Font%20Awesome/Font%20Awesome.css"/>
        <link rel="stylesheet" href="http://localhost/fonts.css" type="text/css" >
        <!-- <link rel="stylesheet" href="http://localhost/style.css" type="text/css" /> -->
        <style>
            /* 登陆表单（开始） */
                @keyframes 确认按钮 {       /* 将确认按钮设置为不显示 */
                    0% {
                        transform: scale(1);
                    }
                    100% {
                        transform: scale(0);
                    }
                }
                
                #login_window span, #login_window #确认, #login_window input[type="text"], #login_window input[type="password"], #login_window input[type="submit"] {     /* 所有字体的样式的大小 */
                    font-size: 28px;
                }
                #login_window input[type="submit"], #login_window #确认 { background-color: rgba(255, 255, 255, 0.5); }

                #login_window .close_loggin_window {    /* 右上角的关闭按钮 */
                    float:right;    /* 右上角定位 */
                    color:#FFFFFF; font-size:50px; font-weight:900;     /* 该按钮是一个字，故设置字体样式 */
                    margin:20px 60px 0 60px;        /* 按钮周围留空，保证不紧密 */
                }

                .PasswordForm input[type='email'], .PasswordForm input[type='password'],  .PasswordForm input[type='text'] {       /* 账号或密码的输入框的样式 */
                    width: 416px;   /* 设置输入框的宽度 */
                    /* background-color: transparent; */
                } 

                .PasswordForm .logging_submit input{        
                    color: #333333;
                    width: 376px; height: 50px;
                    text-align: center; padding: 0;
                }
                
                .第一 {
                    width: 908px; height: 100px;
                }
                .第一 {
                    text-align: center;
                    display: flex;
                    flex-direction: column;
                    justify-content:center;
                    /* background-color: rgba(255, 255, 255, 0.3); */
                }
                .第一 .䃼充 {
                    width: 752px; height: 50px;
                    margin: auto;
                    text-align: center;
                    /* background-color: rgba(0, 255, 255, 1); */
                }
                .第一 .䃼充 .第二 {
                    width: inherit;height:inherit;
                    /* 将本块区设置为"垂直居中"（开始） */
                    display: flex;
                    flex-direction: column;
                    justify-content:center;
                    /* margin: auto; */
                    /* background-color: rgba(47, 0, 255, 1); */
                    /* 将本块区设置为"垂直居中"（开始） */
                }
                .第一 .䃼充 .第二 .第三 {       /* 本标签要包含2个绝对位置的元素，为了解决位置问题而设置；为2个绝对位置的子标签全居中 */
                    width: inherit;height:auto;
                    display: flex;
                    flex-direction: row;
                    justify-content: center;
                    position: absolute; z-index:1;
                    /* background-color: rgba(0, 255, 255, 1); */
                }
                .第一 .䃼充 .第二 p {
                    /* 将本块区设置为"垂直居中"（开始） */
                    height: inherit; width:  inherit;
                    display: flex;
                    flex-direction: column;
                    justify-content:center;
                    /* 将本块区设置为"垂直居中"结束 */
                    position: absolute;     /* 因和Font Awesome文字在同一位置，故要设置位置为绝对位置 */
                    z-index: 2;
                    margin: auto;       /* 将宽度不是100%的文字垂直居中和水平居中 */
                    background-color: white;    /* 提交文字的按钮背景颜色 */
                    color: #333333;     /* 提交文字的按钮的颜色 */
                }
                .第一 .䃼充 .第二 span {
                    width: auto;height:auto;
                    visibility: hidden;
                    text-align: center;
                    transform:scale(0.3);
                    /* background-color: red; */ 
                }
            /* 登陆表单（终点） */
            #登陆框架块 {
                width:1920px; height:400px;
                position: absolute;
                z-index:300;
                /* top: l; */
                pointer-events:none;
                text-align:center;  
                /* background-color:blue; */
            }
        </style>
    </head>
    <body>

    <div id="登陆框架块"">
        <iframe  name="登陆框架"  frameborder="0" style="width:100%; height:100%;overflow:scroll; pointer-events:no; z-index:500; display:none;" scrolling="yes" >  </iframe>
    </div>
    <div id="login_window" style="position:absolute;z-index:300;">
            <div class="居中 PasswordForm"  >
            <!-- ###################################################################################################################################### -->
                <form  name="猫表单" action="http://localhost/%E5%B0%8F%E5%9D%97%E4%BB%B6%E6%A8%A1%E6%9D%BF++/%E7%AE%A1%E7%90%86%E6%A8%A1%E6%9D%BF++/%E4%BB%8E%E6%95%B0%E6%8D%AE%E5%BA%93%E6%9F%A5%E8%AF%A2%E7%99%BB%E9%99%86%E4%BF%A1%E6%81%AF.php" method="post" target="登陆框架" >
                        <!-- 关闭窗口按钮（开始） -->
                            <div class="clearfloat"><span class="close_loggin_window" onclick="loggin_window_close()" style="cursor: pointer;" >X</span></div>
                        <!-- 关闭窗口按钮（结束） -->
                        <!-- ##################################################################################### -->
                        <div style="line-height:30px; margin: 14px 0; width:100%;" class="login_content">
                            <!-- 输入框区域（开始） -->
                                <p><span>输入你的邮箱：</span> <input type="text" name="USER" /></p></br>
                                <p><span>输入你的邮箱的密码：</span> <input type="password" name="PASSWD" /></p>
                            <!-- 输入框区域（结束） -->
                            <!-- 按钮区域（开始） -->
                                <div style="transform: translateY(-20px);">
                                        <!-- 猫按钮区域（起点） -->
                                            <div class="第一">
                                                <div class="䃼充">
                                                    <div class="第二" style="overflow: hidden;">
                                                        <p id="确认" onclick="return 动画()">确认</p>
                                                        <div class="第三">
                                                            <span id="猫" class="icon-31" style="font-size:120px; font-weight:900; " onclick="猫提交()"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- 猫按钮区域（终点） -->
                                    
                                    <!-- 宽度为50%的按钮（开始） -->
                                    <div class="clearfloat" style="text-align: left">
                                        <p class="logging_submit" style="width: 50%; float:right;" ><input type="submit" name="logging_submit" value="忘记密码?" onclick="location.href='http://localhost/%E5%B0%8F%E5%9D%97%E4%BB%B6%E6%A8%A1%E6%9D%BF++/%E5%BF%98%E8%AE%B0%E5%AF%86%E7%A0%81.php'" /></p>
                                    </div>
                                    <div class="clearfloat" style="text-align: right;">
                                        <p class="logging_submit" style="width: 50%; "><input type="submit" name="logging_submit" value="注册?" onclick="location.href='http://localhost/小块件模板++/管理模板++/register.php'"/> </p>
                                    </div>
                                    <!-- 宽度为50%的按钮（结束） -->
                                </div>
                            <!-- 按钮区域（结束） -->
                        </div>
                        <!-- ##################################################################################### -->
                </form>
            <!-- ###################################################################################################################################### -->
            </div>
        </div>

        <script>
            // 注册时猫验证
            var 猫=document.getElementById('猫');
            var 确认 = document.getElementById('确认');

            function 动画(){
                确认.style.animation="确认按钮 2s forwards";
                setTimeout(
                    function(){  
                        猫.style.visibility="visible";
                        猫.style.pointerEvents="none";
                        猫.style.transitionDuration="3s";
                        猫.style.transform="scale(2.5)";
                        setTimeout("猫.style.transitionDuration='0s'",3000 );
                    }, 2000);
                    setTimeout("猫.style.pointerEvents='auto'", 6000);
            }
            function 猫校验(){
                // 验证表单数据
                if(1) {
                    猫.style.color="green";
                    setTimeout("document.猫表单.submit();",500);
                    setTimeout("猫.style.color='white'", 200);
                }else{
                    猫.style.color="red";
                    setTimeout("猫.style.color='white'", 200);
                }
            }
            function 猫提交(){
                猫校验();
            }


        </script>
    </body>
</html>