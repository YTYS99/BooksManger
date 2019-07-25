<?php if(@$_GET["id1"]) {?>
<html>
    <head>
        <style>
            body{
                margin: 0 0;
            }

            .box{
                width: 100%;
                margin: 5% auto;
            }
            .box input{
                width: 400px;
                height: 37px;
                padding: 0 1%;
                margin-left: 10px;
                letter-spacing: 2px;
                line-height: 25px;
                text-align: center;
            }
            .select-input{
                width: 480px;
                height: 40px;
                margin: 0 auto 15px auto;
                letter-spacing: 2px;
                line-height: 25px;
                position: relative;
            }
            .select-input select{
                width:83%;
                height:40px;
                margin-top: -38px;
                margin-right: 2%;
                text-align: center;
                float: right;
            }
            .select-input input{
                width:77.5%;
                height:36px;
                position:relative;
                margin: 0 7% 0 0;
                border-top:none;
                border-bottom:none;
                border-left:none;
                outline: none;
                text-align: center;
                float: right;
            }
            .box p{
                font-size: 16px;
                font-weight: 550;
            }
            .box button{
                cursor: pointer;
                width: 80px;
                height: 30px;
                margin-left: 30px;
                background-color: #ffffff;
                border: 1px solid #cccccc;
                outline: none;
            }
            .box button:hover{
                cursor: pointer;
                width: 80px;
                height: 30px;
                margin-left: 30px;
                color: #ffffff;
                border: 1px solid #cccccc;
                outline: none;
                background-color: rgb(0,153,255);
            }
        </style>
        <script>
            window.onload=function(){
                var box = document.getElementById("box");
                var input = box.getElementsByTagName("input");
                for(var i=0;i<input.length;i++){
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
    <div class="box" id="box">
        <form action="update1.php" method="post">
            <p align="center">条形码:<input type="text" name="code"  autocomplete="off" id="code"> </p>
            <p align="center">书&nbsp;&nbsp;&nbsp;&nbsp;名:<input type="text" name="bname" value="" autocomplete="off"> </p>
            <p align="center">作&nbsp;&nbsp;&nbsp;&nbsp;者:<input type="text" name="ename" value="" autocomplete="off"> </p>
            <p align="center">出版社:<input type="text" name="cp" value="" autocomplete="off"> </p>
            <p align="center">书&nbsp;&nbsp;&nbsp;&nbsp;架:<input type="text" name="sj" value="" autocomplete="off"> </p>
            <div class="select-input">
                <b>&nbsp;类&nbsp;&nbsp;型:</b>
                <input  type="text" name="type" id="type11" autocomplete="off"/>
                <select  id="op" onclick="cc()">
                    <option ></option>
                    <?php
                    require("conn.php");
                    $sql="select distinct type1 from books";
                    $result=mysql_query($sql);
                    while($row = mysql_fetch_array ($result)){?>
                        <option ><?php echo $row['type1'] ?></option>
                    <?php  }?>
                </select>

                <script>
                     function  cc() {
                        var obj = document.getElementById("op"); //定位id
                        var index = obj.selectedIndex; // 选中索引
                        var value = obj.options[index].value; // 选中值
                        document.getElementById("type11").value=value;
                    }
                </script>
            </div>
            </p>

            <p align="center">总&nbsp;&nbsp;&nbsp;&nbsp;数:<input type="number" id="sum1" onclick="sum()" name="sum1" value="" autocomplete="off"> </p>
            <p align="center">价&nbsp;&nbsp;&nbsp;&nbsp;格:<input type="number" name="price" autocomplete="off"> </p>
            <p align="center"><button type="submit" name="submit2">添加</button><button type="reset">重置</button></p>
            <script>
                function sum() {
                    var obj1 = document.getElementById("sum1").value;price
                    var obj2 = document.getElementById("sum2").value;
                    if(obj1<=0){
                        alert("总册数不能为0！");
                        document.getElementById("sum1").value="1";
                    }else if(obj2<=0){
                        alert("借出册数不能小于0！");
                        document.getElementById("sum2").value="0";
                    }else if (obj2>obj1) {
                        alert(obj1+obj2);
                        alert("借出册数不能大于总册数！");
                    }
                }
            </script>
        </form>
    </div>
</body>
</html>

<?php }else if($_GET['id2']){?>
    <html>
    <head>
        <style>
            body{
                margin: 0 0;
            }
            .box{
                width: 100%;
                margin: 80px 0;
            }
            .box input{
                width: 400px;
                height: 40px;
                margin-left: 10px;
                letter-spacing: 2px;
                line-height: 25px;
                padding: 0 1%;
            }
            .box select{
                width: 400px;
                height: 40px;
                padding: 0 1%;
                margin-left: 5px;
                line-height: 25px;
            }
            .box p{
                font-size: 16px;
                font-weight: 550;
                margin-top: 20px;
            }
            .box button{
                cursor: pointer;
                width: 60px;
                height: 30px;
                margin-left: 30px;
                background-color: #ffffff;
                border: 1px solid #000000;
                border-radius: 5px;
            }
            .box button:hover{
                cursor: pointer;
                width: 60px;
                height: 30px;
                margin-left: 30px;
                outline: none;
                color: #ffffff;
                background-color: rgb(0,153,255);
                border: 1px solid #ffffff;
                border-radius: 5px;
            }
        </style>
        <script>
            window.onload=function(){
                var box = document.getElementById("box");
                var input = box.getElementsByTagName("input");
                for(var i=0;i<input.length;i++){
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
    <div class="box" id="box">
        <form action="update1.php" method="post">
            <p align="center">账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号:<input type="text" name="account"   autocomplete="off"> </p>
            <p align="center">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名:<input type="text" name="realname"  autocomplete="off"> </p>
            <p align="center">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:<input type="text" name="password"  autocomplete="off"> </p>
            <p align="center">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别:
                <select name="sex">
                        <option value = "男" selected="selected" > 男</option >
                        <option value = "女" > 女</option >
                </select> </p>
            <p align="center">用户类型:
                <select name="root">
                        <option value = "管理员">管理员</option >
                        <option value = "教师" >教师 </option >
                        <option value = "学生" > 学生</option >
                </select> </p>
            <p align="center"><button type="submit" name="submit4">添加</button><button type="reset">重置</button></p>
        </form>
    </div>
    </body>
    </html>

<?php }?>
