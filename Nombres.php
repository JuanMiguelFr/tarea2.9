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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de Usuario</title>
</head>
<body>
    <form method="POST">
        <label>Ingresa el nombre completo:</label><br>
        <input type="text" name="nombre" required><br><br>
        
        <label>Ingresa el nombre de la institución educativa:</label><br>
        <input type="text" name="institucion" required><br><br>
        
        <label>Ingresa el año de ingreso:</label><br>
        <input type="text" name="anio" placeholder="2024" maxlength="4" required><br><br>
        
        <button type="submit">Generar Usuario</button>
    </form>

    <?php if ($usuarioGenerado !== ""): ?>
        <p><strong>Nombre de usuario generado:</strong> <?php echo htmlspecialchars($usuarioGenerado); ?></p>
    <?php endif; ?>
</body>
</html>