$(document).ready(function(){

$(".logout").click(function() {
  confirms = confirm('Logout?');
  if(confirms) {
    $("#tempat-logout").load("/RPL/admin/logout.php");
    window.location.href("index.html");
  }
});

});
