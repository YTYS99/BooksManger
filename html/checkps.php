<?php
@header("Content-Type:text/html;charset=utf-8");
require("conn.php");

if(isset($_POST["submit"])){
    $ys1=$_POST["ys"];
    $ns=$_POST["ns"];
    $ns1=$_POST["ns1"];
    session_start();
    $account=$_SESSION["account"];
    $password=$_SESSION["password"];
    $sql = "update user set password='$ns1' where account='$account'";
    if($ys1==$password){
        $result=mysql_query($sql);
        if($result){
            echo "<script>alert('密码修改成功！');parent.location.replace('index.php')</script>";
            echo "<script>window.location.replace('../../Library/html/Loading.php')</script>";
            session_destroy();
        }else{
            echo "<script>alert('密码修改失败！');window.location.replace('updatepassword.html')</script>";
        }
    }else{
        echo "<script>alert('原密码错误！');window.location.replace('updatepassword.html')</script>";
    }

}
?>