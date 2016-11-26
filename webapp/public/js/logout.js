$(document).ready(function(){
    $("#logout").css("cursor", "pointer");
    $("#logout").click(function(){
        $.ajax({
          url: '/logout',
          type: 'DELETE',
          success: function(data) {
            window.location.href = "/";
          }
        });
   });
});
    
