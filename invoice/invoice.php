<?php
include "dbconnect.php";
// IN WORD FUNCTION CODE
function convertNumberToWordsForIndia($number){
    //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
    $words = array(
    '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
    '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
    '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
    '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
    '30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
    '80' => 'eighty','90' => 'ninty');
    
    //First find the length of the number
    $number_length = strlen($number);
    //Initialize an empty array
    $number_array = array(0,0,0,0,0,0,0,0,0);        
    $received_number_array = array();
    
    //Store all received numbers into an array
    for($i=0;$i<$number_length;$i++){    
  		$received_number_array[$i] = substr($number,$i,1);    
  	}

    //Populate the empty array with the numbers received - most critical operation
    for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ 
        $number_array[$i] = $received_number_array[$j]; 
    }

    $number_to_words_string = "";
    //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
    for($i=0,$j=1;$i<9;$i++,$j++){
        //"01,23,45,6,78"
        //"00,10,06,7,42"
        //"00,01,90,0,00"
        if($i==0 || $i==2 || $i==4 || $i==7){
            if($number_array[$j]==0 || $number_array[$i] == "1"){
                $number_array[$j] = intval($number_array[$i])*10+$number_array[$j];
                $number_array[$i] = 0;
            }
               
        }
    }

    $value = "";
    for($i=0;$i<9;$i++){
        if($i==0 || $i==2 || $i==4 || $i==7){    
            $value = $number_array[$i]*10; 
        }
        else{ 
            $value = $number_array[$i];    
        }            
        if($value!=0)         {    $number_to_words_string.= $words["$value"]." "; }
        if($i==1 && $value!=0){    $number_to_words_string.= "Crores "; }
        if($i==3 && $value!=0){    $number_to_words_string.= "Lakhs ";    }
        if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }
        if($i==6 && $value!=0){    $number_to_words_string.= "Hundred &amp; "; }            

    }
    if($number_length>9){ $number_to_words_string = "Sorry This does not support more than 99 Crores"; }
    return ucwords(strtolower(" ".$number_to_words_string)." Taka Only.");
}
// END WORD FUNCTION END

                                   
                                    // Read data
                                   

                                    // GTE VAT DATA
                                    $sql_vat = "SELECT * FROM vat ";
                                    $result_vat= $connection->query($sql_vat);
                                    // output data of each row  
                                    $row_vat= $result_vat->fetch_assoc();
                                    $vat_registration_no = $row_vat['vat_registration_no'];

                                   

                                    // END VAT DATA

                                    $sql_brand = "SELECT * FROM panel_setting ";
                                    $result_brand= $connection->query($sql_brand);
                                    // output data of each row  
                                    $row_brand= $result_brand->fetch_assoc();

                                    $company_name = $row_brand['company_name'];
                                    $company_address = $row_brand['company_address'];
                                    $company_logo = $row_brand['company_logo'];
                                    
                                    $invoice_id = $_GET['invoice_id'];                               


                                    $sql_sales= "SELECT * FROM sales where invoice_id = '$invoice_id' ";
                                    $result_sales= $connection->query($sql_sales);
                                    // output data of each row  
                                    $row_sales = $result_sales->fetch_assoc();
                                 
                                    
                                    ?>
                                   
                                   


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Invoice # <?php echo $row_sales['invoice_id'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <style>
        .aklima
        {
            border: 4px solid #000000;
            border-bottom: #000000;
            border-style: heavy;
        
           
        }
    </style>
</head>
<body>

<!-- Simple Invoice - START -->
<div class="container">
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><img src = "../<?php echo $company_logo ; ?>" /> </div>
                        <div class="col-md-6 text-right fw-bold">Invoice # <?php echo $invoice_id; ?></div>
                    </div>
                   
                    <h2 class="text-center"><strong> <?php echo   $company_name ; ?></strong></h2>
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                    <h6  class="text-center">Vat Registration No: <?php echo $vat_registration_no; ?></h6>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                <td class="text-center">Serial No</td>
                                    <td class="text-center"><strong>Book Id</strong></td>
                                    <td class="text-center"><strong>Sales Price</strong></td>
                                    
                                    <td class="text-center"><strong>Sales Date</strong></td>
                                    <td class="text-center"><strong>Invoice Id</strong></td>
                                    <td class="text-center"><strong>Total Price</strong></td>
                                    <td class="text-center"><strong>Due Amount</strong></td>
                                    <td class="text-center"><strong>Discount </strong></td>
                                    <td class="text-center"><strong>Vat </strong></td>
                                    <td class="text-center"><strong>Customer Name</strong></td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    // QUERY
                                    // START LOOP 
                                    include "dbconnect.php";
                                    
                                    $serial_no = 0;
                                    $total_price = 0;
                                  

                                    
                                    
                                    $invoice_id = $_GET['invoice_id'];
                                    // Read data
                                    $sql_sales1 = "SELECT * FROM sales where  invoice_id ='$invoice_id'";

                                    echo $invoice_id;
                                   
                                    $result_sales1= $connection->query($sql_sales1);
                                    // output data of each row  
                                    while($row_sales1= $result_sales1->fetch_assoc()) 
                                    {  
                                        $serial_no =  $serial_no + 1 ;
                                        $price = $row_sales1['sales_price'];
                                        $total_price = $total_price + $price;
                                        $afterdiscountprice = $row_sales1['afterdiscountprice'];
                                        
                                    ?>
                                <tr>
                                <td class="text-center"><?php echo  $serial_no   ?></td>
                                <td class="text-center"><?php echo $row_sales1['book_id'];?></td>
                                <td class="text-center"><?php echo $row_sales1['sales_price'];?></td>
                                <td class="text-center"><?php echo $row_sales1['sales_date'];?></td>
                                <td class="text-center"><?php echo $row_sales1['invoice_id'];?></td>
                                         
                                           
                                <td class="text-center"><?php echo $row_sales1['total_price'];?></td>
                                <td class="text-center"><?php echo $row_sales1['due_amount'];?></td>
                                <td class="text-center"><?php echo $row_sales1['discount'];?></td>
                                <td class="text-center"><?php echo $row_sales1['vat'];?></td>
                                <td class="text-center"><?php echo $row_sales1['customer_name'];?></td>
                                </tr>
                                <?php
                                   
                                    // END LOOP 
                                    }
                                    // ?> 
                               
                               
                             
                            </tbody>
                        </table>
<hr class="aklima"> 
                           <table class="table table-condensed">
                                    <thead>

                                        <tr>
                                            <td class="highrow text-right"><strong>Total Price =</strong></td>
                                            <td class="highrow text-right">৳ <?php echo $total_price; ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="highrow text-right"><strong>After Discount Price =</strong></td>
                                            <td class="highrow text-right">৳ <?php echo $afterdiscountprice; ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="highrow text-right"><strong>Sub Total =</strong></td>
                                            <td class="highrow text-right">৳ <?php echo $afterdiscountprice; ?></td>
                                            
                                        </tr>
                                           
                                        <tr>
                                        <?php echo " ";?>
                                            <br>
                                            <td class="highrow text-left"><strong><b>Taka In Word =</b><?php echo convertNumberToWordsForIndia($afterdiscountprice); ?></strong></td>
                                            
                                            
                                        </tr>
                                        
                                      
                                    
                                    </thead>
                                    
                                </table>         
                        <div class="table-responsive border=0">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td class="text-center"><strong>--------------------------</strong></td>
                                        <td class="text-center"><strong>--------------------------</strong></td>
                                    
                                        
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    <tr>
                                        <td class="text-center">Customer Signature</td>
                                        <td class="text-center">Library Manager</td>
                                
                                    </tr>
                                    
                                
                                
                                
                                </tbody>
                                
                            </table>
                            <br><br>
                            <p class="text-center"><b>This is Computer Generate</b></p>
                    </div>
                </hr>
            </div>
        </div>
    </div>
</div>

<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>

<!-- Simple Invoice - END -->

</div>

</body>
</html>