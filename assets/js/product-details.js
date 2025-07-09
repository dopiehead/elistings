
	
$('.heart').on('click',function() {

var itemId = $("#idItem").val();
var userid = $('#seller').val();
 var buyer = $('#buyer').val();

$.ajax({
            type: "POST",
            url: "engine/heart-process.php",
            data: { 'itemId': itemId, 'userid': userid,'buyer':buyer},
            cache: false,
            success: function(response) {
             

                if (response == 1) {

                    swal({
                        icon: "success",
                        text: "Item has been added to wish list"
                    });
                    
                    $('#com').load(location.href + " #my");
                
                } else {
                    swal({

                        icon: "error",
                        text: response
                    });
                }
            }
        });

});




function share() {
    var url = $('.share').attr('id');
    var encodedUrl = encodeURIComponent(url);
    var facebookShare = "https://www.facebook.com/sharer/sharer.php?u=" + encodedUrl;
    var twitterShare = "https://twitter.com/intent/tweet?url=" + encodedUrl;
    var linkedinShare = "https://www.linkedin.com/shareArticle?url=" + encodedUrl;
    window.open(facebookShare, "_blank");
    window.open(twitterShare, "_blank");
    window.open(linkedinShare, "_blank");
}



var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/667aba429d7f358570d3336e/1i17mf66d';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

function hideSpinner() {
    const spinner = document.getElementById('spinner');
    if (spinner) {
      spinner.style.display = 'none';
    }
  }


$('.numbering').load('engine/item-numbering.php');
$('.btn-compare').on('click',function() {
var id = $(this).attr('id');
var buyer =$('#buyer').val();
$(".loading-image").show();
$.ajax({
type:"POST",
url:"engine/compare-page.php",
data:{'id':id,'buyer':buyer},
success:function(data) {
$(".loading-image").hide();
window.location.href="compare-product.php?id="+id;
}
    });

});

$('#submit-message').on('click',function(e){
        e.preventDefault();
        $("#loading-image").show();
          $.ajax({
           type: "POST",
           url: "engine/message-process.php",
           data:  $("#message-form").serialize(),
           cache:false,
           contentType: "application/x-www-form-urlencoded",
           success: function(response) {
           $("#loading-image").hide();
           if (response==1) {
            swal({
            text:"Message sent",
             icon:"success",
            });
                
            $("#popup-messaging").hide(1000);
            $("#message-form")[0].reset(); 
            $("#message-form").find('input:text').val('');
            $("#message-form").find('textarea').val('');
            $('input:checkbox').removeAttr('checked');
                                                        }    
            else{
            
              swal({ icon:"error",
              	     text:response
              });
           

           }

            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })

    });

$('#btn-comment').on('click',function(e){
e.preventDefault();
$("#loading-image").show();
    $.ajax({
            type: "POST",
            url: "engine/seller-comment.php",
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


 function messaging() {
var popup = document.getElementById('popup-messaging');
popup.classList.toggle('active');
  }


  

$('.main').flickity({
  cellAlign: 'left',
  contain: true,
  autoPlay:true,
});


$('.comments').flickity({
  cellAlign: 'left',
  contain: true,
  autoPlay:true,
});


 function toggle() {
var popup = document.getElementById('popup');
popup.classList.toggle('active');
 }

 function toggle_comment() {
var popup = document.getElementById('popup-comment');
popup.classList.toggle('active');
 }

$('#submit').on('click',function(e){
        e.preventDefault();
  $.ajax({
           type: "POST",
            url: "report-page.php",
           data:  $("#report-form").serialize(),
            cache:false,
            contentType: "application/x-www-form-urlencoded",
            success: function(response) {
            if(response==1){

swal({
text:"Your message has been recieved. Thank you!",
icon:"success",
});

 $("#popup").hide(1000);
             }

       else { 
       
             swal({

text:"Issue field is required",
icon:"error",

});
            $("#report-form").find('input:text').val('');
            $("#report-form").find('textarea').val('');
            $('input:checkbox').removeAttr('checked');
}  
            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })

    });

    
let slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");

 
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
 
  slides[slideIndex-1].style.display = "block";
  
 
}
