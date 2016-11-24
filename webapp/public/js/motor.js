$(document).ready(function(){
       $("#telefone, #login, #cpfs").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    // -- verificar senhas -- //
    var comparador = function(){
        return $("#senha").val() === $("#rsenha").val();
    }   
    
    $("#form-motorista").submit(function(e){
        e.preventDefault();
        if(!comparador()){
            $("#myModalLabel").html("<span style='color: red; text-decoration:none;'>Erro de Senha</span>");
            $("#corpo-modal").html("<p> Digite senhas iguais, por favor...");
            $('#myModal').modal('show');
        }else{
            // Objeto POST
            var dadosForm ={
                nome:       $('#nome').val(),
                email:      $('#email').val(),
                sexo:       $("input[name=sexo]:checked").val(),
                tel:        $("#telefone").val(),
                endereco:   $("#endereco").val(),
                cidade:     $("#cidade").val(),
                estado:     $("#estado").val(),
                bairro:     $("#bairro").val(),
                cep:        $("#cep").val(),
                cpf:        $("#cpfs").val(),
                nascimento: $("#nascimento").val(),
                login:      $("#login").val(),
                senha:      $("#senha").val(),
                idVeiculo:  $("#veiculo").val()
            };
            //Ajax Request
            $.post("/motorista", dadosForm,
                function(data, status){
                     if(data["ok"]){
                        $("#myModalLabel").html("<span style='color: #f7f618; text-shadow: 1px 1px #c0c0c0; font-size: 1.4em;text-decoration:none;'>Sucesso</span>");
                     }else{
                        $("#myModalLabel").html("<span style='color: red; text-decoration:none;'>Falha</span>"); 
                     }
                     $("#corpo-modal").html("<p>" + data["resp"] + "</p>");
                     $('#myModal').modal('show');
            });
        }
    });
    
var selectBox = function(){
 $.get("/veiculo/listv", 
 function(data, status){
   for (i = 0; i < data.length; i++){ 
     $('#veiculo').append($('<option>', {
        value: data[i]['value'],
        text : data[i]['text'] 
    }));
   }
 });
};

selectBox();

    
});