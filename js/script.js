function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginRight= "0";
    document.body.style.backgroundColor = "white";
}

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}


// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
$(document).ready(function(){
$('#uno').on('click', function(){  
        $('.edits').show();
        $('.inf').hide();
        $('.edits2').hide();
        $('.inf2').show();
        $('.save').show();
        $('.save').addClass('editss');
        $('.saves').addClass('editss');
        $('.guard').show();
         $('.saves').show();


    });

$('#dos').on('click', function(){  
        $('.edits2').show();
        $('.edits').hide();
        $('.inf').show();
        $('.inf2').hide();
        $('.save').show();
        $('.save').addClass('editss');
        $('.saves').addClass('editss');
        $('.guard').show();
         $('.saves').show();


    });

$('#tres').on('click', function(){  
        $(".save").before("<div class='col-sm-6 info'><div class='col-sm-12 campos'><input type='text' class='edits3' name='campnew'></div></div>");
        $('.edits2').hide();
        $('.edits').hide();
        $('.inf').show();
        $('.inf2').show();
        $('.save').show();
        $('.save').addClass('editss');
        $('.saves').addClass('editss');
        $('.guard').show();
         $('.saves').show();


    });

$('#cuatro').on('click', function(){  
    
        $('.checkss').show();
        $('.save').show();
        $('.save').addClass('editss');
        $('.saves').addClass('editss');
        $('.guard').show();
         $('.saves').show();



    });

$('.saves').on('click', function(){  
    
        $('input').hide();
        $('.inf').show();
        $('.inf2').show();

    });


                


});


                