$(document).ready(function() {
  $('.menu-btn').click(function() {
    $(this).toggleClass('active1');

    if ($(this).hasClass('active1')) {
        $('.nav-bar').addClass('active1');
    } else {
        $('.nav-bar').removeClass('active1');
    }
  });
});
function openAddress(addressTitle){
  var i;
  var x=document.getElementsByClassName("adttl");
  for (i=0; i< x.length;i++){
    x[i].style.display="none";
  }
  document.getElementById(addressTitle).style.display="block";
  }