// custom js
// 
// rotate elements with rotatable class
// function rotate(){

//     $(".rotatable").toggleClass("rotate");

// }
// 
$(document).ready(function(){
    $(".rotatable").click(function(){
        $(this).toggleClass('rotate');
    });
});