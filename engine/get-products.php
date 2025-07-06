<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require("configure.php");

$num_per_page = 10;
$page = isset($_POST['page']) ? (int) $_POST['page'] : 1;
$page = max($page, 1);
$initial_page = ($page - 1) * $num_per_page;

// ---------- FILTER HANDLING ----------
$filters = " WHERE sold = 0 ";
$stop_words = ['in', 'the', 'a', 'an', 'and', 'or', 'for', 'to', 'at', 'on', 'with', 'by', 'us', 'from', 'but', 'when', 'who', 'can', 'find', 'they', 'where', 'am', 'we', 'while'];
if (!empty($_POST['search'])) {
    $search_raw = $conn->real_escape_string(strtolower(trim($_POST['search'])));
    $search = explode(" ", $search_raw);
    $terms = array_filter($search, function ($word) use ($stop_words) {
        return !empty($word) && !in_array($word, $stop_words);
    });

    foreach ($terms as $term) {
        $term = $conn->real_escape_string($term);
        $filters .= " AND (
            product_name LIKE '%$term%' OR
            product_category LIKE '%$term%' OR
            product_location LIKE '%$term%' OR
            product_details LIKE '%$term%' OR
            product_condition LIKE '%$term%'
        )";
    }
}

if (!empty($_POST['condition'])) {
    $condition = $conn->real_escape_string($_POST['condition']);
    $filters .= " AND product_condition = '" . htmlspecialchars($condition) . "'";
}

if (!empty($_POST['category'])) {
    $category = $conn->real_escape_string($_POST['category']);
    $filters .= " AND product_category = '" . htmlspecialchars($category) . "'";
}

if (!empty($_POST['location'])) {
    $location = $conn->real_escape_string($_POST['location']);
    $filters .= " AND product_location = '" . htmlspecialchars($location) . "'";
}

if (!empty($_POST['featured'])) {
    $filters .= " AND featured = 1";
}

if (!empty($_POST['discount'])) {
    $filters .= " AND discount > 0";
}

// ---------- COUNT TOTAL RECORDS ----------
$countQuery = "SELECT COUNT(*) AS total FROM item_detail $filters";
$countStmt = $conn->prepare($countQuery);
$countStmt->execute();
$countResult = $countStmt->get_result();
$totalRecords = $countResult->fetch_assoc()['total'];

$from = $initial_page + 1;
$to = min($initial_page + $num_per_page, $totalRecords);

echo "
<div style='color:var(--primary-purple);' class='d-flex justify-content-end align-content-center'>
    <p> <span class='text-secondary'>{$from} - {$to}</span> of <span style='font-weight:bold;' class='fw-bold'>{$totalRecords}</span></p>
</div>";

// ---------- MAIN PRODUCT QUERY ----------
$query = "SELECT * FROM item_detail $filters";

// Sorting
$orderBy = $_POST['sort'] ?? 'recent';
switch ($orderBy) {
    case 'oldest':
        $query .= " ORDER BY featured DESC, id DESC";
        break;
    case 'highest_views':
        $query .= " ORDER BY featured DESC, views DESC";
        break;
    case 'lowest_views':
        $query .= " ORDER BY featured DESC, views ASC";
        break;
    case 'highest_price':
        $query .= " ORDER BY featured DESC, CAST(product_price AS DECIMAL(10,2)) DESC";
        break;
    case 'lowest_price':
        $query .= " ORDER BY featured DESC, CAST(product_price AS DECIMAL(10,2)) ASC";
        break;
    default:
        $query .= " ORDER BY featured DESC, id ASC";
        break;
}

$query .= " LIMIT $initial_page, $num_per_page";
// ---------- FETCH PRODUCTS ----------
$products = $conn->prepare($query);
$products->execute();
$products_result = $products->get_result();

// ---------- DISPLAY PRODUCTS ----------
if ($products_result->num_rows > 0): ?>
    <div class="package-container h-100">
    <?php while ($product = $products_result->fetch_assoc()):
        $id = $product["id"];
        $featured = $product["featured"];
        $price = $product["product_price"];
        $discount = $product["discount"];
        $imageString = $product['product_image']; // e.g., "url1,url2,url3"
        $imageArray = explode(',', $imageString);
        $firstImage = $imageArray[0]; // Get only the first one

        $discounted_price = $price - ($price * $discount / 100);
    ?>
        <div class="item h-100 position-relative" style="border:1px solid rgba(0,0,0,0.1);">
            <?php if ($featured): ?>
                <span style="right:0;" class="fa fa-crown position-absolute top-0 text-warning"></span>
            <?php endif; ?>

            <span style="padding:5px;" id="data_name"><?= htmlspecialchars(str_replace("&amp;"," & ",$product['product_name'])) ?></span><br>
            <span style="opacity: 0.5" id="data_price">From<br></span>

            <?php if ($discount > 0): ?>
                <span style="opacity: 0.5" id="data_price">
                    <span style='text-decoration:line-through;'><?= htmlspecialchars($price) ?></span>
                    <?= htmlspecialchars($discounted_price) ?>
                </span>
            <?php else: ?>
                <span style="opacity: 0.5" id="data_price"><?= htmlspecialchars($price) ?></span>
            <?php endif; ?>

            <span style="opacity: 0.7;color:red;" id="data_price"><?= htmlspecialchars($product['product_location']) ?></span>
            <span style="opacity: 0.5" id="data_price"><?= htmlspecialchars($product['product_condition']) ?></span>
            <a href="product-details.php?id=<?= htmlspecialchars($id) ?>">
                <img style="height: 150px; width:100%;object-fit:cover;" src="<?= htmlspecialchars($firstImage) ?>">
            </a>

            <?php if ($product['views'] > 0): ?>
                <span class="position-absolute bg-dark text-white py-2 px-1" style="left:0;bottom:0;" id="data_price">
                    <i class="fa fa-eye"></i> <?= htmlspecialchars($product['views']) ?>
                </span>
            <?php endif; ?>

            <?php if ($discount > 0): ?>
                <span class="position-absolute bg-warning text-dark py-2 px-1" style="right:0;bottom:0;" id="data_price">
                    -<?= htmlspecialchars($discount) ?> %
                </span>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
    </div>
<?php endif; ?>

<!-- Pagination -->
<div class="text-center mt-4">
<?php
$total_num_page = ceil($totalRecords / $num_per_page);
$radius = 2;

if ($page > 1) {
    echo '<span id="page_num"><a class="btn-dark btn-pagination prev" id="' . ($page - 1) . '">&lt;</a></span>';
}

for ($i = 1; $i <= $total_num_page; $i++) {
    if (
        $i <= $radius ||
        ($i >= $page - $radius && $i <= $page + $radius) ||
        $i > $total_num_page - $radius
    ) {
        $active = $i == $page ? 'active-button' : '';
        echo "<span id='page_num'><a class='btn-dark btn-pagination $active' id='$i'>$i</a></span>";
    } elseif ($i == $page - $radius - 1 || $i == $page + $radius + 1) {
        echo "... ";
    }
}

if ($page < $total_num_page) {
    echo '<span id="page_num"><a class="btn-dark btn-pagination next" id="' . ($page + 1) . '">&gt;</a></span>';
}
?>
</div>
