<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\AppServ\www\HF170621_zc\public/../application/index\view\link\welcome.html";i:1514032081;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欢迎</title>
    <link rel="stylesheet" href="__STATIC__/css/bootstrap.min.css">
</head>
<body style="background-color: #afd0f1">
<div class="container">
    <div class="h2"><span>欢迎您，</span><span id="my_ename">123</span></div>
    <div class="h3"><span>您的工号是：</span><span id="my_eid">abc</span></div>
    <div class="h3"><span>您的角色是：</span><span id="my_cha">超管</span></div>
</div>
</body>
<script>
    var welcome_ajax = '<?php echo url("index/Login/welcome"); ?>';
</script>
<script src="__STATIC__/js/jquery-3.2.1.min.js"></script>
<script src="__STATIC__/js/bootstrap.min.js"></script>
<script src="__STATIC__/js/welcome.js"></script>
</html>