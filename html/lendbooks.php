<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body{
            background-image: url("../img/lendbg1.jpg");
            background-size: cover;
        }
        h1{
            width: 70%;
            height: 50px;
            margin: 2% auto;
            color: #ffffff;
            font-size: 32px;
            font-family: 宋体;
            font-weight: bolder;
            text-align: center;
            opacity: 0.8;
            animation: movetb 0.2s;
            animation-fill-mode: forwards;
        }
        .input-box{
            width: 70%;
            height: 120px;
            margin: 18% auto;
        }
        .input{
            width: 100%;
            height: 50px;
            margin: 0 auto;
            font-size: 18px;
            text-align: center;
            opacity: 0;
            animation: movetr 0.5s;
            animation-delay: 0.2s;
            animation-fill-mode: forwards;
        }
        .submit{
            cursor: pointer;
            width: 8%;
            height: 30px;
            margin: 20px 40%;
            letter-spacing: 2px;
            outline: none;
            opacity: 0;
            border: none;
            background-color: #ffffff;
            animation: movett 0.2s;
            animation-delay: 0.5s;
            animation-fill-mode: forwards;
        }
        .esc{
            cursor: pointer;
            width: 8%;
            height: 30px;
            margin-top: -50px;
            margin-left: 55%;
            letter-spacing: 2px;
            outline: none;
            opacity: 0;
            border: none;
            background-color: #ffffff;
            animation: movett1 0.2s;
            animation-delay: 0.5s;
            animation-fill-mode: forwards;
        }
        @keyframes movetb {
            from {margin-top: -50%;opacity: 0}
            to   {margin-top: 2%;opacity: 0.8}
        }
        @keyframes movetr {
            from {margin-left: -50%;opacity: 0}
            to   {margin-left: auto;opacity: 0.8}
        }
        @keyframes movett {
            from {margin-top: 50%;opacity: 0}
            to   {margin-top: 20px;opacity: 0.8}
        }
        @keyframes movett1 {
            from {margin-top: 50%;opacity: 0}
            to   {margin-top: -50px;opacity: 0.8}
        }
    </style>
</head>
<body>
<div class="input-box">

    <!--从图书借阅中借阅-->
    <?php if(@$_GET["id5"]) {?>
    <h1>图书借阅系统</h1>
    <form action="control.php?id1=$id1" method="post">
        <input type="text" name="code" placeholder="请输入图书条形码！" autocomplete="off" class="input"/>
        <input type="submit" name="submit1" value="提交" class="submit"/>
        <input type="reset" value="重置" class="esc"/>
    </form>
    <?php }?>


    <!--从图书归还中归还-->
    <?php if(@$_GET["id6"]) {?>
    <h1>图书归还系统</h1>
    <form action="control.php?id2=$id2" method="post">
        <input type="text" name="code" placeholder="请输入图书条形码！" autocomplete="off" class="input"/>
        <input type="submit" name="submit2" value="归还" class="submit"/>
        <input type="reset" value="重置" class="esc"/>
    </form>
    <?php }?>

</div>
</body>
</html>