 <?php
        require('db_connect.php');
 
        // connecting to db
        $db = new DB_CONNECT();
            if(isset($_POST['password'])){
                $password = $_POST['password']; 
                $query = mysql_query("SELECT * FROM user") or die(mysql_error());
                    if($password == $row["password"]){
                        echo'<script> window.location="games.php"; </script>';
                    }else{
                        echo '<script language="javascript">';
                        echo 'alert("Wrong password")';
                        echo '</script>';
                    }

                                
                                  
            }
?>