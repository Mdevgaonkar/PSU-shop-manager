<?php 
date_default_timezone_set('Asia/Asia/Kolkata');
require('header.php');
?>

            <div class="row ">
                 <div class="col-md-12">
                    <div class="panel-yellow ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1> <i class="fa fa-gamepad fa-1x"> Players</i></h1>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="huge"><?
                                    $playerCount = mysql_query("SELECT COUNT(playerName) AS total FROM players ") or die(mysql_error());
                $playerCountData=mysql_fetch_assoc($playerCount);
                echo $countPlayer = $playerCountData['total'];
                                    ?></div>
                                    <div>Players</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>    
            <div class="row ">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Add new player
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form class="form" method= "post" action="players.php"> 
                                    <div class="col-md-6">                                      
                                    <div class="form-group">
                                    <label>Player Name</label>
                                    <input class="form-control" name= "playerName" placeholder="Player name">
                                    </div>
                                    </div>
                                    <div class="col-md-6">                                                           
                                    <div class="form-group">
                                    <label>    Phone/Mobile Number 1</label>
                                    <input class="form-control" name= "phoneNumber" placeholder="Ex. 9876543210">
                                    </div>
                                    </div>
                                    <div class="col-md-6">                                      
                                    <div class="form-group">
                                    <label>    Birth Date</label>
                                    <input type="date" class="form-control" name= "birthDate">
                                    </div> 
                                    </div>
                                    <div class="col-md-12" >                                      
                                    <button type="submit"  class="btn btn-default">Add Player</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                    </form>
             
                       <?
                            if(isset($_POST['playerName']) and isset($_POST['phoneNumber']) and isset($_POST['birthDate'])){
                                $playerName = $_POST['playerName']; 
                                $phoneNumber = $_POST['phoneNumber'];
                                $birthDate = $_POST['birthDate'];
                                $dateAdded = date("Y-m-d");
                                
                                if(!($playerName == '' || $phoneNumber == '' || $birthDate == '')){
                                    $query = mysql_query("insert into players(playerName, phNo, brDate, dateAdded) values ('$playerName', '$phoneNumber', '$birthDate','$dateAdded')"); 
                                 
                                echo'<script> window.location="games.php"; </script>';
                                }
                                  
                            }
                            ?>
                       
                        </div>
                    </div>
                </div>
            </div>
    
                                    
                <!--Player data-->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Players Data
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-players">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Player Name</th>
                                            <th>Phone No.</th>
                                            <th>Birth Date</th>
                                            <th>Date Added</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?
                                        $tableQuery = mysql_query("SELECT * FROM players ORDER BY dateAdded DESC") or die(mysql_error());
                                        $x=0;
                                        while($row = mysql_fetch_array($tableQuery)){
                                            $x++;
                                            $player = $row["playerName"];
                                            $phNumber = $row["phNo"];
                                            $birDate = $row["brDate"];
                                            $date = $row["dateAdded"];
                                            
                                            print "
                                            <tr>
                                                <td>$x</td>
                                                <td class= \"playerName\">$player</td>
                                                <td class= \"phNo\">$phNumber</td>
                                                <td class= \"brDate\">$birDate</td>
                                                <td>$date</td>
                                                <td>
                                                <button class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#myModal\" >Edit</button>
                                                </td>
                                            </tr>
                                            ";
                                        }
                                        ?>
                                        
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Player</h4>
                                        </div>
                                        <div class="modal-body">
                                    <form class="form" method= "post" action="players.php">                         
                                            <div class="form-group">
                                            <label>Player Name</label>
                                            <input class="form-control" name="playerNameDefault" id= "playerNameDefault" placeholder="Player">
                                            </div>

                                            <div class="form-group">
                                            <label>    Phone/Mobile Number 1</label>
                                            <input class="form-control" name="phoneNumberDefault" id= "phoneNumberDefault" placeholder="Ex. 9876543210">
                                            </div>

                                            <div class="form-group">
                                            <label>    Birth Date</label>
                                            <input type="date" class="form-control" name="birthDateDefault" id= "birthDateDefault">
                                            </div> 

                                            <div class="modal-footer modal-footer-border-top">
                                            <button type="submit"  class="btn btn-default">Add Player</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                            </div>        
                                    </form>
                                        <?
                            if(isset($_POST['playerNameDefault']) and isset($_POST['phoneNumberDefault']) and isset($_POST['birthDateDefault'])){
                                $playerNameDefault = $_POST['playerName']; 
                                $phoneNumberDefault = $_POST['phoneNumber'];
                                $birthDateDefault = $_POST['birthDate'];
                                $dateAddedDefault = date("Y-m-d");
                                
                                if(!($playerNameDefault == '' || $phoneNumberDefault == '' || $birthDateDefault == '')){
                                    $query = mysql_query("UPDATE players SET phNo=$playerNameDefault WHERE playerName=$playerNameDefault"); 
                                 
                                echo'<script> window.location="games.php"; </script>';
                                }
                                  
                            }
                            ?>    
                                        
                                           
                       
                                            
                                        </div>
                                    </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
<?php
require('footer.php');
?>

<script>
    $(document).ready(function() {
        $('#dataTables-players').DataTable({
                responsive: true
        });
    });
    
    $('#dataTables-players').click(function(e){
    //For Players Table
    var playerNameDefault = $(e.target).closest('tr').children('td.playerName').text();
    var phoneNumberDefault = $(e.target).closest('tr').children('td.phNo').text();
    var birthDateDefault = $(e.target).closest('tr').children('td.brDate').text();
    document.getElementById('playerNameDefault').value = playerNameDefault;
    document.getElementById('phoneNumberDefault').value = phoneNumberDefault;
    document.getElementById('birthDateDefault').value = birthDateDefault;
        });
    </script>

