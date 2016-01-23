

<?php
//insert.php
date_default_timezone_set('Asia/Kolkata');
require('db_connect.php');
 
        // connecting to db
        $db = new DB_CONNECT();

        //if(isset($_POST['submit'])){
            //echo 'Fetching variables of the form which travels in URL <br>';
        $playerName1 = $_POST['playerName1'];
        $playerName2 = $_POST['playerName2'];
        $phoneNumber1 = $_POST['phoneNumber1'];
        $phoneNumber2 = $_POST['phoneNumber2'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $selectGame = $_POST['selectGame'];
        $selectConsole = $_POST['selectConsole'];
        $amount = $_POST['amount'];
        $paid = 1;
        $dateStamp = date("Y-m-d");

if(!($playerName1==''||$playerName2==''||$phoneNumber1==''||$phoneNumber2==''||$startTime==''||$endTime==''||$selectGame==''||$selectConsole==''||$dateStamp==''||$amount==''||$paid=='')){
    $query = mysql_query("insert into bookingData(playerName1, playerName2, phoneNumber1, phoneNumber2, startTime, endTime, gameName, consoleNum,date,amount,paid) values ('$playerName1', '$playerName2', '$phoneNumber1','$phoneNumber2', '$startTime', '$endTime', '$selectGame', '$selectConsole','$dateStamp', '$amount', '$paid' )"); //Insert Query
print "<h5> $selectConsole Form Submitted succesfully</h5>";
    
}

            


?>
