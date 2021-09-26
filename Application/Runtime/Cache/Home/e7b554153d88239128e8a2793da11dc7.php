<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <link rel="stylesheet" href="Public/bootstrap/css/font-awesome.min.css">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>Product Table</h2>
<a href="<?php echo U('add');?>">
    <i class="fa fa-plus fa-10x	"></i>
</a>
<br><br>
<table id="mytable">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>weight</th>
        <th>price</th>
        <th>shipping</th>
        <th>create_time</th>
        <th>display</th>
        <th>Operation</th>
    </tr>
    <?php if(is_array($data)): foreach($data as $k=>$vo): ?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["name"]); ?></td>
            <td><?php echo ($vo["weight"]); ?></td>
            <td><?php echo ($vo["price"]); ?></td>
            <td><?php echo ($vo["shipping"]); ?></td>
            <td><?php echo (date("Y-m-d
                ",$vo["create_time"])); ?></td>
            <td>

                <a class="btn btn-danger"
                   class="btn btn-danger del_btn confirm_btn"
                   onclick="(new DeleteData(this)).editStatus()"
                   data-id-name="id"
                   data-url="<?php echo U('editStatus');?>"
                   data-id="<?php echo ($vo["id"]); ?>" data-toggle="modal"
                ><?php echo ($status[$vo['status']]); ?></a>
            </td>
            <td>
                <a class="btn btn-primary"
                   href="<?php echo U('edit',['id'=>$vo['id']]);?>">
                    <i class="fa fa-edit"></i>
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-danger"
                   class="btn btn-danger del_btn confirm_btn"
                   onclick="(new DeleteData(this)).deleteSource()"
                   data-id-name="id"
                   data-url="<?php echo U('delete');?>"
                   data-id="<?php echo ($vo["id"]); ?>" data-toggle="modal"
                ><i class="fa fa-trash-o"></i></a>
            </td>
        </tr><?php endforeach; endif; ?>

</table>

</body>
<script>
    function DeleteData(obj) {
        var _obj = obj;

        var _url;

        var _json = {};


        this.deleteSource = function() {
            _url = _obj.getAttribute('data-url');

            _json[obj.getAttribute('data-id-name')] = obj.getAttribute('data-id');
            let exec = confirm("Are You Sure");

            if (exec === true) {
                var url = obj.getAttribute('data-url');
                var data = _json;
                fetch(url, {
                    method: 'POST', // or 'PUT'
                    body: JSON.stringify(data), // data can be `string` or {object}!
                    headers:{
                        'Content-Type': 'application/json'
                    }
                }).then(res => res.json())
                    .then(response => window.location.reload(true))
                    .catch(error => console.error('Error:', error));

            }
        }

        this.editStatus = function() {
            _url = _obj.getAttribute('data-url');

            _json[obj.getAttribute('data-id-name')] = obj.getAttribute('data-id');

                var url = obj.getAttribute('data-url');
                var data = _json;
                fetch(url, {
                    method: 'POST', // or 'PUT'
                    body: JSON.stringify(data), // data can be `string` or {object}!
                    headers:{
                        'Content-Type': 'application/json'
                    }
                }).then(res => res.json())
                    .then(response => window.location.reload(true))
                    .catch(error => console.error('Error:', error));

            }
    }
</script>

</html>