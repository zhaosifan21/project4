<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\AppServ\www\HF170621_zc\public/../application/index\view\link\flashsell.html";i:1514012576;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="__STATIC__/css/bootstrap.min.css">
    <!--[if lt IE 9]>
    <script type="text/javascript" src="__STATIC__/lib/html5shiv.js"></script>
    <script type="text/javascript" src="__STATIC__/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="__STATIC__/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <link rel="stylesheet" href="__STATIC__/css/flashsell.css">
    <title>限时抢购发布</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 众筹管理 <span class="c-gray en">&gt;</span> 限时抢购发布 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<form id="upform">
    <div id="form_left">
        <div id="form1">
            <div id="gname0">商品名称:</div>
            <input type="text" class="form-control" maxlength="20" id="gname" name="gname" placeholder="请输入商品名称">
        </div>
        <div id="form2">
            <div id="starttime0">开始时间:</div>
            <input class="form-control" type="datetime-local" id="starttime" name="starttime">
        </div>
        <div id="form3">
            <div id="endtime0">结束时间:</div>
            <input class="form-control" type="datetime-local" id="endtime" name="endtime">
        </div>
        <div id="form4">
            <div id="gprice0">商品总价:</div>
            <input class="form-control" type="number" id="gprice" name="gprice">
        </div>
        <div id="form5">
            <div id="gnum0">分配数量:</div>
            <input class="form-control" type="number" id="gnum" name="gnum" min="1" max="5000">
        </div>
    </div>
    <div id="form_right">
        <div id="form_uppic">
            <div id="gpic0">上传图片:</div>
            <input type="file" name="img" id="gpic" onchange="imgPreview(this)"/>
        </div>
        <img id="image" src="__STATIC__/images/1.jpg" height="240" width="400" alt="图片预览">
    </div>
    <div id="form_bottom">
        <div id="form_intro">
            <div id="intro0">商品简介:</div>
            <input class="form-control" type="text" id="intro" name="intro">
        </div>
        <div id="form_submit">
            <button type="button" class="btn btn-warning" id="sub_button">提交</button>
        </div>
    </div>
</form>
</body>
<script type="text/javascript" src="__STATIC__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__STATIC__/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__STATIC__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/laypage/1.2/laypage.js"></script>
<script>
    function imgPreview(filedom)
    {
        if(window.FileReader){
            var fr = new FileReader();
        }
        else{
            alert('不支持图片预览');
        }
        var file = filedom.files[0];
        var imageType = /^image\//;
        if(file && !imageType.test(file.type)){
            alert('请选择图片');
            return;
        }
        if(file){
            fr.onloadend = function(e){
                document.getElementById('image').src = e.target.result;
                document.getElementById('image').style.display = 'block';
            };
            fr.readAsDataURL(file);
        }
    }
</script>
</html>