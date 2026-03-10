<?php include '../../controladores/session.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>INTECAP</title>

    <!-- Favicon e iconos -->
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon.144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon.114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon.72x72.png">
    <link rel="apple-touch-icon" href="img/favicon.57x57.png">
    <link href="img/intecap.png" rel="icon" type="image/png">
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" href="css/lib/lobipanel/lobipanel.min.css">
    <link rel="stylesheet" href="css/separate/vendor/lobipanel.min.css">
    <link rel="stylesheet" href="css/lib/jqueryui/jquery-ui.min.css">
    <link rel="stylesheet" href="css/separate/pages/widgets.min.css">
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/separate/pages/tasks.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
        }

        .main-container {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        /* Encabezado */
        .site-header {
            position: relative;
            background-color: #f8f9fa;
            padding: 10px 0;
        }

        .site-header .container-fluid {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .site-logo img {
            max-height: 50px;
        }

        .user-menu {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        h4.portal-servicios {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin: 30px 0 10px;
            color: #000;
        }

        /* Recuadro gris principal */ss
        .content-box {
            width: 85%;
            margin: 40px auto 90px auto; /* Espacio entre encabezado y recuadro */
            padding: 70px;
            background-color: #f4f4f4;
            border: 2px solid #e2e2e2;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0px;
            position: relative;
        }

        /* Sección de iconos en esquina superior derecha */
        .icon-section {
            position: absolute;
            top: 90px;
            right: 50px;
            display: flex;
            gap: 20px;
        }

        .icon-text {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .icon-text i {
            font-size: 2rem;
            color: #000;
            transition: color 0.3s ease;
        }

        .icon-text i:hover {
            color: rgb(17, 52, 252);
        }

        .icon-text h3 {
            font-size: 1rem;
            margin-top: 10px;
            color: #000;
            transition: color 0.3s ease;
        }

        .icon-text i:hover + h3 {
            color:rgb(17, 52, 252);
        }

        /* Tarjetas */
        .tasks-grid-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 0 20px;
            margin-top: 60px;
        }

        .tasks-grid-col {
            width: 240px;
            display: flex;
            justify-content: center;
        }

        .sortable {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .box-typical {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .task-card-photo img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .task-card-in {
            padding: 15px;
        }

        .task-card-title a {
            font-size: 18px;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            display: block;
            margin-top: 10px;
            transition: color 0.3s;
        }

        .task-card-title a:hover {
            color:rgb(17, 52, 252);
        }

        .task-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* Asegura que el body y html ocupen toda la altura */
html {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
}

/* Contenedor principal de tu contenido */
.main-container {
    flex: 1;
}

/* Footer permanece al fondo */
.content-box {
    flex: 1; /* Hace que esta caja crezca y empuje el footer abajo */
}

footer {
    background-color: #ffffff;
    color: #333;
    padding: 10px 0;
    text-align: center;
    box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
}

    </style>
</head>

<body class="with-side-menu-compact">

<div class="main-container">
    <!-- Encabezado -->
    <header class="site-header">
        <div class="container-fluid">
            <a href="#" class="site-logo">
                <img class="hidden-md-down" src="img/intecap.png" alt="Logo">
            </a>
        </div>
        <div class="dropdown user-menu">
            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="img/perfil.png" alt="Perfil" class="user-avatar">
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                <a class="dropdown-item" href="../../controladores/logout.php">
                    <span class="font-icon fa fa-arrow-right"></span> Cerrar sesión
                </a>
            </div>
        </div>
    </header>
    <br><br>
    <!-- Contenido principal -->
<h4 class="portal-servicios">Portal de Servicios</h4>
        <div class="content-box">
        
        <!-- Iconos en esquina superior derecha -->
        <div class="icon-section">
    <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor") { ?>
        <div class="icon-text">
            <a href="../ADMIN/ASISTENCIA.php">
                <i class="fas fa-file-alt"></i>
            </a> 
            <h3>Asistencia</h3>
        </div>
    <?php } ?>

    <div class="icon-text">
        <a href="../ADMIN/MI USUARIO.php">
            <i class="fas fa-user"></i>
        </a> 
        <h3>Usuario</h3>
    </div>
</div><br>
        <!-- Módulos -->
        <div class="tasks-grid-container">
            <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor") { ?>
            <div class="tasks-grid-col">
                <div class="sortable">
                    <section class="box-typical task-card task">
                        <div class="task-card-photo">
                            <img src="img/talleres.jpg" alt="Task Image">
                        </div>
                        <div class="task-card-in">
                            <div class="task-card-title">
                                <a href="../ADMIN/TALLERES.php">Talleres</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <?php } ?>

            <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor") { ?>
            <div class="tasks-grid-col">
                <div class="sortable">
                    <section class="box-typical task-card task">
                        <div class="task-card-photo">
                            <img src="img/eventos.jpg" alt="Task Image">
                        </div>
                        <div class="task-card-in">
                            <div class="task-card-title">
                                <a href="../ADMIN/EVENTOS.php">Eventos</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <?php } ?>
            <?php if ($user['cargo'] == "Admin" ) { ?>
            <div class="tasks-grid-col">
                <div class="sortable">
                    <section class="box-typical task-card task">
                        <div class="task-card-photo">
                            <img src="img/instructores.jpg" alt="Task Image">
                        </div>
                        <div class="task-card-in">
                            <div class="task-card-title">
                                <a href="../ADMIN/INSTRUCTORES.php">Instructores</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <?php } ?>

            <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Mantenimiento" || $user['cargo'] == "Instructor") { ?>
            <div class="tasks-grid-col">
                <div class="sortable">
                    <section class="box-typical task-card task">
                        <div class="task-card-photo">
                            <img src="img/mantenimiento.jpg" alt="Task Image">
                        </div>
                        <div class="task-card-in">
                            <div class="task-card-title">
                                <a href="../ADMIN/MANTENIMIENTO.php">Mantenimiento</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <footer>
        <p>&copy; INTECAP, QUICHÉ</p>
    </footer>
</div>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>