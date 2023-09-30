<head>
    <meta charset="utf-8">
    <title>
        <?php
            if(defined('TITLE')) {
                print TITLE;
            }else {
                print "我是form.php文件";
            }
        ?>
    </title>
</head>

<body>
    <div class="my_form">
        <p>请填写信息, 才能登陆网站</p>
        <form action="./form.php" method="get">
            <span>Name: </span> <input type="text" class="text" name="Name"/><br/>
            <span>Email Address: </span> <input type="email" class="text" name="Email_Address"/><br/>
            <span>Response: This is... </span> <input type="radio" name="Response"/>excellent<input type="radio" name="Response"/>okay<input type="radio" name="Response"/>borning<br/>
            <span>Comments: </span> <textarea  class="text" name="Comments"></textarea><br/>
            <input type="submit" value="Submit" name="Submit"/>

            <!-- 隐藏类型input -->
            <input type="hidden" name="hidden" value="我是隐藏的表单标签"/>
        </form>
    </div>
</body>