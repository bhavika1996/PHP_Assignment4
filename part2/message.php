<?php 
        require("mysqli_oop_connect.php");

        $query ="SELECT * from bhavikaassign4.message";
        if($result = $mysqli->query($query)){
            while($row =$result->fetch_object()){
                echo "<p>".$row->username." : " .$row->messages."</p>";
            }
        }
        else{
            echo "SQL error".$mysqli->error();
        }
?>