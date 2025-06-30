<?php
require 'engine/configure.php';
require 'engine/get-dollar.php';
$condition = "SELECT * from item_detail where sold = 0 and used = 2";
if (isset($_POST['q']) && !empty($_POST['q'])) {
$search = explode(" ",mysqli_escape_string($conn,$_POST['q'])) ;
foreach ($search as $text) {
$condition .= " AND (`product_name` LIKE '%".$text."%' OR `product_category` LIKE '%".$text."%' OR `product_location` LIKE '%".$text."%' OR `product_details` LIKE '%".$text."%')";

     } 
}
if (isset($_POST['category'])) {
$category = mysqli_escape_string($conn,$_POST['category']);
if ($category!='all') {
$condition .= " AND product_category like '%".htmlspecialchars($category)."%'";
}
}
$data = mysqli_query($conn,$condition);
$datafound = $data->num_rows;
echo "<table><tbody id='mytable' class=''>";
echo"<div style='float:right;margin-top:-43px;font-size:13px;font-weight:bold;'>".$datafound. " item(s)</div>";
while($row=mysqli_fetch_array($data)){  ?>
<?php   
echo "<div id='package'>";
$price = $row['product_price'];
$dollar = round($price/$dollar_rate);
if ($row['discount']>0) {
echo "<span id='discount'>-".$row['discount']."%</span>";
echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
if ($row['discount']==0) {
echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem' width='' src=".$row['product_image'].">"." "."</div></a>";
echo"<span id=''><i class='fa-solid fa-check'></i>"."</span><br>";
if ($row['discount']>0) {
$price = $row['product_price'];
echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
echo"<span id='priceitem'>&#8358;".round(( $price)-($row['discount']/100 * $price))."</span><br>";
echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($dollar)."</span>";
echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>"; }
if ($row['discount']==0) {
echo"<span id='priceitem'>&#8358;".$price."</span> ";
echo" <span id='priceitem'>$".($dollar)." </span><br>";}
echo "<span id='nameitem' style='' ><a target='_blank' href='details-visitor.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";
echo"<span id='locitem'>".$row['product_location'].""."</span><br>";
?> 
<?php
echo"</div>"; } ?>
</tbody></table>


