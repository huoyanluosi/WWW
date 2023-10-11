<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <head>
        <link rel="stylesheet" href="http://localhost/fonts/Font%20Awesome/Font%20Awesome.css"/>
        <link rel="stylesheet" href="http://localhost/fonts.css" type="text/css" >
        <link rel="stylesheet" href="http://localhost/style.css" type="text/css" />
    </head>
    <bosy>






    <?php
        if( $_SERVER['REQUEST_METHOD']=='POST' ){ 
            # 判断注册表单的信息是否正确
            if( (isset($_POST['PASSWD1'])) AND (isset($_POST['PASSWD2'])) AND ($_POST['PASSWD1']==$_POST['PASSWD2']) 
                AND !empty($_POST['USER']) ) 
            {
                    
                    # 包含连接数据库的脚本[该脚本若失败则返回false]
                    if( !include('../../../WWW/小块件模板++/管理模板++/连接数据库.php')) { exit(); }
                    
                    # 创建数据表和向表中添加段名（就算重复创建表，表中的数据也不会丢失）

                    # 作用为插入数据的函数
                    function 插入数据($dbc){
                                date_default_timezone_set('Asia/Shanghai');    // 设置时区
                                # 为插入准备数据
                                $USER = $_POST['USER']; $PASSWD = $_POST['PASSWD1'];
                                if( isset($_POST['ADDRESS']) ) { $ADDRESS=$_POST['ADDRESS']; } else { print "执行"; $ADDRESS=''; }     // 表单中的非必要填写项
                                if( isset($_POST['NAME']) ) { $NAME=$_POST['NAME']; } else { print "执行"; $NAME=''; }     // 表单中的非必要填写项
                                $手机号 = "";       // 暂时不提供手机号注册和登陆
                                $邮箱 = "";         // 暂时不提供邮箱注册和登陆

                                $MY_DATA = array( 'USER'=>$USER, 'email '=>$邮箱, 'phone'=> $手机号, 'PASSWD'=>$PASSWD, 'NAME'=>$NAME , 'ADDRESS'=>$ADDRESS, 'REG_TIME'=>date('Y-n-j G:i',time()) );
                                // print '<pre>'; print_r($MY_DATA); print '</pre>';

                                $SQL_Command = "
                                    INSERT INTO 账号信息表(昵称, 邮箱, 手机号, 密码, 姓名, 地址, 注册数据时间) VALUES(" 
                                    .'"'. $MY_DATA['USER'] .'","' . $邮箱 .'","'. $手机号. '","'. $MY_DATA['PASSWD'] .'","'. $MY_DATA['NAME'] .'","'. $MY_DATA['ADDRESS'] .'","'. $MY_DATA['REG_TIME'] .'"'   .   ');';
                                # 执行插入操作
                                if( @mysqli_query($dbc, $SQL_Command) ) {
                                    // print "已插入一条数据";
                                    print "<p class='成功' > 已成功注册，返回登陆即可</p>";
                                }else{
                                    // print '<p style="color:red">插入数据时失败：' . mysqli_error($dbc) . '</p>';
                                    print "<p class='失败'> !警告 你输入的账号已存在</p>";
                                }
                    }
                    插入数据($dbc);      // 调用函数
                    
                    # 关闭数据库
                    mysqli_close($dbc);
                    
            }else { 
                print "<p class='失败'>不能注册，请确保相应选项已经填写完整了</p>"; 
            }
        }
    ?>
    <body>
        <!--  没有内容 -->
    </body>
</html>






    </bosy>
<html>