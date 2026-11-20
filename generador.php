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

$claveGenerada = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreEstudiante = $_POST["nombre"] ?? "";
    $fechaNacimiento = $_POST["fecha"] ?? "";
    $claveGenerada = generarClave($nombreEstudiante, $fechaNacimiento);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de Clave</title>
</head>
<body>
    <form method="POST">
        <label>Ingresa el nombre completo del estudiante:</label><br>
        <input type="text" name="nombre" required><br><br>
        
        <label>Ingresa la fecha de nacimiento (AAAA-MM-DD):</label><br>
        <input type="text" name="fecha" placeholder="2005-08-15" required><br><br>
        
        <button type="submit">Generar Clave</button>
    </form>

    <?php if ($claveGenerada !== ""): ?>
        <p><strong>Clave generada:</strong> <?php echo $claveGenerada; ?></p>
    <?php endif; ?>
</body>
</html>
?>