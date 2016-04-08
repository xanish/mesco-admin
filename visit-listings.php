<?php
session_start();
if($_SESSION['user'] == true){
   include 'connect.php';
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>MESCO | Admin | Collection List For The Month</title>
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
                  <h2 style="margin-bottom: 20px;">Visit-Listings</h2>

                  <div class="row">
                      <?php

                      $cards = $db->visit_list->find();
                      foreach($cards as $card){
                          echo  '<div class="col-lg-4 md-4 sm12">';
                          echo '<a href="edit-visit-list.php?_id='.$card['_id'].'">';
                          echo '<div class="card">';
                          echo '<div class="card-body" style="padding-bottom: 95px;">';
                          echo '<h3 style="margin-top:0px;font-size:25px"><span class="fa fa-map-marker"></span> Location : </h3>';
                          echo '<p class="col-sm-12" style="padding:0px; font-size:18px;"><span class="fa fa-user"></span> Collector : '.$card['collector_name'].'</p>';
                          echo '<p class="col-sm-6" style="padding:0px; font-size:18px;"><span class="fa fa-calendar"></span> Date : '.$card['date'].'</p>';
                          echo '<p class="col-sm-6" style="padding:0px; font-size:18px; text-align: right;"><span class="fa fa-home"></span> Houses : '.sizeof($card['donors']).'</p>';
                          echo '</div>';
                          echo '</div>';
                          echo '</a>';
                          echo '</div>';
                      }

                      ?>

                  </div>

                  <!--<h3>Edit lists by Collector</h2>
                     <ul style="list-style-type: none; margin-bottom: 20px;">
                        <?php
                        /*$collectors = $db->collectors->find(array(), array("name"=>1));
                        foreach($collectors as $collector){
                           echo '<li style="margin-right:10px;"><a href="edit-list.php?_id='.$collector['_id'].'">'.$collector['name'].'</a></li>';
                       }*/
                        ?>
                    </ul>-->
                     <!--<form method="post" action="php/purge-visit-list.php">
                        <input type="submit" class="btn btn-warning pull-right" value="Regenerate List">
                        <table id="collection_list" class="table table-bordered table-striped">
                           <thead>
                              <th><input type="checkbox" id="select-all"> Select All</th>
                              <th>Donor Name</th>
                              <th>Address</th>
                              <th>Location</th>
                              <th>Contact No.</th>
                              <th>Collector Name</th>
                              <th>Visit Date</th>
                           </thead>
                           <tbody>
                              <?php
                              /*$entries = $db->donors->find(array("status"=>"1"));
                              foreach($entries as $entry){
                                 echo '<tr>';
                                 echo '<td><input class="checkbox" type="checkbox" name="chk[]" value="'.$entry['_id'].'"></td>';
                                 echo '<td>'.$entry['name'].'</td>';
                                 echo '<td>'.$entry['address'].'</td>';
                                 echo '<td>'.$entry['location'].'</td>';
                                 echo '<td>'.$entry['contact'].'</td>';
                                 echo '<td>'.$entry['collector_name'].'</td>';
                                 echo '<td>'.$entry['visit_date'].'</td>';
                                 echo '</tr>';
                             }*/
                              ?>
                           </tbody>
                        </table>
                    </form>-->
                  </div>
                  <a class="floating-button" href="generate-visit-list.php">
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
