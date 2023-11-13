<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'conexion.php';

session_start();

    if ($_POST) {

        $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
        $password = mysqli_real_escape_string($conn, $_POST['passwor']);

        $stmt = $conn->prepare("SELECT id, password, nombre, rol FROM usuarios WHERE nombre = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();

        // Vincula las columnas del resultado a las variables
        $stmt->bind_result($id, $password_bd, $nombre, $tipo_usuario);

        if ($stmt->fetch()) { // Si hay resultados, fetch() los obtendrá y llenará las variables anteriores
            $pass_c = sha1($password);

            if ($password_bd == $pass_c) {
                $_SESSION['id'] = $id;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['rol'] = $tipo_usuario;
                header("Location: jm.php");
            } else {
                echo '<script> setTimeout(function() { bootbox.alert({title: "Usuario o contraseña incorrecta",message:"Ingrese el usuario y contraseña correcta", centerVertical: true, size: "medium"}); }, 100);</script>';
            }
        } else {
            echo '<script> setTimeout(function() { bootbox.alert({title:"Usuario o contraseña incorrecta",message:"Ingrese el usuario y contraseña correcta", centerVertical: true, size: "med"}); }, 100);</script>';
        }

        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/kuromi.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Joss & Manu</title>
</head>

<body>
    <!--Inicia el header-->
    <!--Aquí termina el header-->

    <!--Inicia el menú de navegación-->
    <!--Aquí termina el menú de navegación-->

    <!--Aquí comienza el main-->
    <main class="container" style="margin-top: 20px;">
        <div class="row g-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card my-5">

                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> " class="card-body cardbody-color p-lg-5 needs-validation" novalidate>

                                <div class="text-center">
                                    <img src="img/kuromi.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                                </div>

                                <div class="mb-3">
                                    <input type="text" class="form-control" id="usuario validationCustom01" required name="usuario"  aria-describedby="emailHelp" placeholder="Nombre de usuario">
                                    <div class="invalid-feedback">
                                        Debe de ingresar un usuario
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="passwor" required id="passwor validationCustom02" placeholder="Contraseña">
                                    <div class="invalid-feedback">
                                        Debe de ingresar una contraseña
                                    </div>
                                </div>
                                <div class="text-center"><button type="submit" class="btn-color btn-primary btn px-5 mb-5 w-100">Iniciar Sesión</button></div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!--Aquí comienza el aside-->
            <!--Aquí termina el aside-->
        </div>
    </main>
    <!--Aquí termina el main-->

    <!--Inicia el footer-->
    <!--Aquí termina el footer-->

    <!--Scripts de JavaScript-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootbox.js"></script>
    <script src="js/login.js"></script>
</body>

</html>

<?php
mysqli_close($conn);
?>