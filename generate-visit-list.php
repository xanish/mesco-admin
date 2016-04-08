<?php
session_start();
if($_SESSION['user'] == true){
   include 'connect.php';
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>MESCO | Admin | Make Schedule For Collection</title>
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

   </head>

   <body class="flat-blue">

      <div class="app-container expanded">
         <div class="row content-container">
            <?php include 'navigation.php' ?>
            <!-- Main Content -->
            <div class="container-fluid">
               <div class="side-body padding-top">
                  <h2 style="margin-bottom: 20px;">Create Collection Schedule</h2>
                  <form method="post" action="php/submit-visit-list.php">
                     <div class="form-group col-lg-6 col-md-6">
                        <div class="input-group">
                           <span class="input-group-addon" id="collector-name-addon"><span class="fa fa-user-secret"></span></span>
                           <select class="form-control input-lg" name="collector-name" aria-describedby="collector-name-addon">
                              <?php
                              $collectors = $db->collectors->find(array(), array("contact"=>0, "address"=>0));
                              echo '<option value="NULL">Select a Collector</option>';
                              foreach($collectors as $collector){
                                 echo '<option value="'.$collector['name'].'">'.$collector['name'].'</option>';
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group col-lg-6 col-md-6">
                        <div class="input-group">
                           <span class="input-group-addon" id="collection-date-addon"><span class="fa fa-calendar-check-o"></span></span>
                           <input type="date" class="form-control input-lg" name="collection-date" aria-describedby="collection-date-addon">
                        </div>
                     </div>
                     <h3 style="margin-bottom: 20px;">Select Donors to assign</h3>
                     <table id="donors" class="table table-bordered table-striped">
                        <thead>
                           <th><input type="checkbox" id="select-all"> Select All</th>
                           <th>Donor Name</th>
                           <th>Address</th>
                           <th>Contact No.</th>
                        </thead>
                        <tbody>
                           <?php
                           $entries = $db->donors->find();
                           foreach($entries as $entry){
                              echo '<tr>';
                              echo '<td><input class="checkbox" type="checkbox" name="chk[]" value="'.$entry['_id'].'"></td>';
                              echo '<td>'.$entry['name'].'</td>';
                              echo '<td>'.$entry['flat_no'].' '.$entry['building'].' '.$entry['address'].'</td>';
                              echo '<td>'.$entry['contact'].'</td>';
                              echo '</tr>';
                           }
                           ?>
                        </tbody>
                     </table>
                     <input type="submit" class="btn btn-info pull-right" value="Generate List" style="margin-top:20px;position:relative;bottom:-19px;">
                  </form>
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
