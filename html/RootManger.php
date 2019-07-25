<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            text-align: center;
        }
        html,body{
            height: 100%;
        }
        span {
            color: red;
        }
        p{
            margin-top: 20px;
        }
        input {
            width: 220px;
            outline: none;
            text-align: left;
            padding: 0 10px;
            border: 1px solid #999;
            border-radius: 3px;
            line-height: 30px;
        }
        #box {
            margin-top: 20%;
        }
        .submit-box input{
            cursor: pointer;
            width: 80px;
            height: 30px;
            line-height: 20px;
            padding: 5px;
            text-align: center;
            margin-left: 10px;
            background-color: #ffffff;
        }
        select{
            width: 241px;
            outline: none;
            text-align: left;
            padding: 0 5px;
            border: 1px solid #999;
            border-radius: 3px;
            height: 30px;
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

    <div id="box">
        <?php
        @header("Content-Type:text/html;charset=utf-8");
        require("conn.php");
        $account=@$_POST["account"];
        $sql = "select root from user where account='$account'";
        $result=mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        ?>
        <form action="RootManger.php" method="post">
            <p><label><span>*</span>用户账号：&ensp;</label>
                <input type="text" placeholder="请输入账号！" value="<?php echo $account?>" autocomplete="off" name="account" style="width: 165px;">
                <input type="submit"  value="查询" style="width: 50px;background-color: #ffffff">
            </p>
        </form>

        <form action="FixRoot.php" method="post">
            <input type="hidden" value="<?php echo $account ?>" name="account">
            <p><label><span>*</span>当前权限：&ensp;</label>
                <input type="text" placeholder="当前权限" value="<?php echo $row['root']?>" readonly="readonly" name="nr">
            </p>

            <p><label><span>*</span>修改权限：&ensp;</label>
                <select name="fr">
                    <option value="管理员">管理员</option>
                    <option value="学生">学生</option>
                    <option value="教师">教师</option>
                </select>
            </p>

            <p class="submit-box"><input type="submit" name="submit1" value="修改"></p>
        </form>
    </div>

</body>
</html>