/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(inicializarEventos);

function inicializarEventos(){
   
$('#item1').click(function() {
  $('.divMenu1').css({visibility: "visible"});
});

$('#item2').click(function() {
  $('.divMenu2').css({visibility: "visible"});
});

$('#item3').click(function() {
  $('.divMenu3').css({visibility: "visible"});
});

$('#item4').click(function() {
  $('.divMenu4').css({visibility: "visible"});
});

$('#item5').click(function() {
  $('.divMenu5').css({visibility: "visible"});
});

/*$('.item').mouseover(function(){
    $('.divMenu1').css({visibility: "visible"});
})

$('.item').mouseout(function(){
    $('.divMenu1').css({visibility: "hidden"});
})*/
$('.divMenu1').hover(
        function(e){
         $(this).find('ul').css({visibility: "visible"});
      },
      function(e){
         $(this).find('ul').css({visibility: "hidden"});
      } )

$('.divMenu2').hover(
        function(e){
         $(this).find('ul').css({visibility: "visible"});
      },
      function(e){
         $(this).find('ul').css({visibility: "hidden"});
      } )

$('.divMenu3').hover(
        function(e){
         $(this).find('ul').css({visibility: "visible"});
      },
      function(e){
         $(this).find('ul').css({visibility: "hidden"});
      } )

$('.divMenu4').hover(
        function(e){
         $(this).find('ul').css({visibility: "visible"});
      },
      function(e){
         $(this).find('ul').css({visibility: "hidden"});
      } )


 $('.divMenu5').hover(
        function(e){
         $(this).find('ul').css({visibility: "visible"});
      },
      function(e){
         $(this).find('ul').css({visibility: "hidden"});
      } )

}

