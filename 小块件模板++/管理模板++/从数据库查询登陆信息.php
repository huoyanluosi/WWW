<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <head>
        <!-- 引用主体CSS -->
        <link rel="stylesheet" href="http://localhost/fonts/Font%20Awesome/Font%20Awesome.css"/>
        <link rel="stylesheet" href="http://localhost/fonts.css" type="text/css" >
        <link rel="stylesheet" href="http://localhost/style.css" type="text/css" />
        <style>
            body {      /* 弥补样式表的body大小和其导致的位置问题 */
                width: auto;
                height: auto;
                margin-top: 50px;
            }
        </style>
    </head>

    <body>
        <?php
            // 设置显示错误
            ini_set('display_errors', 1);
            error_reporting(E_ALL | E_STRICT);
        ?>
        <?php
            if( $_SERVER['REQUEST_METHOD']=='POST' ) { 

                # 判断注册表单的信息是否正确
                if( (isset($_POST['USER'])) AND (isset($_POST['PASSWD'])) AND (!empty($_POST['USER'])) AND (!empty($_POST['PASSWD'])) ) {
                    print "<p class='成功'> 必要信息已填写 </p>";
                    
                    // 连接数据库
                    if( !include('../../../WWW/小块件模板++/管理模板++/连接数据库.php')) { exit(); }
                    // 查询操作
                    date_default_timezone_set('Asia/Shanghai');    // 设置时区
                    $SQL_Command = "
                        SELECT * FROM 账号信息表 WHERE 昵称=" ."'". $_POST['USER'] ."'".  "AND 密码=" ."'". $_POST['PASSWD'] . "';";
                    print "<p class='成功'>执行的命令<code class='代码'>$SQL_Command </code></p>";

                    if( $result = mysqli_query($dbc, $SQL_Command) ) {
                        // print "<p>".mysqli_num_rows($result)."<p>";
                        if( mysqli_num_rows($result)==1 ) {
                            print "<p class='成功' >存在用户,密码也正确。</p>";
                        }else{
                            print "<p class='失败' >账号或密码不正确。</p>";
                        }
                    }

                    // 关闭数据库
                    mysqli_close($dbc);
                }else{
                    print "<p class='失败'> 必要信息未填写 </p>";
                    exit();
                }
            }
        ?>


    </body>

</html>