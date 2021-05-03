<?php

    echo "Este Es Un Mensaje de Descarga Directa";
?>


<script text="text/JavaScript">
 window.onload = function()
 {
     /* TEST NOMBDE DE ARCHIVO CON ESPACIÓN Y REPLAZO DE ARCHIVOS POR CODE % USADO POR INTERNET */
    var filename = 'Manual 20FC 20Franquiciatario 2021.pdf';
    var replaced = filename.split(' ').join('%');
    alert(replaced);

    // window.open("http://franquiciascostanzo.com/PlataformaFranquicias/Franquicias_Manuales/Manual%20FC%20Franquiciatario%2021.pdf", 'Download');
    window.open("http://franquiciascostanzo.com/PlataformaFranquicias/Franquicias_Manuales/"+replaced);

    // window.location("http://franquiciascostanzo.com/PlataformaFranquicias/Franquicias_Manuales/Manual%20FC%20Franquiciatario%2021.pdf");
    // location.href = 'http://franquiciascostanzo.com/PlataformaFranquicias/'+repl;
 }

</script>