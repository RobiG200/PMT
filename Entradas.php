<?php include_once "encabezado.php" ?>
<?php
include_once "funciones.php";
$entradas = obtenerEntrada();
?>

<div class="columns is-centered mt-5">
    <div class="column is-three-quarters">
        <h2 class="title has-text-centered is-size-2">Control de entrada</h2>
        <div class="has-text-right mb-4">
            <a class="button is-warning" href="Agregar_entrada.php">Agregar&nbsp;<i class="fa fa-plus"></i></a>
        </div>
        <table class="table is-bordered is-striped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Hora</th>
                    <th>Fecha</th>
                    <th>DPI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Editar</th> <!-- Agregar columna de editar -->
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entradas as $entrada) { ?>
                    <tr>
                        <td><?php echo $entrada->CodEntrada ?></td>
                        <td><?php echo $entrada->Hora ?></td>
                        <td><?php echo $entrada->Fecha ?></td>
                        <td><?php echo $entrada->DPI ?></td>
                        <td><?php echo $entrada->Nombre ?></td>
                        <td><?php echo $entrada->Apellido ?></td>
                        <td>
                            <a href="editar_entrada.php?CodEntrada=<?php echo $entrada->CodEntrada ?>" class="button is-info">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="eliminar_entrada.php" method="post">
                                <input type="hidden" name="CodEntrada" value="<?php echo $entrada->CodEntrada ?>">
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