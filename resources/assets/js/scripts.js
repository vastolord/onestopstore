
//carousel timing

$(function() {

	$('.carousel').carousel({
		interval: 3000,
		});

});


// modal pop up
$(document).ready(function(){
    $("#loginhref").click(function(){
        $("#myModal").modal({show: true});
    });
});

//navbar offcanvas on mini 
$(document).ready(function() {
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
});


//navbar affix
var $attribute = $('[data-smart-affix]');
$attribute.each(function(){
  $(this).affix({
    offset: {
      top: $(this).offset().top,
    }
  })
})


$(window).on("resize", function(){
  $attribute.each(function(){
    $(this).data('bs.affix').options.offset = $(this).offset().top
  })
})


// $(document).ready(function() {
//   $('[data-toggle=offcanvas]').click(function() {
//     $('.row-offcanvas').toggleClass('active');
//   });
// });

//
//  $("#fnl").click(function(){
//  $(this).data('clicked', true);


// // Login
// $('ls-modal').on('click', function (e) {
//     e.preventDefault();
//     $('#myModal').modal('show').find('.modal-body').load($(this).attr('href'));
// });


