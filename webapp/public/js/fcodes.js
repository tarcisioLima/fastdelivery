$(document).ready(function(){
     $("#form-login").submit(function(e){
         e.preventDefault();
         $.post("/", 
            {user: $('#usuario').val(), passw: $('#senha').val()},
                function(data, status){
                     if(!data["ok"]){
                        $("#myModalLabel").html("<span style='color: red; text-decoration:none;'>Não Encontrado</span>");
                        console.log(data);
                        $('#myModal').modal('show');
                    }else{
                        window.location.href = "/mapa";
                    }
                });
             });
        });