<?php include_once "encabezado.php" ?>
<div class="columns is-centered mt-5">
    <div class="column is-half">
        <h2 class="title has-text-centered is-size-2">Agregar Nuevo Ciudadano</h2>
        <form action="guardar_ciudadano.php" method="post">
            <!-- Campo de DPI -->
            <div class="field">
                <label class="label" for="dpi">DPI</label>
                <div class="control">
                    <input required id="dpi" class="input" type="text" placeholder="DPI" name="dpi">
                </div>
            </div>
            <!-- Campo de Nombre -->
            <div class="field">
                <label class="label" for="nombre">Nombre</label>
                <div class="control">
                    <input required id="nombre" class="input" type="text" placeholder="Nombre" name="nombre">
                </div>
            </div>
            <!-- Campo de Tarjeta de Circulación -->
            <div class="field">
                <label class="label" for="tarjetaCirculacion">Tarjeta de Circulación</label>
                <div class="control">
                    <input required id="tarjetaCirculacion" class="input" type="text" placeholder="Tarjeta de Circulación" name="tarjetaCirculacion">
                </div>
            </div>
            <!-- Campo de No. de Placa -->
            <div class="field">
                <label class="label" for="noPlaca">No. de Placa</label>
                <div class="control">
                    <input required id="noPlaca" class="input" type="text" placeholder="Número de Placa" name="noPlaca">
                </div>
            </div>
            <!-- Campo de Descripción del Carro -->
            <div class="field">
                <label class="label" for="descripcionCarro">Descripción del Carro</label>
                <div class="control">
                    <textarea name="descripcionCarro" class="textarea" id="descripcionCarro" cols="30" rows="5" placeholder="Descripción del Carro" required></textarea>
                </div>
            </div>
            <!-- Botones -->
            <div class="field is-grouped is-grouped-centered">
                <div class="control">
                    <button class="button is-success">Guardar</button>
                </div>
                <div class="control">
                    <a href="Ciudadanos.php" class="button is-warning">Volver</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php" ?>