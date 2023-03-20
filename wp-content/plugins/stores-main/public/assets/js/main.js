jQuery("#crud_stores_form_create").submit(function(e){
     e.preventDefault();
      jQuery.ajax({
            url: ajax_var.url,
            type: "POST", // podría ser get, post, put o delete.
            data: jQuery(this).serialize(),
        beforeSend: function() {
            //alert("voy a enviar información")
        },
        success: function ($response) {
  
            console.log($response);
            if($response){
               jQuery("#crud_stores_form_create input[name=store_name]").val("");
               jQuery("#crud_stores_form_create input[name=store_address]").val("");
               jQuery("#crud_stores_form_create input[name=store_latitud]").val("");
               jQuery("#crud_stores_form_create input[name=store_longitud]").val(""); 

               jQuery("#stores-table-body").append(`
                    <tr>
                       <td>${ $response.name }</td>   
                       <td>${ $response.latitud }</td>   
                       <td>${ $response.longitud }</td>   

                       <td><a href="">REFRESCAR</a></td>   
                       <td><a ref="">REFRESCAR</a></A></td>   
                  
                    </tr>
                 
               `);

            }
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.n' + jqXHR.responseText;
            }
            alert(msg);
        },
      });
});

/**SHOW STORE*/
jQuery(".crud_stores_form_show").submit(function(e){
    e.preventDefault();
     jQuery.ajax({
           url: ajax_var.url,
           type: "POST", // podría ser get, post, put o delete.
           data: jQuery(this).serialize(),
       beforeSend: function() {
           //alert("voy a mostrar información")
       },
       success: function ($response) {

        jQuery("#crud_stores_form_update input[name='store_id']").val($response.id);
        jQuery("#crud_stores_form_update input[name='store_name']").val($response.name);
        jQuery("#crud_stores_form_update input[name='store_address']").val($response.address);
        jQuery("#crud_stores_form_update input[name='store_latitud']").val($response.latitud);
        jQuery("#crud_stores_form_update input[name='store_longitud']").val($response.longitud);
        
        jQuery("#storeUpdateModal").modal("show");
       },
       error: function (jqXHR, exception) {
           var msg = '';
           if (jqXHR.status === 0) {
               msg = 'Not connect.n Verify Network.';
           } else if (jqXHR.status == 404) {
               msg = 'Requested page not found. [404]';
           } else if (jqXHR.status == 500) {
               msg = 'Internal Server Error [500].';
           } else if (exception === 'parsererror') {
               msg = 'Requested JSON parse failed.';
           } else if (exception === 'timeout') {
               msg = 'Time out error.';
           } else if (exception === 'abort') {
               msg = 'Ajax request aborted.';
           } else {
               msg = 'Uncaught Error.n' + jqXHR.responseText;
           }
           alert(msg);
       },
     });
});

/**UPDATE STORE */
jQuery("#crud_stores_form_update").submit(function(e){

    e.preventDefault();

   
    jQuery.ajax({
           url: ajax_var.url,
           type: "POST", // podría ser get, post, put o delete.
           data: jQuery(this).serialize(),
       beforeSend: function() {
           //alert("voy a mostrar información")
       },
       success: function ($response) {

        console.log($response);

        jQuery("#store_id_" + $response.id).html(`
        
             <td>${$response.name}</td> 
             <td>${$response.latitud}</td>   
             <td>${$response.longitud}</td> 
             <td><a href="">REFRESCAR</a></td> 
             <td><a href="">REFRESCAR</a></td> 
        `);

        jQuery("#store_id_" + $response.id).addClass("alert alert-success");

        jQuery("#storeUpdateModal").modal("hide");
       },
       error: function (jqXHR, exception) {
           var msg = '';
           if (jqXHR.status === 0) {
               msg = 'Not connect.n Verify Network.';
           } else if (jqXHR.status == 404) {
               msg = 'Requested page not found. [404]';
           } else if (jqXHR.status == 500) {
               msg = 'Internal Server Error [500].';
           } else if (exception === 'parsererror') {
               msg = 'Requested JSON parse failed.';
           } else if (exception === 'timeout') {
               msg = 'Time out error.';
           } else if (exception === 'abort') {
               msg = 'Ajax request aborted.';
           } else {
               msg = 'Uncaught Error.n' + jqXHR.responseText;
           }
           alert(msg);
       },
     });

});


/**DELTE STORE */
/* jQuery(".crud_stores_form_destroy").submit(function(e){
    e.preventDefault();
    
    var form = jQuery(this);
  
    jQuery.ajax({
      url: ajax_var.url,
      type: "POST",
      data: form.serialize(),
      beforeSend: function() {
        // Mostrar algún indicador de carga mientras se ejecuta la solicitud.
      },
      success: function ($response) {
        console.log($response);
        if ($response != 0) {
          jQuery("#store_id" + $response).hide();
        } else {
          // Mostrar un mensaje de error o hacer algo en caso de que no se haya eliminado correctamente.
        }
      },
      error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.n' + jqXHR.responseText;
        }
        alert(msg);
      },
    });
  }); */
  
jQuery(".crud_stores_form_destroy").submit(function(e){

    e.preventDefault();

   alert("HOLS");
    /* jQuery.ajax({
           url: ajax_var.url,
           type: "POST", // podría ser get, post, put o delete.
           data: jQuery(this).serialize(),
       beforeSend: function() {
           //alert("voy a mostrar información")
       },
       success: function ($response) {

        console.log($response);

        jQuery("#store_id" + $response).hide();


       },
       error: function (jqXHR, exception) {
           var msg = '';
           if (jqXHR.status === 0) {
               msg = 'Not connect.n Verify Network.';
           } else if (jqXHR.status == 404) {
               msg = 'Requested page not found. [404]';
           } else if (jqXHR.status == 500) {
               msg = 'Internal Server Error [500].';
           } else if (exception === 'parsererror') {
               msg = 'Requested JSON parse failed.';
           } else if (exception === 'timeout') {
               msg = 'Time out error.';
           } else if (exception === 'abort') {
               msg = 'Ajax request aborted.';
           } else {
               msg = 'Uncaught Error.n' + jqXHR.responseText;
           }
           alert(msg);
       },
     });
 */
}); 
