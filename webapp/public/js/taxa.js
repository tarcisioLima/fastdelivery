$(document).ready(function(){
var selectBox = function(){
 $.get("/taxa/listm", 
 function(data, status){
   for(var nome in data) {
     $('#medida').append($('<option>', {
        value: nome,
        text : nome
    }));
   }
 });
};
selectBox();

//Puxa Do Banco Os Valores
$("#medida").change(function(){
   var v = this.value;
   $.get("/taxa/listm", 
    function(data, status){ 
        $('#vlInicial').val(data[v]['vlInicial']);
        $('#qtInicial').val(data[v]['qtInicial']);
        $('#vlMedida').val(data[v]['vlMedida']);
        $('#qtMedida').val(data[v]['qtMedida']);
    });
});
//Formulario
    $("#form-taxa").submit(function(e){
       e.preventDefault(); 
       var formObjecto = {
           met:         "atualizarMedida",
           dsMedida:    $("#medida").val(),
           vlInicial:   $('#vlInicial').val(),
           qtInicial:   $('#qtInicial').val(),
           vlMedida:    $('#vlMedida').val(),
           qtMedida:    $('#qtMedida').val()  }
       
       $.ajax({
          url: '/taxa',
          type: 'PUT',
          data: formObjecto,
          success: function(data) {
            console.log(data);
          }
        });
        
    });
    
    //Vigorar
    $("#vigorar").click(function(){
        if($("#medida").val() != ""){
        $.ajax({
          url: '/taxa',
          type: 'PUT',
          contentType: 'text/plain',
          dataType: 'json',
          data: {met: "atualizarVigor", dsMedida: $("#medida").val()},
          success: function(data) {
            console.log(data);
          }
        });
        }else{
            alert("selecione uma medida antes.");
        }
    });

});