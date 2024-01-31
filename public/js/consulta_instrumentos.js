"use strict";
let dato = [];
let html2= "";
var instrumento;
$(document).ready(function () {
    $.ajax({
        url: '../consultas/con_instrumentos.php',
        method: 'POST',
        dataType: 'json',
        // data: {condicion:condicion},
        success: function (response) {  //Si es todo correcto, muestra por consola el json que hemos obtenido de consulta.php
        
            // Procesar los datos de la consulta
            console.log(response);
    
            // // Loop through each result in the response
            dato=[];
            $.each(response, function (index, result) {
    
    
                instrumento = result;
                html2+="<option value="+instrumento.id_instrumento+">"+instrumento.nombre_instrumento+"</option>";
    
            });
            $('#instrumento, #instrumento_mod').append(html2); //Añadimos al div el contenido del js
            
    
             console.log(dato);
    
    
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});