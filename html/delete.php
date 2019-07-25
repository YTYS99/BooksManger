<?php
require('conn.php');
//删除图书信息
if(@$_GET["id1"]) {
    $id1 = intval($_GET["id1"]);//获取成绩管理中的id并转换成整形
    $sql = "delete from books where id=$id1";
    if (mysql_query($sql) && mysql_affected_rows() == 1) {
        echo "<script>alert('删除成功！');</script>";
        echo '<script>window.location="books.php";</script>';
    } else {
        echo "<script>alert('删除失败！');</script>";
        echo '<script>window.location="books.php";</script>';
    }
}

//删除用户信息
if(@$_GET["id2"]) {
    $id2 = intval($_GET["id2"]);//获取成绩管理中的id并转换成整形
    $sql = "delete from user where id=$id2";
    if (mysql_query($sql) && mysql_affected_rows() == 1) {
        echo "<script>alert('删除成功！');</script>";
        echo '<script>window.location="users.php";</script>';
    } else {
        echo "<script>alert('删除失败！');</script>";
        echo '<script>window.location="users.php";</script>';
    }
}

//删除通知
if(@$_GET["id3"]) {
    $id3 = intval($_GET["id3"]);//获取成绩管理中的id并转换成整形
    $sql = "delete from items where id=$id3";
    if (mysql_query($sql) && mysql_affected_rows() == 1) {
        echo "<script>alert('删除成功！');</script>";
        echo '<script>window.location="Note.php";</script>';
    } else {
        echo "<script>alert('删除失败！');</script>";
        echo '<script>window.location="Note.php";</script>';
    }
}

//删除事件
if(@$_GET["id4"]) {
    $id4 = intval($_GET["id4"]);//获取成绩管理中的id并转换成整形
    $sql = "delete from items where id=$id4";
    if (mysql_query($sql) && mysql_affected_rows() == 1) {
        echo "<script>alert('删除成功！');</script>";
        echo '<script>window.location="Items.php";</script>';
    } else {
        echo "<script>alert('删除失败！');</script>";
        echo '<script>window.location="Items.php";</script>';
    }
}

//删除事新闻
if(@$_GET["id5"]) {
    $id5 = intval($_GET["id5"]);//获取成绩管理中的id并转换成整形
    $sql = "delete from New where id=$id5";
    if (mysql_query($sql) && mysql_affected_rows() == 1) {
        echo "<script>alert('删除成功！');</script>";
        echo '<script>window.location="News.php";</script>';
    } else {
        echo "<script>alert('删除失败！');</script>";
        echo '<script>window.location="News.php";</script>';
    }
}
 ?>