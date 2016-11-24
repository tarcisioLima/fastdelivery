$(document).ready(function(){
    $("#form-veiculo").submit(function(e){
        e.preventDefault();
         $.post("/veiculo", 
            {placa: $('#placa').val(), modelo: $('#modelo').val(), 
             cor: $('#cor').val() , dono: $("input[name=prop]:checked").val()},
                function(data, status){
                    if(data["ok"]){
                        $("#myModalLabel").html("<span style='color: #f7f618; text-shadow: 1px 1px #c0c0c0; font-size: 1.4em;text-decoration:none;'>Sucesso</span>");
                        $("#corpo-modal").html("<p>" + data["resp"] + "</p>");
                        $('#myModal').modal('show');
                    }else{
                        $("#myModalLabel").html("<span style='color: red; text-decoration:none;'>Número de placa inválido</span>"); 
                        $("#corpo-modal").html("<p>" + data["resp"] + "</p>");
                        $('#myModal').modal('show')
                    }
                   
            });
        });
});