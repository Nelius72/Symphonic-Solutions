"use strict";
let datos = [];
var tipo;
$(document).ready(function () {
    $.ajax({
        url: 'con_eventos.php',
        method: 'POST',
        dataType: 'json',
        // data: {condicion:condicion},
        success: function (response) {  //Si es todo correcto, muestra por consola el json que hemos obtenido de consulta.php
            // $('#kt_calendar').empty()
            // Procesar los datos de la consulta
            console.log(response);
    
            // // Loop through each result in the response
            datos=[];
            $.each(response, function (index, result) {
    
    
                tipo = result.tipologia;
                datos.push(tipo);
    
            });
            
            
    
             console.log(datos);
    
    
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});