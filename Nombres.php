<?php
function convertirMinusculas($texto) {
    $acentos = ['Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú', 'Ñ', 'ñ'];
    $sinAcentos = ['a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u', 'n', 'n'];
    $textoNormalizado = str_replace($acentos, $sinAcentos, $texto);
    
    return strtolower($textoNormalizado);
}

function limpiarNombre($nombre) {
    $sinEspaciosExtremos = trim($nombre);
    $enMinusculas = convertirMinusculas($sinEspaciosExtremos);
    $nombreSinEspacios = str_replace(" ", "", $enMinusculas);
    
    return $nombreSinEspacios;
}

?>