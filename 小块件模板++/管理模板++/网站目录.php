<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<head>
  <link rel="stylesheet" href="http://localhost/style.css" type="text/css" />
  <link rel="stylesheet" href="http://localhost/fonts/Font%20Awesome/Font%20Awesome.css" type="text/css" />
  <link rel="stylesheet" href="http://localhost/fonts.css" type="text/css" >

  <style>
    #show_webroot_DIR {
      background: url(http://localhost/图片文件夹++/蔚蓝海洋.png) no-repeat;
      background-size: cover;
      height: 80%; width: 100%;
      overflow: hidden;
      display: flex; flex-direction: column; justify-content: center;
    }
    #show_webroot_DIR_layer_2{
        width: 80%; max-height:80%;
        margin: auto;
        overflow: auto;
    }
    table {
      background-color: green;
      /* background-color: rgba(171, 255, 46, 0.1); */
      width: 100%;
      font-size: 1.5em; color: white;
    }
    table caption{
      font-size: 1.3em; color: green; font-weight: 700;
      background-color: #FFFFFF;
      /* background-color: ; */
    }
    table tbody tr th{
      padding: 5px;
      background-color: rgba(255, 255, 0, 0.01);
    }
    table tfoot tr td {
      padding: 8px;
    }
    .My_DIR *, .My_FILE *{
      font-size: 0.9em; font-weight:300;
    }
    .My_DIR * { color: white; }
    .My_FILE * { color: white;}
  </style>
</head>


<body>
  <?php
    include(__DIR__."/../LOGO.html");
  ?>
  <?php include(__DIR__."/../顶导航栏.html"); ?>
<div id="show_webroot_DIR">
  <div id='show_webroot_DIR_layer_2'>
    <!-- <p>eerpepeplel</p> -->
      <table border="10" bgcolor="red">
          <colgroup>
              <col style="width: 30%"/>
              <col style="width: 20%"/>
              <col style="width: 20%"/>
              <col style="width: 30%;"/>
          </colgroup>
          <caption> 网站目录</caption>
          <thead>
            <tr><th>文件</th><th>类型</th><th>大小</th><th>上次修改时间</th></tr>
          </thead>
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
                // 定义文件和目录的数量
                $目录数量 = 0;
                $文件数量 = 0;


                // 引入我的函数库
                include(__DIR__."/我的PHP函数库.php");

                /////////////////////////////////////////////////////////////////////////
                // 判断要执行哪个操作
                if( !(isset($_GET['re_file_or_dir']) OR isset($_GET['re_file_or_dir'])) ) {
                    foreach( scandir($root_DIR) as $value) {
                      // 排除'.'、'./'目录
                      if( $value == '.' OR $value == '..'){ continue; } 
                      // 判断是否是目录或文件
                      if( is_dir($root_DIR . $value)) {
                        $tmp_array = 获取文件信息($root_DIR.$value, $value);
                        $目录数量++;
                        // print '<pre>临时：'; print_r($tmp_array); print '</pre>';
                        array_push($DIR_array, $tmp_array);     // 加入目录数组
                      }elseif( is_file($root_DIR . $value)){
                        $tmp_array = 获取文件信息($root_DIR.$value, $value);
                        $文件数量++;
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
                          $目录数量++;
                          // print '<pre>'; print_r($tmp_array); print '</pre>';
                          array_push($DIR_array, $tmp_array);     // 加入目录数组
                        }elseif( is_file($root_DIR . $value )){
                        $tmp_array = 获取文件信息($root_DIR.$value, $value);
                          $文件数量++;
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
                // print "<tr><th>你当前的路径为：{$root_DIR }</th></tr>";
                foreach($DIR_array as $文件属性数组){
                  // print "<pre>$value</pre>";
                  $link = "<a target='_self' href='http://localhost/小块件模板++/管理模板++/网站目录.php?re_file_or_dir=" . urlencode($文件或目录的相对路径 . $文件属性数组[0]) . "'>$文件属性数组[0]</a>";
                  print "<tr class='My_DIR' ><th>{$link}</th><th>{$文件属性数组[1]}</th><th>{$文件属性数组[2]}</th><th>{$文件属性数组[3]}</th></tr>";
                }
                foreach($FILE_array as $文件属性数组){
                  $link = "<a href='http://localhost/" . $文件或目录的相对路径 . $文件属性数组[0] . "'>$文件属性数组[0]</a>";
                  print "<tr class='My_FILE' ><th>{$link}</th><th>{$文件属性数组[1]}</th><th>{$文件属性数组[2]}</th><th>{$文件属性数组[3]}</th></tr>";

                }
                ////////////
              ?>

          </tbody>
          <tfoot >
            <tr><td colspan="4">
              <span class="icon-uniEAC0" style="font-size: larger; padding: 0 20px;"></span>总共有<?php print $目录数量 ?>个目录，<?php print $文件数量 ?>个文件</td></tr>
          </tfoot>
      </table>
  </div>
</div>
</body>