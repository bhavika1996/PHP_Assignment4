<?php

session_start();
require('product.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){      
            
            if (isset($_POST['chocolate_bar'])){  

                //session_start();
                $_SESSION["amount_inserted"] = 0;
                
                $selected_item  = "chocolate_bar";
                $item_price = 1.25;
            }
            if (isset($_POST['pop'])){

                session_destroy();

                session_start();
                $_SESSION["amount_inserted"] = 0;

                $selected_item  = "pop";
                $item_price = 1.50;
            }
            if (isset($_POST['chips'])){

                session_destroy();

                session_start();
                $_SESSION["amount_inserted"] = 0;

                $selected_item  = "chips";
                $item_price = 1.75;
            } 
            if(isset($selected_item)){
                if(! isset($_SESSION["product_name"]) || $_SESSION["product_name"] != $selected_item){
                    $item = new Product($selected_item, $item_price);
                    $_SESSION["product_name"] = $item->get_name();
                    $_SESSION["product_price"] = $item->get_price();
                    }    
            }

            if(isset($_SESSION["product_name"])){
                $amount=0;
                $remaining_price=0;

                if(isset($_POST['1'])){
                    $amount = 1;
                    $_SESSION["amount_inserted"] += 1; 
                }
                if(isset($_POST['25'])){
                    $amount = 0.25;
                    $_SESSION["amount_inserted"] += 0.25; 
                }
                if(isset($_POST['10'])){
                    $amount = 0.10;
                    $_SESSION["amount_inserted"] += 0.10; 
                }
                if(isset($_POST['05'])){
                    $amount = 0.05;
                    $_SESSION["amount_inserted"] += 0.05; 
                    
                }
                echo "Product Price : ".$_SESSION["product_price"]."<br>";
                echo "Amount you have inserted : ".$_SESSION["amount_inserted"]."<br>";

                if($remaining_price < $_SESSION["product_price"] && $_SESSION["product_price"] - $remaining_price - $_SESSION["amount_inserted"] > 0 ){
                   
                    $remaining_price = $_SESSION["product_price"] - $_SESSION["amount_inserted"];
                    echo "Remaining Amount: ".$remaining_price."<br>";
                   // echo $_SESSION["amount_inserted"];
                }
                elseif($_SESSION["product_price"] === $_SESSION["amount_inserted"]){
                    echo "Enjoy your meal !!!";
                }
                else{

                   // echo "Please enter lesser amount! <br>";
                    $x = $_SESSION["product_price"] - $_SESSION["amount_inserted"];
                    echo "You get back $x ";
                }


            }

            
    }
    
    
?>



<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</head>
 <body>
 <div id="display">
 </div>
 <?php
    
    if(isset($_SESSION["product_name"])){
        echo "<p>Item is ".$_SESSION["product_name"]."</p>";
    }
    else{
        echo"<p>Choose Product</p>";
    }
 ?>
 <form action="index.php" method="POST">
    <button name="chocolate_bar">Chocolate_Bar $1.25</button>
    <button name="pop">Pop $1.50</button>
    <button name="chips">Chips $1.75</button>
    <p>Payment</p>
    <?php
        if(isset($_SESSION["product_name"])){
            echo '
            <div class="card" style="width: 12rem;">
            <button name="1">$1</button>
            <button name="25">$0.25</button>
            <button name="10">$0.10</button>
            <button name="05">$0.05</button>
            </div>
            ';
        }
    ?>
    
 </form>
 
 
 </p>
 </body>
 </html>