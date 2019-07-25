<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="../css/users.css" rel="stylesheet" type="text/css" />
    <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tab tr:odd').addClass('even');
            $('#tab tr:even').addClass('odd');

            $('#tab tr').mouseover(function(){
                $(this).addClass('tr1');
            });

            $('#tab tr').mouseout(function(){
                $(this).removeClass('tr1');
            });
            $('input:radio').click(function(){
                $('#tj').submit();
            });
        });
        $(function(){
            var len = $('table tr').length;
            for(var i = 1;i<len;i++){
                $('table tr:eq('+i+') td:first').text(i);
            }
        });


    </script>
</head>

<body  unselectable="on">

<div class="top" style="font-size: 14px; text-align: center">
    <form action="users.php" method="post" id="tj">
        <label>
            <input type="radio" id="btn1" name="type11" id="admin" value="管理员"/>管理员
            <input type="radio" id="btn2" name="type11" id="teacher" value="教师"/>教师
            <input type="radio" id="btn3" name="type11" id="student" value="学生"/>学生
        </label>
    </form>
</div>

<div class="title">
    <table border="0" width="100%" bgcolor="#f7f7f7" cellspacing="0">
        <tr>
            <td width="5%">序号</td>
            <td width="20%">账号</td>
            <td width="10%">姓名</td>
            <td width="20%">密码</td>
            <td width="10%">性别</td>
            <td width="15%">用户类型</td>
            <td width = "20%" > 操作</td >
        </tr>

    </table>
</div>


    <?php
    require('conn.php');
    if(isset($_GET['page']) && (int)$_GET['page']>0)
        $Page=$_GET['page'];
    else $Page=1;
    $PageSize=10;
    if(@$_POST["type11"]=="管理员") {
        $sql1="select count(ID) from user where root='管理员'";
    }else if(@$_POST["type11"]=="教师"){
        $sql1="select count(ID) from user where root='教师'";
    }else if(@$_POST["type11"]=="学生") {
        $sql1="select count(ID) from user where root='学生'";
    }else{
        $sql1="select count(ID) from user where root='管理员'";
    }
    $result=mysql_query("$sql1",$conn);
    $row=mysql_fetch_row($result);
    $RecordCount=$row[0];
    $PageCount=ceil($RecordCount/$PageSize);
    $pre = ($Page-1)*$PageSize;
    ?>

<!--管理员的表-->
<div class="connet">
    <?php
    session_start();
    if(@$_POST["type11"]=="管理员") {
        $sql = "select * from user where root='管理员' limit $pre,$PageSize";
        $_SESSION['type']=$_POST['type11'];
       echo '<script>$("input[name=type11][value=管理员]").attr("checked",true);</script>';
    }else if(@$_POST["type11"]=="教师"){
        $sql = "select * from user where root='教师' limit $pre,$PageSize";
        $_SESSION['type']=$_POST['type11'];
        echo '<script>$("input[name=type11][value=教师]").attr("checked",true);</script>';
    }else if(@$_POST["type11"]=="学生") {
        $sql = "select * from user where root='学生' limit $pre,$PageSize";
        $_SESSION['type']=$_POST['type11'];
        echo '<script>$("input[name=type11][value=学生]").attr("checked",true);</script>';
    }else{
        $tp=$_SESSION['root'];
        $sql = "select * from user where root='$tp' limit $pre,$PageSize";
        echo '<script>$("input[name=type11][value=管理员]").attr("checked",true);</script>';
    }

    $result=mysql_query($sql);?>
    <table border="0" width="100%" cellspacing="0" id="tab" >
        <?php while($row=mysql_fetch_assoc($result)){ ?>
            <tr>
                <td width="5%" ></td>
                <td width="20%"><?php echo $row['account']; ?></td>
                <td width="10%"><?php echo $row['realname']; ?></td>
                <td width="20%"><?php echo $row['password']; ?></td>
                <td width="10%"><?php echo $row['sex']; ?></td>
                <td width="15%"><?php echo $row['root']; ?></td>
                <td width = "10%" ><a href="update.php?id3=<?php echo $row['ID'] ?>">修改</a ></td >
                <td width = "10%" ><a href="delete.php?id2=<?php echo $row['ID'] ?>" > 删除</a ></td >
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
</body>
</html>