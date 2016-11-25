$(document).ready(function(){
var selectBox = function(){
 $.get("/taxa/listm", 
 function(data, status){
     //console.log(data["Hora"]);
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

});