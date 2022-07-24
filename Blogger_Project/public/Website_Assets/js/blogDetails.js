

$(document).ready(function() {


function sendComment(params) {

    console.log($(this).attr("data-artical"));
    
    if ($('#textAreaComment').val().length > 0) {
   var comment =  $('#textAreaComment').val();

        var sendCommentUrl = APP_URL + '/ajax/comment';
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
    
           },
            url: sendCommentUrl,
            type: 'POST',
            dataType: 'json', 
            data: {'comment':comment,'artical_id':$(this).attr("data-artical")},
            success : function(response) { 
                
                console.log(response);
    
                if (response['data'] != null) {
                    $('#textAreaComment').val('');
                    $(`.commentss`).prepend(response['data']);

                }
           
    
            },
            error : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
    
                swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: textStatus,
                  })
                  
            } 
        });
    



  }





    // swal("Hello world!");

}


$("#btnSubmit").click(sendComment); 


});