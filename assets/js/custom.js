$(document).ready(function(){



$(".deleteConfirmation").click(function(e){

var id=$(".delval").val();
    $.confirm({
    title: 'Delete Confirmation',
    content: 'Are you sure you want to delete?',
    type: 'red',
    typeAnimated: true,
    buttons: {
        confirm: function () {     
            
        },
        cancel: function () {
            e.preventDefault();
        },
    }
});

});




});

// Button Click Effect
$(function() {
	var taint, d, x, y;
	$(".material-button").click(function(e){
		if ($(this).find(".taint").length == 0) {
			$(this).prepend("<span class='taint'></span>")
		}
		taint = $(this).find(".taint");
		taint.removeClass("drop");
		if(!taint.height() && !taint.width()) {
			d = Math.max($(this).outerWidth(), $(this).outerHeight());
		taint.css({height: d, width: d});
		}
		x = e.pageX - $(this).offset().left - taint.width()/2;
		y = e.pageY - $(this).offset().top - taint.height()/2;
		taint.css({top: y+'px', left: x+'px'}).addClass("drop");
	});
});