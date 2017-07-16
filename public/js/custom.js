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

    $("#slides").slidesjs({
      width: 940,
      height: 528,
      navigation: {
          active: true,
            // [boolean] Generates next and previous buttons.
            // You can set to false and use your own buttons.
            // User defined buttons must have the following:
            // previous button: class="slidesjs-previous slidesjs-navigation"
            // next button: class="slidesjs-next slidesjs-navigation"
          effect: "slide"
            // [string] Can be either "slide" or "fade".
      },
    });

});