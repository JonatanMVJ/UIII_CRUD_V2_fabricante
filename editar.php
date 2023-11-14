<?php include 'header.php'; ?>

<?php
    if (!isset($_GET['id'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("SELECT * FROM fabricante WHERE id = ?;");
    $sentencia->execute([$id]);
    $fabricante = $sentencia->fetch(PDO::FETCH_OBJ);
    // print_r($fabricante);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos del fabricante:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="nombre_fabricante" required 
                            value="<?php echo $fabricante->nombre_fabricante; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos: </label>
                        <input type="text" class="form-control" name="apellidos" required
                            value="<?php echo $fabricante->apellidos; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección: </label>
                        <input type="text" class="form-control" name="direccion" required
                            value="<?php echo $fabricante->direccion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Piezas vendidas: </label>
                        <input type="text" class="form-control" name="piez_vendidas" required
                        value="<?php echo $fabricante->piez_vendidas; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono: </label>
                        <input type="text" class="form-control" name="telefono" required
                            value="<?php echo $fabricante->telefono; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Instrumento fabricado: </label>
                        <input type="text" class="form-control" name="instrumento_fabricado" required
                            value="<?php echo $fabricante->instrumento_fabricado; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sucursal donde trabaja: </label>
                        <input type="text" class="form-control" name="sucursal_trabaja" required
                            value="<?php echo $fabricante->sucursal_trabaja; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $fabricante->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
   <br> 
</div>
<br>
<?php include 'footer.php'; ?>
