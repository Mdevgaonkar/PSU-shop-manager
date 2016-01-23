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
                                <table class="table table-responsive table-striped table-bordered table-hover" id="dataTables-bookings">
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
                                          <!--  <th>Ammount</th>
                                            <th>Paid Status</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?
                                        $tableQuery = mysql_query("SELECT * FROM bookingData ORDER BY serialNum DESC") or die(mysql_error());
                                        $x=0;
                                        while($row = mysql_fetch_array($tableQuery)){
                                            $x++;
                                            $Player1 = $row["playerName1"];
                                            //$Player2 = $row["playerName2"];
                                            $phone1 = $row["phoneNumber1"];
                                            //$phone2 = $row["phoneNumber2"];
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
                                                <td class=\"p1\">$Player1</td>
                                                <td class=\"p2\">$Player2</td>
                                                <td class=\"ph1\">$phone1</td>
                                                <td class=\"ph2\">$phone2</td>
                                                <td class=\"game\">$Game</td>
                                                <td class=\"srtT\">$StartTime</td>
                                                <td class=\"endT\">$EndTime</td>
                                                <td class=\"date\">$date</td>
                                                <!--<td class=\"amt\">$amount</td>
                                                <td class=\"paid\">$paid</td>-->
                                                <td>
                                       <div class=\"col-12-xs\"><button class=\"btn btn-primary btn-xs\" data-toggle=\"modal\" data-target=\"#myModal\" >Start</button>
                                                <button class=\"btn btn-primary btn-xs\" data-toggle=\"modal\" data-target=\"#myModal\" >Skip</button>
                                                <button class=\"btn btn-primary btn-xs\" data-toggle=\"modal\" data-target=\"#myModal\" >Cancel</button></div>
                                                </td>
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
               
               
                
            
<?php
require('footer.php');
?>
<script>
    $(document).ready(function() {
        $('#dataTables-bookings').DataTable({
                responsive: true
        });
    });
    </script>

