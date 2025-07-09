<div class="container category-header mt-5">
        <div class="header">
            <div class="title-section">
                <span class="categories-label">Service Providers</span>
                <h2 class="title">Browse By Provider Category</h2>
            </div>
            <div class="navigation">
                <div class="nav-arrow prev previous">←</div>
                <div class="nav-arrow next next-icon">→</div>
            </div>
        </div>


        <div class="categories-container">
        <?php
$services = [
    ['name' => 'Information technology', 'slug' => 'information technology', 'icon' => 'icon-it'],
    ['name' => 'Electrical', 'slug' => 'electrical', 'icon' => 'icon-engineer'],
    ['name' => 'Mechanic', 'slug' => 'mechanic', 'icon' => 'icon-mechanic'],
    ['name' => 'Teaching', 'slug' => 'teaching', 'icon' => 'icon-teacher'],
    ['name' => 'Plumbing services', 'slug' => 'plumbing', 'icon' => 'icon-plumber'],
    ['name' => 'Carpentry services', 'slug' => 'carpentry services', 'icon' => 'icon-carpenter']
];

// Optional: highlight active category
$currentWork = $_GET['work'] ?? '';
?>

<?php foreach ($services as $service): 
    $isActive = strtolower($service['slug']) === strtolower($currentWork) ? 'active' : '';
?>
    <div class="category-item <?= $isActive ?>">
        <div class="category-icon <?= htmlspecialchars($service['icon']) ?>"></div>
        <div class="category-name text-capitalize">
            <a href='service-providers.php?work=<?= urlencode($service['slug']) ?>' class='text-decoration-none text-dark'>
                <?= htmlspecialchars($service['name']) ?>
            </a>
        </div>
    </div>
<?php endforeach; ?>

        </div>
    </div>
</div>