<?php
session_start();
if($_SESSION['user'] == true){
   include 'connect.php';
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>MESCO | Admin | Recent Collections</title>
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

   </head>

   <body class="flat-blue">

      <div class="app-container expanded">
         <div class="row content-container">
            <?php include 'navigation.php' ?>
            <!-- Main Content -->
            <div class="container-fluid">
               <div class="side-body padding-top">
                  <h2 style="margin-bottom: 20px;">Completed Collections</h2>
                  <button class="btn btn-warning pull-right" onclick="deleteMultiEntry('donors');">Delete Entries</button>
                  <table id="collections" class="table table-bordered table-striped">
                     <thead>
                        <th><input type="checkbox" id="select-all"> Select All</th>
                        <th>Donor Name</th>
                        <th>Address</th>
                        <th>Contact No.</th>
                        <th>Newspaper Quantity</th>
                        <th>Other Items</th>
                        <th>Month</th>
                     </thead>
                     <tbody>
                        <?php
                        $entries = $db->collection_details->find();
                        foreach($entries as $entry){
                           echo '<tr>';
                           echo '<td><input class="checkbox" type="checkbox" name="chk[]" value="'.$entry['_id'].'"></td>';
                           $donor = $db->donors->findOne(array("_id" => new MongoId($entry["donor_id"])));
                           echo '<td>'.$donor['name'].'</td>';
                           echo '<td>'.$donor['address'].'</td>';
                           echo '<td>'.$donor['contact'].'</td>';
                           echo '<td>'.$entry['newspaper'].'</td>';
                           echo '<td>'.implode(" ", $entry['others']).'</td>';
                           echo '<td>'.$entry['month'].'</td>';
                           echo '</tr>';
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
