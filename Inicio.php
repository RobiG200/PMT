<?php
 ?>
<?php include_once "encabezado.php" ?>
<?php
include_once "funciones.php";
$policias = obtenerPolicia();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Elegante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar is-primary">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <h1 class="title has-text-white">Policia de transito de Palin</h1>
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero is-light is-medium">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">Bienvenidos a sitio de control de PMT Palin</h1>
                <p class="subtitle">Control de ingresos, personal y multas de transito</p>
            </div>
        </div>
    </section>

    <!-- Images Section -->
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <figure class="image is-4by3">
                        <img src="https://dca.gob.gt/noticias-guatemala-diario-centro-america/wp-content/uploads/2020/03/PMT-GUATEMALA.jpg" alt="Imagen 1">
                    </figure>
                </div>
                <div class="column">
                    <figure class="image is-4by3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbS_BDQeh01sQtGhhZDSkmyi5OeWYr9eCq6Q&s" alt="Imagen 2">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="content has-text-centered">
            <p>&copy; 2024 Mi Sitio Web. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>
<?php include_once "pie.php" ?>