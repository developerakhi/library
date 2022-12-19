<?php
    $discount = "14";
    $sales_price = "350";
    $discount_price = 100 - $discount;
    $afterdiscountprice = (($sales_price*$discount_price)/100);
    
    echo (floor($afterdiscountprice));
    
    exit();



// PHP program to count number of
// words in a string 
    
$str = " Geeks for Geeks "; 
    
// Using str_word_count() function to
// count number of words in a string
$len = str_word_count($str);
  
// Printing the result
echo $len; 
?>
