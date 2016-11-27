
function mapaStart(){
    var mapa;
    var marcador;
    
    mapa = new google.maps.Map(document.getElementById('omapa'), {
        zoom: 13,
        center: new google.maps.LatLng(-23.96425614, -46.38520819),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true,
        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
        }
  });
  var getMarkers = function(){
      $.get("/mapa/listll", 
        function(data, status){
         for(var motor in data) {
           marcador = new google.maps.Marker({
                position: new google.maps.LatLng(data[motor]["lat"],data[motor]["long"]),
                title: motor,
                map: mapa,
                animation: google.maps.Animation.DROP
            });
         }
    });
  };
  
  getMarkers();
  
};
    
    

