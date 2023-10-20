
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
    $link = "<a target='_self' href='http://localhost/练习/后台/获取目录下的文件.php?re_file_or_dir=" . urlencode($文件或目录的相对路径 . $文件属性数组[0]) . "'>$文件属性数组[0]</a>";
    print "<tr class='My_DIR' ><th>{$link}</th><th>{$文件属性数组[1]}</th><th>{$文件属性数组[2]}</th><th>{$文件属性数组[3]}</th></tr>";
  }
  foreach($FILE_array as $文件属性数组){
    $link = "<a href='http://localhost/" . $文件或目录的相对路径 . $文件属性数组[0] . "'>$文件属性数组[0]</a>";
    print "<tr class='My_FILE' ><th>{$link}</th><th>{$文件属性数组[1]}</th><th>{$文件属性数组[2]}</th><th>{$文件属性数组[3]}</th></tr>";

  }
  // print "</table>";
  ////////////
?>