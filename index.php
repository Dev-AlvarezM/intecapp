<?php
  session_start();
  if(isset($_SESSION['admin_intecap'])){
    header('location:vistas/ADMIN/principal.php');
  }
  
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="vistas/ADMIN/img/intecap.png" rel="icon" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ffffff; /* Color de fondo opcional */
        }

        .container {
            width: 80vw; /* Ancho fijo para centrar el contenido */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header, footer {
            width: 100%; /* Reducido al 70% del ancho del contenedor principal */
            background-color: #007bff;
            padding: 10px 0;
            text-align: center;
            color: white;
            font-size: 24px;
            border-radius: 10px;
            margin: 10px 0; /* Espaciado vertical opcional */
        }

        .video-container {
            position: relative;
            width: 100%; /* Ancho completo del contenedor */
            height: 70vh; /* 70% de la altura de la pantalla */
            overflow: hidden;
            border: 2px solid #acafb3; /* Opcional: Bordes para el video */
            border-radius: 10px; /* Bordes redondeados */
            margin: 20px 0; /* Espaciado vertical */
        }

        video {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ajusta el video al contenedor sin distorsionar */
        }

        .custom-form-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            max-width: 300px; /* Limita el ancho máximo del formulario */
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd; /* Agrega un borde sutil */
        }

        .custom-form {
            margin: 0;
        }

        .form-label {
            color: #007bff;
            font-weight: bold; /* Hace que el texto sea más visible */
            display: flex;
            align-items: center;
        }

        .form-label i {
            margin-right: 10px; /* Espacio entre el ícono y el texto */
        }

        .form-control {
            border: 1px solid #ddd; /* Borde sutil para los campos de entrada */
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            width: 100%; /* Ocupa el ancho completo del contenedor */
            margin-bottom: 15px; /* Espaciado entre campos */
            padding-left: 35px; /* Espacio para el ícono */
            box-sizing: border-box; /* Asegura que el padding no haga que el campo sea más ancho que el contenedor */
        }

        .form-control-password {
            position: relative;
        }

        .form-control-password i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
        }

        .btn-secondary {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-primary:hover, .btn-secondary:hover {
            opacity: 0.9; /* Efecto de hover para los botones */
        }

        .forgot-password {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
        
        .message {
            font-size: 18px;
            color: #007bff;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .message i {
            margin-right: 10px; /* Espacio entre el ícono y el texto */
            color: #ff0000; /* Color del ícono */
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            Intecap
        </header>

        <div class="video-container">
            <video autoplay muted>
                <source src="video.mp4" type="video/mp4">
                Tu navegador no soporta la etiqueta de video.
            </video>

            <div class="custom-form-container">
                <div class="custom-form">
                    <h2 class="text-center">Inicio de Sesión</h2>
                    <form action="modelos/login.php" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">
                                <i class="fa-solid fa-user"></i>
                                Usuario:
                            </label>
                            <input type="text" id="nom_usuario" name="nom_usuario" class="form-control" required>
                        </div>
                        <div class="mb-3 form-control-password">
                            <label for="password" class="form-label">
                                <i class="fa-solid fa-lock"></i>
                                Contraseña:
                            </label>
                            <input type="password" id="contraseña" name="contraseña" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class = "btn btn-primary" name="login" id="login">Ingresar</button>
                            <input type="reset" value="Limpiar" class="btn btn-secondary">
                        </div>

                    </form>
                </div> <br>
                <?php
                    if(isset($_SESSION['error'])){
                    echo "
                    <div class='message'>
                        <i class='fa-solid fa-triangle-exclamation'></i>
                        ".$_SESSION['error']." 
                    </div> ";

                    unset($_SESSION['error']);
                    }
                ?>
                        <div class="forgot-password">
                            <a href="vistas/LOGIN/recuperacion de contraseña.php">¿Olvidaste tu contraseña?</a>
                        </div>
            </div>
        </div>
        
        <footer>
            Centro de capacitación, Quiché © Intecap
        </footer>
    </div>

</body>
</html>
