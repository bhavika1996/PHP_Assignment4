<?php

require("mysqli_oop_connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST["username"])){
        echo "<p style='color:red;' >Username required</p>";
    }
    else if(empty($_POST["messages"])){
        echo "<p style='color:red;'>message required</p>";
    }
    else{
        $q= "INSERT INTO bhavikaassign4.message VALUES(null,?,?)";
        $stmt = $mysqli->prepare($q);
        $stmt->bind_param("ss",$_POST["username"],$_POST["messages"]);
        $stmt->execute();
    }
}
?>