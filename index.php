<?php
session_start();
if($_SESSION['user'] == true){
    include 'connect.php';
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>MESCO | Admin | Dashboard</title>
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
<?php
    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $keyarr = array();
    $valarr = array();
    foreach($months as $month){
        $it = $db->collection_details->find(array("month"=> new MongoRegex("/$month/")),array("newspaper"=>1, "_id" => 0));
        $v = 0;
        foreach($it as $x){
            foreach ($x as $key => $value) {
                $v += $value;
            }
        }
        array_push($valarr, $v);
    }

 ?>
    <body class="flat-blue" onload="init()">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
            var keys = <?php echo json_encode($months);?>;
            var values = <?php echo json_encode($valarr);?>;
            console.log(values);

        </script>
        <script type="text/javascript">
        function init() {
            var ctx = $("#myChart").get(0).getContext("2d");
            var data = {
                labels: keys,
                datasets: [
                    {

                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(220,220,220,0.75)",
                        highlightStroke: "rgba(220,220,220,1)",
                        data: values
                    }

                ]
            };
            var myBarChart = new Chart(ctx).Bar(data);

        }

        </script>

        <div class="app-container expanded">
            <div class="row content-container">
                <?php include 'navigation.php' ?>
                <!-- Main Content -->
                <div class="container-fluid">
                    <div class="side-body padding-top">
                        <div class="row">
                            <?php
                            $donors = $db->donors->find()->count();
                            ?>

                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <section>
                                            <article>
                                                <canvas id="myChart" width="800px" height="500px">
                                                </canvas>
                                            </article>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-5 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3><span class="fa fa-mail-reply"></span> Quick Navigation</h3>
                                        <hr>
                                        <a href="donor-listings.php" class="quick-nav-text"><span class="fa fa-users"></span> Display All Donors</a>
                                        <hr>
                                        <a href="collector-listings.php" class="quick-nav-text"><span class="fa fa-user-secret"></span> Display All Collectors</a>
                                        <hr>
                                        <a href="visit-listings.php" class="quick-nav-text"><span class="fa fa-book"></span> Display Donor Visit List</a>
                                        <hr>
                                        <a href="add-donor.php" class="quick-nav-text"><span class="fa fa-user"></span> Add New Donors</a>
                                        <hr>
                                        <a href="add-collector.php" class="quick-nav-text"><span class="fa fa-user-plus"></span> Add New Collectors</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-12 col-sm-12">
                                <div class="col-lg-12 col-md-6 col-xs-6 full-col">
                                    <a href="collector-listings.php">
                                        <div class="card red summary-inline">
                                            <div class="card-body">
                                                <i class="icon fa fa-user-secret fa-3x"></i>
                                                <div class="content">
                                                    <div class="title"><?php echo $db->collectors->find()->count(); ?></div>
                                                    <div class="sub-title">Total Collectors</div>
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-12 col-md-6 col-xs-6 full-col">
                                    <a href="donor-listings.php">
                                        <div class="card green summary-inline">
                                            <div class="card-body">
                                                <i class="icon fa fa-users fa-3x"></i>
                                                <div class="content">
                                                    <div class="title"><?php echo $donors; ?></div>
                                                    <div class="sub-title">Total donors</div>
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-12 col-md-6 col-xs-6 full-col">
                                    <a href="visit-listings.php">
                                        <div class="card blue summary-inline">
                                            <div class="card-body">
                                                <i class="icon fa fa-list-alt fa-3x"></i>
                                                <div class="content">
                                                    <div class="title"><?php echo $db->visit_list->find()->count(); ?></div>
                                                    <div class="sub-title">Total Lists</div>
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
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
