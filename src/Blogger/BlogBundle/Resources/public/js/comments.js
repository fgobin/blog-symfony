//function for toggling hiden/visible div and button
function toggler(divId,buttonId) {
    $("#" + divId).toggle();
    $("#" + buttonId).toggle();
}

function postForm($form, successCallback, errorCallback ){

    //  Get all form values
    var values = {};
    $.each( $form.serializeArray(), function(i, field) {
        values[field.name] = field.value;
    });

    // Throw the form values to the server!
    $.ajax({
        type        : $form.attr( 'method' ),
        url         : $form.attr( 'action' ),
        data        : values,
        success     : function(data) {
            successCallback( data );
        },
        error       : function(xhr, ajaxOptions, thrownError) {
            errorCallback(xhr, ajaxOptions, thrownError);
        }
    });
}

$(document).ready(function(){
    $('form').submit( function( e ){
        e.preventDefault();
        postForm( $(this),
            function( response ){
                //fields: response {name, comment,id, created}
                $('#comment-list').
                    append(
                    '<strong class="pull-left primary-font">' + response.author + '</strong>' +
                    '<small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>Right now</small></br>' +
                    '<li class="ui-state-default" id="comment-'+response.id +'">'+ response.comment + '</li>' +
                    '</br>'
                );
                $('form').trigger('reset');
            },
            function (xhr, ajaxOptions, thrownError) {
                alert(xhr.responseJSON.message);
            }
        );
    });
});