"use strict";
let datos = [];
let html= "";
var tipo;
$(document).ready(function () {
    $.ajax({
        url: '../consultas/con_modal.php',
        method: 'POST',
        dataType: 'json',
        // data: {condicion:condicion},
        success: function (response) {  //Si es todo correcto, muestra por consola el json que hemos obtenido de consulta.php
        
            // Procesar los datos de la consulta
            console.log(response);
    
            // // Loop through each result in the response
            datos=[];
            $.each(response, function (index, result) {
    
    
                tipo = result;
                html+="<option value="+tipo.id_tipo_partitura+">"+tipo.estilo+"</option>";
    
            });
            $('#tipo, #tipo_mod').append(html); //Añadimos al div el contenido del js
            
    
             console.log(datos);
    
    
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});