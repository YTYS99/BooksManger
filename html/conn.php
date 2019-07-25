<?php
@header("Content-Type:text/html;charset=utf-8");
//    连接数据库
$conn = mysql_connect("localhost","root","");
//    设置字符集
mysql_query("set names 'utf8'");
mysql_select_db("library",$conn);



if(!$conn){
    die("数据连接失败！".mysql_errno());
}
?>