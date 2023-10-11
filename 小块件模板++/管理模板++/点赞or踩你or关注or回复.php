

<?php
    // 函数区域
    function 查询并更新($操作类型, $作者标志, $文章标志, $减标志=null){
        global $dbc;
        $操作类型键 = $操作类型.'数';
        print "<p class='成功'>操作类型：<code class='代码'>$操作类型键</code></p>";
        $值 = 0;
        $SQL_Query_Command = " select * from 技术交流所有文章表 where 作者标志=$作者标志 and 文章标志=$文章标志; ";
        print "<p class='成功'>查询命令: <code class='代码'>$SQL_Query_Command</code> <p>";

        // 查询区域
        if( $result = mysqli_query($dbc, $SQL_Query_Command) ) {        // 查询作者和文章是否存在
            $row=mysqli_fetch_array($result);
            if( mysqli_num_rows($result)==1 ) {
                print "<p class='成功'>查询成功，存在该<code class='代码'>作者的文章</code></p>";
                if ( !isset($row[$操作类型键]) ) {        // 若字段没有存在时退出脚本
                    print "<p class='失败'>不存在<code class='代码'>$操作类型键</code>字段</p>";
                    return false;
                }
                // print "<pre>数据库返回: <code class='代码'>"; print_r($row); print "</code></pre>";
                $值 = $row[$操作类型键];       // 更新点赞数
            }else{
                print "<p class='失败'>查询失败</p>";
            }
            print "<p class='成功'> 旧数值: <code class='代码'>{$值}</code></p>";
        }else{ print "<p class='失败'>查询失败，不存在该<code class='代码'>作者的文章</code></p>"; return false;}
        // 更新区域（如点赞数加1）
        if( $减标志 ) { $值 = --$row[$操作类型键]; } else { $值 = ++$row[$操作类型键]; }
        $SQL_update_Command = "UPDATE 技术交流所有文章表 SET  $操作类型键=$值 WHERE 作者标志=$作者标志 AND 文章标志=$文章标志;";
        print "<p class='成功'>更新命令：<code class='代码'> $SQL_update_Command </code> <p>";
        if( $result = mysqli_query($dbc, $SQL_update_Command) ) {
            if( mysqli_affected_rows($dbc)==1 ) {
                print "<p class='成功'> 新数值: <code class='代码'><span data-type='$操作类型' style='font-size:inherit'>{$值}</span></code></p>";
            }
        }
    }
    function 查询($dbc, $查询, $查询字段值1, $查询字段值2) {
        $SQL_Query_Command = " select * from 技术交流所有文章表 where 作者标志=$查询字段值1 and 文章标志=$查询字段值2; ";
        print "<p class='成功'>查询命令: <code class='代码'>$SQL_Query_Command</code> <p>";
        // 查询区域
        if( $result = mysqli_query($dbc, $SQL_Query_Command) ) {        // 查询作者和文章是否存在
            $row=mysqli_fetch_array($result);
            if( mysqli_num_rows($result)==1 ) {
                print "<p class='成功'>查询成功，存在该<code class='代码'>作者的文章</code></p>";
                // print "<pre>数据库返回: <code class='代码'>"; print_r($row); print "</code></pre>";
                $值 = $row[$查询];
                print "<span data-type='$查询' style='font-size:inherit'>{$值}</span>";
            }else{
                print "<p class='失败'>查询失败</p>";   return false;
            }
        }else{ print "<p class='失败'>查询失败，不存在该<code class='代码'>作者的文章</code></p>"; return false;}
        
    }
    // 主处理区域
    if( $_SERVER['REQUEST_METHOD']=='GET' ) {
        $_SESSION['用户标志'] = '测试';
        // 这里判断一部分键是否存在
        if(isset($_SESSION['用户标志']) AND !empty($_SESSION['用户标志'])
            AND isset($_GET['作者标志']) AND isset($_GET['文章标志']) AND (!empty($_GET['作者标志']) OR $_GET['作者标志']==0) AND !empty($_GET['文章标志']) ) {
            
            // 连接数据库
            if( !include('G:/game/++/phpstudy_pro/WWW/小块件模板++/管理模板++/连接数据库.php')) { exit(); }

            // 如果是查询
            if( isset($_GET['查询']) AND $_GET['查询'] ){
                print "<hr/>";
                查询($dbc, $_GET['查询'], $_GET['作者标志'], $_GET['文章标志'] );
            }
            // 如果是点赞
            if( isset($_GET['点赞']) ) {
                print "<hr/>";
                if(  $_GET['点赞'] ) {
                    查询并更新("点赞", $_GET['作者标志'], $_GET['文章标志']);
                }else { 查询并更新("点赞", $_GET['作者标志'], $_GET['文章标志'], true);}
            }
            // 如果是踩你
            if( isset($_GET['踩你']) ) {
                print "<hr/>";
                if(  $_GET['踩你']) {
                    查询并更新("踩你", $_GET['作者标志'], $_GET['文章标志']);
                }else { 查询并更新("踩你", $_GET['作者标志'], $_GET['文章标志'], true); }
            }
            // 如果是评论
            if( isset($_GET['评论']) ) {
                print "<hr/>";
                if( $_GET['评论'] ) {
                    查询并更新("评论", $_GET['作者标志'], $_GET['文章标志']);
                }else {查询并更新("评论", $_GET['作者标志'], $_GET['文章标志'], true);}
            }
            // 如果是关注
            if(isset($_GET['关注']) ) {
                print "<hr/>";
                if( $_GET['关注']) {
                    查询并更新("关注", $_GET['作者标志'], $_GET['文章标志']);
                }else{  查询并更新("关注", $_GET['作者标志'], $_GET['文章标志'], true); }
            }
            
        }else{
            print "<p class='失败'>信息填写的不正确</p>";
        }
    }
?>


