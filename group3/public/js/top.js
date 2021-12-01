/*==================== Top button====================*/

var btntop=document.getElementById("sctop");
window.onscroll = function() {scrollFunction()};

function scrollFunction(){
    if(document.body.scrollTop>20||document.documentElement.scrollTop>20){ 
        btntop.style.display = "block";
    }else{
        btntop.style.display = "none";
    }
}
function topFun(){
    document.body.scrollTop=0;
    document.documentElement.scrollTop=0;
}