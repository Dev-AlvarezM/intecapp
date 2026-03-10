<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperacion</title>
    <link href="../ADMIN/img/intecap.png" rel="icon" type="image/png">
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
        }

        .form-control {
            border: 1px solid #ddd; /* Borde sutil para los campos de entrada */
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            width: 100%; /* Ocupa el ancho completo del contenedor */
            margin-bottom: 15px; /* Espaciado entre campos */
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

        .btn-primary:hover {
            opacity: 0.9; /* Efecto de hover para el botón */
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
                    <h2 class="text-center">Recuperar Contraseña</h2>
                    <form action="../../modelos/pass_olvidada.php" method="post" style="text-align: left;">
                        <div class="mb-3">
                            <label for="new-password" class="form-label">Usuario:</label>
                            <input type="text" id="nom_usuario" name="nom_usuario" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="new-password" class="form-label">Nueva Contraseña:</label>
                            <input type="password" id="contraseña" name="contraseña" onkeyup="comparar();" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirmar Contraseña:</label>
                            <input type="password" id="contraseña1" name="contraseña1" onkeyup="comparar();" class="form-control" required>
                        </div>
                        
                        <style type="text/css">
                            .ocultar {
                                display: none;
                            }

                            .mostrar {
                                display: block;
                            }
                        </style>

                        <div class="mb-3">
                            <div id="error" class="alert alert-danger ocultar" role="alert">
                                Las Contraseñas no coinciden! <br><br>
                            </div>
                        </div>
                        <button type="submit" class = "btn btn-primary" name="add" id="add" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #0368d3; color: white; 
                            font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="add" id="add">
                            <i class="fa fa-save"></i> Cambiar Contraseña
                        </button>

                        <button type="button" class="btn btn-primary" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #555555; color: white; 
                            font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="exit" id="exit" onclick="window.location.href='../../index.php'">              
                            <i class="fa fa-sign-out"></i> <i class="fa fa-arrow-right"></i> Cancelar
                        </button><br><br><br>
                        
                    </form>
                </div>
            </div>
        </div>
<!-- Footer con iconos -->
    <div class="footer-box">
        <a href="https://www.intecap.edu.gt/centros/centroquiche/" class="footer-icon" title="Navegación"><i class="fas fa-globe"></i></a>
        <a href="mailto:intecapquiche@intecap.edu.gt" class="footer-icon" title="Correo"><i class="fas fa-envelope"></i></a>
        <a href="https://www.youtube.com/user/intecapguate" class="footer-icon" title="YouTube"><i class="fab fa-youtube"></i></a>
        <a href="https://www.google.com/maps/dir//Leones,+Santa+Cruz+del+Quiché" class="footer-icon" title="Ubicación"><i class="fas fa-map-marker-alt"></i></a>
        <a href="https://x.com/intecapoficial" class="footer-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="https://www.facebook.com/intecapoficial/" class="footer-icon" title="Facebook"><i class="fab fa-facebook"></i></a>
        <a href="https://www.instagram.com/intecapoficial/" class="footer-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="https://gt.linkedin.com/school/intecapoficial/" class="footer-icon" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
        <a href="https://web.whatsapp.com/" class="footer-icon" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
    </div>

        <footer>
            Centro de capacitación, Quiché © Intecap
        </footer>
    </div>

</body>
</html>
<script>
    function comparar() {
        pass1 = document.getElementById('contraseña').value;
        pass2 = document.getElementById('contraseña1').value;

        if (pass1 != pass2) {
            document.getElementById("error").classList.add("mostrar");
            document.getElementById("add").disabled = true;
        }else {
            document.getElementById("error").classList.remove("mostrar");
            document.getElementById("add").disabled = false;
        }
    }
</script>
