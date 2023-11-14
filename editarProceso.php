<?php
    print_r($_POST);
    if (!isset($_POST['id'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'conexion.php';
    $id = $_POST['id'];
    $nombre_fabricante = $_POST['nombre_fabricante'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $piez_vendidas = $_POST['piez_vendidas']; // Corregido el nombre de la variable
    $telefono = $_POST['telefono'];
    $instrumento_fabricado = $_POST['instrumento_fabricado'];
    $sucursal_trabaja = $_POST['sucursal_trabaja'];

    $sentencia = $bd->prepare("UPDATE fabricante SET nombre_fabricante = ?, apellidos = ?, direccion = ?, piez_vendidas = ?, telefono = ?, instrumento_fabricado = ?, sucursal_trabaja = ? WHERE id = ?;");
    $resultado = $sentencia->execute([$nombre_fabricante, $apellidos, $direccion, $piez_vendidas, $telefono, $instrumento_fabricado, $sucursal_trabaja, $id]);
    
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>
