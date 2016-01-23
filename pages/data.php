<?php 
date_default_timezone_set('Asia/Asia/Kolkata');
require('header.php');
?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">DATA</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                
                <!--CORE DATA TABLE-->
                
                 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Daily Data
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-data">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>1st Player Name</th>
                                            <th>2nd Player Name</th>
                                            <th>Phone 1</th>
                                            <th>Phone 2</th>
                                            <th>Game</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Date</th>
                                            <th>Ammount</th>
                                            <th>Paid Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?
                                        $tableQuery = mysql_query("SELECT * FROM coreData ORDER BY serialNum DESC") or die(mysql_error());
                                        $x=0;
                                        while($row = mysql_fetch_array($tableQuery)){
                                            $x++;
                                            $Player1 = $row["playerName1"];
                                            $Player2 = $row["playerName2"];
                                            $phone1 = $row["phoneNumber1"];
                                            $phone2 = $row["phoneNumber2"];
                                            $Game = $row["gameName"];
                                            $StartTime = $row["startTime"];
                                            $EndTime = $row["endTime"];
                                            $date = $row["date"];
                                            $amount = $row["amount"];
                                            $paid= "Paid";
                                            if($row["paid"]==0){
                                            $paid = "Not Paid";
                                            }
                                            print "
                                            <tr>
                                                <td>$x</td>
                                                <td>$Player1</td>
                                                <td>$Player2</td>
                                                <td>$phone1</td>
                                                <td>$phone2</td>
                                                <td>$Game</td>
                                                <td>$StartTime</td>
                                                <td>$EndTime</td>
                                                <td>$date</td>
                                                <td>$amount</td>
                                                <td>$paid</td>
                                            </tr>
                                            ";
                                        }
                                        ?>
                                       
                                        
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
                
           <script>
    $(document).ready(function() {
        $('#dataTables-data').DataTable({
                responsive: true
        });
    });
    </script> 
<?php
require('footer.php');
?>

