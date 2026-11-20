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

function obtenerInstitucion($institucion) {
    $instLimpia = trim($institucion);
    $instMinusculas = convertirMinusculas($instLimpia);
    
    if (strlen($instMinusculas) >= 2) {
        return substr($instMinusculas, 0, 2);
    }
    return $instMinusculas;
}

function obtenerAnio($anio) {
    $anioLimpio = trim($anio);
    if (strlen($anioLimpio) == 4) {
        return substr($anioLimpio, 2, 2);
    }
    return $anioLimpio;
}

function generarUsuario($nombre, $institucion, $anioIngreso) {
    $parteNombre = limpiarNombre($nombre);
    $parteInstitucion = obtenerInstitucion($institucion);
    $parteAnio = obtenerAnio($anioIngreso);
    
    return $parteNombre . $parteInstitucion . $parteAnio;
}

$usuarioGenerado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"] ?? "";
    $institucion = $_POST["institucion"] ?? "";
    $anio = $_POST["anio"] ?? "";
    
    $usuarioGenerado = generarUsuario($nombre, $institucion, $anio);
}
?>