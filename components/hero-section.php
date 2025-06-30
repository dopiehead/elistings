<div class='hero-section'>

     <div class='d-flex justify-content-center gap-2'>

         <span class='text-white fs-5'>Find anything in</span>

         <select name="states" id="states" class='border-0 text-white bg-primary fs-5 text-capitalize'>

              <option value="">Entire Nigeria</option>
              
              <?php include("contents/states_in_nigeria.php"); ?>

         </select>

     </div>


     <div class='border-0 shadow-lg rounded rounded-pill py-4 d-flex justify-content-around align-items-center bg-white w-100'>
         
         <input type="search" placeholder="I'm looking for" class='border-0 w-75'> <button style='font-family:arial,fontawesome;' class='btn btn-primary btn-search rounded-pill'>&#xF002; Search</button>

     </div>

</div>