$(document).ready(function() {
  $(".logout").click(function(){
    var confirms = confirm("Anda Yakin Ingin Logout?");
    if(confirms) {
      $(".tempat").load("logout.php");
      return false;
    } else {
      return false;
    }
  });
});
