<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <?php
        if( $_SERVER['REQUEST_METHOD']=='GET' ){ 
            # 判断注册表单的信息是否正确
            if( (isset($_GET['USER'])) AND (isset($_GET['PASSWD'])) AND (isset($_GET['NAME'])) AND !empty($_GET('USER')) AND !empty($_GET('PASSWD')) AND !empty($_GET('NAME')) ) {
                    # 抑制错误或警告，自己来处理。
                    if($dbc = @mysqli_connect('localhost','root','root')) {
                        print "登陆成功<pre>"; print_r($dbc); print "</pre>";
                        # 尝试创建数据库
                        $MY_DB = "CREATE_BY_PHP";       // 要创建的数据库名字
                        # 尝试执行创建的操作
                        if( @mysqli_query( $dbc , "CREATE DATABASE $MY_DB") ){
                            print "<p style='color:green'>已创建 $MY_DB 数据库";
                        }else{print '<p style="color:red">创建数据库时失败：' . mysqli_error($dbc) . '</p>';}
                        
                        # 选择数据库
                        # 尝试执行选择数据库
                        if( @mysqli_select_db($dbc, $MY_DB) ){
                            print "<p style='color:green'>已选择 $MY_DB 数据库";
                        }else{print '<p style="color:red">选择数据库时失败：' . mysqli_error($dbc) . '</p>';}
                        
                        # 创建数据表和向表中添加段名（就算重复创建表，表中的数据也不会丢失）
                        $SQL_Command = '    
                            CREATE TABLE TABLE_OF_PHP(
                                `USER` varchar(20) not null,
                                `PASSWD` varchar(20) not null DEFAULT "root",
                                `REG_TIME` timestamp(3),
                                `NAME` varchar(20) NULL,
                                `ADDRESS` varchar(20) NULL,
                                primary key(`USER`)
                            );
                        ';
                        # 尝试执行创建数据表
                        if( @mysqli_query($dbc, $SQL_Command) ) {
                            print "已创建表";
                        }else{print '<p style="color:red">创建表时失败：' . mysqli_error($dbc) . '</p>';}

                        # 作用为插入数据的函数
                        function 插入数据($dbc){
                            date_default_timezone_set('Asia/Shanghai');    // 设置时区
                                    # 为插入准备数据
                                    $USER = $_GET['USER']; $PASSWD = $_GET['PASSWD']; $NAME = $_GET['NAME'];
                                    $MY_DATA = array('USER'=>$USER, 'PASSWD'=>$PASSWD, 'REG_TIME'=>date('Y-n-j G:i',time()), 'NAME'=>$NAME , 'ADDRESS'=>$_GET['ADDRESS']);
                                    print '<pre>'; print_r($MY_DATA); print '</pre>';
                                    $SQL_Command = "
                                        INSERT INTO TABLE_OF_PHP(USER, PASSWD, REG_TIME, NAME, ADDRESS) VALUES(" 
                                        .'"'. $MY_DATA['USER'] .'","' . $MY_DATA['PASSWD'] .'","'. $MY_DATA['REG_TIME'] .'","'. $MY_DATA['NAME'] .'","'. $MY_DATA['ADDRESS'] .'"'. ');
                                    ';
                                    # 执行插入操作
                                    if( @mysqli_query($dbc, $SQL_Command) ) {
                                        print "已插入一条数据";
                                    }else{print '<p style="color:red">插入数据时失败：' . mysqli_error($dbc) . '</p>';}
                        }
                        插入数据($dbc);      // 调用函数
                        
                        # 关闭数据库
                        mysqli_close($dbc);
                    }else{
                        # 无法连接数据库的操作
                        print "<p> 错误信息：".  mysqli_connect_error() . "</p>";
                        throw new Exception('连接数据库失败', 1234);
                    }
            }else { print '<p style="color:red;">未能插入数据，请确保相应选项已经填写好了</p>'; }
        }
    ?>
    <body>
        <!--  没有内容 -->
    </body>
</html>
