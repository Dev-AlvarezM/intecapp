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
    <link rel="stylesheet" href="../../wwwroot/css/principal.css">
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