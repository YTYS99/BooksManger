<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="../css/books.css" rel="stylesheet" type="text/css" />
    <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#tab tr:odd').addClass('even');
            $('#tab tr:even').addClass('odd');

            $('#tab tr').mouseover(function(){
                $(this).addClass('tr1');
            });

            $('#tab tr').mouseout(function(){
                $(this).removeClass('tr1');
            });
            $("#lend a").css({"background":"#ffffff","border":"1px solid #cccccc","color":"#cccccc"});
            $("#return a").css({"background":"#F8B208","border":"none","color":"#ffffff"});
            $("#return a").mouseover(function(){
                $(this).css({"background":"#ffffff","border":"1px solid #999","color":"#000000"});
            });
            $("#return a").mouseout(function(){
                $(this).css({"background":"#F8B208","border":"none","color":"#ffffff"});
            });
        });
    </script>
    <style type="text/css">
        .connet{
            height: 100%;
            overflow-y:scroll;
        }
        .connet::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
<div class="box">
    <?php
    $files=array('index.php','books-manger.html','conn.php','Files.php','records.php'
    ,'user-center.html','users.php','contrel-manger.html','checkps.php','books.php'
    ,'add.php','search.html','updatepassword.html','books-manger.html','control.php'
    ,'delete.php','FixRoot.php','Items.php','lendbooks.php','News.php','Note.php','RootManger.php'
    ,'Searchbook.php','SearchItems.php','SearchNews.php','SearchNote.php','SearchUser.php','update.php'
    ,'update1.php');
    ?>
    <div class="title">
        <table border="0" width="100%" bgcolor="#f7f7f7" cellspacing="0">
            <tr align="center">
                <td width="20%">名称</td>
                <td width="10%" align="center">扩展名</td>
                <td width="35%">路径</td>
                <td width="15%">大小</td>
                <td width="20%">最后修改时间</td>
            </tr>
        </table>
    </div>

    <div class="connet">
        <table border="0" width="100%" cellspacing="0" id="tab" >
            <?php foreach($files as $value){ ?>
                <tr align="center">
                    <td width="20%"><?php echo basename($value);?></td>
                    <?php $patharr=pathinfo($value);?>
                    <td width="10%">.<?php echo $patharr['extension'] ?></td>
                    <td width="35%"><?php echo realpath($value)?></td>
                    <td width="15%"><?php $num=floatval(filesize($value)/1024);echo round($num,2) ?>&nbsp;&nbsp;<b>KB</b></td>
                    <td width="20%"><?php echo date('Y-m-d H:i:s',filectime($value)) ?></td>
                </tr>
            <?php }?>
        </table>
    </div>

</div>
</body>
</html>