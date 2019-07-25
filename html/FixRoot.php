<?php
@header("Content-Type:text/html;charset=utf-8");
require("conn.php");

if(isset($_POST["submit1"])){
    $account=$_POST["account"];//修改权限的账号
    $nr = $_POST["nr"];//当前权限
    $fr = $_POST["fr"];//修改后的权限

    $sql = "update user set root='$fr' where account='$account'";
    session_start();
    if($nr != $fr){
        $result=mysql_query($sql);
        if($result){
            if($account==$_SESSION["account"]){//判断是否改变当前用户的权限，如若是，更改后不是管理员则退出当前页面
                $_SESSION["root"]=$fr;
                echo '<script>alert("修改成功！");parent.location.replace("index.php")</script>';
            }else{
                echo '<script>alert("修改成功！");parent.location.replace("index.php")</script>';
            }
        }else{
            echo '<script>alert("修改失败！");window.location.replace("RootManger.php")</script>';
        }
    }else{
        echo '<script>alert("与当前权限相同！无需修改");window.location.replace("RootManger.php");</script>';
    }

}
?>
