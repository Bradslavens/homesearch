// custom js
// 
// rotate elements with rotatable class
// function rotate(){

//     $(".rotatable").toggleClass("rotate");

// }
// 
$(document).ready(function(){

    // rotate something with class rotatable
    $(".rotatable").click(function(){

        $(this).toggleClass('rotate');

    });

    // display target
    $('[data-toggle]').click(function(){

        var target = $(this).attr('data-toggle');

        var target = '[data-target='+target+']';

        $(target).toggle();

    });

    $('.small-image').click(function(){

        var newSrc = $(this).attr('src');

        $('#large-image').attr('src', newSrc );
    });

});