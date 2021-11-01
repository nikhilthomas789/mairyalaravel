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