<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
</head>

<body>

    <nav class="navbar is-light" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item">
                <img alt="" src="images.png" style="max-height: 80px" />
            </a>
            <button class="navbar-burger is-warning button" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </button>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="Inicio.php">Inicio</a>

                <?php if ($_SESSION['rol'] === 'administrador'): ?>
                    <a class="navbar-item" href="Policia.php">Agentes</a>
                    <a class="navbar-item" href="Entradas.php">Entradas</a>
                    <a class="navbar-item" href="Salida.php">Salidas</a>
                <?php endif; ?>

                <!-- Opciones comunes para ambos roles -->
                <a class="navbar-item" href="Ciudadanos.php">Ciudadano</a>
                <a class="navbar-item" href="Multa.php">Multas</a>
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="index.php" class="btn btn-danger">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
            const boton = document.querySelector(".navbar-burger");
            const menu = document.querySelector(".navbar-menu");
            boton.onclick = () => {
                menu.classList.toggle("is-active");
                boton.classList.toggle("is-active");
            };
        });
    </script>

    <section class="section">
        <!-- Contenido de la página -->
    </section>

</body>

</html>