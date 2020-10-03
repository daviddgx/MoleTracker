<!DOCTYPE html>
<html>
  <head>
  <title>Mole Tracker / Tracker </title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
   <!-- Requiered meta tags -->
   <meta charset="utf-8">
        <meta name="viewport" content="width=divice-whidth, initial-sace=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <title>Mole Tracker</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        
        
        
        <link rel="icon" href="imagenes/LOGOTKM2.PNG"> 
        <!-- Estilos en Css -->
       
  </head>
  <body class="fixed_header left_nav_fixed">

<!-- Image and text -->
<nav class="navbar navbar-dark bg-dark bg-light">
<a class="navbar-brand" href="#">
    <img src="imagenes/LOGOTKM2.PNG" width="auto" height="30" class="d-inline-block align-top" alt="">
    MoleTracker
  </a>
  <form class="form-inline">

    
    <!-- Inicia Boton Modal Iniciar Tracking -->

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Iniciar Tracking
      </button>

      <!-- Modal -->
      <div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tracking Iniciado correctamente.</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Se inicio el Modulo de Tracking, su ubicación sera trackiada de este momento en adelante,
              hasta que usted finalice la secion con el boton de "Finalizar Tracking"
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar.</button>
              <button type="button" class="btn btn-primary " onclick="RegresarACasa()">Entiendo.</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Inicia Boton Modal Iniciar Tracker -->
<div>
<p>   </p>
</div>

    <!-- Inicia Boton Modal Finalizar Tracking -->

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2">
        Finalizar Tracking
      </button>

      <!-- Modal -->
      <div class="modal" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel2">Tracking Finalizado correctamente.</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Se Finalizo el Tracking correctamente, se asocia este punto como el punto de entrega de la Guia de Carga.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar.</button>
              <button type="button" class="btn btn-primary" onclick="RegresarACasa()">Entiendo.</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Inicia Boton Modal Finalizar Tracker -->


 </form>
</nav>




    <div id="map"></div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 15,
          mapTypeId: 'roadmap'
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('MoleTracker esta Aquí!');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        map.setTilt(45);
        
        var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);
      }

      


      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
        
      }
    </script>
<script>
 var watch =null;
 function success(position)
{
   var lat = position.coords.latitude;
   var lon= position.coords.longitude;
   if (watch != null ) 
 /*Need to take care .. as maybe there is no gps and user 
  want it off so keep attempt 3 times or some kind a way out otherwise it will 
  infinite loop */
    {
        navigator.geolocation.clearWatch(watch);
        watch = null;
    }

}
function getLatLon()
{
    var geolocOK = ("geolocation" in navigator);
    if ( geolocOK ) 
    {
        var option = {enableHighAccuracy:true, maximumAge: 0,timeout:10000 };
        watch =  navigator.geolocation.watchPosition(success, fails,  option);
    }
    else {
        //disable the current location?  
    }
}
function fails()
{
    alert("Encienda el GPS del dispositivo!");
}
getLatLon(); 
</script>



    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMS9Z53e5o37lHssInOqrhm3I87WpYxZg&callback=initMap">
    </script>
  

  <script src="js/jquery-2.1.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/common-script.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/jquery.sparkline.js"></script>
    <script src="js/sparkline-chart.js"></script>
    <script src="js/graph.js"></script>
    <script src="js/edit-graph.js"></script>
    <script src="plugins/kalendar/kalendar.js" type="text/javascript"></script>
    <script src="plugins/kalendar/edit-kalendar.js" type="text/javascript"></script>

    <script src="plugins/sparkline/jquery.sparkline.js" type="text/javascript"></script>
    <script src="plugins/sparkline/jquery.customSelect.min.js"></script>
    <script src="plugins/sparkline/sparkline-chart.js"></script>
    <script src="plugins/sparkline/easy-pie-chart.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="plugins/morris/raphael-min.js" type="text/javascript"></script>
    <script src="plugins/morris/morris-script.js"></script>


    <script>
function RegresarACasa()
{
     location.href = "http://localhost/Projects/MoleTracker/TrackerGuiaActiva.php";
} 
</script>


    <script src="plugins/demo-slider/demo-slider.js"></script>
    <script src="plugins/knob/jquery.knob.min.js"></script>




    <script src="js/jPushMenu.js"></script>
    <script src="js/side-chats.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="plugins/scroll/jquery.nanoscroller.js"></script>


</body>
</html>