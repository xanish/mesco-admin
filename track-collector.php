<?php
session_start();
if($_SESSION['user'] == true){
   include 'header2.php';
   include 'connect.php';
?>
<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(19.0759837,72.87765590000004),
    zoom:11,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
  <?php
  $loc = $db->collector_location->find(array("date"=>date('Y-m-d')));
  $arr = array();
  foreach ($loc as $l) {

      foreach ($l['details'] as $lo) {
          $x = array();
          array_push($x, $lo['time']);
          array_push($x, $lo['latitude']);
          array_push($x, $lo['longitude']);
          array_push($x, $l['collector_name']);
          array_push($arr, $x);
      }
  }
  ?>
  var markr = <?php echo json_encode($arr);?>;
  console.log(markr);
  for (var i = 0; i < markr.length; i++) {
    var mark = markr[i];
    var marker = new google.maps.Marker({
      position: {lat: mark[1], lng: mark[2]},
      map: map,
      title: mark[3] + " @ " + mark[0],
      zIndex: i+1
    });
  }
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

 <div class="app-container expanded">
     <div class="row content-container">
         <?php include 'navigation.php' ?>
         <!-- Main Content -->
         <div class="container-fluid">
             <div class="side-body padding-top">
                 <div id="googleMap" style="width:100%;height:800px;"></div>
             </div>
         </div>
     </div>
     <footer class="app-footer">
         <div class="wrapper">
             &copy; 2016 @ Danish, Sagar, Siddhant
         </div>
     </footer>
 </div>
<?php
}
else{
    header('Location: login.php');
}
include 'footer.php';
?>
