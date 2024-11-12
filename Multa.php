<?php include_once "encabezado.php"; ?>
<?php
include_once "funciones.php";

// Verificar si se ha enviado un DPI para filtrar las multas
$dpiBuscado = isset($_POST['dpi']) ? $_POST['dpi'] : '';
$tipoMultaBuscado = isset($_POST['tipo_multa']) ? $_POST['tipo_multa'] : '';
$multas = obtenerMultas($dpiBuscado, $tipoMultaBuscado);
$tiposMulta = obtenerTiposMulta();
?>

<div class="columns is-centered mt-5">
    <div class="column is-three-quarters">
        <h2 class="title has-text-centered is-size-2">Registro y control de Multas</h2>
        
        <!-- Formulario de búsqueda -->
        <div class="has-text-right mb-4">
            
           <form action="" method="post">
    <div class="field has-addons">
        <!-- Campo para buscar por DPI -->
        <div class="control">
            <input class="input" type="text" name="dpi" placeholder="Buscar por DPI" value="<?php echo htmlspecialchars($dpiBuscado); ?>">
        </div>

        <!-- Campo para seleccionar Tipo de Multa -->
        <div class="control">
            <div class="select">
                <select name="tipo_multa">
                    <option value="">Buscar por Tipo de Multa</option>
                    <?php foreach ($tiposMulta as $tipo) { ?>
                        <option value="<?php echo $tipo->CodTipoMulta; ?>" <?php echo ($tipo->CodTipoMulta == $tipoMultaBuscado) ? 'selected' : ''; ?>>
                            <?php echo $tipo->Descripcion; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <!-- Botón de búsqueda -->
        <div class="control">
            <button class="button is-info">Buscar</button>
        </div>
    </div>
</form>
            <a class="button is-warning" href="Agregar_registro_de_multa.php">Agregar Registro&nbsp;<i class="fa fa-plus"></i></a>
        </div>

        <table class="table is-bordered is-striped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Monto multa</th>
                    <th>Tipo de multa</th>
                    <th>Descripcion</th>
                    <th>DPI</th>
                    <th>Nombre de ciudadano</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($multas as $multa) { ?>
                    <tr>
                        <td><?php echo $multa->CodMulta ?></td>
                        <td>Q<?php echo $multa->MontoMulta ?></td>
                        <td><?php echo $multa->NMulta?></td>
                        <td><?php echo $multa->DescripcionMulta ?></td>
                        <td><?php echo $multa->DpiCiudadano ?></td>
                        <td><?php echo $multa->Nombre ?></td>
                        <td>
                            <a href="editar_multa.php?CodMulta=<?php echo $multa->CodMulta ?>" class="button is-info">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="eliminar_Multa.php" method="post">
                                <input type="hidden" name="CodMulta" value="<?php echo $multa->CodMulta ?>">
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