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
</head>

<body>
<div class="box">

     <div class="title">
            <table border="0" width="100%" bgcolor="#f7f7f7" cellspacing="0">
            <tr>
                <?php
                session_start();
                $root=$_SESSION['root'];
                $account=$_SESSION['account'];
                ?>
                <td width="5%">序号</td>
                <td width="10%">条形码</td>
                <td width="20%">书名</td>
                <td width="10%">作者</td>
                <td width="18%">出版社</td>
                <td width="12%">类型</td>
                <td width = "8%" >可借</td >
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
         $result=mysql_query("select count(ID) from Books",$conn);
         //$result=mysql_query("select * from books",$conn);
         $row=mysql_fetch_row($result);
         $RecordCount=$row[0];
         $PageCount=ceil($RecordCount/$PageSize);
         $pre = ($Page-1)*$PageSize;
         $sql = "select * from Books limit $pre,$PageSize";
         $result=mysql_query($sql);
         $i=0;
     ?>

     <table border="0" width="100%"  cellspacing="0" id="tab" >
         <?php while($row=mysql_fetch_assoc($result)){
             $i++
         ?>
         <tr>
             <td width="5%"><?php echo $i ?></td>
             <td width="10%"><?php echo $row['code']; ?></td>
             <td width="20%"><?php echo $row['bname']; ?></td>
             <td width="10%"><?php echo $row['ename']; ?></td>
             <td width="18%"><?php echo $row['cp']; ?></td>
             <td width="12%"><?php echo $row['type1']; ?></td>
             <td width="8%"><?php echo $row['sum1'] - $row['sum2'] . "本" ?></td>
             <td width = "7.5%" ><a href="update.php?id2=<?php echo $row['id'];?>">修改</a ></td >
             <td width = "7.5%" ><a href = "delete.php?id1=<?php echo $row['id'];?>" > 删除</a ></td >
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