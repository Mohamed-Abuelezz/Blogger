// Display an info toast with no title


var removeCategoryUrl =  APP_URL + '/categories/';



function removeCategory(id) {
    var id= id;
    console.log(id);

    $.ajax({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
       },
        url: removeCategoryUrl+id,
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
  

