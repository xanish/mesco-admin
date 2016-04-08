<!DOCTYPE html>
<html>
<head>
   <title>MESCO | Admin</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Fonts -->
   <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Data tables css -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.css">
   <!-- CSS App -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="css/flat-blue.css">

   <!--Let browser know website is optimized for mobile-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

   <!-- Favicon -->
   <link rel="shortcut icon" href="images/favicon.ico">
   <style>
   #map {
      width: 100%;
      height: 400px;
   }
   .controls {
      margin-top: 10px;
      border: 1px solid transparent;
      border-radius: 2px 0 0 2px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      height: 32px;
      outline: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
   }

   #pac-input {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 300px;
   }

   #pac-input:focus {
      border-color: #4d90fe;
   }

   .pac-container {
      font-family: Roboto;
   }

   #type-selector {
      color: #fff;
      background-color: #4d90fe;
      padding: 5px 11px 0px 11px;
   }

   #type-selector label {
      font-family: Roboto;
      font-size: 13px;
      font-weight: 300;
   }
   #target {
      width: 345px;
   }
   </style>
   <script type="text/javascript">

   function initAutocomplete() {
      var map = new google.maps.Map(document.getElementById('map'), {
         center: {lat: 19.0878348, lng: 72.83274400000005},
         zoom: 13
      });
      var input = /** @type {!HTMLInputElement} */(
         document.getElementById('pac-input'));

         var types = document.getElementById('type-selector');
         map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
         map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

         var autocomplete = new google.maps.places.Autocomplete(input);
         autocomplete.bindTo('bounds', map);

         var infowindow = new google.maps.InfoWindow();
         var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
         });

         autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
               window.alert("Autocomplete's returned place contains no geometry");
               return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
               map.fitBounds(place.geometry.viewport);
            } else {
               map.setCenter(place.geometry.location);
               map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setIcon(/** @type {google.maps.Icon} */({
               url: place.icon,
               size: new google.maps.Size(71, 71),
               origin: new google.maps.Point(0, 0),
               anchor: new google.maps.Point(17, 34),
               scaledSize: new google.maps.Size(35, 35)
            }));
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
               address = [
                  (place.address_components[0] && place.address_components[0].short_name || ''),
                  (place.address_components[1] && place.address_components[1].short_name || ''),
                  (place.address_components[2] && place.address_components[2].short_name || '')
               ].join(' ');
            }

            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map, marker);
            var latlong = marker.getPosition();
            document.getElementById("latitude").value = latlong.lat().toString();
            document.getElementById("longitude").value = latlong.lng().toString();
            document.getElementById("address").value = address;
            //alert(marker.getPosition().toString());
         });
      }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwYiLOK-lCV7Y_vcxNeFh1Ix-MueSyUgE&libraries=places&callback=initAutocomplete" async defer></script>
   </head>

   <body class="flat-blue">
