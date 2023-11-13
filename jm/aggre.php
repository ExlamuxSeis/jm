<?php
require 'conexion.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
$nombre = $_SESSION['nombre'];
$tipo_usuario = $_SESSION['rol'];
?>


<?php if($tipo_usuario == 1 || $tipo_usuario == 2) { ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/kuromi.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Joss & Manu</title>
</head>
<body>
</body>
</html>
        <!--Inicia el header-->
        <header>
            <!-- Topbar Start -->
            <div class="container-fluid text-light p-0" id="TopbarStar">
                <div class="container ">
                    <div class="row gx-0 d-none d-lg-flex">
                        <div class="col-lg-3 text-start">
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="h-100 d-inline-flex align-items-center me-4">
                                <small>
                                    <script>
                                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                                        var f = new Date();
                                        document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                    </script>
                                </small>
                            </div>
                        </div>
                        <div class="col-lg-6 px-5 text-end">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar End -->
        </header>
        <!--Aquí termina el header-->

        <!--Inicia el menú de navegación-->
        <nav>
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <a href="jm.php">
                            <img src="img/kuromi.png" alt="" width="40" style="margin-right: 10px;">
                        </a>
                        <a class="navbar-brand" id="nombrePrimaria" style="color: white;" href="jm.php"> Joss & Manu</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item" id="botonNav">
                                    <a class="nav-link active" id="navegacion" style="color: white;" aria-current="page" href="aggre.php">
                                        Agregar un recordatorio
                                    </a>
                                </li>
                                <li class="nav-item" id="botonNav">
                                    <a class="nav-link" style="color: white;" id="navegacion" href="ver.php">
                                        Ver recordatorios
                                    </a>
                                </li><li class="nav-item dropdown" id="botonNav">
                                    <a class="nav-link dropdown-toggle show.bs.dropdown" id="navegacion" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" style="color: white;" aria-expanded="false">
                                    <img src="img/gear-wide-connected.svg" alt="" class="avatar img-fluid rounded-circle me-1" style="fill: #FFF;">
                                    <span><?php if($tipo_usuario == 1){echo "Manu";}else{echo "Joss";} ?></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li>
                                            <a class="btn btn-success dropdown-item" id="salir" href="salir.php">Salir de la sesión</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </nav>
        <!--Aquí termina el menú de navegación-->

        <!--Aquí comienza el main-->
        <div class="container">
            <h1>Agregar un recordatorio</h1>
            <div class="container mt-5">
        <h1>Para <?php if($tipo_usuario == 1){echo "Joss";} else{ echo "Manu";} ?></h1>
        <form method="post" action="enviar.php">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" disabled value="<?php if($tipo_usuario == 1){echo "Manu";} else{ echo "Joss";} ?>">
            </div>
            <div class="mb-3">
                <label for="texto" class="form-label">Texto:</label>
                <textarea class="form-control" required id="texto" name="texto" rows="2" placeholder="Escribe tu texto"></textarea>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" required id="fecha" name="fecha">
            </div>
            <button type="submit" class="btn btn-dark">Enviar</button>
        </form>
    </div>
        </div>

                <!--Aquí comienza el aside-->
                <!--Aquí termina el aside-->
            </div>
        </main>
        <!--Aquí termina el main-->

        <!--Inicia el footer-->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-secondary border-top">
            <div class="col-md-6 d-flex align-items-center">
                <span class="mb-3 mb-md-0 text-muted">&copy; J & M</span>
            </div>
            <div class="col-md-2"></div>
        </footer>
    </div>
        <!--Aquí termina el footer-->

        <!--Scripts de JavaScript-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootbox.js"></script>
<?php
}
?>