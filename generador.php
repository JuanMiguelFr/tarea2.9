<?php
function obtenerIniciales($nombre) {
    $nombreLimpio = trim($nombre);
    if (strlen($nombreLimpio) >= 3) {
        $tresLetras = substr($nombreLimpio, 0, 3);
        return strtoupper($tresLetras);
    }
    return strtoupper($nombreLimpio);
}

function obtenerAnio($fecha) {
    $fechaLimpia = trim($fecha);
    if (strlen($fechaLimpia) >= 4) {
        return substr($fechaLimpia, 2, 2);
    }
    return "";
}

?>