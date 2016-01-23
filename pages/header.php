<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PSU MAnager 0.2">
    <meta name="author" content="Mayur Devgaonkar">

    <title>PSU Manager</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    

</head>

<body>
    <div id="wrapper">
        <!--Whole container-->


    <?php 
        
        
        require('db_connect.php');
 
        // connecting to db
        $db = new DB_CONNECT();
        
        if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">PSU Manager</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="Clock">
                         Clock
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><h2 id="bigClock"> Clock</h2></a>
                        </li>
                        <li><a href="#" id="date"></a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-gear fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="#" data-toggle="modal" data-target="#changePassword"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>
                        
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="bookings.php"><i class="glyphicon glyphicon-tags fa-fw"></i> Bookings</a>
                        </li>
                        <li>
                            <a href="games.php"><i class="fa fa-gamepad fa-fw"></i> Games</a>
                        </li>
                        <li>
                            <a href="players.php"><i class="fa fa-user fa-fw"></i> Player profiles</a>
                        </li>
                        <li>
                            <a href="enquiry.php"><i class="fa fa-search fa-fw"></i> Enquiry</a>
                        </li>
                        <li>
                            <a href="data.php"><i class="fa fa-table fa-fw"></i> Data</a>
                        </li>
                        
                       
                    </ul>
                <div>
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<!-- Modal -->
                            <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id= "mainForm" action="insert.php" method="post" role="form">
                                            
                                            <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Old password</label>
                                            <input type="password" class="form-control" name= "playerName2" placeholder="Enter old password">
                                        </div>
                                            </div>
                                           <div class="col-md-12">
                                            <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name= "playerName1" placeholder="Enter new password">
                                        </div>
                                            </div>
                                        
                                        
                                        <div class="modal-footer modal-footer-border-top">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                                        </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
        <div id="page-wrapper">
            <!--Content starts here-->
<?php }?>

