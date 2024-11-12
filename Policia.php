<?php include_once "encabezado.php" ?>
<?php
include_once "funciones.php";
$policias = obtenerPolicia();
?>

<div class="columns is-centered mt-5">
    <div class="column is-three-quarters">
        <h2 class="title has-text-centered is-size-2">Registros de agentes</h2>
        <div class="has-text-right mb-4">
            <a class="button is-warning" href="agregar_policia.php">Agregar&nbsp;<i class="fa fa-plus"></i></a>
        </div>
        <table class="table is-bordered is-striped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>DPI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Direccion</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($policias as $policia) { ?>
                    <tr>
                        <td><?php echo $policia->DPI ?></td>
                        <td><?php echo $policia->Nombre ?></td>
                        <td><?php echo $policia->Apellido ?></td>
                        <td><?php echo $policia->Edad ?></td>
                        <td><?php echo $policia->Direccion ?></td>
                        <td>
                            <a href="editar_policia.php?DPI=<?php echo $policia->DPI ?>" class="button is-info">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="eliminar_policia.php" method="post">
                                <input type="hidden" name="id_policia" value="<?php echo $policia->DPI ?>">
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