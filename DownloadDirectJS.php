<?php

    echo "Este Es Un Mensaje de Descarga Directa";
?>


<script text="text/JavaScript">
 window.onload = function()
 {
     /* TEST NOMBDE DE ARCHIVO CON ESPACIÓN Y REPLAZO DE ARCHIVOS POR CODE % USADO POR INTERNET */
    var filename = 'Manual 20FC 20Franquiciatario 2021.pdf';
    // var filename = 'Nombre Sepa ZIP.zip';
    var replaced = filename.split(' ').join('%');
    alert(replaced);

    /* 
        PROGRAMAR CONDICIONAL PARA VERIFICAR EXTENSIÓN, SI ES PDF SE SUSTITUYEN LOS ESPACIOS
        DE LO CONTRARIO NO ES NECESARIO SUSTITUR ESPACIOS DENTRO DE NOMBRE
     */

    // window.open("http://franquiciascostanzo.com/PlataformaFranquicias/Franquicias_Manuales/Manual%20FC%20Franquiciatario%2021.pdf", 'Download');
    window.open("http://franquiciascostanzo.com/PlataformaFranquicias/Franquicias_Manuales/"+replaced);

    // window.location("http://franquiciascostanzo.com/PlataformaFranquicias/Franquicias_Manuales/Manual%20FC%20Franquiciatario%2021.pdf");
    // location.href = 'http://franquiciascostanzo.com/PlataformaFranquicias/'+repl;
 }

</script>