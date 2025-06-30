<?php 
session_start();
require 'configure.php';
error_reporting(E_ALL);

// Start building the HTML table
echo '<table class="table-responsive table-bordered border-2 table-striped table-hovered w-100 p-3 mt-2">
<thead>
  <tr>
    <th class="w-10 p-4">No</th> 
    <th>Product Name</th>
    <th>Category</th>
    <th>Product Location</th>
    <th>Product Address</th>
    <th>Product Price</th>
    <th class="w-25">Product Image</th>
    <th>Quantity</th>
    <th>Sellers</th>
  </tr>
</thead>
<tbody>';

$condition = "SELECT * FROM item_detail WHERE sold = 0";

// Search functionality
if (!empty($_POST['q'])) {
    $search = explode(" ", mysqli_real_escape_string($conn, $_POST['q']));
    $searchConditions = [];

    foreach ($search as $text) {
        $text = htmlspecialchars($text);
        $searchConditions[] = "(`product_name` LIKE '%$text%' OR `product_category` LIKE '%$text%' OR `product_color` LIKE '%$text%' OR `product_location` LIKE '%$text%' OR `product_address` LIKE '%$text%' OR `product_price` LIKE '%$text%' OR `used` LIKE '%$text%')";
    }

    if (!empty($searchConditions)) {
        $condition .= ' AND ' . implode(' AND ', $searchConditions);
    }
}

// Category filter
if (isset($_POST['category']) && !empty($_POST['category'])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $condition .= ' AND product_category LIKE "%' . $category . '%"';  
}

// Location filter
if (isset($_POST['location']) && !empty($_POST['location'])) {
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $condition .= ' AND product_location LIKE "%' . $location . '%"';  
}

// Price filters
if (isset($_POST['minprice'])) {
    $min = (float)$_POST['minprice'];
    if ($min != '') {
        $condition .= " AND `product_price` >= $min";
    }   
}

if (isset($_POST['maxprice'])) {
    $max = (float)$_POST['maxprice'];
    if ($max != '') {
        $condition .= " AND `product_price` <= $max";
    }  
}

// Sorting
if (isset($_POST['sort']) && !empty($_POST['sort'])) {
    $sort = mysqli_real_escape_string($conn, $_POST['sort']); 
    switch ($sort) {
        case 'newest':
            $condition .= ' ORDER BY id DESC';       
            break;
        case 'oldest':
            $condition .= ' ORDER BY id ASC';             
            break;
        case 'views':
            $condition .= ' ORDER BY views DESC';               
            break;
    }
}

// Pagination
$num_per_page = 6;
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$initial_page = ($page - 1) * $num_per_page; 
$condition .= " LIMIT $initial_page, $num_per_page";

// Execute query
$query = mysqli_query($conn, $condition);
$max_limit = $query->num_rows;

if ($query && $max_limit > 0) {
    $i = 1 + $initial_page; // Start numbering from the correct page
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>'; // Increment and display number
    echo '<td><a class="text-dark text-decoration-underline" href="product-details.php?id=' . urlencode($row['id']) . '">' . htmlspecialchars($row['product_name']) . ' <i class="fas fa-chevron-right"></i></a></td>';
        echo '<td>' . htmlspecialchars($row['product_category']) . '</td>';
        echo '<td>' . htmlspecialchars($row['product_location']) . '</td>';
        echo '<td>' . htmlspecialchars($row['product_address']) . '</td>';
        echo '<td>' . htmlspecialchars($row['product_price']) . '</td>';
        echo '<td><img class="img_object" src="' . htmlspecialchars($row['product_image']) . '" alt="Product Image"></td>';
        echo '<td>' . htmlspecialchars($row['quantity']) . '</td>';
        echo '<td><a class="text-sm" href="merchant.php?id=' . urlencode($row['user_id']) . '">' . htmlspecialchars("Merchant " . $row['user_id']) . '</a></td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="9">No products found.</td></tr>';
}
echo '</tbody></table>';

// Pagination logic
$pageres = mysqli_query($conn, "SELECT * FROM item_detail WHERE sold = 0");
$numpage = $pageres->num_rows;
$total_num_page = ceil($numpage / $num_per_page);
?>

<div align='center'>
    <?php
    echo "<br>";
    
    if ($page > 1) {
        $previous = $page - 1;
        echo '<span id="page_num"><a class="btn-success prev" id="' . $previous . '">&lt;</a></span>';
    }

    $radius = 3;
    for ($i = 1; $i <= $total_num_page; $i++) {
        if (($i >= 1 && $i <= $radius) || 
            ($i > $page - $radius && $i < $page + $radius) || 
            ($i <= $total_num_page && $i > $total_num_page - $radius)) {

            if ($i == $page) {
                echo '<span id="page_num"><a class="btn-success active-button" id="' . $i . '">' . $i . '</a></span>';
            } 
        } elseif ($i == $page - $radius || $i == $page + $radius) {
            echo "... ";
        } else {
            echo '<span id="page_num"><a class="btn-success" id="' . $i . '">' . $i . '</a></span>';
        }
    }

    if ($page < $total_num_page) {
        $next = $page + 1;
        echo '<span id="page_num"><a class="btn-success next" id="' . $next . '">&gt;</a></span>';
    }
    ?>
</div>