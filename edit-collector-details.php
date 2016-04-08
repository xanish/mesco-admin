<?php
session_start();
if($_SESSION['user'] == true){
   include 'connect.php';
   $collector = $db->collectors->findOne(array("_id"=>new MongoId($_GET['_id'])));
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>MESCO | Admin | Edit Collector Details</title>
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
                  <h2 style="margin-bottom: 20px;">Edit Details of a Collector</h2>
                  <form method="post" action="php/submit-collector-details.php?update=1&amp;_id=<?=$_GET['_id']?>">
                     <div class="form-group">
                        <div class="input-group">
                           <span class="input-group-addon" id="name-addon"><span class="fa fa-user"></span></span>
                           <input class="form-control input-lg" type="text" name="name" placeholder="Collector's Full Name" aria-describedby="name-addon" value="<?=$collector['name']?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="row" style="height: 46px; margin-top: 25px; margin-bottom: 25px;">
                           <div class="form-group col-lg-6 col-md-6">
                              <div class="input-group">
                                 <span class="input-group-addon" id="contact-addon"><span class="fa fa-phone"></span></span>
                                 <input class="form-control input-lg" type="number" maxlength="10" name="contact" placeholder="Contact Number" aria-describedby="contact-addon" value="<?=$collector['contact']?>">
                              </div>
                           </div>
                           <div class="form-group col-lg-6 col-md-6">
                              <div class="input-group">
                                 <span class="input-group-addon" id="password-addon"><span class="fa fa-key"></span></span>
                                 <input class="form-control input-lg" type="password" name="password" placeholder="Password" aria-describedby="password-addon" value="<?=$collector['password']?>">
                              </div>
                           </div>
                           <!--<div class="form-group col-lg-6 col-md-6">
                           <div class="input-group">
                           <span class="input-group-addon" id="location-addon"><span class="fa fa-inbox"></span></span>
                           <input class="form-control input-lg" type="text" name="location" placeholder="Location" aria-describedby="location-addon">
                        </div>
                     </div>-->
                  </div>
              </div>
               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon" id="address-addon"><span class="fa fa-location-arrow"></span></span>
                     <textarea class="form-control input-lg" type="text" name="address" placeholder="Address" aria-describedby="address-addon"><?php echo $collector['address']?></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <input type="submit" value="Update Collector Details" class="btn btn-info pull-right">
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
