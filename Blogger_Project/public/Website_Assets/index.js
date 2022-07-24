
var checkboxElems = document.querySelectorAll("input[type='checkbox']");
var idsCategories = [];

for (var i = 0; i < checkboxElems.length; i++) {
  checkboxElems[i].addEventListener("click", displayCheck);
}

function displayCheck(e) {
  if (e.target.checked) {
      idsCategories.push(e.target.value);
  }else{
    for( var i = 0; i < idsCategories.length; i++){ 
                                   
        if ( idsCategories[i] === e.target.value) { 
            idsCategories.splice(i, 1); 
            i--; 
        }
    }

  }
  console.log(idsCategories);
  sendRequest();
}



function sendRequest() {

    var getFilterArticalUrl = APP_URL + '/ajax/getFilterArticals';
    $.ajax({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content'),

       },
        url: getFilterArticalUrl,
        type: 'GET',
        dataType: 'json', 
        data: {'ids':idsCategories},
        success : function(response) { 
            
            console.log(response);

            if (response['data'] != null) {
                $(`.Blogitems`).html("")
                $(`.Blogitems`).append(response['data']);
                    
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