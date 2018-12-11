$(function() {
  $("#loader").hide();
  $("form").submit(function(e) {

        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();

        var data = 'name=' + name + '&email=' + email + '&message=' + message;
    
        if(data) {
            $.ajax({
                type: "POST",
                url: "./send.php",
                data: data,
                beforeSend: function(html) {
          $("#loader").show();
          $("#submit").hide();
               },
               success: function(html){
          $("#loader").hide();          
          $("#result").html(html);
              }
            });
        }
        return false;
    });
});