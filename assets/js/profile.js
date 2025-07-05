

$('#editpage-form').on('submit',function(e){

if (confirm("Are you sure to change this?")) {

 e.preventDefault();

$(".loading-image").show();


var formdata = new FormData();
   $.ajax({
           type: "POST",

           url: "changeprofilepic.php",

           data:new FormData(this),

           cache:false,

           processData:false,

           contentType:false,

           success: function(response) {

           $(".loading-image").hide();

          if(response==1){

            swal({

          text:"Image has been changed",
          icon:"success",
        });
       $('#bom').load(location.href + " #my");
}

else
 { 
  swal({
            icon:"error",
            text:response

           });
            $("#editpage-form")[0].reset();      

            }
 }
        });
 }
    });



$('#lg').html("<select  id='lga' class=' lga address_details'><option>Business Axis</option></select>");
  
$('.location').on('change',function() {
  
var location = $(this).val();

      $.ajax({


          type:"POST",

            url:"engine/get-lga.php",

            data:{'location':location},

            success:function(data) {

              $('#lg').html(data);
              
            }


     });

});



  $('#btn-submit').on('click',function(){
      
       $(".loading-image").show();

      $.ajax({

            type: "POST",

            url: "edit-page.php",

            data:  $("#editpage-details").serialize(),

            cache:false,

            contentType: "application/x-www-form-urlencoded",

             success: function(response) {
             
             if (response==1) {

            
            swal({
              
              text:"Details update is saved",

              icon:"success",

            });
           $("#editpage-details")[0].reset();
           
            $(".loading-image").hide();

              $("#myformx").hide();
          }
    
             else{

              swal({

                   text:response,
                   icon:"error",

              });
             }

            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })

    });


  
function cancel() {
$("#editpage-details")[0].reset();
}
