<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <link rel="stylesheet" href="Public/bootstrap/css/font-awesome.min.css">

    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}

        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>
<body>

<h3>Contact Form</h3>
<a href="javascript:history.go(-1);" data-toggle="tooltip"
><i class="fa fa-reply"></i></a>
<div class="container">
    <form action="<?php echo U('addData');?>" method="post">
        <label >Name</label>
        <input type="text" id="fname" name="name" placeholder=" name..">

        <label >Weight</label>
        <input type="text"  name="weight" placeholder="Weight..">

        <label >Price</label>
        <input type="text"  name="price" placeholder="Price..">

        <label >pic_url</label>
        <input type="file" name="pic_url" onclick="showDiv()" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
        <br>
        <div id="welcomeDiv"  style="display:none;" class="answer_list" >
            <img id="blah" alt="your image" width="100" height="100" /><br>
        </div>
        <br>

        <input type="checkbox"  name="status">Display
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
<script>
    function showDiv() {
        document.getElementById('welcomeDiv').style.display = "block";
    }
</script>
</html>