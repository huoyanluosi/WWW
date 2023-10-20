<?php


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
    # 调用“递归目录”的示例
    // $目录的总大小=0;
    // 递归目录(true, "G:/game/++/phpstudy_pro/WWW/.git/", null, $目录的总大小);
    // print "<pre>总大小为: $目录的总大小 </pre>";


?>
