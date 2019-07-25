<!--通知管理界面-->
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <link href="../css/books.css" rel="stylesheet" type="text/css" />
        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                $('#tab tr:odd').addClass('even');
                $('tr:even').addClass('odd');

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
    </head>

<body>
<div class="box">
    <div class="title">
        <table border="0" width="100%" bgcolor="#f7f7f7" cellspacing="0">
            <tr>
                <td width="5%">序号</td>
                <td width="20%">通知标题</td>
                <td width="20%">创建时间</td>
                <td width="20%">用户集</td>
                <td width = "15%">操作</td >
            </tr>
        </table>
    </div>

    <div class="connet">
        <?php
        require('conn.php');
        if(isset($_GET['page']) && (int)$_GET['page']>0)
            $Page=$_GET['page'];
        else $Page=1;
        $PageSize=10;
        $result=mysql_query("select count(ID) from items where type='通知公告'",$conn);
        //$result=mysql_query("select * from books",$conn);
        $row=mysql_fetch_row($result);
        $RecordCount=$row[0];
        $PageCount=ceil($RecordCount/$PageSize);
        $pre = ($Page-1)*$PageSize;
        $sql = "select * from items where type='通知公告' order by id desc limit $pre,$PageSize";
        $result=mysql_query($sql);
        $i=0;
        ?>

        <table border="0" width="100%"  cellspacing="0" id="tab">
            <?php while($row=mysql_fetch_assoc($result)){
                $i++
                ?>
                <tr>
                    <td width="5%"><?php echo $i ?></td>
                    <td width="20%"><?php echo $row['title']; ?></td>
                    <td width="20%"><?php echo $row['date']; ?></td>
                    <td width="20%"><?php echo $row['Usertype']; ?></td>
                    <td width = "7.5%" ><a href="../umeditor-1.2.3/_examples/update.php?id2=<?php echo $row['id'];?>">修改</a ></td >
                    <td width = "7.5%" ><a href = "delete.php?id3=<?php echo $row['id'];?>" > 删除</a ></td >
                </tr>
            <?php }?>
        </table>
    </div>

    <div class="kz">

        <label style="float:left;">
            <?php
            echo "当前第".$Page."页，共".$PageCount."页&nbsp;&nbsp;&nbsp;&nbsp;";
            ?>
        </label>
        <label style="float:right;margin-top: 0.5%">
            <?php
            if($Page==1)
                echo "<a style='border-radius:3px 0 0 3px'>上一页</a>";
            else
                echo "<a href='?page=".($Page-1)."' style='border-radius:3px 0 0 3px'>上一页</a>";

            for($i=1;$i<=$PageCount;$i++){
                if($i==$Page)
                    echo "<a>$i</a>";
                else
                    echo "<a href='?page=$i'>$i</a>";
            }
            if($Page==$PageCount)
                echo "<a style='border-right:1px solid #999;border-radius:0 3px 3px 0'>下一页</a>";
            else
                echo "<a href='?page=".($Page+1)." ' style='border-right:1px solid #999;border-radius:0 3px 3px 0'>下一页</a>";
            ?>
        </label>
    </div>
</div>
</body>
</html>