$(document).ready( function() {
    $('#change-avatar-btn').click(function(){
        $("#change-avatar-file-input").click();
    });

    $('#thread-delete').submit(function(event){
        if(!confirm("Are you sure you want to delete this thread?")){
            event.preventDefault();
        }
    });
});
