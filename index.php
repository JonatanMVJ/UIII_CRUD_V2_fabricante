<?php include 'header.php' ?>

<?php
    include_once "conexion.php";
    $sentencia = $bd->query("SELECT * FROM fabricante");
    $fabricante = $sentencia->fetchAll(PDO::FETCH_OBJ);
    // print_r($fabricante);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de fabricantes
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">apellidos</th>
                                <th scope="col">direccion</th>
                                <th scope="col">piezas vendidas</th>
                                <th scope="col">telefono</th>
                                <th scope="col">instrumento fabricado</th>
                                <th scope="col">sucursal donde trabaja</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($fabricante as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->nombre_fabricante; ?></td>
                                <td><?php echo $dato->apellidos; ?></td>
                                <td><?php echo $dato->direccion; ?></td>
                                <td><?php echo $dato->piez_vendidas; ?></td>
                                <td><?php echo $dato->telefono; ?></td>
                                <td><?php echo $dato->instrumento_fabricado; ?></td>
                                <td><?php echo $dato->sucursal_trabaja; ?></td>
                                <td><a class="text-success" href="editar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos del fabricante:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre del fabricante: </label>
                        <input type="text" class="form-control" name="nombre_fabricante" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">apellidos : </label>
                        <input type="text" class="form-control" name="apellidos" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">direccion: </label>
                        <input type="text" class="form-control" name="direccion" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">piezas vendidas: </label>
                        <input type="text" class="form-control" name="piez_vendidas" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">telefono: </label>
                        <input type="tel" class="form-control" name="telefono" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">instrumento fabricado: </label>
                        <input type="text" class="form-control" name="instrumento_fabricado" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">sucursal donde trabaja: </label>
                        <input type="text" class="form-control" name="sucursal_trabaja" autofocus >
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<?php include 'footer.php' ?>