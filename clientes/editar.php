<?php
require_once __DIR__ . '/functions.php';
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$cliente = obtenerclientePorId($_GET['id']);

if (!$cliente) {
    header("Location: index.php?mensaje=Registro no encontrado");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarRegistro($_GET['id'], $_POST['nombre'], $_POST['dni'], $_POST['fecharegistro'], isset($_POST['completada']));
    if ($count > 0) {
        header("Location: index.php?mensaje=Tarea actualizada con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar el registro.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar registro</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
    <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($cliente['nombre']); ?>" required></label><br>
    <label>DNI: <input type="numerical" name="dni" value="><?php echo htmlspecialchars($cliente['dni']); ?>" required></label><br>
    <label>Fecha de Registro: <input type="date" name="fecharegistro" value="<?php echo formatDate($cliente['fecharegistro']); ?>" required></label><br>
    <label>cancelado: <input type="checkbox" name="cancelado" <?php echo $cliente['cancelado'] ? 'checked' : ''; ?>></label><br>
    <input type="submit" value="Actualizar Registro">
</form>
<a href="index.php" class="button">Volver a la lista de registro</a>
</div>
</body>
</html>

