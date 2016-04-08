<?php
if(isset($_GET["i"])){
   include 'connect.php';
   $message = "Wrong username or password.";
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>MESCO | Login</title>
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

   <div class="app-container">
      <div class="row content-container">
         <div class="login-box">
            <div class="login-logo">
               <b>MESCO Admin</b>
            </div>
            <div class="login-box-body">
               <p class="login-box-msg">Sign in to start your session</p>
               <form method="post" action="php/check-login.php">
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon" id="name-addon"><span class="fa fa-user"></span></span>
                        <input required class="form-control input-lg" type="text" name="username" placeholder="Username" aria-describedby="name-addon">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon" id="password-addon"><span class="fa fa-lock"></span></span>
                        <input required class="form-control input-lg" type="password" name="password" placeholder="Password" aria-describedby="password-addon">
                     </div>
                  </div>
                  <center><span style="color:red;"><?php if(isset($message)) echo $message; ?></span><center>
                     <div class="form-group">
                        <input type="submit" value="Sign In" class="btn btn-info form-control">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <?php include 'footer.php';?>
