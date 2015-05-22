$(document).foundation();

$('.medium-block-grid-2 img').hover(function () {
  $('img.main-thumb').attr('src' ,$(this).attr('src'));
});

$(function(){
	$('#Container').mixItUp();
});