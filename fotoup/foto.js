
$(document).on('click', '.fotoUps', function() {
            //id =$(this).val;
    id = $(this).siblings('.fotoUp').val();
    put= "postimg/";
    allput = put + id;
    $('.fotoUpPocas').css('display', 'block');
    $('.podstavafotoup').attr('src', allput);
            
        });
$(document).on('click', '.fotobuttonup', function() {
            $('.fotoUpPocas').css('display', 'none');    
        });


