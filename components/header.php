<link rel="stylesheet" href="assets/css/navbar.css">
<header class="top-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Logo Section -->
                <div class="col-md-6 col-8">
                    <a href="index.php" class="logo">
                        <i class="fas fa-cube"></i>
                        <div>
                            <div>Elisting</div>
                            <div class="tagline">Think of It? buy It Here</div>
                        </div>
                    </a>
                </div>

                <!-- Actions Section -->
                <div class="col-md-6 col-4">
                    <div class="header-actions justify-content-end">
                        <!-- Shopping Cart -->
                        <a href="products.php" class="cart-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </a>

                                                <!-- Shopping Cart -->
                         <a href="service-providers.php" class="cart-icon">
                            <i class="fas fa-wrench"></i>
                        </a>

                        <!-- Authentication Links -->
                        <div class="auth-links d-none d-sm-flex">
                            <?php if(!isset($_SESSION['id']) && !isset($_SESSION['business_id'])): ?>
                               <a href="login.php" class="auth-link">Log In</a>
                            <div class="divider"></div>
                               <a href="join-us.php" class="auth-link">Sign Up</a>
                            <?php else : ?>
                                <div class="divider"></div>
                                <a href="dashboard.php" class="auth-link">Profile</a> 
                            <?php endif ?>
                        </div>

                        <!-- Get Started Button -->
                        <?php if(!isset($_SESSION['id']) && !isset($_SESSION['business_id'])): ?>
                        <a href="join-us.php" class="btn-get-started">
                            Get Started
                        </a>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <!-- Mobile Auth Links -->
            <div class="row d-sm-none mt-2">
                <div class="col-12">
                    <div class="auth-links justify-content-center">
                    <?php if(!isset($_SESSION['id']) && !isset($_SESSION['business_id'])): ?>
                        <a href="login.php" class="auth-link">Log In</a>
                        <a href="join-us.php" class="auth-link">Sign Up</a>
                    <?php else : ?>
                        <a href="dashboard.php" class="auth-link">Profile</a>   
                    <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </header>