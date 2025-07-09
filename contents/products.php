
    
 
    
    <div class="container products-header">
        <div class="header">
            <div class="title-section">
                <span class="our-products-label">Our Products</span>
                <h2 class="title"><?= htmlspecialchars($headerCategory);?></h2>
            </div>
            <div class="navigation">
                

            </div>
        </div>

        <div class="products-grid">
          <?php 
         
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          $condition = "SELECT * FROM item_detail WHERE sold = 0";
          if(isset($filter) && !empty($filter)){
          $condition .= " AND $filter ";
          }
          $condition .= " ORDER BY id DESC LIMIT 8";
          $getproducts = $conn->prepare($condition);
          if($getproducts->execute()){
            $productResult = $getproducts->get_result();
            while($dataFound = $productResult->fetch_assoc()){
               $discount = $dataFound['discount'];
               if($discount > 0) :
                 $discounted_price = $dataFound['product_price'] - (round($dataFound['product_price'] * $discount/100));
               endif;
                
                ?>

            <div class="product-card">
                <div class="wishlist-icon"><i class='fa fa-eye'></i><?= htmlspecialchars($dataFound['views']) ?></div>
                <div class="product-image"><img style='width:80px;height:80px;' src='<?= htmlspecialchars($dataFound['product_image']) ?>' ></div>
                <div class="product-name text-capitalize"><?= htmlspecialchars(html_entity_decode($dataFound['product_name'])) ?></div>
                <div class="product-price"><i class='fa fa-naira-sign'></i>
                       <?php if($discount >0 ){echo"<span style='text-decoration:line-through'>".$dataFound['product_price']."</span> ".$discounted_price; } else{ ?>
                          <?= htmlspecialchars($dataFound['product_price']) ?>
                        <?php } ?>

                </div>
                <div class="product-rating">
                    <div class="stars">★★★★★</div>
                    <div class="rating-count">(35)</div>
                </div>
            </div>

            <?php
            }
          }          
          ?>          
        </div>
        <button href='products.php?filter=<?= urlencode($slug) ?>' class="view-all-btn">View All Products</button>
    </div>
</div>
<script>
    $(".view-all-btn").on("click",function(){
       let link = $(this).attr("href");
       if(link.length > 0){
          window.location.href = link;
       }
    });
</script>
