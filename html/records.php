<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/records.css" type="text/css"/>
</head>
<body>
<div class="solid-box">
    <?php
    require('conn.php');
    session_start();
    $account=$_SESSION['account'];
    $sql="select * from records where account='$account' order by id desc";
    $result=mysql_query($sql);
    $ro=mysql_num_rows($result);
    $i=0;
    while($row=mysql_fetch_assoc($result)){
        if($ro!=null){
            $i++;
            $bname=$row['bname'];
            $sql1="select cp from books where bname='$bname'";
            $row1=mysql_fetch_assoc(mysql_query($sql1));
            ?>
            <div class="result-box">
                <div class="left-box">
                    <p style="font-size: 18px;letter-spacing: 2px;font-weight: bold"><?php echo $i?>.<a href="#" style="text-decoration: none"><?php echo $row['bname']?></a></p>
                    <p style="font-size: 14px;letter-spacing: 2px;color: #999;margin-left: 3.5%;margin-top: 2%;">作者：<?php echo $row['ename']?>&nbsp;&nbsp;&nbsp;&nbsp;条形码：<?php echo $row['code']?></p>
                    <p style="font-size: 14px;letter-spacing: 2px;color: #999;margin-left: 3.5%;margin-top: 2%;">出版社：<?php echo $row1['cp']?></p>
                </div>

                <div class="right-box">
                    <?php if($row['statu']=='借阅中'){?>
                        <p align="right" style="font-size: 14px;letter-spacing: 2px;color: #999;margin-left: 3.5%;margin-top: 5%;margin-right: 3%;z-index: 999;">借阅时间：<?php echo $row['lendtime']?></p>
                        <img src="../img/lendimg.png" width="129" height="78" style="margin-left: 65%;margin-top: -11%;z-index: 1;opacity: 0.3"/>
                    <?php }else{?>
                        <p align="right" style="font-size: 14px;letter-spacing: 2px;color: #999;margin-left: 3.5%;margin-right: 3%;">借阅时间：<?php echo $row['lendtime']?></p>
                        <p align="right" style="font-size: 14px;letter-spacing: 2px;color: #999;margin-left: 3.5%;margin-right: 3%;">归还时间：<?php echo $row['returntime']?></p>
                        <img src="../img/returnimg.png" width="129" height="78" style="margin-left: 65%;margin-top: -14%;z-index: 1;opacity: 0.3"/>
                    <?php }?>
                </div>
            </div>
        <?php }else if($ro==0){ ?>
            <div class="n-result">
                <p align="center" style="color: black;font-size: 18px;margin-top: 200px">没有借阅记录！</p>
            </div>
    <?php }}?>
</div>
</body>
</html>