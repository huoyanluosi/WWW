<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<head>
  <link rel="stylesheet" href="http://localhost/style.css" type="text/css" />
  <link rel="stylesheet" href="http://localhost/fonts/Font%20Awesome/Font%20Awesome.css" type="text/css" />
  <style>
    #show_webroot_DIR {
      background: url(http://localhost/图片文件夹++/蔚蓝海洋.png) no-repeat;
      background-size: cover;
      /* display: flex; flex-direction: row; justify-content: center; */
      /* padding: 60px; */
      height: 80%; width: 100%;
      /* height: fit-content; */
      /* position: relative; */
      overflow: hidden;
      display: flex;
      flex-direction: column;
      justify-content: center;
      
    }
    #show_webroot_DIR_layer_2{
        width: 80%; max-height:80%;
        /* height: max-content; */
        /* background-color: black; */
        /* border: 50px solid red; */
        margin: auto;
        overflow: auto;
        /* position: relative; */
    }
    table {
      /* display: none; */
      /* visibility: hidden; */
      background-color: green;
      background-color: rgba(171, 255, 46, 0.1);
      /* position: relative; */
      /* display: block; */
      
      /* width: 100%; max-height: 100%;  */
      font-size: 1.5em; color: white;
      /* margin: auto; */
      /* overflow: auto; */
    }
    table caption{
      font-size: 1.3em; color: green; font-weight: 700;
      background-color:#FFFFFF;
    }
    table tfoot tr td, table tbody tr th{
      padding: 5px;
      color:red;
      background-color: rgba(255, 255, 0, 0.1);
    }
    .My_DIR *, .My_FILE * {
      color: black;
      font-size: 0.9em; font-weight:200;
    }
  </style>
</head>


<body>
  <?php
    include("G:/game/++/phpstudy_pro/WWW/小块件模板++/LOGO.html");
  ?>
  <?php include("G:/game/++/phpstudy_pro/WWW/小块件模板++/顶导航栏.html"); ?>
<div id="show_webroot_DIR">
  <div id='show_webroot_DIR_layer_2'>
    <!-- <p>eerpepeplel</p> -->
      <table border="10" bgcolor="red">
          <colgroup>
              <col style="width: 15%"/>
              <col style="width: 15%"/>
              <col style="width: 15%"/>
              <col style="width: 35%;"/>
          </colgroup>
          <caption> 网站目录</caption>
          <thead>
            <tr><th>文件</th><th>类型</th><th>大小</th><th>上次修改时间</th></tr>
          </thead>
          <tfoot >
            <tr><td colspan="4">
              <span class="icon-uniEAC0" style="font-size: larger; padding: 0 20px;"></span>总共有*个目录，*个文件</td></tr>
          </tfoot>
          <tbody>
            <!-- <tr><th>php.ini</th><th>video/mp4</th><th>2M</th><th>2019-02-9 10:90</th></tr>
            <tr><th>php.ini</th><th>video/mp4</th><th>2M</th><th>2019-02-9 10:90</th></tr> -->
            <?php
                // 网站的首目录
                $root_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
                // 保存目录路径表的数组
                $DIR_array = array();
                // 保存文件路径表的数组
                $FILE_array = array();
                // 记录用户的位置
                $跟踪 = '';
                /////////////////////////////////----函数----//////////////////////////////////////
                // 返回一个数组，其中包含了文件或目录的属性
                function 获取文件信息($文件或目录的绝对路径, $文件或目录的名字, $文件或目录大小='null') {
                  global $root_DIR;
                  $对象 = finfo_open(FILEINFO_MIME);   //打开文件或目录
                  $文件或目录类型 = finfo_file($对象, $文件或目录的绝对路径); 
                  if( is_file($文件或目录的绝对路径) ) {
                    $文件或目录大小 = filesize($文件或目录的绝对路径);
                  }elseif( is_dir($文件或目录的绝对路径) ) {
                    // $文件或目录大小 = "null";
                    $文件或目录大小=0;
                    递归目录($文件或目录的绝对路径, null, $文件或目录大小);
                  }
                  date_default_timezone_set("Asia/Shanghai");     //修改时区
                  $上次修改时间 = date( 'Y-m-d G:i:s' ,filemtime($文件或目录的绝对路径));
                  finfo_close($对象);   //关闭文件或目录
                  $tmp_array = array(basename($文件或目录的绝对路径), $文件或目录类型, $文件或目录大小, $上次修改时间);
                  return $tmp_array;
                }
                // 获取目录大小（）
                function 递归目录($初始化=false, $递归的根路径, &$目录的总大小) {
                  if($初始化){
                    if( !is_dir($初始化) ){ print "你输入的不是一个目录"; }
                    $递归的根路径 = $初始化;
                    if( substr($递归的根路径, -1)!='/' ){ $递归的根路径 .= '/';  }
                  }
                  // print "-----" . $递归的根路径 . "</br>";
                  
                  foreach( scandir($递归的根路径) as $value ){
                      if( $value=='.' OR $value=='..' ) { continue; }
                      if( is_dir($递归的根路径.$value) ){
                          // print "<pre>$递归的根路径$value</pre>";
                          递归目录(false , $递归的根路径.$value.'/', $目录的总大小);
                      }elseif( is_file($递归的根路径.$value) ){
                        // print "<pre>路径$value</pre>";
                        $目录的总大小 += filesize($递归的根路径.$value);
                        // print "<pre>总倒下：$目录的总大小</pre>";
                      }
                  }
                  return $目录的总大小;
                }
                // $目录的总大小=0;
                // 递归目录("G:/game/++/phpstudy_pro/WWW/.git/", null, $目录的总大小);
                // print "<pre>总大小为: $目录的总大小 </pre>";


                /////////////////////////////////////////////////////////////////////////
                // 判断要执行哪个操作
                if( !(isset($_GET['re_file_or_dir']) OR isset($_GET['re_file_or_dir'])) ) {
                    foreach( scandir($root_DIR) as $value) {
                      // 排除'.'、'./'目录
                      if( $value == '.' OR $value == '..'){ continue; } 
                      // 判断是否是目录或文件
                      if( is_dir($root_DIR . $value)) {
                        $tmp_array = 获取文件信息($root_DIR.$value, $value);
                        // print '<pre>临时：'; print_r($tmp_array); print '</pre>';
                        array_push($DIR_array, $tmp_array);     // 加入目录数组
                      }elseif( is_file($root_DIR . $value)){
                        $tmp_array = 获取文件信息($root_DIR.$value, $value);
                        array_push($FILE_array, $tmp_array);;    // 加入文件数组
                      }
                    }
                    // 向网页输出目录和文件信息

                }elseif( isset($_GET['re_file_or_dir'])  ){
                  $root_DIR .=  $_GET['re_file_or_dir'];

                  // print "<pre>" . $root_DIR . "</pre>";
                  if( is_dir($root_DIR)){
                    $root_DIR .= '/';
                    foreach( scandir($root_DIR) as $value) {
                      // 排除'.'、'./'目录 
                      if( $value == '.' OR $value == '..'){ continue; } 
                      // 判断是否是目录或文件
                        if( is_dir($root_DIR .  $value )) {
                          // print "----##-".$value."----##---";
                          $tmp_array = 获取文件信息($root_DIR.$value, $value);
                          // print '<pre>'; print_r($tmp_array); print '</pre>';
                          array_push($DIR_array, $tmp_array);     // 加入目录数组
                        }elseif( is_file($root_DIR . $value )){
                        $tmp_array = 获取文件信息($root_DIR.$value, $value);
                          array_push($FILE_array, $tmp_array);    // 加入文件数组
                        }
                    }
                  }
                }
                // print "<pre>"; print_r($FILE_array); print "</pre>";

                //////////
                if( isset($_GET['re_file_or_dir'])){
                  $文件或目录的相对路径 = $_GET['re_file_or_dir'] . '/';
                }else{$文件或目录的相对路径='';}
                // print "<table>";
                // print "<tr><th>你当前的路径为：{$root_DIR }</th></tr>";
                foreach($DIR_array as $文件属性数组){
                  // print "<pre>$value</pre>";
                  $link = "<a target='_self' href='http://localhost/练习/后台/网站目录.php?re_file_or_dir=" . urlencode($文件或目录的相对路径 . $文件属性数组[0]) . "'>$文件属性数组[0]</a>";
                  print "<tr class='My_DIR' ><th>{$link}</th><th>{$文件属性数组[1]}</th><th>{$文件属性数组[2]}</th><th>{$文件属性数组[3]}</th></tr>";
                }
                foreach($FILE_array as $文件属性数组){
                  $link = "<a href='http://localhost/" . $文件或目录的相对路径 . $文件属性数组[0] . "'>$文件属性数组[0]</a>";
                  print "<tr class='My_FILE' ><th>{$link}</th><th>{$文件属性数组[1]}</th><th>{$文件属性数组[2]}</th><th>{$文件属性数组[3]}</th></tr>";

                }
                // print "</table>";
                ////////////
              ?>

          </tbody>
      </table>
  </div>
</div>
</body>