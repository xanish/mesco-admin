<?php
session_start();
if($_SESSION['user'] == true){
   include 'connect.php';
   $event = $db->events->findOne(array("_id"=>new MongoId($_GET["_id"])));
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>MESCO | Admin | Add New Event</title>
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
                  <h2 style="margin-bottom: 20px;">Add a new Event</h2>
                  <form method="post" action="php/submit-event-details.php?_id=<?=$_GET['_id'];?>&amp;update=0" enctype="multipart/form-data">
                     <div class="form-group">
                        <div class="input-group">
                           <span class="input-group-addon" id="name-addon"><span class="fa fa-bookmark"></span></span>
                           <input class="form-control input-lg" type="text" name="title" placeholder="Event Title" aria-describedby="name-addon" value="<?=$event['title'];?>">
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="row" style="height: 46px; margin-top: 25px; margin-bottom: 25px;">
                           <div class="form-group col-lg-6 col-md-6">
                              <label>Start Date</label>
                              <div class="input-group">
                                 <span class="input-group-addon" id="strt-addon"><span class="fa fa-calendar-check-o"></span></span>
                                 <input id="strt" class="form-control input-lg" type="date" name="start-date" aria-describedby="strt-addon" value="<?=$event["start_date"];?>">
                              </div>
                           </div>
                           <div class="form-group col-lg-6 col-md-4">
                              <label>End Date</label>
                              <div class="input-group">
                                 <span class="input-group-addon" id="end-addon"><span class="fa fa-calendar-times-o"></span></span>
                                 <input class="form-control input-lg" type="date" name="end-date" aria-describedby="end-addon" value="<?=$event["end_date"];?>">
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="input-group">
                           <span class="input-group-addon" id="desc-addon"><span class="fa fa-comment"></span></span>
                           <textarea class="form-control input-lg" name="desc" placeholder="Event Description" aria-describedby="desc-addon"><?=$event["description"];?></textarea>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="input-group">
                           <span class="input-group-addon" id="img-addon"><span class="fa fa-folder-open-o"></span></span>
                           <input class="form-control input-lg" name="image" aria-describedby="img-addon" type="file">
                        </div>
                     </div>
                     <center>
                        <img src="/mesco/php/<?=$event['image'];?>" height="400px" width="auto">
                     </center>
                     <div class="form-group">
                        <input type="submit" value="Publish Event" class="btn btn-info pull-right">
                     </div>
                  </div>
               </form>
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
