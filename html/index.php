<?php
    @header("Content-Type:text/html;charset=utf-8");
    session_start();
    $root=@$_SESSION["root"];
    if($root=="管理员"){
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="../img/title-icon.png">
    <title>图书馆后台操作系统</title>
    <link href="../css/index.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../js/main.js" type="text/javascript"></script>
    <script src="../js/quanping.js" type="text/javascript"></script>
</head>
<body>
<div class="body1" id="body1" unselectable="on" onselectstart="return false;" style="-moz-user-select:none;" >
    <!--左侧的导航栏-->
    <nav class="left-nav">
        <ul class="li-box" id="li-box">
            <a href="user-center.html" target="if1"><li><img src="../img/user-icon.png" id="img0"></li></a>
            <a href="books-manger.html" target="if1"><li><img src="../img/book-icon.png" id="img1"></li></a>
            <a href="search.html" target="if1"><li><img src="../img/search-icon.png" id="img2"></li></a>
            <a href="contrel-manger.html" target="if1"><li><img src="../img/conterl-icon.png" id="img3"></li></a>
        </ul>
        <div class="tools-box">
            <ul class="span-box">
                <li id="exit" onclick="exit1()">   </li>
                <li id="qp" onclick="fullScreen()" style="display: block">   </li>
                <li id="sx" onclick="exitFullScreen()" style="display: none">  </li>
                <li onclick="closeScreen()">   </li>
                <li id="back">   </li>
            </ul>
        </div>
        <div class="user-box">
            <p><?php echo $_SESSION["realname"];?></p>
            <p style="margin-top: 5px"><?php echo $_SESSION["root"];?></p>
        </div>
    </nav>

    <!--弹出框  Manger-->
    <div id="dialog" class="dialog hide" minheight="320" minwidth="660">
        <div id="dlg_top" class="dlg_top">
            <label class="dlg_title" id="title"></label>
            <div class="dlg_btn_close dlg_btn_ico dlg_btn_close_top"></div>  <!--关闭-->
            <div class="dlg_btn_ico dlg_btn_max_top"></div>  <!--最大化/最小化-->
        </div>
        <div class="dlg_content">
            <iframe src="" class="dlg_content_if" name="if1" frameborder="0" id="if1" scrolling="no"></iframe>
        </div>
    </div>

    <!--锁屏-->
    <div class="key" id="key">
        <div class="box">
                <img src="../img/user-icon-key.png">
                <p style="margin: 15px 0"><?php echo $_SESSION["realname"]?><input type="hidden" value="<?php echo $_SESSION["password"] ;?>" id="password"></p>
                <p><input type="password" placeholder="请输入密码！" id="ps" class="ps"></p>
                <p><button type="button" onclick="openScreen()" class="submit">确定</button></p>
        </div>
    </div>

    <!--主题-->
    <div class="bg" id="bg">
        <p>背景<div id="close"></div></p>
        <ul class="body1-bg" id="body1-bg">
            <li><img src="../img/bg1.jpg"><img src="../img/gou.png" id="gou00" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg2.jpg"><img src="../img/gou.png" id="gou01" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg3.jpg"><img src="../img/gou.png" id="gou02" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg4.jpg"><img src="../img/gou.png" id="gou03" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg5.jpg"><img src="../img/gou.png" id="gou04" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg6.jpg"><img src="../img/gou.png" id="gou05" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg7.jpg"><img src="../img/gou.png" id="gou06" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg8.jpg"><img src="../img/gou.png" id="gou07" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
        </ul>
        <p style="margin-top: 10px;">锁屏背景</p>
        <ul class="key-bg" id="key-bg">
            <li><img src="../img/bg1.jpg"><img src="../img/gou.png" id="gou0" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg2.jpg"><img src="../img/gou.png" id="gou1" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg3.jpg"><img src="../img/gou.png" id="gou2" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg4.jpg"><img src="../img/gou.png" id="gou3" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg5.jpg"><img src="../img/gou.png" id="gou4" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg6.jpg"><img src="../img/gou.png" id="gou5" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg7.jpg"><img src="../img/gou.png" id="gou6" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
            <li><img src="../img/bg8.jpg"><img src="../img/gou.png" id="gou7" style="margin-left: 30%;width: 40%;height:50%;display: none;margin-top: -55%;"> </li>
        </ul>
    </div>

    <!--logo和访问量-->
    <div class="logo-box">
        <div class="logo-info">
            <img src="../img/logo.png" width="100" height="100">
            <div class="title1">
                <label style="font-size: 50px;color: #ffffff;letter-spacing: 10px;">九江学院<br></label>
                <label style="font-size: 24px;color: #ffffff;letter-spacing: -1px">JIUJIANG  UNIVERSITY</label>
            </div>
        </div>
        <div class="userCount">
            <a href="../../library/html/index.php" style="color: #ffffff">图书馆门户网站</a><em></em>
            <?php
                $fp=fopen("counter.txt","r+");
                $Visitors=intval(fgets($fp));
                if($_SESSION["num"]=="loading") {
                    $_SESSION["num"]="loaded";
                     $Visitors++;
                }
                rewind($fp);
                fwrite($fp,$Visitors);
                fclose($fp);
            ?>
            <label>当前访问人数：<span class="number">
                <?php $arrCount=str_split($Visitors, 1);
                     foreach($arrCount as $key=>$value){
                            echo $value;
                     }
                ?></span>人</label>
        </div>
    </div>

    <!--功能区-->
    <div class="tools-cc">
        <div class="li1-box" id="li1-box">
            <li><a href="users.php" target="if2"><img src="../img/user-tools.png"><p>用户管理</p></a></li>
            <li><a href="RootManger.php" target="if2"><img src="../img/root-tools.png"><p>权限管理</p></a></li>
            <li><a href="updatepassword.html" target="if2"><img src="../img/ps-tools.png"><p>修改密码</p></a></li>
            <li><a href="books.php" target="if2"><img src="../img/books-tools.png"><p>图书管理</p></a></li>
            <li><a href="Files.php" target="if2"><img src="../img/Manger-icon.png"><p>文件</p></a></li>
            <li><a href="Note.php" target="if2"><img src="../img/note-manger-tools.png"><p>管理通知</p></a></li>
            <li><a href="../umeditor-1.2.3/_examples/simpleDemo.html" target="if2"><img src="../img/wait-tools.png"><p>发布事件</p></a></li>
            <li><a href="Items.php" target="if2"><img src="../img/wait-manger-tools.png"><p>事件管理</p></a></li>
            <li><a href="../umeditor-1.2.3/_examples/addNews.html" target="if2"><img src="../img/news-tools.png"><p>发布新闻</p></a></li>
            <li><a href="News.php" target="if2"><img src="../img/news-manger-tools.png"><p>新闻管理</p></a></li>
            <li><a href="add.php?id1=$id1" target="if2"><img src="../img/addbooks-icon.png"><p>图书新增</p></a></li>
            <li><a href="lendbooks.php?id5=$id5" target="if2"><img src="../img/lend-tools.png"><p>图书借阅</p></a></li>
            <li><a href="lendbooks.php?id6=$id6" target="if2"><img src="../img/return-tools.png"><p>图书归还</p></a></li>
            <li><a href="records.php" target="if2"><img src="../img/record-tools.png"><p>借阅记录</p></a></li>
            <li><a href="../umeditor-1.2.3/_examples/addNote.html" target="if2"><img src="../img/note-tools.png"><p>发布通知</p></a></li>
            <li><a href="SearchUser.php" target="if2"><img src="../img/search-user-tools.png"><p>用户检索</p></a></li>
            <li><a href="Searchbook.php" target="if2"><img src="../img/search-books-tools.png"><p>图书检索</p></a></li>
            <li><a href="SearchNews.php" target="if2"><img src="../img/search-news-tools.png"><p>新闻检索</p></a></li>
            <li><a href="SearchItems.php" target="if2"><img src="../img/search-wait-tools.png"><p>事件检索</p></a></li>
            <li><a href="SearchNote.php" target="if2"><img src="../img/search-note-tools.png"><p>通知检索</p></a></li>
        </div>

    <!-- 导航按钮-->
        <ul class="btn-box" id="btn-box">
            <li>1</li>
            <li>2</li>
        </ul>
    </div>

    <!--弹出框  tools-->
    <div id="dialog1" class="dialog1 hide1" minheight="320" minwidth="660">
        <div id="dlg_top1" class="dlg_top1">
            <label class="dlg_title1" id="title1"></label>
            <div class="dlg_btn_close1 dlg_btn_ico1 dlg_btn_close_top1"></div>  <!--关闭-->
            <div class="dlg_btn_ico1 dlg_btn_max_top1"></div>  <!--最大化/最小化-->
        </div>
        <div class="dlg_content1">
            <iframe src="" class="dlg_content_if2" name="if2" frameborder="0" id="if2" scrolling="no"></iframe>
        </div>
    </div>

    <!--便签-->
    <div class="note-box" id="text">

        <div class="wait-items">
            <p>待办事项</p>
            <?php
                require('conn.php');
                $sql="select title,date from items where type='待办事件' order by date desc";
                $result=mysql_query($sql);
            ?>
            <table class="items1">
              <?php while($row=mysql_fetch_assoc($result)){ ?>
                <tr>
                    <td><a href="#"><?php echo $row["title"] ?>
                            <?php
                            date_default_timezone_set('PRC');
                            $time1=date('Y-m-d H:i:s');//系统当前时间
                            $time2=$row["date"];//数据库记录的发布时间
                            $hour=floor((strtotime($time1)-strtotime($time2))/3600);
                            //12小时内为New事件，显示New
                            if($hour<12){?>
                                <sup>New</sup>
                            <?php }?>
                        </a>
                    </td>
                    <td align="right">
                        <span><?php $time=strtotime($row["date"]);echo date('d',$time).'/'.date('m',$time);?></span>
                    </td>
                </tr>
              <?php }?>
            </table>

        </div>

        <div class="tongzhi-items">
            <p>通知公告</p>
            <?php
            require('conn.php');
            $sql="select title,date from items where type='通知公告' order by date desc;";
            $result=mysql_query($sql);
            ?>
            <table class="items1">
                <?php while($row=mysql_fetch_assoc($result)){ ?>
                    <tr>
                        <td>
                            <a href="#"><?php echo $row["title"] ?>
                            <?php
                                date_default_timezone_set('PRC');
                                $time1=date('Y-m-d H:i:s');//系统当前时间
                                $time2=$row["date"];//数据库记录的发布时间
                                $hour=floor((strtotime($time1)-strtotime($time2))/3600);
                                //两小时内为New通知，显示New
                                if($hour<2){?>
                                     <sup>New</sup>
                                <?php }?>
                            </a>
                        </td>
                        <td align="right">
                            <span><?php $time=strtotime($row["date"]);echo date('d',$time).'/'.date('m',$time);?></span>
                        </td>
                    </tr>
                <?php }?>
            </table>
        </div>

        <div class="news-items">
            <p>新闻事实</p>
            <?php
            require('conn.php');
            $sql="select title,date from New order by date desc;";
            $result=mysql_query($sql);
            ?>
            <table class="items1">
                <?php while($row=mysql_fetch_assoc($result)){ ?>
                    <tr>
                        <td>
                            <a href="#"><?php echo $row["title"] ?>
                                <?php
                                date_default_timezone_set('PRC');
                                $time1=date('Y-m-d H:i:s');//系统当前时间
                                $time2=$row["date"];//数据库记录的发布时间
                                $hour=floor((strtotime($time1)-strtotime($time2))/3600);
                                //6小时内为New通知，显示New
                                if($hour<6){?>
                                    <sup>New</sup>
                                <?php }?>
                            </a>
                        </td>
                        <td align="right">
                            <span><?php $time=strtotime($row["date"]);echo date('d',$time).'/'.date('m',$time);?></span>
                        </td>
                    </tr>
                <?php }?>
            </table>
        </div>

    </div>
</div>
</body>
</html>
<?php }else{
        echo '<script>alert("抱歉！您没有权限访问本页面！请以管理员身份登录！");window.location.replace("../../Library/html/loading.php")</script>';
    }?>