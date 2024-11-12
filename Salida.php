<?php
 ?>
<?php include_once "encabezado.php" ?>
<?php
include_once "funciones.php";
$salidas = obtenerSalida();
?>

<div class="columns is-centered mt-5">
    <div class="column is-three-quarters">
        <h2 class="title has-text-centered is-size-2">Control de salidas</h2>
        <div class="has-text-right mb-4">
            <a class="button is-warning" href="Agregar_salida.php">Agregar&nbsp;<i class="fa fa-plus"></i></a>
        </div>
        <table class="table is-bordered is-striped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Hora</th>
                    <th>Fecha</th>
                    <th>DPI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salidas as $salida) { ?>
                    <tr>
                        <td><?php echo $salida->CodSalida ?></td>
                        <td><?php echo $salida->Hora ?></td>
                        <td><?php echo $salida->Fecha ?></td>
                        <td><?php echo $salida->DPI ?></td>
                        <td><?php echo $salida->Nombre?></td>
                        <td><?php echo $salida->Apellido?></td>
                        <td>
                            <a href="editar_salida.php?CodSalida=<?php echo $salida->CodSalida?>" class="button is-info">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="eliminar_salida.php" method="post">
                                <input type="hidden" name="CodSalida" value="<?php echo $salida->CodSalida ?>">
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
<?php include_once "pie.php" ?>