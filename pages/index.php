<?php 
date_default_timezone_set('Asia/Kolkata');
require('header.php');
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->        
    </div>
           
    <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-blackboard fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   
                                   
                                    <div class="huge"><?
                                    $countObject = mysql_query("SELECT COUNT(consoleNum) AS total FROM Consoles WHERE vacant=1") or die(mysql_error());
                $countData=mysql_fetch_assoc($countObject);
                echo $count = $countData['total'];
                                    ?></div>
                                    <div>Available Consoles</span></div>
                                </div>
                            </div>
                        </div>
                            <a href="#"><div class="panel-footer" data-toggle="modal" data-target="#myModal">
                                <span class="pull-left">Book a console</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                                </div> </a>
                                                        <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">New booking</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form id= "mainForm" action="insert.php" method="post" role="form">
                                       <div class="col-md-12">
                                            <div class="form-group">
                                            <label>1st Player Name</label>
                                            <input class="form-control" name= "playerName1" placeholder="Player name">
                                        </div>
                                            </div>
                                            <div class="col-md-12">
                                        <div class="form-group">
                                            <label>2nd Player Name</label>
                                            <input class="form-control" name= "playerName2" placeholder="Default No Player">
                                        </div>
                                            </div>
                                            <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Phone/Mobile Number 1</label>
                                            <input class="form-control" name= "phoneNumber1" placeholder="Ex. 9876543210">
                                        </div>
                                            </div>
                                            <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Phone/Mobile Number 2</label>
                                            <input class="form-control" name= "phoneNumber2" placeholder="Ex. 9876543210">
                                        </div>
                                            </div>
                                        <div class="form-group">
                                           <div class="col-md-4"><label>Start Time</label>
                                            <input type="time" class="form-control" name= "startTime" value="<? echo date("H:i"); ?>">
                                            </div>
                                            <div class="col-md-4">
                                            <label>End Time</label>
                                            <input type="time" class="form-control" name= "endTime" value="<? $time= strtotime(date("H:i"))+60*60; echo date("H:i", $time); ?>">
                                            </div>
                                            <div class="col-md-4">
                                            <label>Amount</label>
                                            <input type="number"class="form-control" name= "amount" value="80">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Game</label>
                                            <select class="form-control" name= "selectGame">
                                               
                                                <?
                                                // get all results from table
                                               $results = mysql_query("SELECT *FROM Games") or die(mysql_error());

                                                // check for empty result
                                                if (mysql_num_rows($results) > 0) {
                                                    // looping through all results
                                                while($row = mysql_fetch_array($results)){
                                                  $game= $row["gameName"];
                                                print"
                                                <option>$game</option>
                                                ";
                                                }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                            </div>
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Console</label>
                                            <select class="form-control" name= "selectConsole">
                                               
                                                <?
                                                // get all results from table
                                                $consoleCount = mysql_query("SELECT COUNT(consoleNum) AS total FROM Consoles") or die(mysql_error());
                $consoleCountData=mysql_fetch_assoc($consoleCount);
                echo $countConsole = $consoleCountData['total'];
                                                for ($x = 1; $x <= $countConsole; $x++){
                                                    print"
                                                <option>$x</option>
                                                ";  
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        
                                            </div>
                                            
                                        <div class="modal-footer modal-footer-border-top">
                                            <button type="submit"  class="btn btn-primary" id="submit" data-dismiss="modal">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                                        </div>
                                            
                                    </form>
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-gamepad fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?
                                    $gameCount = mysql_query("SELECT COUNT(gameName) AS total FROM Games WHERE cdAvailable>0") or die(mysql_error());
                $gameCountData=mysql_fetch_assoc($gameCount);
                echo $countGame = $gameCountData['total'];
                                    ?></div>
                                    <div>Available Games</div>
                                </div>
                            </div>
                        </div>
                        <a href="games.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div> <!-- code to get total no of users-->
                                    <div>Total Players</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer" data-toggle="modal" data-target="#addPlayer">
                                <span class="pull-left">Add New Player</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                            
                        </a>
                        
                    </div>
                    <!-- Modal -->
                            <div class="modal fade" id="addPlayer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">New booking</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form id= "mainForm" action="insert.php" method="post" role="form">
                                       <div class="col-md-12">
                                            <div class="form-group">
                                            <label>1st Player Name</label>
                                            <input class="form-control" name= "playerName1" placeholder="Player name">
                                        </div>
                                            </div>
                                        
                                          
                                        <div class="col-md-6">
                                           <div class="form-group">
                                            <label>Phone/Mobile Number 1</label>
                                            <input class="form-control" name= "phoneNumber1" placeholder="Ex. 9876543210">
                                        </div>
                                            </div>
                                            
                                           <div class="col-md-6">
                                           <div class="form-group">
                                           <label>Birth Date</label>
                                            <input type="date" class="form-control" name= "birthDate">
                                            </div>
                                            </div> 
                                        
                                        
                                       
                                            
                                        <div class="modal-footer modal-footer-border-top">
                                            <button type="submit"  class="btn btn-primary" id="submit" data-dismiss="modal">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                                        </div>
                                            
                                    </form>
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-gift fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Birthdays Today</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
            
            
            <div class="row">    
    <?
                
                
                
                
                $formDataObject = mysql_query("SELECT *FROM Consoles") or die(mysql_error());
                $x=0;
                while($row = mysql_fetch_array($formDataObject)){
                    $x++;
                    $Player1 = $row["playerName1"];
                    $Player2 = $row["playerName2"];
                    $Game = $row["gameName"];
                    $StartTime = $row["startTime"];
                    $EndTime = $row["endTime"];
                    print "
                    <div class=\"col-lg-4\">
                    <div class=\"panel panel-green\">
                        <div class=\"panel-heading\">
                            Console $x
                        </div>
                        <div class=\"panel-body\">
                            <div class=\"col-md-6\"><h5>Player1 : $Player1</h5></div> 
                            <div class=\"col-md-6\"><h5>Player2 : $Player2</h5></div>
                            <div class=\"col-md-6\"><h5>Start Time : $StartTime </h5></div>
                            <div class=\"col-md-6\"><h5>End Time : $EndTime</h5></div>
                            <div class=\"col-md-12\"><h5>Game : $Game</h5></div>
                        </div>
                        <div class=\"panel-footer\">
                            <button class=\"btn btn btn-sm\" data-toggle=\"modal\" data-target=\"#myModal\">Use</button>
                            <button class=\"btn btn btn-sm\" data-toggle=\"modal\" data-target=\"#myModal\">Stop</button>
                        </div>
                    </div>
                    </div>
                   ";
                }
                
                
        /*/for ($x = 1; $x <= $count; $x++) {
            $y=$x;
            print "
                    <div class=\"col-lg-4\">
                    <div class=\"panel panel-green\">
                        <div class=\"panel-heading\">
                            Console $x
                        </div>
                        <div class=\"panel-body\">
                            <h5>Player1 : </h5>
                            <h5>Player2 : </h5>
                            <h5>Game : </h5>
                            <h5>Start Time : </h5>
                            <h5>End Time : </h5>
                        </div>
                        <div class=\"panel-footer\">
                            <button class=\"btn btn btn-lg\" data-toggle=\"modal\" data-target=\"#myModal\">
                                
                            </button>
                        </div>
                    </div>
                    </div>
                   ";
        } /*/
    ?>
         <div class="col-lg-4">
                <div class="panel panel-green">
                        <div class="panel-heading">
                            Add New Console
                        </div>
                       <a> <div class="panel-body" data-toggle="modal" data-target="#addConsole">
                            <center><i class="fa fa-plus fa-5x" ></i></center>
                        </div>
                        </a>
                        <div class="panel-footer">
                            Click to add new console
                        </div>
                        <div class="modal fade" id="addConsole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add New Console</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form id= "mainForm" action="insert.php" method="post" role="form">
                                       <div class="col-md-12">
                                            <div class="form-group">
                                            <label>Console Name</label>
                                            <input class="form-control" name= "consoleName" placeholder="Enter new console name">
                                        </div>
                                            </div>  
                                        <div class="modal-footer modal-footer-border-top">
                                            <button type="submit"  class="btn btn-primary" id="submit" data-dismiss="modal">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                                        </div>
                                            
                                    </form>
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                    </div>
                </div>
          </div>  
               
                      
           
                 
            
<?php
require('footer.php');
?>

