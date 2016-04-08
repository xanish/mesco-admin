<?php
session_start();
if($_SESSION['user'] == true){
   include 'connect.php';
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>MESCO | Admin | List Of Available Collectors</title>
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

      <div class="app-container expanded">
         <div class="row content-container">
            <?php include 'navigation.php' ?>
            <!-- Main Content -->
            <div class="container-fluid">
               <div class="side-body padding-top">
                  <h2 style="margin-bottom: 20px;">List of Available Collectors</h2>
                  <button class="btn btn-warning pull-right" onclick="deleteMultiEntry('collectors');">Delete Entries</button>
                  <table id="collectors" class="table table-bordered table-striped">
                     <thead>
                        <th><input type="checkbox" id="select-all"> Select All</th>
                        <th>Collector Name</th>
                        <th>Address</th>
                        <th>Contact No.</th>
                        <th>Edit Details</th>
                     </thead>
                     <tbody>
                        <?php
                        $entries = $db->collectors->find();
                        foreach($entries as $entry){
                           echo '<tr>';
                           echo '<td><input class="checkbox" type="checkbox" name="chk[]" value="'.$entry['_id'].'"></td>';
                           echo '<td>'.$entry['name'].'</td>';
                           echo '<td>'.$entry['address'].'</td>';
                           echo '<td>'.$entry['contact'].'</td>';
                           echo '<td><a href="edit-collector-details.php?_id='.$entry['_id'].'"><span class="fa fa-edit"></span> Edit</a></td>';
                           echo '</tr>';
                        }
                        ?>
                     </tbody>
                  </table>
               </div>
               <a class="floating-button" href="add-collector.php">
                  <paper-ripple class="circle recenteringTouch" fit></paper-ripple>
                  <span style="bottom: -14px; position: relative; right: -25px; color: #ffffff; font-size:30px;">+</span>
               </a>
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
