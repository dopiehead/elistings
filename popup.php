
<div class="container">
<a id="close-popup">&times;</a>

<h6 id="header_edit">Edit Product</h6>

<div class="row">
<div class="col-md-8 col-8">
<?php
require 'engine/configure.php';
$id= mysqli_escape_string($conn,$_POST['id']);
$edit_product = mysqli_query($conn,"select *from item_detail where id = '".htmlspecialchars($id)."'");
while ($data_edit=mysqli_fetch_array($edit_product)) {
if ($edit_product) {
$price = $data_edit['product_price'];
$views= $data_edit['views'];

?>
 <span id='pxname'><b>Product name</b>: <span onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$id;?>', 'product_name');"><?php echo$data_edit['product_name'];?> </span></span>
<?php
echo'</span></span><br>';

 if ($data_edit['discount']>0) { 

 ?>  
<span><b>Price:</b> &#8358;<span  onmouseover="changeBackground(this)"  onfocus='changeBackground(this)' contenteditable="true" onblur="saveData(this, '<?php echo$id;?>', 'product_price');"><?php echo$data_edit['product_price'];?></span></span><br>

<?php

}

if ($data_edit['discount']==0) {
 ?>   
 <span><b>Price:</b> &#8358;<span  onmouseover="changeBackground(this)"   onfocus='changeBackground(this)' contenteditable onblur="saveData(this, '<?php echo$id?>', 'product_price');"><?php echo$data_edit['product_price'];?></span></span><br>

<?php       


}


?>
<span id='product_details' style=''><b>Details:</b> <span  onmouseover="changeBackground(this)"  onfocus='changeBackground(this)' contenteditable onblur="saveData(this, '<?php echo$id?>', 'product_price');"><?php echo$data_edit['product_details'];?></span></span><br>

<?php
 }
}
?> 

<?php 
//get id of item
require 'engine/configure.php';
if (isset($_POST['id'])) {
$id =  mysqli_escape_string($conn,$_POST['id']);
$sql="select * from item_detail where id = '".htmlspecialchars($id)."'";
$dbc=mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($dbc)) {
$mydiscount = $row['discount'];
  }
  
}
 ?>
<!--------------------------------------------- Discount form---------------------------------------------------------------------------------------->
  <form method="POST" id="discount-form" enctype="multipart/form-data">
<input type="hidden" name = "id" value="<?php echo $id?>">
<p>Discount(%)</p>
<input type="number" maxlength="18" min="0" name = "dis" style="" placeholder="%" value="<?php echo $mydiscount; ?>">
<input type="submit" name="submit-discount" id="submit-discount"  value="Update" class="btn btn-update btn-info" style="">
<div align="center" style="display: none;" id="loading-image"><img id="loader" height="50" width="80" src="loading-image.GIF"></div>
  </form>

<!--------------------------------------------- Picture  form---------------------------------------------------------------------------------------->
<form id="myformx"  method="post" enctype="multipart/form-data">
<p align="center" id="pic-details"><i class="fa fa-camera"></i> Please upload at least one image below 2mb in 'jpeg' or 'png' format only.</p>
<input type="hidden" name="pict" value="<?php echo$id;?>"> 
<input type="file" name="fileupload[]" accept="image/*" multiple="multiple"><br><br>
<input type="submit" name="submitx" id="submitx" style="color: white;" class="btn btn-info form-control" value=" Submit" >
<div align="center" style="display: none;" id="loading-image"><img id="loader" height="50" width="80" src="loading-image.GIF"></div>
</form>
</div>


<!--------------------------------------------- interactions--------------------------------------------------------------------------------------->
<div class="col-md-4 col-4">
<div id="interactions">	
<div style="text-align: center;"><i class="fa fa-fingerprint"></i> <b>Interactions</b></div>
<hr>
<br>
<span> <span id="myview"><i class="fa fa-eye"></i> Views</span><span style="background-color: white;font-weight: bold;"> &nbsp;  <?php echo$views?></span><br><span id="myshare"><i class="fa fa-share"></i> Shares</span><span style="background-color: white;font-weight: bold;"> &nbsp;   1</span><br>
<span id="myheart"><i class="fa fa-heart"></i> Likes</span><span style="background-color: white;font-weight: bold;"> &nbsp;     1</span><br>
</div>

<!--------------------------------------------- sold button---------------------------------------------------------------------------------------->
<br><a class='addx btn btn-sold form-control' style='color:rgba(0,0,0,0.6);' id="<?php echo$id?>">Sold</a><br><br>

<!--------------------------------------------- subcription button--------------------------------------------------------------------------------------->

<a class='addx btn btn-gift-picks form-control' style='color:rgba(0,0,0,0.6);' id="<?php echo$id?>">Gift picks</a> <br><br>

<a class='addx btn  btn-subscribe form-control' style='color:rgba(0,0,0,0.6);' id="<?php echo$id?>">Subcribe</a><br><br>

<!--------------------------------------------- Delete product button--------------------------------------------------------------------------------------->
<a class='addx btn btn-delete form-control' style='color:rgba(0,0,0,0.6);' id="<?php echo$id?>">Delete </a>  <br><br>

</div>
</div>

</div>





 </div>




