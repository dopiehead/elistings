<div class='container'>
    
    <div class='d-flex flex-column flex-row gap-3'>

         <h4 class='fw-bold'>Categories</h4>

    </div>

    <div class='d-flex flex-md-row flex-column gap-3 justify-content-between'>
        
         <div class='col-md-3'>

             <div class='d-flex justify-content-between gap-1'>

                 <input type="text" class='border border-2 border-muted w-100' placeholder="Search category">
                 <button class='btn btn-primary text-capitalize'>search</button>

             </div>
             <br>
          
             <?php for ($i=1; $i < 10; $i++) {  ?>
                
                <div class='d-flex justify-content-between text-secondary text-sm my-2'>

                     <div class='d-flex justify-content-start gap-3'>
                         <input type="checkbox">
                         <div>
                             <span>Electronics</span><br>
                             <span>700</span>
                         </div>
                     </div>

                     <div>
                         <i class='fa fa-chevron-right'></i>
                     </div>

                </div>

             <?php   } ?>

         </div>


         <div class='col-md-9'>
              
             <div class='d-flex justify-content-between align-items-center'>
             
                 <img style='height:200px;width:80%;object-fit:cover;' src="assets/images/background/coke.jpeg" alt="">

                  <div class='d-flex flex-row flex-column gap-1'>

                     <span class='py-4 px-5 shadow text-secondary text-center'>
                         <span class='fa fa-plus fa-2x rounded rounded-circle border border-2 border-secondary'></span>
                     </span>

                     <a href="" class='text-dark text-decoration-none fw-bold'>Post your advert here</a>

                  </div>

             </div>

             <h4 class='fw-bold mt-3'>Trending products</h4>

         </div>

    </div>

</div>