<?php
session_start();
require 'engine/configure.php';

// Handle search form submission
if (isset($_POST["submit"])) {
    if (!empty($_POST["search"]) && !empty($_POST["search_type"])) {
        $query = str_replace(" ", "+", mysqli_real_escape_string($conn, $_POST["search"]));
        $search_type = $_POST["search_type"]; // Define variable here
        if ($search_type === 'product') {
            header("Location: products.php?search=" . htmlspecialchars($query));
        } else {
            header("Location: service-providers.php?search=" . htmlspecialchars($query));
        }
        exit();
    }
}

// Defaults
$headerCategory = "";
$condition = "";
$filter = "";
$slug = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Elisting</title>
    <?php include("components/index-links.php"); ?>
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body>

 <!-- Header -->
 <?php include("components/header.php"); ?>

 <!-- Hero Search Section -->
 <?php include("components/search-hero.php"); ?>

<!-- Brand Showcase -->
<section class="brand-showcase">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">The world is going <span class="highlight">e</span> so are we</h2>
            <p class="section-subtitle text-secondary">List of essential Group Brands</p>
        </div>
        <br><br>
        <div id="brands">
            <?php for ($i = 0; $i < 10; $i++): ?>
                <div style="width:150px;" class="text-center shadow p-1 me-2 mb-1">
                    <img style="height:150px;width:100%;" src="https://placehold.co/400" alt="brands">
                    <h6 class="text-secondary fw-bold mt-2">Brands</h6>
                </div>
            <?php endfor; ?>
        </div>
        <br><br>
        <!-- Category links section -->
        <?php include("components/category-links.php"); ?>
        <br><br>

        <!-- Explore Category -->
        <?php $headerCategory = "Explore Products";
         include("contents/products.php"); ?>
        <br><br>
         
        <?php include("banner/first-banner.php") ?>
        <br><br>
        <!-- Discounted Items -->
        <?php
         $categories = [
        [
           'headerCategory' => 'Discounted Items',
           'filter' => 'discount > 0',
           'slug' => 'discount',
        ],
        [
          'headerCategory' => 'Preowned Items',
          'filter' => "product_condition = 'new'",
          'slug' => 'new',
        ],
        [
          'headerCategory' => 'Foreign used',
          'filter' => "product_condition = 'tokunbo'",
          'slug' => 'tokunbo',
        ],
        [
           'headerCategory' => 'Nigerian used',
           'filter' => "product_condition = 'used'",
           'slug' => 'used',
        ],
        ];

         foreach ($categories as $category) {
          $headerCategory = $category['headerCategory'];
          $filter = $category['filter'];
          $slug = $category['slug'];

          include("contents/products.php");
          echo "<br><br>";
        }
         
         include("banner/second-banner.php"); ?>
         <br><br>

        <!-- Service Provider Categories -->
        <?php include("components/provider-categories.php"); ?>
        <br><br>

        <!-- Service Providers -->
        <?php include("contents/service-providers.php"); ?>
        <br><br>

        <!-- Footer -->
        <?php include("footer.php"); ?>
    </div>
</section>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.pkgd.min.js"></script>
<script src="assets/js/index.js"></script>

</body>
</html>
