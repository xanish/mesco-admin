<?php
session_start();
if($_SESSION['user'] == true){
    include 'connect.php';
    $entries = $db->visit_list->findOne(array("_id"=>new MongoId($_GET['_id'])));
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
                        <h2 style="margin-bottom: 20px;">Edit Visit List For <?=$entries["collector_name"];?></h2>
                        <div class="row" style="margin-bottom:20px;">
                            <div class="form-group col-lg-6 col-md-6">
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="collector-name-addon"><span class="fa fa-user-secret"></span></span>
                                        <select class="form-control input-lg" name="collector-name" aria-describedby="collector-name-addon" id="colname">
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
                                <div class="col-sm-3">
                                    <button class="btn btn-info" onclick=UpdateCollector(<?php echo json_encode($_GET['_id']);?>)>Change Collector For List</button>
                                </div>
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon" id="date-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="date" class="form-control input-lg" id="date" name="date" aria-describedby="date-addon" value="<?=$entries['date'];?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-info" onclick=UpdateDate(<?php echo json_encode($_GET['_id']);?>)>Use This List For Selected Date</button>
                            </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <h3 style="margin-bottom:20px;">Donors in Selected List</h3>
                                <button class="btn btn-warning pull-right" onclick=RemoveDonors(<?php echo json_encode($_GET['_id']); ?>)>Remove Donors From List</button>
                                <table id="visit" class="table table-bordered table-striped">
                                    <thead>
                                        <th><input type="checkbox" id="select-all"> Select All</th>
                                        <th>Donor Name</th>
                                        <th>Address</th>
                                        <th>Contact No.</th>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach($entries['donors'] as $entry){
                                            echo '<tr>';
                                            echo '<td><input class="checkbox" type="checkbox" name="chk[]" value="'.$entry['_user_id'].'"></td>';
                                            echo '<td>'.$entry['name'].'</td>';
                                            echo '<td>'.$entry['address'].'</td>';
                                            echo '<td>'.$entry['contact'].'</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-5">
                                <h3 style="margin-bottom:20px;">All Available Donors</h3>
                                <button class="btn btn-info pull-right" onclick=AddDonors(<?php echo json_encode($_GET['_id']); ?>) style="margin-left:15px;">Add Donors To List</button>
                                <table id="donors" class="table table-bordered table-striped">
                                    <thead>
                                        <th><input type="checkbox" id="select-all-2"> Select All</th>
                                        <th>Donor Name</th>
                                        <th>Address</th>
                                        <th>Contact No.</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $entries = $db->donors->find();
                                        foreach($entries as $entry){
                                            echo '<tr>';
                                            echo '<td><input class="checkbx" type="checkbox" name="chk[]" value="'.$entry['_id'].'"></td>';
                                            echo '<td>'.$entry['name'].'</td>';
                                            echo '<td>'.$entry['address'].'</td>';
                                            echo '<td>'.$entry['contact'].'</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
