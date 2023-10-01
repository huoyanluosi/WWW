<html>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
<body>
    <?php
            // 自定义函数的示例
            function make_text_input($name, $label) {
                print "  <p> <label> $label:   ";
                print "  <input type='text' name=\"$name\" size=20  ";
                print ' value=" ' . htmlspecialchars($_POST[$name]) .  '"';
                print "  /> <label> </p>  ";
            }
            // 调用自定义函数
            print "  <form action='' method='post'>  ";

            make_text_input('first_name', 'First Name');
            make_text_input('last_name', 'Last Name');
            make_text_input('email', 'Email Address');

            print "  <input type='submit' name='submit' value='Register' /> </form>  ";
        ?>
</body>
</html>