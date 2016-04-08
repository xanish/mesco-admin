<?php
session_start();
if($_SESSION['user'] == true){
   include 'connect.php';
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>MESCO | Admin | Donor COllection Details</title>
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
      <link rel="import" href="https://www.polymer-project.org/0.5/components/paper-ripple/paper-ripple.html">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

   </head>

   <body class="flat-blue">
       <?php
       $donor_details = $db->donors->findOne(array("_id"=>new MongoId($_GET["_id"])));
       ?>
      <div class="app-container expanded">
         <div class="row content-container">
            <?php include 'navigation.php' ?>
            <!-- Main Content -->
            <div class="container-fluid">
               <div class="side-body padding-top">
                  <div class="row">
                      <div class="col-lg-8">
                          <h2 style="margin-bottom: 20px;">Collection Details For <?php echo $donor_details["name"];?></h2>
                          <p><strong>Address: </strong><?=$donor_details["address"];?></p>
                          <p><strong>Contact No: </strong><?=$donor_details["contact"];?></p>
                      </div>
                      <?php
                      $newspaper = 0;
                      $temp = $db->collection_details->find(array("donor_id"=>$_GET["_id"]), array("newspaper"=>1));
                      foreach ($temp as $n) {
                          $newspaper += $n["newspaper"];
                      }
                      ?>
                      <div class="circle col-lg-4 pull-right">
                          <span style="font-size:15px;position: absolute;top: 48px;right: 22px;">Newspaper Weight (kg)</span>
                          <center style="position:relative; top:70px;">
                          <span><?=$newspaper;?></span>
                        </center>
                      </div>
                  </div>
                  <table id="donors" class="table table-bordered table-striped">
                     <thead>
                        <th>Items</th>
                     </thead>
                     <tbody>
                        <?php
                        $entries = $db->collection_details->find(array("donor_id"=>$_GET["_id"]));
                        foreach($entries as $entry){
                            if($entry["others"]){
                                echo '<tr>';
                                echo '<td>'.implode(" ", $entry['others']).'</td>';
                                echo '</tr>';
                            }
                        }

                        ?>
                     </tbody>
                  </table>
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
      include 'footer.php';
   }
   else{
      header('Location: login.php');
   }
   ?>
