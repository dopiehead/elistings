<?php
require 'engine/configure.php';

// Ensure that session is started if it's not already
session_start();

// Ensure $buyer is set (you can define it as per your session data or URL parameter)
$buyer = isset($_SESSION['buyer_id']) ? $_SESSION['buyer_id'] : null;  // assuming buyer_id is stored in session

if (!$buyer) {
    // Handle the case where the buyer is not set
    echo "No buyer information found.";
    exit();
}

//join table cart and product-related tables
$cart_item = "
    SELECT 
        cart.itemId, 
        cart.userid, 
        cart.noofitem, 
        cart.location, 
        cart.buyer,
        item_detail.id AS product_id,
        item_detail.product_name AS product_name,
        item_detail.product_image AS product_image,
        item_detail.product_price AS product_price,
        item_detail.discount AS discount,
        'product' AS item_type,
        item_detail.product_category AS product_category,
        item_detail.product_location AS product_location
    FROM cart
    JOIN item_detail ON cart.itemId = item_detail.id
    WHERE cart.buyer = '".$buyer."'
    
    UNION

    SELECT 
        cart.itemId, 
        cart.userid, 
        cart.noofitem, 
        cart.location, 
        cart.buyer,
        treats.treat_id AS product_id,
        treats.treat_name AS product_name,
        treats.treat_image AS product_image,
        treats.treat_price AS product_price,
        treats.discount AS discount,
        'treat' AS item_type,
        treats.treat_contents AS product_category,
        treats.treat_location AS product_location
    FROM cart
    JOIN treats ON cart.itemId = treats.treat_id
    WHERE cart.buyer = '".$buyer."'
    
    UNION

    SELECT 
        cart.itemId, 
        cart.userid, 
        cart.noofitem, 
        cart.location, 
        cart.buyer,
        packages.p_id AS product_id,
        packages.p_name AS product_name,
        packages.p_image AS product_image,
        packages.p_price AS product_price,
        packages.discount AS discount,
        'package' AS item_type,
        packages.p_contents AS product_category,
        packages.p_location AS product_location
    FROM cart
    JOIN packages ON cart.itemId = packages.p_id
    WHERE cart.buyer = '".$buyer."'
";

// Query execution
$cart = mysqli_query($conn, $cart_item);
$num_cart = $cart->num_rows;

if ($num_cart > 0) {
?>
<div id="rowSummary" class="container">
    <div id="rowItem" class="row">
        <div class="col-md-9">
            <br>
            <?php
            if (isset($_SESSION['itemId']) && !empty($_SESSION['itemId'])) {
                echo "<span style='float:left'>Cart(" . $num_cart . ")</span>";
                while ($data_cart = mysqli_fetch_array($cart)) {
                    echo "<table class='table-responsive' style='width:100%;'><tbody>";
                    echo "<div class='cart'>";
                    $price = $data_cart['product_price'];
                    $dollar = round($price / $dollar_rate);  // Assuming $dollar_rate is defined

                    // Assume $vendor is obtained from another table or session
                    // If you have vendor info, fetch it here. For example:
                    // $vendor = getVendorInfo($data_cart['vendor_id']); (This is just an example)

                    echo "<tr><td style='width:25%;'>";
                    echo "<a href='product-details.php?id={$data_cart['product_id']}' target='_blank'><div style=''><img id='cart_image' src='" . $data_cart['product_image'] . "'></div></a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<span id='cart_name'><a target='_blank' href='product-details.php?id={$data_cart['product_id']}'>" . $data_cart['product_name'] . "</a></span><br>";
                    echo "<span id='vendor'><span id='seller'>Seller:</span> " . $vendor . "</span>";
                    echo "</td><td style='text-align: center;'>";

                    // Handle discount if available
                    if ($data_cart['discount'] > 0) {
                        $price = $data_cart['product_price'];
                        echo "<span id='cart_name' style='text-decoration:line-through;'> &nbsp;&#8358;" . $data_cart['product_price'] . " </span>";
                        echo "<span id='cart_price'> &#8358;" . round(($data_cart['product_price']) - ($data_cart['discount'] / 100 * $price)) . "</span><br>";
                        $discount_price_ngn = round(($data_cart['product_price']) - ($data_cart['discount'] / 100 * $price));
                        echo "<span id='cart_price' style='text-decoration:line-through;'> $" . round(($price / 1500)) . "</span>";
                        echo "<span id='cart_price'> &nbsp;$" . round(($dollar) - ($data_cart['discount'] / 100 * $dollar)) . "</span><br>";
                        $discount_price_dollar = round(($dollar) - ($data_cart['discount'] / 100 * $dollar));
                    }

                    // If no discount, just show the original price
                    if ($data_cart['discount'] == 0) {
                        echo "<span id='cart_price'>&#8358;" . $price . "</span>";
                        echo " <span id='cart_price'>$" . round($price / 1500) . " </span><br>";
                    }

                    // Display discount percentage if available
                    if ($data_cart['discount'] > 0) {
                        echo "<br><span id='cart_discount'>-" . $data_cart['discount'] . "%</span>";
                    }
                    ?>
                    <br><br>
                    <!-- Quantity controls -->
                    <input type="button" value="-" id="subs" class="btn btn-default" style="margin-right: 2%" onclick="subst()">
                    <input type="text" style="width:50px;text-align: center; margin: 0px;" class="onlyNumber" id="noOfItem" value="<?php echo $_SESSION['noofItem']; ?>" name="noOfItem">
                    <input type="button" value="+" id="adds" onclick="add()" class="btn btn-default">
                    <?php
                    echo "</td></tr>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
} else {
    echo "No items in your cart.";
}
?>
