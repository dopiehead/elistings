<div class="container category-header mt-5">
        <div class="header">
            <div class="title-section">
                <span class="categories-label">Categories</span>
                <h2 class="title">Browse By Category</h2>
            </div>
            <div class="navigation">
                <div class="nav-arrow prev previous-button">←</div>
                <div class="nav-arrow next next-button">→</div>
            </div>
        </div>


        <div class="category-container">
        <?php
$categories = [
    ['name' => 'Phones', 'slug' => 'mobile phones & tablets', 'icon' => 'icon-phone'],
    ['name' => 'Computer', 'slug' => 'computer', 'icon' => 'icon-computer'],
    ['name' => 'Fashion', 'slug' => 'fashion', 'icon' => 'icon-fashion'],
    ['name' => 'Vehicle', 'slug' => 'vehicle', 'icon' => 'icon-vehicle'],
    ['name' => 'Property', 'slug' => 'property', 'icon' => 'icon-property'],
    ['name' => 'Beauty', 'slug' => 'beauty', 'icon' => 'icon-beauty']
];

// Optional: get active category from query
$currentCategory = $_GET['category'] ?? '';
?>

<?php foreach ($categories as $cat): 
    $isActive = strtolower($cat['slug']) === strtolower($currentCategory) ? 'active' : '';
?>
    <div class="category-item <?= $isActive ?>">
        <div class="category-icon <?= htmlspecialchars($cat['icon']) ?>"></div>
        <div class="category-name text-capitalize">
            <a class='text-decoration-none text-dark' href='products.php?category=<?= urlencode($cat['slug']) ?>'>
                <?= htmlspecialchars($cat['name']) ?>
            </a>
        </div>
    </div>
<?php endforeach; ?>

        </div>
    </div>
</div>