//全屏
function fullScreen() {
    document.body.webkitRequestFullScreen();
    document.getElementById("qp").style.display="none";
    document.getElementById("sx").style.display="block";
    document.getElementById("sx").style.color="cyan";
}

//退出全屏
function exitFullScreen() {
    document.webkitCancelFullScreen();
    document.getElementById("qp").style.display="block";
    document.getElementById("sx").style.display="none";
}

//锁屏
function closeScreen(){
    document.getElementById("key").style.animation="movebb 0.3s ease-out";
    document.getElementById("key").style.animationFillMode="forwards";
    var ipt = document.getElementById("ps");
    ipt.focus();
    sessionStorage.setItem("key1","movebb 0.3s ease-out");
}

//开锁
function openScreen(){
    var pw = document.getElementById("password").value;
    var ps = document.getElementById("ps").value;
    var ipt = document.getElementById("ps");
        if (pw == ps) {
            $("#ps").val("");
            document.getElementById("key").style.animation = "movett 0.3s ease-out";
            document.getElementById("key").style.animationFillMode = "forwards";
            sessionStorage.setItem("key1","-1525px");
        } else {
            alert("密码错误！");
            $("#ps").val("");
            ipt.focus();
        }
}

//退出操作系统
function exit1(){
    sessionStorage.clear();//清除session
    window.location.replace("../../Library/html/Loading.php");
}

//更改图片
window.onload=function(){
    var box = document.getElementById("li-box");
    var a = box.getElementsByTagName('a');
    var id = new Array("img0","img1","img2","img3");
    var icon = new Array("../img/user-icon.png","../img/book-icon.png","../img/search-icon.png","../img/conterl-icon.png");
    var hover = new Array("../img/user-icon-hover.png","../img/book-icon-hover.png","../img/search-icon-hover.png","../img/conterl-icon-hover.png");

    //更换左侧导航栏鼠标经过图片样式
    for(var i=0;i< a.length;i++){
        a[i].index = i;
        a[i].onmouseover=function(){
            var n = this.index;
            document.getElementById(id[n]).src=hover[n];
        }

        a[i].onmouseout=function(){
            var n = this.index;
            document.getElementById(id[n]).src=icon[n];
        }
    }

    //打开/关闭主题
    var box1 = document.getElementById("bg");
    var btn = document.getElementById("back");
    var cl = document.getElementById("close");
    btn.onclick=function(){
        btn.style.color="cyan";
        box1.style.width="25%";
    };
    cl.onclick=function(){
        btn.style.color="white";
        box1.style.width="0";
    }


    //点击图片更换背景
    var body1 = document.getElementById("body1");
    var box2 = document.getElementById("body1-bg");
    var box3 = document.getElementById("key-bg");
    var li = box2.getElementsByTagName('li');
    var li1 = box3.getElementsByTagName('li');
    var key = document.getElementById("key");
    var id2 = new Array("gou0","gou1","gou2","gou3","gou4","gou5","gou6","gou7");
    var id3 = new Array("gou00","gou01","gou02","gou03","gou04","gou05","gou06","gou07");
    var id1 = new Array("img01","img01","img02","img03","img04","img05","img06","img07");
    var bg = new Array("../img/bg1.jpg","../img/bg2.jpg","../img/bg3.jpg","../img/bg4.jpg","../img/bg5.jpg","../img/bg6.jpg","../img/bg7.jpg","../img/bg8.jpg");
    var spbg = new Array("../img/bg1.jpg","../img/bg2.jpg","../img/bg3.jpg","../img/bg4.jpg","../img/bg5.jpg","../img/bg6.jpg","../img/bg7.jpg","../img/bg8.jpg");

    //通过判断session来决定界面刷新后的背景
    var url = sessionStorage.getItem('url');
    var n11 = sessionStorage.getItem('n1');
    if(url!=null){
        body1.style.backgroundImage=url;
        document.getElementById(id3[n11]).style.display="block";
        li[n11].style.border="1px solid red";
    }
    else{
        document.getElementById(id3[2]).style.display="block";
        li[2].style.border="1px solid red";
        body1.style.backgroundImage=bg[2];
    }
    //背景点击更换
    for(var j=0;j< li.length;j++){
        li[j].index = j;
        li[j].onclick=function(){
            var n1 = this.index;
            for(var m=0;m<li.length;m++){
                li[m].style.border="1px solid  transparent";
                document.getElementById(id3[m]).style.display="none";
            }
            document.getElementById(id3[n1]).style.display="block";
            li[n1].style.border="1px solid red";
            body1.style.backgroundImage="url("+bg[n1]+")";
            sessionStorage.setItem('url',"url("+bg[n1]+")");
            sessionStorage.setItem('n1',n1);
        }
    }

    //通过判断session来决定界面刷新后的锁屏样式
    var url1 = sessionStorage.getItem('url1');
    var n2 = sessionStorage.getItem('n2');
    if(url1!=null){
        key.style.backgroundImage=url1;
        document.getElementById(id2[n2]).style.display="block";
        li1[n2].style.border="1px solid red";
    }
    else{
        document.getElementById(id2[0]).style.display="block";
        li1[0].style.border="1px solid red";
        key.style.backgroundImage=spbg[0];
    }
    //锁屏点击更换
    for(var z=0;z< li1.length;z++){
        li1[z].index = z;
        li1[z].onclick=function(){
            var n2 = this.index;
            for(var m=0;m<li1.length;m++){
                li1[m].style.border="1px solid  transparent";
                document.getElementById(id2[m]).style.display="none";
            }
            document.getElementById(id2[n2]).style.display="block";
            li1[n2].style.border="1px solid red";
            key.style.backgroundImage="url("+spbg[n2]+")";
            sessionStorage.setItem('url1',"url("+spbg[n2]+")");
            sessionStorage.setItem('n2',n2);
        }
    }


    //工具导航
    var box4 = document.getElementById("li1-box");
    var box5 =document.getElementById("btn-box");
    var li2 = box5.getElementsByTagName('li');
    for(var n=0;n<li2.length;n++){
        li2[n].index = n;
        li2[n].onclick=function(){
            for(var m=0;m<li2.length;m++){
                li2[m].style.backgroundColor="rgba(0,0,0,0.6)"
            }
            var n1 = this.index;
            li2[n1].style.backgroundColor="red";
            box4.style.transition="0.2s";
            box4.style.marginLeft="-"+n1*550+"px";
        }
    }

    var key1 = sessionStorage.getItem("key1");
    if(key1 == "movebb 0.3s ease-out") {
        document.getElementById("key").style.animation=key1;
        document.getElementById("key").style.animationFillMode="forwards";
    }else{
        document.getElementById("key").style.marginTop="-1525px";
    }
};
