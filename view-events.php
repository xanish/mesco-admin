<?php
session_start();
if($_SESSION['user'] == true){
   include 'connect.php';
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>MESCO | Admin | List Of Events</title>
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
                  <h2 style="margin-bottom: 20px;">List of Events</h2>
                  <button class="btn btn-warning pull-right" onclick="deleteMultiEntry('events');">Delete Entries</button>
                  <table id="collectors" class="table table-bordered table-striped">
                     <thead>
                        <th><input type="checkbox" id="select-all"> Select All</th>
                        <th>Event Title</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Edit Event</th>
                     </thead>
                     <tbody>
                        <?php
                        $events = $db->events->find();
                        foreach($events as $event){
                           echo '<tr>';
                           echo '<td><input class="checkbox" type="checkbox" name="chk[]" value="'.$event['_id'].'"></td>';
                           echo '<td>'.$event['title'].'</td>';
                           echo '<td>'.$event['description'].'</td>';
                           echo '<td>'.$event['start_date'].'</td>';
                           echo '<td>'.$event['end_date'].'</td>';
                           echo '<td><a href="edit-event.php?_id='.$event['_id'].'"><span class="fa fa-edit"></span> Edit</a></td>';
                           echo '</tr>';
                        }
                        ?>
                     </tbody>
                  </table>
               </div>
               <a class="floating-button" href="add-event.php">
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
