<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<head>
<!-- 引用主体CSS -->
<link rel="stylesheet" href="http://localhost/fonts/Font%20Awesome/Font%20Awesome.css"/>
<link rel="stylesheet" href="http://localhost/fonts.css" type="text/css" >
<link rel="stylesheet" href="http://localhost/style.css" type="text/css" />
<script src="http://localhost/小块件模板++/管理模板++/我的JS函数库.js"></script>
<script type="text/javascript" src="/框架/jquery-3.7.1.js"></script>



<style>
    #_left_bar_ {grid-area: _left_bar_;}
    #_right_bar_ {grid-area: _right_bar_;}
    #文章索引区 {
        grid-area: 文章索引区;
        min-width: 1467px;
        max-width: 167px;
    }
    #页脚 {grid-area: 页脚;}
    #crumb {grid-area: crumb;}
    #技术交流网格显示 {
        display: grid;
        grid:
            "_left_bar_ crumb _right_bar_"
            "_left_bar_ 文章索引区 _right_bar_"
            "页脚 页脚 页脚"
        ;
        grid-gap: 0 21px;
        grid-template-rows: 70px;
        /* grid-template-columns: 205px 1510px 205px; */
    }

    .所有文章的一小部分 {
        border: 1px solid #797979;
        padding: 10px 20px;
        color: #333333;
    }
    .所有文章的一小部分 h5 { margin-bottom: 16px; font-size: 1.2em; font-weight: 200; font-family:沐瑶软笔手写体; }
    .所有文章的一小部分 [id|='一段话'] {font-family: 思源黑体;}
    .按钮右浮动 span{ font-size: 1.5em; }
    .按钮右浮动 small {padding: 0 10px;}
    .按钮右浮动 button {width: 110px; border-radius: 0; padding: 5px; opacity: 0.3;}
    .按钮右浮动 button:first-child {border-radius: 30px 0  0 30px; }
    .按钮右浮动 button:nth-last-of-type(1) {border-radius: 0 30px 30px 0; }
    .右浮动按钮 {color: #777777}
    .所有文章的一小部分:not(.所有文章的一小部分:first-child) { border-top: 0; }         /* 清除边框重交的一边 */
</style>
<body>
    <?php
        include(__DIR__."/LOGO.html");
        include(__DIR__."/顶导航栏.html");
        include(__DIR__."/管理模板++/登陆窗口.php");
    ?>
    <div id="技术交流网格显示" style=" position:absolute; ">
        <?php
            include(__DIR__."/左导航栏.html");
            include(__DIR__."/面包屑.html");
        ?>
        <div id="文章索引区" style=" position:absolute; z-index:100; margin:auto;">
            <div class="所有文章的一小部分">
                <h5>如何写一篇优秀的文章
                    <div class="按钮右浮动" style="float:right;">
                        <button>不通知直接删除</button><button>通知违规并删除</button><button>放行</button><button>修改</button>
                        <span class="icon-8 右浮动按钮 点赞" data-judge="no" onclick="测试(this)"> <small id="点赞数_0_T0">0</small> </span>
                        <span class="icon-6 右浮动按钮 踩你" data-judge="no" onclick="测试(this)"> <small id="踩你数_0_T0">0</small> </span>
                        <span class="icon-7 右浮动按钮 评论" data-judge="no" onclick=""> <small id="评论数_0_T0">0</small> </span>
                        <span class="icon-10 右浮动按钮 关注" data-judge="no" onclick="测试(this)"> <small id="关注数_0_T0">0</small> </span>
                    </div>
                </h5>
                <p id="一段话_T0">首先，想好要写什么->设计文章的格式->设计文章的样式。首先，想好要写什么->设计文章的格式->设计文章的样式。首先，想好要写什么->设计文章的格式->设计文章的样式。 </p>
            </div>
            <div class="所有文章的一小部分">
                <h5>如何写一篇优秀的文章
                    <div class="按钮右浮动" style="float:right;">
                        <button>不通知直接删除</button><button>通知违规并删除</button><button>放行</button><button>修改</button>
                        <span class="icon-8 右浮动按钮 点赞" data-judge="no" onclick="测试(this)"> <small id="点赞数_0_T1">0</small> </span>
                        <span class="icon-6 右浮动按钮 踩你" data-judge="no" onclick="测试(this)"> <small id="踩你数_0_T1">0</small> </span>
                        <span class="icon-7 右浮动按钮 评论" data-judge="no" onclick=""> <small id="评论数_0_T1">0</small> </span>
                        <span class="icon-10 右浮动按钮 关注" data-judge="no" onclick="测试(this)"> <small id="关注数_0_T1">0</small> </span>
                    </div>
                </h5>
                <p id="一段话_T1">首先，想好要写什么->设计文章的格式->设计文章的样式。首先，想好要写什么->设计文章的格式->设计文章的样式。首先，想好要写什么->设计文章的格式->设计文章的样式。 </p>
            </div>
        </div>
        <?php
            include(__DIR__."/右导航栏.html");
            include(__DIR__."/页脚.html");
        ?>
    </div>

    <script>
        // let 所有点赞按钮 =document.getElementsByClassName("点赞");
        // for(let 点赞 of 所有点赞按钮) {
        //     console.log(点赞);
        //     点赞.onclick=function(){
        //         // 同样数据库，并将数量增加
        //         alert("yes");
        //         <?php
        //             // 连接数据库
        //             if( !include('../../../WWW/小块件模板++/管理模板++/连接数据库.php')) { exit(); }
        //         ?>
        //     }
        // }
        // let 所有点赞按钮 = document.querySelectorAll('*[id^="点赞数"]'); 
        // for(let i of 所有点赞按钮) {
        //     i.onclick=function(){
        //         alert("你好");
        //     };
        // }
        $(document). ready(function(){
            console.log(11);
            var 所有右浮动按钮 = document.getElementsByClassName('右浮动按钮');
            for( let i of 所有右浮动按钮) {
                let 子节点 = i.firstElementChild;
                let [操作类型, 作者标志, 文章标志] = 子节点.id.split('_');
                
                console.log("返回值: ", 操作类型, 作者标志, 文章标志);
                $.ajax({
                    url:"http://localhost/小块件模板++/管理模板++/点赞or踩你or关注or回复.php?查询="+操作类型+"&作者标志=" + 作者标志 + "&文章标志='" + 文章标志 + "'",    //请求的PHP文件 
                    success: function(result){
                        // console.log("返回结果", result);
                        result = result.match(/<span data-type='.*'>(.*)<\/span>/);
                        console.log(result);
                        if(result==null){ return false }; 
                        console.log('点赞数',result[0]);         //[0]是整个字符串
                        $(子节点).html(result[0]);        //将结果输出到页面的result标签中
                    }
                }); 
            }
        })
        function 测试(obj) {
            if( obj.getAttribute('data-judge') == 'no') {
                行为 = 1;       // 增加
                obj.setAttribute('data-judge', 'yes');
                obj.style.color = 'red';
            }else if( obj.getAttribute('data-judge') == 'yes') {
                行为=0;     // 减少
                obj.setAttribute('data-judge', 'no');
                obj.style.color = '#777777';
            }else { return false;}

            let 子节点ID = obj.firstElementChild.id;          // 如点赞数
            console.log("子节点ID: ",子节点ID);
            let [操作类型, 作者标志, 文章标志] = 子节点ID.split('_');
            操作类型 = 操作类型.replace('数', '');
            console.log("返回值: ", 操作类型, 作者标志, 文章标志);
                $.ajax({
                    url:"http://localhost/小块件模板++/管理模板++/点赞or踩你or关注or回复.php?" +操作类型 +"="+ 行为 +"&作者标志=" + 作者标志 + "&文章标志='" + 文章标志 + "'",    //请求的PHP文件 
                    success: function(result){
                        // console.log("返回结果", result);
                        result = result.match(/<span data-type='.*'>(.*)<\/span>/);
                        console.log(result);
                        if(result==null){ return false }; 
                        console.log('点赞数',result[0]);         //[0]是整个字符串
                        $('#'+子节点ID).html(result[0]);        //将结果输出到页面的result标签中
                    }
                }); 
        }
    </script>
</body>
<html>
    