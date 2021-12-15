$(function() {
        $('#ovomitreba').submit(function(e) {

            e.preventDefault();

            var username = $('#username').val();
            var password = $('#password').val();


            $.ajax({
                url: "login.php",
                type: "POST",
                data: $("#ovomitreba").serialize(),
                success: function(msg) {

              if(msg == ' ')  {   

                    $('#ovomitreba').unbind('submit').submit()
                        
                        }
               else{

                $("#error_message").text(msg);
                
               }         
                }
             });
            
         });
    });


