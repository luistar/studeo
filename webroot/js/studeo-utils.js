$(document).ready( function(){
		$('.link-button').click(function(event){
		event.stopPropagation(); //we do not want the event to toggle the solution list
		document.location.href = $(this).attr('data-link'); //go to page
	})
});