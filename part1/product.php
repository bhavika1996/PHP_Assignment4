<?php

class Product{
    public $item, $price;
    
    function __construct($product_name, $product_price){
        $this->item = $product_name;
        $this->price = $product_price;
    }
    function get_name() {
        return $this->item;
    }
    function get_price() {
        return $this->price;
    }
}

?>