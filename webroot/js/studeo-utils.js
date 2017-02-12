$(document).ready( function(){
	$('.link-button').click(function(event){
		event.stopPropagation(); //we do not want the event to toggle the solution list
		document.location.href = $(this).attr('data-link'); //go to page
	});
	
	$('.studeo-exam-item').click(function(event){
		$(this).find('.studeo-toggle-row-icon').toggleClass('fa-chevron-down').toggleClass('fa-chevron-right');
	});
});