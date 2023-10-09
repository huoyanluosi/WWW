<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>我要学PHP</title>
    <!-- 网页头部区 -->
    <head>
        <!-- CSS样式区 -->
        <style>

        </style>
        <!-- JS代码区 -->
        <script>
            
        </script>
    </head>

    <!-- 网页主体区 -->
    <body>
        <?php
            // 设置显示错误
            ini_set('display_errors', 1);
            error_reporting(E_ALL | E_STRICT);
            ini_set('upload_tmp_dir', 'G:/game/++/phpstudy_pro/Extensions/tmp/upload_tmp_dir/');
            
            // 检测提交文件
            if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                if( isset($_FILES["the_file"]) AND ($_FILES["the_file"]["error"] == 0) ) {
                    // print "<pre>"; phpinfo(); print "</pre>";
                }
            // 显示文件
            }else{
                $search_dir = '.';      // 根目录
                $contents = scandir($search_dir);       // 查找根目录的全部文件和目录
                print "<h2> 目录 </h2>\n<ul>";      // 显示标题
                // 显示根目录下的目录
                foreach($contents as $item) {
                    // 过滤掉以下点号开头的(包括只有下点号或隐藏文件)
                    if( (is_dir($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.') ) {
                        print "<li> $item </li>\n";         // 显示所有目录
                    }
                }
                print '</ul>';

                // 创建一个表，用于显示所有文件
                // function show_title($TITLE) {
                //     print "<hr />\n<h2 align='left'> $TITLE/ 的内容 </h2>\n";
                // }
                // // 表格起
                // print "<table cellpadding=2 cellspacing=2  width='100%' style=\"text-align:center\">";
                // print "<tr><td>名字</td><td>大小</td><td>最近修改</td>";
                // print "<tr><td><a href=''>12</a></td></tr>";
                // print "</table>";


                $关联 = array();    $根目录 = './';     $目录数量 = 0;      $文件数量 = 0;
                // 这个函数使用了指针形式
                function &创建类型为数组的成员( $目录名,$initialize=flase,&$tmp=null ) {
                    if( $initialize==true) {
                        global $关联;
                        $关联[$目录名] = array();
                        // $关联[$目录名][] = '测试';        // 添加文件示例(以数字为索引)
                        // $关联[$目录名]["大牛"] = array();        // 添加目录示例(以非数字为索引)
                        return $关联[$目录名];
                    }else{
                        $tmp[$目录名] = array();
                        return $tmp[$目录名];
                    }
                }
                // 这个函数的tmp使用了指针形式（不知为什么不能去掉"&"号）
                function 扫描($目录名, $initialize=false, &$tmp=null, $path=null ){
                    global $目录数量, $关联, $文件数量;

                    // 初始化
                    if( $initialize==true) {
                        $tmp = &创建类型为数组的成员($目录名, $initialize=true);
                        $内容列表 = scandir($目录名);
                        foreach( $内容列表 as $单个内容){
                            $path = $目录名.$单个内容;

                            // 是目录
                            if( ($单个内容)!='.' AND ($单个内容)!='..' AND  is_dir($path)){
                                $目录数量++;
                                扫描($单个内容, false, $tmp, $path);
                            }
                            // 是文件
                            if( ($单个内容)!='.' AND ($单个内容)!='..' AND  is_file($path)){
                                $文件数量++;
                                $tmp[] = $单个内容;        // 添加文件示例(以数字为索引)
                            }
                        }
                    }else{
                        $tmp = &创建类型为数组的成员($目录名, $initialize=false, $tmp);
                        $内容列表 = scandir($path);
                        $辅助连接路径 = $path.'/';
                        
                        foreach( $内容列表 as $单个内容){
                            $path = $辅助连接路径.$单个内容;
                            
                            //是目录
                            if( ($单个内容!='.') AND ($单个内容 !='..') AND  is_dir($path) ){
                                $目录数量++;
                                扫描($单个内容, false, $tmp, $path);
                            }
                            // 是文件
                            if( ($单个内容)!='.' AND ($单个内容)!='..' AND  is_file($path)){
                                $文件数量++;
                                $tmp[] = $单个内容;        // 添加文件示例(以数字为索引)
                            }
                        }
                    }
                }
                扫描($根目录, $initialize=true);        // 初始化调用
                print "<pre>"; print_r($关联); print "</pre>";
                print "<pre>"; print $目录数量; print "</pre>";
                print "<pre>"; print $文件数量; print "</pre>";
                
            }

        ?>
        <form enctype="multipart/form-data" method="post">
            <input type="file" name="the_file" />  </br>
            <input type="submit" value="上传"/>
        </form>
    </body>
</html>