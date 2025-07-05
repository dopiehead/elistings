



$(document).on('click','.btn-edit',function() {
 var id = $(this).attr('id');
$.ajax({
url:"popup.php",
type:"POST",
data:{'id':id},
success:function(data) {
$(".edit-page").html(data).show();
}
});
});




  
function updateFileName(input) {
var fileName = input.files[0].name;
document.getElementById('file-label').innerText = fileName;
}

$(".myitems").load("myitems.php");

function changeBackground(obj) {
        $(obj).removeClass("bg-success");
        $(obj).addClass("bg-danger");
        $(obj).addClass("simple");

    }

    function saveData(obj, id, column) {
        var customer = {
            id: id,
            column: column,
            value: obj.innerHTML
        }
        $.ajax({
            type: "POST",
            url: "engine/saveData.php",
            data: customer,
            dataType: 'json',
            success: function(data){
                if (data) {

                swal({

                text:"Record saved",
                icon:"success",


                });  
                 
                  $(obj).removeClass("bg-danger");
                 $(obj).removeClass("simple"); 

                  swal({

              text:"Item was modified successfully",

              icon:"success",

            });
                   
                }
            }
       });
    };

  
$(document).on('click','#close-popup',function() {
 $('.edit-page').hide();
});

$('.btn-pay').on('click',function(e){
if (confirm("Do you want to add this item to featured product list?")) {
var pay = $('.btn-pay').attr('id');
$.ajax({
             type: "POST",
             url: "product-pay.php",
             data: 'id='+pay,
             success: function(data) {
             if (data==1) {
             window.location="payment.php"; 
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
})
}
    });

var postData = "text";
$(document).on('submit','#discount-form',function(e){
 e.preventDefault();
$("#loading-image").show();
var form_data = new FormData();
        $.ajax({

            type: "POST",
            url: "engine/discount.php",
            data: new FormData(this),
            cache:false,
            processData:false,
            contentType:false,
            success: function(response) {
            $("#loading-image").hide();
            if (response==1) {
             swal({
              text:"Saved successfully",
                icon:"success",
                               });
          $("#discount-form").find('input:text').val('');
               $("#discount-form").find('textarea').val('');
               $('input:checkbox').removeAttr('checked'); }
else{

swal({
  icon:"error",
   text:response
 }); 
}
},
error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown); }
 })
      });

$(document).on('submit','#myformx',function(e){
$("#loading-image").show();
$('#submitx').prop('disabled', true);
e.preventDefault();
var formdata = new FormData();
$.ajax({
type: "POST",
url: "addnewpic.php",
data:new FormData(this),
cache:false,
processData:false,
contentType:false,
success: function(response) {
$("#loading-image").hide();
if (response==1) {
 swal({icon:"success",

  text:"Image was uploaded successfully",

});
$('#submitx').prop('disabled',false);
 $("#myformx").find('input:file').val('');
$("#myformx").find('textarea').val('');
$('input:checkbox').removeAttr('checked');

 } else{
swal({
icon:"error",
text:response
 }); 
$('#submitx').prop('disabled',false);
}
},
error: function(jqXHR, textStatus, errorThrown) {
console.log(errorThrown);
 }
})
});

$(document).on('click','.btn-sold',function(e){
if (confirm("Are you sure to update this?")) {
$('.btn-sold').prop('disabled',true);
var del_id = $(this).attr('id');
$.ajax({
type: "POST",
url: "engine/update-sold.php",
data: 'id='+del_id,
success: function(response) {
$('.btn-sold').prop('disabled',false);
if (response==1) {
swal({
text:"Record saved successfully",
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
})
}
    });

$(document).on('click','.btn-gift-picks',function(e){
if (confirm("Are you sure to update this?")) {
$('.btn-gift-picks').prop('disabled',true);
var del_id = $(this).attr('id');
$.ajax({
type: "POST",
url: "engine/update-gift-picks.php",
data: 'id='+del_id,
success: function(response) {
$('.btn-gif-picks').prop('disabled',false);
if (response==1) {
swal({
text:"Record saved successfully",
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
})
}
    });


$(document).on('click','.btn-delete',function(e){
if (confirm("Are you sure to delete this?")) {
$('.btn-delete').prop('disabled',true);
var del_id = $(this).attr('id');
$.ajax({
type: "POST",
url: "engine/del.php",
data: 'id='+del_id,
success: function(response) {
$('.btn-delete').prop('disabled',false);
if (response==1) {
swal({
text:"Item has been deleted",
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
})
}
    });

$(document).on('click','.btn-subscribe',function(e){
if (confirm("Do you want to add this item to featured product list?")) {
 var pay = $('.btn-subscribe').attr('id');
$.ajax({
   type: "POST",
   url: "product-pay.php",
   data: 'id='+pay,
  success: function(data) {
   if (data==1) {
  window.location="payment.php"; 
}
else{

 swal({

text:response,
icon:"error"


 });

}
           
            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })
}
    });



function openbar() {
 
 $("#overlay").toggle();  
    
}
    

 
 $(document).on('click','.used',function(){
 
 $('#play').toggleClass('active'); 
     
 });  
    

 
    

