<?php
session_start();
if($_SESSION['user'] == true){
   include 'header.php';
   include 'connect.php';
   ?>

      <div class="app-container expanded">
         <div class="row content-container">
            <?php include 'navigation.php' ?>
            <!-- Main Content -->
            <div class="container-fluid">
               <div class="side-body padding-top">
                  <h2 style="margin-bottom: 20px;">Add a new Donor</h2>
                  <div class="col-lg-6">
                     <form method="post" action="php/submit-donor-details.php?app=0">
                        <div class="form-group">
                           <div class="input-group">
                              <span class="input-group-addon" id="name-addon"><span class="fa fa-user"></span></span>
                              <input class="form-control input-lg" type="text" name="name" placeholder="Donor's Full Name" aria-describedby="name-addon">
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row" style="height: 46px; margin-top: 25px; margin-bottom: 25px;">
                              <div class="form-group col-lg-6 col-md-6">
                                 <div class="input-group">
                                    <span class="input-group-addon" id="contact-addon"><span class="fa fa-phone"></span></span>
                                    <input class="form-control input-lg" type="number" maxlength="10" name="contact" placeholder="Contact Number" aria-describedby="contact-addon">
                                 </div>
                              </div>
                              <div class="form-group col-lg-6 col-md-6">
                                 <div class="input-group">
                                    <span class="input-group-addon" id="flat-no-addon"><span class="fa fa-home"></span></span>
                                    <input class="form-control input-lg" type="text" name="flat_no" placeholder="Flat Number" aria-describedby="flat-no-addon">
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="input-group">
                              <span class="input-group-addon" id="building-addon"><span class="fa fa-building"></span></span>
                              <input type="text" class="form-control input-lg" name="building" placeholder="Building Name" aria-describedby="building-addon">
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="input-group">
                              <span class="input-group-addon" id="address-addon"><span class="fa fa-location-arrow"></span></span>
                              <input type="text" id="address" class="form-control input-lg" name="address" placeholder="Address" aria-describedby="address-addon">
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="input-group">
                              <span class="input-group-addon" id="region-addon"><span class="fa fa-map-marker"></span></span>
                              <input type="text" class="form-control input-lg" name="location" placeholder="Region" aria-describedby="region-addon">
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row" style="height: 46px; margin-top: 25px; margin-bottom: 25px;">
                              <div class="form-group col-lg-6 col-md-6">
                                 <div class="input-group">
                                    <span class="input-group-addon" id="latitude-addon"><span class="fa fa-map-marker"></span></span>
                                    <input type="text" id="latitude" placeholder="Latitude" name="latitude" class="form-control input-lg" aria-describedby="latitude-addon">
                                 </div>
                              </div>
                              <div class="form-group col-lg-6 col-md-6">
                                 <div class="input-group">
                                    <span class="input-group-addon" id="longitude-addon"><span class="fa fa-map-marker"></span></span>
                                    <input type="text" id="longitude" placeholder="Longitude" name="longitude" class="form-control input-lg" aria-describedby="longitude-addon">
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <input type="submit" value="Add Donor" class="btn btn-info pull-right">
                        </div>
                     </form>
                  </div>
                  <div class="col-lg-6">
                     <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                     <div id="map"></div>
                  </div>
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
