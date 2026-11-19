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

function obtenerMesDia($fecha) {
    $fechaLimpia = trim($fecha);
    if (strlen($fechaLimpia) == 10) {
        $mes = substr($fechaLimpia, 5, 2);
        $dia = substr($fechaLimpia, 8, 2);
        return $mes . $dia;
    }
    return "";
}

function generarClave($nombre, $fechaNacimiento) {
    $iniciales = obtenerIniciales($nombre);
    $anio = obtenerAnio($fechaNacimiento);
    $mesDia = obtenerMesDia($fechaNacimiento);
    
    return $iniciales . $anio . $mesDia;
}

$nombreEstudiante = readline("Ingresa el nombre completo del estudiante: ");
$fechaNacimiento = readline("Ingresa la fecha de nacimiento (AAAA-MM-DD): ");

$claveGenerada = generarClave($nombreEstudiante, $fechaNacimiento);
echo "Clave generada: " . $claveGenerada . "\n";
?>