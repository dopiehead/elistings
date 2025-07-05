
$(document).ready(function(){
$('.remove').click(function(){
if(confirm("Are you sure you want to delete this?"))
  {
var id = $(this).attr('id');
var rowElement =$(this).parent().parent();
$.ajax({
url:'engine/remove-received.php',
method:'POST',
data:{'id':id},
success:function(response)
     {
     if (response==1) {
       swal({
         
         text:"Message has been deleted",
         icon:"success",

       });

       rowElement.fadeOut('slow').remove();
} 

else{
swal({icon:"error",
  text:response
});

}
     }
     
    });
   }
   });
 
});


$(document).ready(function(){
 $('.removeSent').click(function(){
  if(confirm("Are you sure you want to delete this?"))
  {
   var id = $(this).attr('id');
var rowElement =$(this).parent().parent();
$.ajax({
     url:'engine/remove-sent.php',
     method:'POST',
     data:{id:id},

     success:function(response)
     {
     
      if (response==1) {
       swal({
         
         text:"Message has been deleted",
         icon:"success",


       });

       rowElement.fadeOut('slow').remove();
} 

else{

swal(response);

}


     }
     
    });
   }
   
  

 });
 
});


function openbar() {
 
 $(".overlay").toggle();  
    
}


