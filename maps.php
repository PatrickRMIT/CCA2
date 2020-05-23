<?php
// Initialize the session
session_start();
require __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Datastore\DatastoreClient;
$projectId = 'cca2patrickjoel';
$datastore = new DatastoreClient([
    'projectId' => $projectId
]);

$key = $datastore->key('user', $_SESSION['username']);
$user = $datastore->lookup($key);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simple Map</title>

    <style>
      .container1 {
        height: 450px;
      }

      #map_canvas {
        width: 100%;
        height: 100%;
        order: 1px solid blue;
      
      }

    </style>
 </head>

 <link type="text/css" rel="stylesheet" href="/stylesheets/main.css" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0nu7HabL4z8Pzb_S3LRnv0m8GHQaUU5Q&callback=initMap"></script>

    <script>
      // The web service URL from Drive 'Deploy as web app' dialog.
      var DATA_SERVICE_URL = "https://script.google.com/macros/s/AKfycbwa8jG2qlQSaffI90my88KDm-ZC9YTwDCh19G-0oVbj200rKBI/exec?jsonp=callback";

      var map, infoWindow;

      function initialize() {
        map = new google.maps.Map(document.getElementById('map_canvas'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 12
        });
        infoWindow = new google.maps.InfoWindow;

        
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }


        var scriptElement = document.createElement('script');
        scriptElement.src = DATA_SERVICE_URL;
        document.getElementsByTagName('head')[0].appendChild(scriptElement);
      }

      function callback(data) {
        for (var i = 0; i < data.length; i++) {
          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(data[i][2], data[i][1]),
            map: map
          });

        }
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

    </script>
 
  <body onload="initialize()">
    <div class="header">
  <h1>WECLOME BACK <?php echo $user['name'];?></h1>
  <h2>View the trends</h2>
</div>
<ul>
<li><a href="https://cca2patrickjoel.ts.r.appspot.com/main">Home</a></li>
<li><a href="https://cca2patrickjoel.ts.r.appspot.com/data">Growth Data</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/files">Files</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/search">Trending videos</a></li>
  <li><a class="active" href="https://cca2patrickjoel.ts.r.appspot.com/maps">Maps</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/profile">Profile</a></li>
</ul>
<div class="container1">
    <div id="map_canvas"></div>
    </div>
  <div class="footer">
  <p>Developed By Patrick Jones S3661943 & Joel Jacob 3660851 for Cloud Computing COSC2626/2640 Assignment 2</p>
</div>
</body>
</html>