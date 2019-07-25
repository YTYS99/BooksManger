<!--借阅图书-->
<?php if(@$_GET["id1"]) {
require('conn.php');
if(isset($_POST['submit1'])){
    session_start();
    $code=$_POST['code'];
    $account=$_SESSION['account'];
    $sql="select * from books where code='$code'";
    $sql1="select * from user where account='$account'";
    $result=mysql_query($sql);
    $result1=mysql_query($sql1);
    $row1 = mysql_fetch_assoc($result1);
    $row = mysql_fetch_assoc($result);
    if($row==0){
        echo '<script>alert("条形码不存在！请重新输入");history.go(-1)</script>';
    }else{
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body{
            margin: 0 0;
        }
        .user-box{
            width: 30%;
            height: 500px;
            margin: 1% 1%;
            border: 1px solid #000000;
        }
        .book-box{
            width: 67%;
            height: 500px;
            position: relative;
            margin: -514px 1%;
            float: right;
            border: 1px solid #000000;
        }
        .title{
            width: 80px;
            height: 30px;
            margin: -3.5% 2%;
            text-align: center;
            background-color: #ffffff;
        }
        .title1{
            width: 80px;
            height: 30px;
            margin: -1.5% 2%;
            text-align: center;
            background-color: #ffffff;
        }
        .input-user{
            margin-top: 15%;
        }
        .input-user input{
            width: 60%;
            height: 30px;
            margin: 5% 0;
            text-align: center;
            font-weight: bold;
        }
        .money{
            width: 100px;
            height: 30px;
            margin: 5% 0;
            text-align: center;
            font-weight: bold;
        }
        .input-books{
            margin-top: 6%;
        }
        .input-books input{
            height: 30px;
            margin:2.5% 0;
            text-align: center;
            font-weight: bold;
        }
        .input-books p{
            margin-left: 2%;
        }
    </style>
</head>
<body>
<form action="update1.php" method="post">
    <div class="user-box">
        <div class="title">用户信息</div>
            <div class="input-user">
                <p align="center">借书证号：<input type="text" name="account" value="<?php echo $row1['account']?>" /></p>
                <p align="center">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：<input type="text" name="realname" value="<?php echo $row1['realname']?>" /></p>
                <p align="center">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<input type="text" name="sex" value="<?php echo $row1['sex']?>" /></p>
                <p align="center">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;院：<input type="text" name="sch" value="<?php echo $row1['sch']?>" /></p>
            </div>
            <p align="center">共计欠费：<input type="text" name="money" value="<?php echo $row1['money']?>" class="money" />元</p>
    </div>

    <div class="book-box">
        <div class="title1">图书信息</div>
            <div class="input-books">
                <p>条&nbsp;&nbsp;形&nbsp;&nbsp;码：<input type="text" name="code" value="<?php echo $row['code']?>" readonly="readonly">
                作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;者：<input type="text" name="ename" value="<?php echo $row['ename']?>" readonly="readonly">
                价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：<input type="text" name="price" value="<?php echo $row['price']?>" readonly="readonly" style="width: 10%"> </p>
                <p>书&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：<input type="text" name="bname" value="<?php echo $row['bname']?>" readonly="readonly" style="width: 50%"> </p>
                <p>出&nbsp;&nbsp;版&nbsp;&nbsp;社：<input type="text" name="cp" value="<?php echo $row['cp']?>" readonly="readonly" style="width: 50%">
                <p>馆藏数：<input type="text" name="sum1" value="<?php echo $row['sum1']?>" readonly="readonly">
                借出本数：<input type="text" name="sum2" value="<?php echo $row['sum2']?>" readonly="readonly"> </p>
                <p style="color: red;" align="center">请确认信息无误后再借阅图书！</p>
                <p align="center"><input type="submit" name="submit5" value="借阅" style="width: 10%;height: 30px;cursor: pointer">
                    <input type="submit" name="esc2" value="取消" style="width: 10%;height: 30px;margin-left: 5%;cursor: pointer"> </p>
            </div>
    </div>
</form>
</body>
</html>
<?php }}}?>

<!--归还图书-->
<?php if(@$_GET["id2"]) {
    require('conn.php');
    if(isset($_POST['submit2'])){
        date_default_timezone_set('PRC');
        $time=date('Y-m-d H:i:s');
        session_start();
        $code=$_POST['code'];
        $account=$_SESSION['account'];
        $sql="select code from books where code='$code'";
        $sql1="select code,account,statu from records where  code='$code' and account='$account'and statu='借阅中'";
        $sql2="update records set statu='已归还',returntime='$time' where code='$code' and account='$account'";
        $sql3="update books set  sum2=sum2-1";
        $result=mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        $result1=mysql_query($sql1);
        $row1 = mysql_fetch_assoc($result1);
        if($row==0){
            echo '<script>alert("条形码不存在！请重新输入")</script>';
            echo '<script>window.location.replace("lendbooks.php?id6=$id6")</script>';
        }else if($row1==0){
            echo '<script>alert("您没有借阅此书！")</script>';
            echo '<script>window.location.replace("lendbooks.php?id6=$id6")</script>';
        }else{
            echo '<script>alert("归还成功！")</script>';
            mysql_query($sql2);
            mysql_query($sql3);
            echo '<script>window.location.replace("lendbooks.php?id6=$id6")</script>';
        }
    }
}?>