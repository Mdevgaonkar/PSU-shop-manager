<?php 
date_default_timezone_set('Asia/Asia/Kolkata');
require('header.php');
?>

            
                <div class="row ">
                 <div class="col-md-12">
                    <div class="panel-green ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1> <i class="fa fa-gamepad fa-1x"> Games</i></h1>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="huge"><?
                                    $gameCount = mysql_query("SELECT COUNT(gameName) AS total FROM Games ") or die(mysql_error());
                $gameCountData=mysql_fetch_assoc($gameCount);
                echo $countGame = $gameCountData['total'];
                                    ?></div>
                                    <div>Games</div>
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
                             Add new Game
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
             <form class="form-inline" method= "post" action="games.php">
              <div class="form-group">
                <label>Name of Game</label>
                <input type="text" class="form-control" name="gameName" placeholder="New Game">
              </div>
              <div class="form-group">
                <label>CD Count</label>
                <input type="number" class="form-control" name="cdTotal" placeholder="0">
              </div>
              <button type="submit" class="btn btn-default">Add Game</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </form>
                       <?
                            if(isset($_POST['gameName']) and isset($_POST['cdTotal'])){
                                $gameName = $_POST['gameName']; 
                                $cdTotal = $_POST['cdTotal'];
                                $cdAvailable = $cdTotal;
                                $cdUsed=0;
                                if(!($gameName == '' || $cdTotal == '')){
                                    $query = mysql_query("insert into Games(gameName, cdAvailable, cdUsed, cdTotal) values ('$gameName', '$cdAvailable', '$cdUsed','$cdTotal')"); 
                                 
                                echo'<script> window.location="games.php"; </script>';
                                }
                                  
                            }
                            ?>
                       
                        </div>
                    </div>
                </div>
            </div>
    
                                    
                <!--Game data-->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Games
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-games">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Game</th>
                                            <th>Available CDs</th>
                                            <th>CDs in use</th>
                                            <th>CD count</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?
                                        $tableQuery = mysql_query("SELECT * FROM Games ORDER BY cdAvailable DESC") or die(mysql_error());
                                        $x=0;
                                        while($row = mysql_fetch_array($tableQuery)){
                                            $x++;
                                            $game = $row["gameName"];
                                            $cdCount = $row["cdTotal"];
                                            $cdAvailable = $row["cdAvailable"];
                                            $cdUsed = $row["cdUsed"];
                                            
                                            print "
                                            <tr>
                                                <td>$x</td>
                                                <td class= \"name\">$game</td>";
                                                if($cdAvailable>0){
                                                    print"    <td>
                                                <button class=\"btn btn-success btn-md dgreen\" disabled=\"true\" >$cdAvailable</button>";
                                                }else{
                                                    print"    <td>
                                                <button class=\"btn btn-danger btn-md dred\" disabled=\"true\" >$cdAvailable</button>";
                                                }
                                            
                                            print    "</td>
                                                <td>$cdUsed</td>
                                                <td class= \"cdCount\">$cdCount</td>
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
                                            <h4 class="modal-title" id="myModalLabel">Add CD</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form id="mainFormEdit" name="mainFormEdit" action="insertGameEdit.php" method="post">
                                       <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Game</label>
                                            <input id="gameNameByDefault" class="form-control"  name= "defaultGame" placeholder="Game">
                                        </div>
                                            </div>
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CD count</label>
                                            <input id="cdCountByDefault" type="number" class="form-control" name= "inputCDCount" placeholder="0">
                                        </div>
                                            </div>
                                            <div class="modal-footer modal-footer-border-top">
                                            <button type="submit"  class="btn btn-primary" id="submitCDEdit" data-dismiss="modal">Add</button>
                                            
                                        </div>
                                            </form>
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
        $('#dataTables-games').DataTable({
                responsive: true
        });
    });
    $('#dataTables-games').click(function(e){
    //var data = $(e.target).closest('tr').text();
    
    //For games Table
    var data = $(e.target).closest('tr').children('td.name').text();
    var dataCount = $(e.target).closest('tr').children('td.cdCount').text();
    document.getElementById('gameNameByDefault').value = data;
    document.getElementById('cdCountByDefault').value = dataCount;
    
    
//    alert(birthDateDefault);
});
    </script>



