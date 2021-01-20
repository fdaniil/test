$(
    function () {
        $.ajax({
            type: "POST",
            url: "auth.php",
            success: function(data)
            {
                data = JSON.parse(data);
                if(data.status == "succes"){
                    $(".hello").text("Привет, "+ data.login +"!");
                    $(".logout").show();
                }
                else{
                    $(".hello").text("Привет, гость!");
                    $(".logout").hide();
                }
            }
          });
        }
);