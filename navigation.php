<nav class="navbar navbar-default navbar-fixed-top navbar-top">
   <div class="container-fluid">
      <div class="navbar-header">
         <button type="button" class="navbar-expand-toggle">
            <i class="fa fa-bars icon"></i>
         </button>
         <ol class="breadcrumb navbar-breadcrumb">
            <li class="active">Welcome, <?php echo $_SESSION["username"]; ?></li>
         </ol>
         <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
            <i class="fa fa-th icon"></i>
         </button>
      </div>
      <ul class="nav navbar-nav navbar-right">
         <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
            <i class="fa fa-times icon"></i>
         </button>

         <li class="dropdown profile">
            <a href="php/logout.php">Logout &nbsp;<span class="fa fa-power-off"></span></a>
         </li>
      </ul>
   </div>
</nav>
<div class="side-menu sidebar-inverse" style="font-size:15px;">
   <nav class="navbar navbar-default" role="navigation">
      <div class="side-menu-container">
         <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
               <div class="icon fa fa-paper-plane"></div>
               <div class="title">MESCO</div>
            </a>
            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
               <i class="fa fa-times icon"></i>
            </button>
         </div>
         <ul class="nav navbar-nav">
            <li>
               <a href="index.php">
                  <span class="icon fa fa-tachometer"></span><span class="title">Dashboard</span>
               </a>
            </li>
            <li>
               <a href="track-collector.php">
                  <span class="icon fa fa-map-marker"></span><span class="title">Track Collector</span>
               </a>
            </li>
            <li>
               <a href="generate-visit-list.php">
                  <span class="icon fa fa-pencil-square-o"></span><span class="title">Generate Visit List</span>
               </a>
            </li>
            <li class="panel panel-default dropdown">
               <a data-toggle="collapse" href="#dropdown-table">
                  <span class="icon fa fa-table"></span><span class="title">Donor and Collection Details</span>
               </a>
               <!-- Dropdown level 1 -->
               <div id="dropdown-table" class="panel-collapse collapse">
                  <div class="panel-body">
                     <ul class="nav navbar-nav">
                        <li>
                           <a href="donor-listings.php"><span class="icon fa fa-user"></span>List Of Available Donors</a>
                        </li>
                        <li>
                           <a href="collector-listings.php"><span class="icon fa fa-user-secret"></span>List Of Available Collectors</a>
                        </li>
                        <li>
                           <a href="visit-listings.php"><span class="icon fa fa-book"></span>Donor Visit List</a>
                        </li>
                        <li>
                           <a href="collection-listings.php"><span class="icon fa fa-inbox"></span>List Of Collected Items</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </li>
            <li class="panel panel-default dropdown">
               <a data-toggle="collapse" href="#dropdown-table-add">
                  <span class="icon fa fa-users"></span><span class="title">Add New Users</span>
               </a>
               <!-- Dropdown level 1 -->
               <div id="dropdown-table-add" class="panel-collapse collapse">
                  <div class="panel-body">
                     <ul class="nav navbar-nav">
                        <li>
                           <a href="add-donor.php"><span class="icon fa fa-user"></span>Add New Donor</a>
                        </li>
                        <li>
                           <a href="add-collector.php"><span class="icon fa fa-user-secret"></span>Add New Collector</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </li>
            <li class="panel panel-default dropdown">
               <a data-toggle="collapse" href="#dropdown-table-event">
                  <span class="icon fa fa-calendar"></span><span class="title">Event Details</span>
               </a>
               <!-- Dropdown level 1 -->
               <div id="dropdown-table-event" class="panel-collapse collapse">
                  <div class="panel-body">
                     <ul class="nav navbar-nav">
                        <li>
                           <a href="add-event.php"><span class="icon fa fa-plus"></span>Create New Event</a>
                        </li>
                        <li>
                           <a href="view-events.php"><span class="icon fa fa-list"></span>View All Events</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </li>
         </ul>
      </div>
      <!-- /.navbar-collapse -->
   </nav>
</div>
