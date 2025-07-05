
function updateFileName(input) {
var fileName = input.files[0].name;
  document.getElementById('file-label').innerText = fileName;
}

$('#btn-comment').on('click',function(e){
e.preventDefault();
$("#loading-image").show();
    $.ajax({
            type: "POST",
            url: "engine/sp-comment.php",
            data:  $("#conv").serialize(),
            success: function(response) {
            $("#loading-image").hide();
            if (response==1) {
          $('#bom').load(location.href + " #cy");
          $("#conv")[0].reset();
           swal({
            text:"Comment added successfully",
            icon:"success",
});
}
else{
swal({

    icon:"error",
  text:response
});
}         
},
           error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);

            }
        });

    });


  
$('#formPopup').on('submit',function(e){

        e.preventDefault();

        $("#loading-image").show();
        
        var formdata = new FormData();

      $.ajax({

            type: "POST",

            url: "seller-verify.php",

            data:new FormData(this),

            cache:false,

            processData:false,

            contentType:false,

             success: function(data) {

             $("#loading-image").hide();

if (data==1) {
      
              swal({
                       text:"Image upload successful. We will revert back shortly",
                      icon:"success",

              });
                
               $('#bom').load(location.href + " #cy");
               $("#formPopup")[0].reset();
               $("#formPopup").removeClass("active");
} 

else{
          swal({

            icon:"error",
            text:data}); 
 }

            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })

    });


function openbar() {
 
 $(".overlay").toggle();  
 
}

$(document).ready(function() {
    $('#toggleButton').change(function() {
        var isChecked = $(this).prop('checked') ? 1 : 0; // Convert boolean to 1 or 0
        
        // AJAX call to update server
        $.ajax({
            type: "POST",
            url: "postads-process.php", // PHP script to handle update
            data: { status: isChecked },
            success: function(response) {
                console.log("Status updated successfully: " + response);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status, error);
            }
        });
    });
});


$('#subcategory').html("<select style='font-size:14px !important;'  id='subcategory' class='subcategory'><option>Choose subcategory</option></select>");
  
$('.category').on('change',function() {
  
let category = $(this).val();

      $.ajax({

          type:"POST",

            url:"engine/get-subcategory.php",

            data:{'category':category || ''},

            success:function(data) {

              $('#subcategory').html(data);
              
            }

     });

});

$("#product_color").hide(); 

$("#quantity").hide(); 

$("#product_category").on('change',function(){
   
var productInfo = $(this).val();  

if(productInfo =="building material"){
   
   $("#product_color").hide();
   $("#quantity").show();
   
}

else if(productInfo =="jobs"){$("#product_color").hide();$("#quantity").hide();}

else if(productInfo =="property"){$("#product_color").hide();$("#quantity").hide();}

else if(productInfo =="farm products"){$("#product_color").hide();$("#quantity").show();}

else if(productInfo =="service providers"){$("#product_color").hide();$("#quantity").hide();}

else{
   
  $("#product_color").show(); 
  
   $("#quantity").show();
}



    
});   



$('#form-product').on('submit',function(e){

       e.preventDefault();

       $(".loader").show();

       
       var formdata = new FormData();


     $.ajax({

           type: "POST",

           url: "postads-process.php",

           data:new FormData(this),

           cache:false,

           processData:false,

           contentType:false,

            success: function(response) {

            $(".loader").hide();

if (response==1) {
               swal({
                      text:"Item(s) uploaded successfully",
                     icon:"success",

             });
               
              $('#bom').load(location.href + " #cy");
              $("#form-product")[0].reset();
              setTimeout(function() {
               window.location.href='mylistings.php'
               }, 500); 
              
             } 

     else{
         swal({icon:"error",
               text:response

 }); 
       }

           },

           error: function(jqXHR, textStatus, errorThrown) {

               console.log(errorThrown);

           }

       })

   });



$("#product_color").hide(); 

$("#quantity").hide(); 

$("#product_category").on('change',function(){
   
var productInfo = $(this).val();  

if(productInfo =="building material"){
   
   $("#product_color").hide();
   $("#quantity").show();
   
}

else if(productInfo =="jobs"){$("#product_color").hide();$("#quantity").hide();}

else if(productInfo =="property"){$("#product_color").hide();$("#quantity").hide();}

else if(productInfo =="farm products"){$("#product_color").hide();$("#quantity").show();}

else if(productInfo =="service providers"){$("#product_color").hide();$("#quantity").hide();}

else{
   
  $("#product_color").show(); 
  
   $("#quantity").show();
}



    
});   







$('#btn-comment').on('click',function(e){
e.preventDefault();
$("#loading-image").show();
   $.ajax({
           type: "POST",
           url: "engine/sp-comment.php",
           data:  $("#conv").serialize(),
           success: function(response) {
           $("#loading-image").hide();
           if (response==1) {
         $('#bom').load(location.href + " #cy");
         $("#conv")[0].reset();
          swal({
           text:"Comment added successfully",
           icon:"success",
});
}
else{
swal({

   icon:"error",
 text:response
});
}         
},
          error: function(jqXHR, textStatus, errorThrown) {
           console.log(errorThrown);

           }
       });

   });



function openbar() {

$(".overlay").toggle();  

}

$(document).ready(function() {
   $('#toggleButton').change(function() {
       var isChecked = $(this).prop('checked') ? 1 : 0; // Convert boolean to 1 or 0
       
       // AJAX call to update server
       $.ajax({
           type: "POST",
           url: "postads-process.php", // PHP script to handle update
           data: { status: isChecked },
           success: function(response) {
               console.log("Status updated successfully: " + response);
           },
           error: function(xhr, status, error) {
               console.error('AJAX Error: ' + status, error);
           }
       });
   });
});


  function installment() {
   $("#installment_plan").toggleClass("active");}
  
  function discount() {
    $("#discount_hide").toggleClass("active");}
  
  function verify_id() {
  $('#popup').toggleClass('active');
  }
  
  function used() {
  $('#play').toggleClass('active');
  }
  









