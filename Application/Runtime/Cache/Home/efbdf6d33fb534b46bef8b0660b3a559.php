<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <title>跳转提示</title>
    <style type="text/css">
        *{ padding: 0; margin: 0; }
        body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 14px; }

        .message{width: 400px; margin:auto;border:1px solid #1B8F24;margin-top: 10%;}
        .head{width: 100%;height: 30px;background: rgb(222,245,194);text-align: center;padding-top: 5px;}
        .content{height: 120px;width: 100%;}
        .success ,.error{text-align: center;margin-top: 30px;}
        .jump{text-align: center;margin-top: 20px;}
    </style>

</head>

<body>
<div class="message">

    <div class="content" style="min-height:150px;">

        <?php if(isset($message)) {?>

        <p class="success"><span style="color:#00F; font-size:16px;"><?php echo($message); ?></span></p>

        <?php }else{?>

        <p class="error"><span style="color:#F00; font-size:16px;"><?php echo($error); ?></span></p>

        <?php }?>

        <p class="detail"></p>

        <p class="jump">

            <a id="href" href="<?php echo($jumpUrl); ?>">wait 3 s...</a>

            <br /><br />

            wait： <b id="wait"><?php echo($waitSecond); ?></b>

        </p>

    </div>

</div>
<script src="__COMMON__/js/alert.js"></script>
<script type="text/javascript">

    (function(){

        var wait = document.getElementById('wait'),href = document.getElementById('href').href;

        var interval = setInterval(function(){

            var time = --wait.innerHTML;

            if(time <= 0) {

                if (href === 'javascript:history.back(-1);') {
                    Tool.closeWindow();
                }
                location.href = href;


                clearInterval(interval);

            }

        }, 1000);

    })();
</script>

</body>

</html>