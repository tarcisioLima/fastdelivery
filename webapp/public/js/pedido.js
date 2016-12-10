$(document).ready(function(){
    $.get("/pedido/listp", 
        function(data, status){
         console.log(status);
         for(var cliente in data) {
             console.log(cliente);
             var tr = '<tr><th scope="row">' + cliente + '</th>';
                 tr+= '<td>' + data[cliente]["situacao"] + '</td>';
                 tr+= '<td>' + data[cliente]["motorista"] + '</td>';
                 tr+= '<td>' + data[cliente]["preco"] + '</td>';
                 tr+= '<td>' + data[cliente]["retirada"] + '</td>';
                 tr+= '<td>' + data[cliente]["entrega"] + '</td>';
                 tr+= '<td>' + data[cliente]["dataPedido"] + '</td>';
                 tr+= '<td>' + data[cliente]["dataFinalizacao"] + '</td></tr>';
                 $("#corpo-tabela").append(tr);
         }
            
          
             
                
    }); 
});