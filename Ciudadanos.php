<?php include_once "encabezado.php"; ?>
<?php
include_once "funciones.php";
$ciudadanos = obtenerCiudadano();
?>

<div class="columns is-centered mt-5">
    <div class="column is-three-quarters">
        <h2 class="title has-text-centered is-size-2">Registros de ciudadano</h2>
        <div class="has-text-right mb-4">
            <a class="button is-warning" href="AgregarCiudadano.php">Agregar&nbsp;<i class="fa fa-plus"></i></a>
        </div>
        <table class="table is-bordered is-striped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>DPI</th>
                    <th>Nombre</th>
                    <th>No. Tarjeta</th>
                    <th>No. Placa</th>
                    <th>Descripción Auto</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ciudadanos as $ciudadano) { ?>
                    <tr>
                        <td><?php echo $ciudadano->DpiCiudadano ?></td>
                        <td><?php echo $ciudadano->Nombre ?></td>
                        <td><?php echo $ciudadano->TarjetaCirculacion ?></td>
                        <td><?php echo $ciudadano->NoPlaca ?></td>
                        <td><?php echo $ciudadano->DescripcionCarro ?></td>
                        <td>
                            <!-- Botón de edición que redirige al formulario de edición -->
                            <a href="editar_ciudadano.php?DpiCiudadano=<?php echo $ciudadano->DpiCiudadano ?>" class="button is-info">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="eliminar_ciudadano.php" method="post">
                                <input type="hidden" name="DpiCiudadano" value="<?php echo $ciudadano->DpiCiudadano ?>">
                                <button class="button is-danger">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once "pie.php"; ?>