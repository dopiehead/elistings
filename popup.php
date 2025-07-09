
<div class="container">
<a id="close-popup">&times;</a>

<h6 id="header_edit">Edit Product</h6>

<div class="row">
<div class="col-md-8 col-8">
<?php
require 'engine/configure.php';
$id = $conn->real_escape_string($_POST['id']);
$query = $conn->prepare("select *from item_detail where id = ? ");
$query->bind_param("i",$id);
$query->execute();
$edit_product = $query->get_result();
while ($data_edit = $edit_product->fetch_Assoc()) {
if ($edit_product) {
$price = $data_edit['product_price'];
$views= $data_edit['views'];

?>
 <span id='pxname'><b>Product name</b>: <span class='text-decoration-underline' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?= htmlspecialchars($id);?>', 'product_name');"><?= htmlspecialchars($data_edit['product_name']);?> </span></span>
<?php
echo'</span></span><br>';

 if ($data_edit['discount']>0) { 

 ?>  
<span><b>Price:</b> &#8358;<span  onmouseover="changeBackground(this)"  onfocus='changeBackground(this)' contenteditable="true" onblur="saveData(this, '<?= htmlspecialchars($id);?>', 'product_price');"><?= htmlspecialchars($data_edit['product_price']);?></span></span><br>

<?php

}

if ($data_edit['discount']==0) {
 ?>   
 <span><b>Price:</b> &#8358;<span  onmouseover="changeBackground(this)"   onfocus='changeBackground(this)' contenteditable onblur="saveData(this, '<?= htmlspecialchars($id) ?>', 'product_price');"><?= htmlspecialchars($data_edit['product_price']);?></span></span><br>

<?php       

}
?>
<span id='product_details' style=''><b>Details:</b> <span  onmouseover="changeBackground(this)"  onfocus='changeBackground(this)' contenteditable onblur="saveData(this, '<?= htmlspecialchars($id) ?>', 'product_price');"><?= htmlspecialchars($data_edit['product_details']);?></span></span><br>

<?php
 }
}

if (isset($_POST['id']) && !empty($_POST['id'])) {
  $id =  $conn->real_escape_string($_POST['id']);
  $sql="select * from item_detail where id = ?";
  $dbc= $conn->prepare($sql);
  $dbc->bind_param("i",$id);
  $dbc->execute();
  $itemResult = $dbc->get_result();
    while ($row = mysqli_fetch_array($itemResult)) {
     $mydiscount = $row['discount'];
     }
}
 ?>
<!--------------------------------------------- Discount form---------------------------------------------------------------------------------------->
  <form method="POST" id="discount-form" enctype="multipart/form-data">
   <input type="hidden" name = "id" value="<?= htmlspecialchars($id) ?>">
   <p>Discount(%)</p>
   <input type="number" maxlength="18" min="0" name = "dis" style="" placeholder="%" value="<?= htmlspecialchars($mydiscount); ?>">
   <input type="submit" name="submit-discount" id="submit-discount"  value="Update" class="btn btn-update btn-info">
   <div class="text-center" style="display: none;" id="loading-image"><img id="loader" height="50" width="80" src="loading-image.GIF"></div>
  </form>

<!--------------------------------------------- Picture  form---------------------------------------------------------------------------------------->
   <!-- <form id="myformx"  method="post" enctype="multipart/form-data">
     <p class="text-center" id="pic-details"><i class="fa fa-camera"></i> Please upload at least one image below 2mb in 'jpeg' or 'png' format only.</p>
     <input type="hidden" name="pict" value=" =?htmlspecialchars($id);?>"> 
     <input type="file" name="fileupload[]" accept="image/*" multiple="multiple"><br><br>
     <input type="submit" name="submitx" id="submitx" style="color: white;" class="btn btn-info form-control" value=" Submit" >
     <div class="text-center" style="display: none;" id="loading-image"><img id="loader" height="50" width="80" src="loading-image.GIF"></div>
  </form> -->
</div>


<!--------------------------------------------- interactions--------------------------------------------------------------------------------------->
<div class="col-md-4 col-4">
  <div id="interactions">	
  <div style="text-align: center;"><i class="fa fa-fingerprint"></i> <b>Interactions</b></div>
   <hr>
    <br>
    <span> 
      <span id="myview"><i class="fa fa-eye"></i> Views</span>
      <span style="background-color: white;font-weight: bold;"> &nbsp;  <?= htmlspecialchars($views)?></span>
      <br>
      <span id="myshare"><i class="fa fa-share"></i> Shares</span>
      <span style="background-color: white;font-weight: bold;"> &nbsp;   1</span><br>
    <span id="myheart"><i class="fa fa-heart"></i> Likes</span><span style="background-color: white;font-weight: bold;"> &nbsp;1</span><br>
</div>

<!--------------------------------------------- sold button---------------------------------------------------------------------------------------->
<br>

   </div>


</div>

<div class='d-flex justify-content-between align-items-center flex-md-row flex-column mt-5'>
  
  <button class='addx btn btn-sold bg-light border-success form-control text-success' style='box-shadow:0 0 7px rgba(0, 0, 0, 0.5);' id="<?= htmlspecialchars($id) ?>"><span class='fa fa-thumbs-up text-success'></span> Sold</button>
<!--------------------------------------------- subcription button--------------------------------------------------------------------------------------->

  <button class='addx btn  btn-subscribe bg-light border-primary form-control text-primary' style='box-shadow:0 0 7px rgba(0,0,0,0.5);' id="<?= htmlspecialchars($id) ?>"> <span class='fa fa-book text-info'></span> Subcribe</button>

<!--------------------------------------------- Delete product button--------------------------------------------------------------------------------------->
  <button class='addx btn bg-light btn-delete form-control border-danger text-danger' style='box-shadow:0 0 4px rgba(0,0,0,0.5);' id="<?= htmlspecialchars($id) ?>"> <span class='fa fa-trash text-danger'></span> Delete </button>  <br><br>
</div>

</div>

 </div>




