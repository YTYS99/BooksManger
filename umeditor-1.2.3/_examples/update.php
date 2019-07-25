<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="../themes/default/_css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="../third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="../umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="editor_api.js"></script>
    <script type="text/javascript" src="../lang/zh-cn/zh-cn.js"></script>
    <style>
        body{
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        .body1{
            width: 100%;
            height:100%;
        }
        input[type=text]{
            width: 300px;
            height: 30px;
            padding: 0 10px;
        }
        select{
            width: 290px;
            height: 25px;
        }
        input[type=date]{
            width: 290px;
            height: 25px;
        }
        input[type=submit]{
            cursor: pointer;
            width: 50px;
            height: 25px;
            margin-left: 42.5%;
            margin-top: 5px;
            outline: none;
            border: 1px solid #999999;
            background-color: #ffffff;
        }
        input[type=submit]:hover{
            color: #ffffff;
            border: 1px solid #4A90E2;
            background-color: #4A90E2;
        }
        input[type=reset]{
            cursor: pointer;
            width: 50px;
            height: 25px;
            margin-top: 5px;
            margin-left: 20px;
            outline: none;
            border: 1px solid #999999;
            background-color: #ffffff;
        }

    </style>
    <script>
        window.onload=function(){
            var box = document.getElementById("box");
            var input = box.getElementsByTagName("input");
            for(var i=0;i<2;i++){
                input[i].index=i;
                input[i].onfocus=function(){
                    var i1 = this.index;
                    input[i1].style.border="1px solid rgb(0,0,255)";
                    input[i1].style.boxShadow="0 0 10px rgba(0,0,255,0.2)";
                }
                input[i].onblur=function(){
                    var i1 = this.index;
                    input[i1].style.border="1px solid #999";
                    input[i1].style.boxShadow="none";
                }
            }
        };
    </script>
</head>
<body>
<div class="body1" id="box">
    <!--    修改事项-->
    <?php if(@$_GET["id1"]) {
        require("../../html/conn.php");
        $id1 = intval($_GET["id1"]);
        $sql1 = "select * from items where id=$id1";
        $result1 = mysql_query($sql1);
        $row = mysql_fetch_assoc($result1);
        session_start();
        $_SESSION["id9"]=$id1;
        $time=date('Y-m-d',strtotime($row['todate'])).'T'.date('H:i',strtotime($row['todate']));
    ?>
    <form action="../../html/update1.php" method="post">
        <p style="margin-left: 10px;"><label>标题：</label><input type="text" name="title" autocomplete="off" value="<?php echo $row['title']?>"></p>
        <p style="margin-left: 10px;"><label>截止日期：
            </label><input type="datetime-local" name="date" autocomplete="no" value="<?php echo $time?>">
        </p>
        <!--style给定宽度可以影响编辑器的最终宽度-->
        <script type="text/plain" id="myEditor" style="width:99.5%;" name="connect">
            <?php echo $row['connect']?>
        </script>
        <input type="submit" value="发布" name="submit9">
        <input type="submit" name="esc11" value="取消" style="margin-left: 5px;" >
    </form>
    <?php } ?>


    <!--    修改通知-->
    <?php if(@$_GET["id2"]) {
        require("../../html/conn.php");
        $id2 = intval($_GET["id2"]);
        $sql1 = "select * from items where id=$id2";
        $result1 = mysql_query($sql1);
        $row = mysql_fetch_assoc($result1);
        session_start();
        $_SESSION["id10"]=$id2;
        ?>
        <form action="../../html/update1.php" method="post">
            <p style="margin-left: 10px;"><label>标题：</label>
                <input type="text" name="title" autocomplete="off" value="<?php echo $row['title']?>">
            </p>
            <p style="margin-left: 10px;"><label>通知用户集：</label>
                <?php  if($row["Usertype"]=="管理员"){?>
                    <select name="root">
                        <option value = "管理员" selected="selected">管理员</option >
                        <option value = "教师" >教师 </option >
                        <option value = "学生" > 学生</option >
                    </select>
                <?php }else if($row["Usertype"]=="教师"){ ?>
                    <select name="root">
                        <option value = "管理员">管理员</option >
                        <option value = "教师" selected="selected">教师 </option >
                        <option value = "学生" > 学生</option >
                    </select>
                <?php }else{ ?>
                    <select name="root">
                        <option value = "管理员">管理员</option >
                        <option value = "教师">教师 </option >
                        <option value = "学生" selected="selected" > 学生</option >
                    </select>
                <?php }?>
            </p>
            <!--style给定宽度可以影响编辑器的最终宽度-->
            <script type="text/plain" id="myEditor" style="width:99.5%;" name="connect">
                 <?php echo $row['connect']?>
            </script>
            <input type="submit" value="发布" name="submit10">
            <input type="submit" name="esc12" value="取消" style="margin-left: 5px;">
        </form>
    <?php } ?>


    <!--    修改新闻-->
    <?php if(@$_GET["id3"]) {
        require("../../html/conn.php");
        $id3 = intval($_GET["id3"]);
        $sql1 = "select * from New where id=$id3";
        $result1 = mysql_query($sql1);
        $row = mysql_fetch_assoc($result1);
        session_start();
        $_SESSION["id11"]=$id3;
        $time=date('Y-m-d',strtotime($row['date'])).'T'.date('H:i',strtotime($row['date']));
        ?>
        <form action="../../html/update1.php" method="post">
            <p style="margin-left: 10px;"><label>新闻标题：</label>
                <input type="text" name="title" autocomplete="off" value="<?php echo $row['title']?>">
            </p>
            <p style="margin-left: 10px;"><label>编辑人：</label>
                <input type="text" name="Editor" autocomplete="off" value="<?php echo $row['Editor']?>">
            </p>
            <!--style给定宽度可以影响编辑器的最终宽度-->
            <script type="text/plain" id="myEditor" style="width:99.5%;" name="connect">
                 <?php echo $row['connect']?>
            </script>
            <input type="submit" value="发布" name="submit11">
            <input type="submit" name="esc13" value="取消" style="margin-left: 5px;">
        </form>
    <?php } ?>

</div>
<script type="text/javascript">
    var um = UM.getEditor('myEditor',{
        //这里可以选择自己需要的工具按钮名称,此处仅选择如下七个
        toolbar:['cleardoc undo redo bold italic underline insertorderedlist forecolor'],
        //focus时自动清空初始化时的内容
        autoClearinitialContent:false,
        //关闭字数统计
        wordCount:true,
        //关闭elementPath
        elementPathEnabled:false,
        //默认的编辑区域高度
        initialFrameHeight:320
        //更多其他参数，请参考umeditor.config.js中的配置项
    });
</script>

</body>
</html>