<?php

 require 'configure.php';

 session_start();
 
if (isset($_SESSION['business_id'])) {
    $buyer = $_SESSION['business_id'];
}
if (isset($_SESSION['sp_id'])) {
$buyer = $_SESSION['sp_id'];
}
if (isset($_SESSION['id'])) {
$buyer = $_SESSION['id'];

//Display database tables after inserting item
}

  if (isset($_POST['id']) && !empty($_POST['id'])) {
    $productId = mysqli_real_escape_string($conn,$_POST['id']);
    $buyer = mysqli_real_escape_string($conn,$_POST['buyer']);
    //Check if item is already in database
    $checklist = mysqli_query($conn,"select product_id from compare where product_id = '".htmlspecialchars($productId)."' and buyer_id='".htmlspecialchars($buyer)."'");
    if ($checklist->num_rows>0) {

    echo " ";}
   else{
     //Insert item into database
    $insertData = mysqli_query($conn,"insert into compare values('','".htmlspecialchars($productId)."','".htmlspecialchars($buyer)."')");
}
 }
//initiate session and choose the right user 


$data =  mysqli_query($conn, "SELECT compare.product_id, compare.buyer_id,item_detail.id,  item_detail.product_name, item_detail.product_details, item_detail.product_location, item_detail.product_category, item_detail.product_price, item_detail.discount,  item_detail.product_image from compare,item_detail where compare.product_id =  item_detail.id AND compare.buyer_id = '".htmlspecialchars($buyer)."'");
 if ($data) {
   $datafound = $data->num_rows; 
  }
  //item product & styling
    echo"<div id='package'>";
     echo "<table><tbody>";
      while($row=mysqli_fetch_array($data))
       {        
            ?>
        <?php 
    $price = $row['product_price'];
    $dollar = round($price/1500);
    echo"<tr><td>";
    echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem'  src=".$row['product_image'].">"." "."</div></a>";
     echo"</td>";
     echo"<td>"; 
       if ($row['discount']>0) {
            $price = $row['product_price'];
            echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
            echo"<span id='priceitem'>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";
            echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($price/1500)."</span>";
            echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";}
     if ($row['discount']==0) {
     echo"<span id='priceitem'>&#8358;".$price."</span> ";
     echo" <span id='priceitem'>$".round($price/1500)." </span><br>";
}    echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";
     echo"<span id='locitem'>".$row['product_location'].""."</span><br><br> <hr>";
     echo"</td></tr>";
    ?> 
    <?php
    echo"</div>";     
                }   

        ?>


     </tbody></table>

     