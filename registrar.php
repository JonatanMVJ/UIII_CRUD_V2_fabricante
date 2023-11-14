<?php
    //print_r($_POST);
    if (empty($_POST["oculto"]) || empty($_POST["nombre_fabricante"]) || empty($_POST["apellidos"]) || empty($_POST ["direccion"]) || empty($_POST["piez_vendidas"]) || empty($_POST["telefono"]) || empty($_POST["instrumento_fabricado"]) || empty($_POST["sucursal_trabaja"])) {
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'conexion.php';
    $nombre_fabricante = $_POST["nombre_fabricante"];
    $apellidos = $_POST["apellidos"];
    $direccion = $_POST["direccion"];
    $piez_vendidas = $_POST["piez_vendidas"];
    $telefono = $_POST["telefono"];
    $instrumento_fabricado = $_POST["instrumento_fabricado"];
    $sucursal_trabaja = $_POST["sucursal_trabaja"];
    
    $sentencia = $bd->prepare("INSERT INTO fabricante(nombre_fabricante, apellidos, direccion, piez_vendidas, telefono, instrumento_fabricado, sucursal_trabaja) VALUES (?, ?, ?, ?, ?, ?, ?);");
    $resultado = $sentencia->execute([$nombre_fabricante, $apellidos, $direccion, $piez_vendidas, $telefono, $instrumento_fabricado, $sucursal_trabaja]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>
