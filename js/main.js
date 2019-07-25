// 最大化时保存弹窗的位置大小
var preDialogWidth = 0;
var preDialogHeight = 0;
var preDialogLeft = "0px";
var preDialogTop = "0px";

//第一个弹窗
var run = true;
// 页面初始化
$(function () {
    // 常用功能
    $("#dialog").bind("click", top2);
    $(".li-box li").bind("click", showDialog);
    $(".dlg_btn_close").bind("click", hideDialog);
    // 移动
    $("#dialog").bind("mousedown", moveHandler);
    // 最大化 || 还原
    $(".dlg_btn_max_top").bind("click", maxDialog);
    $(".dlg_btn_reback_top").bind("click", rebackDialog);
});
// 显示弹窗
function showDialog() {
    $("#dialog").show();
    var box1 = document.getElementById("li-box");
    var li = box1.getElementsByTagName('li');
    var title1 = new Array("用户中心","信息管理","全站检索","显示设置");
    for(var z=0;z<li.length;z++){
        li[z].index = z;
        li[z].onclick=function(){
            var z1 = this.index;
            var title = document.getElementById("title");
            title.innerHTML=title1[z1];
        }
    }
}
// 隐藏弹窗
function hideDialog() {
    $("#dialog").hide();
}
// 点击置顶
function top2(){
    document.getElementById("dialog1").style.zIndex="3";
    document.getElementById("dialog").style.zIndex=document.getElementById("dialog1").style.zIndex+"1";
}
// 还原
function rebackDialog() {
    el_dialog = $("#dialog")[0];
    el_dialog.style.left = preDialogLeft;
    el_dialog.style.top = preDialogTop;
    el_dialog.style.width = preDialogWidth + "px";
    el_dialog.style.height = preDialogHeight + "px";
    $(this).blur();
    $(this).removeClass("dlg_btn_reback_top").addClass("dlg_btn_max_top");
    $(".dlg_btn_max_top").unbind("click").bind("click", maxDialog);
    run = true;
}
// 最大化
function maxDialog() {
    el_dialog = $("#dialog")[0];
    preDialogWidth = el_dialog.offsetWidth;
    preDialogHeight = el_dialog.offsetHeight;
    preDialogLeft = el_dialog.style.left;
    preDialogTop = el_dialog.style.top;
    el_dialog.style.left = 10 + "px";
    el_dialog.style.top = 10 + "px";
    el_dialog.style.width = window.innerWidth - 25 + "px";
    el_dialog.style.height = window.innerHeight - 25 + "px";
    $(this).blur();
    $(this).removeClass("dlg_btn_max_top").addClass("dlg_btn_reback_top");
    $(".dlg_btn_reback_top").unbind("click").bind("click", rebackDialog);
    run = false;
}
// 移动
function moveHandler(evt) {
    if(run ) {
        var $trgt = $(event.target);
        if (!$trgt.hasClass("dlg_top")) return;

        var $this = $(this);
        var el = $this[0];
        var oevent = evt || event;
        var distanceX = oevent.clientX - el.offsetLeft;
        var distanceY = oevent.clientY - el.offsetTop;
        $(document).bind("mousemove", function (evt) {
            var oevent = evt || event;
            el.style.left = oevent.clientX - distanceX + 'px';
            el.style.top = oevent.clientY - distanceY + 'px';
        });
        $(document).bind("mouseup", function () {
            $(document).unbind("mousemove");
            $(document).unbind("mouseup");
        });
    }
}


// 第二个弹窗
var test = true;
// 页面初始化
$(function () {
    // 常用功能
    $("#dialog1").bind("click", top1);
    $(".li1-box li").bind("click", showDialog1);
    $(".dlg_btn_close1").bind("click", hideDialog1);
    // 移动
    $("#dialog1").bind("mousedown", moveHandler1);
    // 最大化 || 还原
    $(".dlg_btn_max_top1").bind("click", maxDialog1);
    $(".dlg_btn_reback_top1").bind("click", rebackDialog1);
});
// 显示弹窗
function showDialog1() {
    document.getElementById("dialog").style.zIndex="2";
    var box11 = document.getElementById("li1-box");
    var li1 = box11.getElementsByTagName('li');
    var title12 = new Array("用户管理","权限管理","修改密码","图书管理","文件","管理通知","发布事件","事件管理","发布新闻","新闻管理","图书新增","图书借阅","图书归还","借阅记录","发布通知","用户检索","图书检索","新闻检索","事件检索","通知检索");
    for(var z2=0;z2<li1.length;z2++){
        li1[z2].index = z2;
        li1[z2].onclick=function(){
            var z11 = this.index;
            var title11 = document.getElementById("title1");
            title11.innerHTML=title12[z11];
        }
    }
    $("#dialog1").show();
}
// 隐藏弹窗
function hideDialog1() {
    $("#dialog1").hide();
}
// 点击置顶
function top1(){
    document.getElementById("dialog").style.zIndex="3";
    document.getElementById("dialog1").style.zIndex=document.getElementById("dialog").style.zIndex+"1";
}
// 还原
function rebackDialog1() {
    el_dialog = $("#dialog1")[0];
    el_dialog.style.left = preDialogLeft;
    el_dialog.style.top = preDialogTop;
    el_dialog.style.width = preDialogWidth + "px";
    el_dialog.style.height = preDialogHeight + "px";
    $(this).blur();
    $(this).removeClass("dlg_btn_reback_top1").addClass("dlg_btn_max_top1");
    $(".dlg_btn_max_top1").unbind("click").bind("click", maxDialog1);
    test = true;
}
// 最大化
function maxDialog1() {
    el_dialog = $("#dialog1")[0];
    preDialogWidth = el_dialog.offsetWidth;
    preDialogHeight = el_dialog.offsetHeight;
    preDialogLeft = el_dialog.style.left;
    preDialogTop = el_dialog.style.top;
    el_dialog.style.left = 10 + "px";
    el_dialog.style.top = 10 + "px";
    el_dialog.style.width = window.innerWidth - 25 + "px";
    el_dialog.style.height = window.innerHeight - 25 + "px";
    $(this).blur();
    $(this).removeClass("dlg_btn_max_top1").addClass("dlg_btn_reback_top1");
    $(".dlg_btn_reback_top1").unbind("click").bind("click", rebackDialog1);
    test = false;
}
// 移动
function moveHandler1(evt) {
    if(test ) {
        var $trgt = $(event.target);
        if (!$trgt.hasClass("dlg_top1")) return;

        var $this = $(this);
        var el = $this[0];
        var oevent1 = evt || event;
        var distanceX = oevent1.clientX - el.offsetLeft;
        var distanceY = oevent1.clientY - el.offsetTop;
        $(document).bind("mousemove", function (evt) {
            var oevent1 = evt || event;
            el.style.left = oevent1.clientX - distanceX + 'px';
            el.style.top = oevent1.clientY - distanceY + 'px';
        });
        $(document).bind("mouseup", function () {
            $(document).unbind("mousemove");
            $(document).unbind("mouseup");
        });
    }
}


window.onload= function () {
    //打开/关闭便签面板的显示
    var ul2 = document.getElementById("box2");
    var list2 = ul2.getElementsByTagName('li');
    var span2 = ul2.getElementsByTagName('span');
    var i2 = ul2.getElementsByTagName('i');

    //获取父级界面内元素
    var text = parent.document.getElementById("text");
    var div = text.getElementsByTagName('div');
    for(var l=0;l<list2.length;l++){
        list2[l].index = l;
        list2[l].onclick=function(){
            var l1 = this.index;
            var ir = i2[l1].style.float;
            if(ir == "right") {
                span2[l1].style.backgroundColor = "#cccccc";
                i2[l1].style.float = "left";
                div[l1].style.display = "none";
            }else{
                span2[l1].style.backgroundColor = "#4a90e2";
                span2[l1].style.transition="0.3s";
                i2[l1].style.float = "right";
                div[l1].style.display = "block";
            }
        }
    }


    //打开关闭工具显示状态
    var ul = document.getElementById("box");
    var list = ul.getElementsByTagName('li');
    var span = ul.getElementsByTagName('span');
    var i3 = ul.getElementsByTagName('i');
    //获取父级页面内的值
    var box22 = parent.document.getElementById("li1-box");
    var li22 = box22.getElementsByTagName('li');



    //点击标签更改tools标签的display值
    for(var q=0;q<list.length;q++){
        list[q].index = q;
        list[q].onclick=function(){
            var q1 = this.index;
            var ii =i3[q1].style.float;
            if(ii == "right") {
                i3[q1].style.float = "left";
                span[q1].style.backgroundColor = "#cccccc";
                li22[q1].style.display="none";
            }else{
                i3[q1].style.float = "right";
                li22[q1].style.display="block";
                span[q1].style.transition = "0.3s";
                span[q1].style.backgroundColor = "#4a90e2";
            }
        }
    }
};

//如果为open则通过session来记录i的float、span的backgroundColor和li22的display
//如果为close则删除数组中的session的值，将i的float、span的backgroundColor和li22的display为默认值