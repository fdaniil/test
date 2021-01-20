$(
    function(){
        $(".form-signin").submit(function(e) {
            e.preventDefault();

            let form = $(this);
            let url = form.attr('action');
            let data = new Object();
            data['login']    = $("#login").val();
            data['email']    = $("#email").val();
            data['password'] = $("#password").val();
            $.ajax({
                   type: "POST",
                   url: url,
                   data: JSON.stringify(data),
                   success: function(data)
                   {
                       alert(data);
                   }
                 });
         });
         $(".form-login").submit(function(e) {
            e.preventDefault();

            let form = $(this);
            let url = form.attr('action');
            let data = new Object();
            data['login']    = $("#login").val();
            data['password'] = $("#password").val();
            $.ajax({
                   type: "POST",
                   url: url,
                   data: JSON.stringify(data),
                   success: function(data)
                   {
                       alert(data);
                       data = JSON.parse(data);
                       if(data.status == "succes"){
                        document.location.href = "/";
                       }
                   }
                 });
         });
        });