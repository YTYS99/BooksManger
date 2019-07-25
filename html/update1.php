<?php
require('conn.php');

//修改图书信息
if (isset($_POST["submit1"])) {
    $code = $_POST["code"];
    $bname = $_POST["bname"];
    $ename = $_POST["ename"];
    $cp = $_POST["cp"];
    $sj = $_POST["sj"];
    $type = $_POST["type"];
    $sum1 = $_POST["sum1"];
    $sum2 = $_POST["sum2"];
    session_start();
    $id3=$_SESSION['id2'];

    $sql = "update books set code='$code',bname='$bname',ename='$ename',cp='$cp',sj='$sj',type1='$type',sum1='$sum1',sum2='$sum2' where id='$id3'";
    if($sum1-$sum2>0) {
        $result =mysql_query($sql);
        if ($result) {
            echo '<script>alert("修改成功！")</script>';
            echo '<script>window.location.replace("books.php")</script>';
        } else {
            echo '<script>alert("修改失败！")</script>';
            echo '<script>window.location.replace("books.php")</script>';
        }
    }else{
            echo '<script>alert("借出册数不能大于总册数！")</script>';
        echo '<script>window.location.replace("books.php")</script>';
        }
}
if(isset($_POST["esc"])){
    echo '<script>window.location.replace("books.php")</script>';
}

//添加图书信息
if (isset($_POST["submit2"])) {
    date_default_timezone_get('PRC');
    $time=date('Y-m-d H:i:s');
    $code = $_POST["code"];
    $bname = $_POST["bname"];
    $ename = $_POST["ename"];
    $cp = $_POST["cp"];
    $sj = $_POST["sj"];
    $type = $_POST["type"];
    $sum1 = $_POST["sum1"];
    $price = $_POST["price"];
    $sql1="select * from books where code='$code'";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_assoc($result1);
    if($row["code"]==$code){
        echo '<script>alert("已存在改条形码！")</script>';
        echo '<script>window.location.replace("add.php")</script>';
    }else {
        if ($price > 0) {
            $sql = "insert into books (code,bname,ename,cp,sj,type1,sum1,price,savetime)VALUES ('$code','$bname','$ename','$cp','$sj','$type','$sum1','$price','$time')";
            $result = mysql_query($sql);
            if ($result) {
                echo '<script>alert("添加成功！")</script>';
                echo '<script>window.location.replace("books.php")</script>';
            } else {
                echo '<script>alert("添加失败！")</script>';
                echo '<script>window.location.replace("add.php")</script>';
            }
        } else {
            echo '<script>alert("图书价格不能低于0！")</script>';
        }
    }
}


//修改用户信息
if (isset($_POST["submit3"])) {
    $account = $_POST["account"];
    $realname = $_POST["realname"];
    $password = $_POST["password"];
    $sex = $_POST["sex"];
    $root = $_POST["root"];
    session_start();
    $id4=$_SESSION['id3'];
    $sql = "update user set account='$account',realname='$realname',password='$password',sex='$sex',root='$root' where id='$id4'";
    $result =mysql_query($sql);

        if ($result) {
            echo '<script>alert("修改成功！")</script>';
            echo '<script>window.location.replace("users.php")</script>';
        } else {
            echo '<script>alert("修改失败！")</script>';
            echo '<script>window.location.replace("users.php")</script>';
        }
}

if(isset($_POST["esc1"])){
    echo '<script>window.location.replace("users.php")</script>';
}


//添加用户信息
if (isset($_POST["submit4"])) {
    $account = $_POST["account"];
    $realname = $_POST["realname"];
    $password = $_POST["password"];
    $sex = $_POST["sex"];
    $root = $_POST["root"];

    $sql = "select * from user";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    if($account==null || $realname==null || $password==null){
        echo '<script>alert("新添用户信息不能有空值！")</script>';
        echo '<script>history.go(-1)</script>';
    }else {
        if($account==$row["account"]){
            echo '<script>alert("添加失败！账号重复！")</script>';
            echo '<script>window.location.replace("add.php?id2=$id2")</script>';
        }else if($realname==$row["realname"]){
            echo '<script>alert("添加失败！用户名重复！")</script>';
            echo '<script>window.location.replace("add.php?id2=$id2")</script>';
        }else {
            $sql1 = "insert into user (account,realname,password,sex,root)VALUES ('$account','$realname','$password','$sex','$root')";
            $result1 = mysql_query($sql1);
            if ($result1) {
                echo '<script>alert("添加成功！")</script>';
                echo '<script>window.location.replace("users.php")</script>';
            } else {
                echo '<script>alert("添加失败!数据库未连接！")</script>';
//                echo '<script>window.location.replace("add.php?id2=$id2")</script>';
            }
        }
    }
}

/*借阅图书*/
if(isset($_POST['submit5'])){
    date_default_timezone_set('PRC');
    $time=date('Y-m-d H:i:s');
    $account=$_POST['account'];
    $realname=$_POST['realname'];
    $code=$_POST['code'];
    $bname=$_POST['bname'];
    $ename=$_POST['ename'];
    $price=$_POST['price'];
    $money=$_POST['money'];
    $sum1=$_POST['sum1'];
    $sum2=$_POST['sum2'];
    $sum3=$_POST['sum2']+1;

    $sql="insert into records (account,realname,code,bname,ename,price,statu,lendtime)VALUE('$account','$realname','$code','$bname','$ename','$price','借阅中','$time')";
    $sql1= "update books set sum2='$sum3' where code='$code'";
    $sql2="select account from records where code='$code' and statu='借阅中'";
    $result=mysql_query($sql2);
    $row = mysql_fetch_assoc($result);
    if($row!=0){
        echo '<script>alert("您已借阅此书，请勿重复借阅！")</script>';
        echo '<script>window.location.replace("lend.php?id5=$id5")</script>';
    }else if($sum1-$sum2<=0) {
        echo '<script>alert("该书可借阅量为0，不可借阅!")</script>';
            echo '<script>window.location.replace("lend.php?id5=$id5")</script>';
    }else if($money<0){
        echo '<script>alert("您有欠费未结清，请结清后再借阅！")</script>';
        echo '<script>window.location.replace("lend.php?id5=$id5")</script>';
    }else{
        mysql_query($sql);
        mysql_query($sql1);
        echo '<script>alert("借阅成功!")</script>';
        echo '<script>window.location.replace("lendbooks.php?id5=$id5")</script>';
    }
}
if(isset($_POST["esc2"])){
    echo '<script>window.location.replace("lendbooks.php?id5=$id5")</script>';
}

/*添加事件*/
if(isset($_POST["submit6"])){
    //获取当前时间
    date_default_timezone_set('PRC');
    $time=date('Y-m-d H:i:s');//系统当前时间
    $title=$_POST["title"];
    $date=$_POST["date"];//用户设定的事件截至时间
    $connect=$_POST["connect"];
    $type="待办事件";
    $timer=(strtotime($date)-strtotime($time))/60;//判定与当前时间相差的时间，精确到秒

    $sql12="select title,id from items where title='$title'";
    $result12=mysql_query($sql12);
    $row12 = mysql_fetch_assoc($result12);
    if(isset($title{12})) {
        if ($row12 > 0) {
            $id2 = $row12["id"];
            echo '<script>
                if(confirm("添加失败!标题已存在，是否对已有的进行修改！")){
                    window.location.replace("add.php?id2=$id2");
                }else{
                    window.location.replace("../umeditor-1.2.3/_examples/simpleDemo.html");
                }
                </script>';
        } else {
            if ($timer > 120 && $timer<10800 ) {//截至时间应设定超过当前时间两小时且小于七天
                $sql = "insert into items (title,date,todate,connect,type) VALUES ('$title','$time','$date','$connect','$type')";
                $result2 = mysql_query($sql);
                if ($result2) {
                    echo '<script>alert("添加成功!")</script>';
                    echo '<script>parent.location.replace("index.php")</script>';
                } else {
                    echo '<script>alert("添加失败!数据库链接失败")</script>';
                    echo '<script>window.location.replace("../umeditor-1.2.3/_examples/simpleDemo.html")</script>';
                }
            } else {
                echo '<script>alert("添加失败!截至时间应超过当前时间2小时或在7天内")</script>';
                echo '<script>window.location.replace("../umeditor-1.2.3/_examples/simpleDemo.html")</script>';
            }
        }
    }else{
        echo '<script>alert("标题长度需超过4个字且小于11个字")</script>';
        echo '<script>window.location.replace("../umeditor-1.2.3/_examples/simpleDemo.html")</script>';
    }
}


/*发布通知*/
if(isset($_POST["submit7"])){
    //获取当前时间
    date_default_timezone_set('PRC');
    $time=date('Y-m-d H:i:s');
    $title=$_POST["title"];
    $root=$_POST["root"];
    $connect=$_POST["connect"];
    $type="通知公告";
    $sql11="select title,id from items where title='$title'";
    $result11=mysql_query($sql11);
    $row11 = mysql_fetch_assoc($result11);

    if(isset($title{12})) {
        if ($row11 > 0) {
            $id2 = $row11["id"];
            echo '<script>
                    if(confirm("添加失败!标题已存在，是否对已有的进行修改！")){
                        window.location.replace("add.php?id2=$id2");
                    }else{
                        window.location.replace("../umeditor-1.2.3/_examples/addNote.html");
                    }
                </script>';
        } else {
            $sql="insert into items (title,date,Usertype,connect,type) VALUES ('$title','$time','$root','$connect','$type')";
            $result2=mysql_query($sql);
            if ($result2) {
                echo '<script>alert("添加成功!")</script>';
                echo '<script>parent.location.replace("index.php")</script>';
            } else {
                echo '<script>alert("添加失败!数据库链接失败")</script>';
                echo '<script>window.location.replace("../umeditor-1.2.3/_examples/addNote.html")</script>';
            }
        }
    }else{
        echo '<script>alert("标题长度需超过4个字且小于11个字")</script>';
        echo '<script>window.location.replace("../umeditor-1.2.3/_examples/addNote.html")</script>';
    }
}

/*发布新闻*/
if(isset($_POST["submit8"])){
    //获取当前时间
    date_default_timezone_set('PRC');
    $time=date('Y-m-d H:i:s');
    $title=$_POST["title"];
    $editor1=$_POST["Editor"];
    $connect=$_POST["connect"];
    $type1="新闻";
    $sql11="select title,id from New where title='$title'";
    $result11=mysql_query($sql11);
    $row11 = mysql_fetch_assoc($result11);

    if(isset($title{12})) {
        if ($row11 > 0) {
            $id3 = $row11["id"];
            echo '<script>
                    if(confirm("添加失败!标题已存在，是否对已有的进行修改！")){
                        window.location.replace("add.php?id3=$id3");
                    }else{
                        window.location.replace("../umeditor-1.2.3/_examples/addNews.html");
                    }
                </script>';
        } else {
            $sql="insert into New (title,Editor,connect,date,type) VALUES ('$title','$editor1','$connect','$time','$type1')";
            $result2=mysql_query($sql);
            if ($result2) {
                echo '<script>alert("添加成功!")</script>';
                echo '<script>parent.location.replace("index.php")</script>';
            } else {
                echo '<script>alert("添加失败!数据库链接失败")</script>';
                echo '<script>window.location.replace("../umeditor-1.2.3/_examples/addNews.html")</script>';
            }
        }
    }else{
        echo '<script>alert("标题长度需超过4个字")</script>';
        echo '<script>window.location.replace("../umeditor-1.2.3/_examples/addNews.html")</script>';
    }
}

//修改事件
if (isset($_POST["submit9"])) {
    $title = $_POST["title"];
    $date = $_POST["date"];
    $connect = $_POST["connect"];
    date_default_timezone_set('PRC');
    $time11=date('Y-m-d H:i:s');//系统当前时间

    session_start();
    $id9=$_SESSION['id9'];
    $sql = "update items set title='$title',todate='$date',connect='$connect',date='$time11' where id='$id9'";
    $result =mysql_query($sql);

    if ($result) {
        echo '<script>alert("修改成功！")</script>';
        echo '<script>window.location.replace("Items.php")</script>';
    } else {
        echo '<script>alert("修改失败！")</script>';
        echo '<script>window.location.replace("Items.php")</script>';
    }
}

if(isset($_POST["esc11"])){
    echo '<script>window.location.replace("Items.php")</script>';
}

//修改通知
if (isset($_POST["submit10"])) {
    $title = $_POST["title"];
    $root = $_POST["root"];
    $connect = $_POST["connect"];
    date_default_timezone_set('PRC');
    $time12=date('Y-m-d H:i:s');//系统当前时间

    session_start();
    $id10=$_SESSION['id10'];
    $sql = "update items set title='$title',Usertype='$root',connect='$connect',date='$time12' where id='$id10'";
    $result =mysql_query($sql);

    if ($result) {
        echo '<script>alert("修改成功！")</script>';
        echo '<script>window.location.replace("Note.php")</script>';
    } else {
        echo '<script>alert("修改失败！")</script>';
        echo '<script>window.location.replace("Note.php")</script>';
    }
}

if(isset($_POST["esc12"])){
    echo '<script>window.location.replace("Note.php")</script>';
}

//修改新闻
if (isset($_POST["submit11"])) {
    $title = $_POST["title"];
    $editor = $_POST["Editor"];
    $connect = $_POST["connect"];
    date_default_timezone_set('PRC');
    $time13=date('Y-m-d H:i:s');//系统当前时间

    session_start();
    $id11=$_SESSION['id11'];
    $sql = "update New set title='$title',Editor='$editor',connect='$connect',date='$time13' where id='$id11'";
    $result =mysql_query($sql);

    if ($result) {
        echo '<script>alert("修改成功！")</script>';
        echo '<script>window.location.replace("News.php")</script>';
    } else {
        echo '<script>alert("修改失败！")</script>';
        echo '<script>window.location.replace("News.php")</script>';
    }
}

if(isset($_POST["esc13"])){
    echo '<script>window.location.replace("News.php")</script>';
}
?>