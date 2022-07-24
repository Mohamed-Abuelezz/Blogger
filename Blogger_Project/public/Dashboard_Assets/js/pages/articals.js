

  (function($) {
  
    if ($(".js-categories").length) {
        $(".js-categories").select2();
      }
    
  })(jQuery);





function removeArtical(id) {
    var removeArticalUrl =  APP_URL + '/articals/';
    var id= id;
    console.log(id);

    $.ajax({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
       },
        url: removeArticalUrl+id,
        type: 'DELETE',
        dataType: 'json', 
        success : function(response) { 
            
            console.log(response);

            if (response['data'] == 1) {
                
                $('tr[data-id="'+id+'"]').remove();

                toastr.success(response['message']);

            }


        },
        error : function(jqXHR, textStatus, errorThrown) {
            toastr.error(jqXHR.statusText);
            console.log(jqXHR);

        } 
    });

}
