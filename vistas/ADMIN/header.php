<?php include '../../controladores/session.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>INTECAP</title>

    <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="img/intecap.png" rel="icon" type="image/png">
    <link href="img/favicon.ico" rel="shortcut icon">

    <link rel="stylesheet" href="css/lib/lobipanel/lobipanel.min.css">
    <link rel="stylesheet" href="css/separate/vendor/lobipanel.min.css">
    <link rel="stylesheet" href="css/lib/jqueryui/jquery-ui.min.css">
    <link rel="stylesheet" href="css/separate/pages/widgets.min.css">
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="img/favicon.png" rel="icon" type="image/png">
    <link href="img/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />

    <!--jQuery library file -->
    <script type="text/javascript" 
        src="https://code.jquery.com/jquery-3.7.1.js">
    </script>

    <!--Datatable plugin JS library file -->

    <script 
        src="js/dataTables.js">
    </script>
    
    <style>

        h1 {
            text-align: center; /* Centra el texto horizontalmente */
            font-size: 20px; /* Tamaño de fuente pequeño */
        }
        /* Asegura que el body ocupe toda la altura de la ventana */
        html, body {
            height: 100%;
            margin: 0;
        }

        /* Establece el contenedor principal como un contenedor flex */
        .main-container {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        
body {
      display: flex;
      flex-direction: column;
      min-height: 100vh; /* Altura mínima del viewport */
      margin: 0; /* Elimina el margen por defecto del body */
    }

        .site-header .container-fluid {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-menu {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .site-header {
            position: relative;
        }

        /* Estilo para separar la tabla del pie de página */
        .table {
            margin-bottom: 30px; /* Agrega espacio entre la tabla y el pie de página */
            width: 100%; /* Asegura que la tabla ocupe todo el ancho disponible */
            border-collapse: collapse; /* Mejora la visualización de las celdas */
        }

       /* Asegura que el body ocupe toda la altura de la ventana */
    html, body {
        height: 100%;
        margin: 0;
    }

    /* Establece el contenedor principal como un contenedor flex */
    .main-container {
        display: flex;
        flex-direction: column;
        min-height: 100%;
    }

  /* Estilo para la cabecera */
.site-header {
    position: relative;
    background-color: #f8f9fa; /* Color de fondo de la cabecera */
    padding: 10px 0; /* Padding ajustado */
}

.site-header .container-fluid {
    display: flex;
    align-items: center;
    justify-content: center; /* Centra el logo */
}

.site-logo {
    margin: 0; /* Elimina márgenes */
    padding: 0; /* Elimina relleno */
}

.site-logo img {
    max-height: 50px; /* Ajusta el tamaño máximo del logo */
}


    .user-menu {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
    }

    footer {
        position: fixed; /* Mantiene el pie de página fijo */
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #ffffff;
        color: #333;
        padding: 10px 0; /* Ajusta el tamaño del pie de página */
        text-align: center;
        box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
        display: flex; /* Usamos flexbox para centrar */
        justify-content: center; /* Centra el contenido horizontalmente */
        align-items: center; /* Centra el contenido verticalmente */
        height: 50px; /* Altura del pie de página */
        
    }
    
    footer a {
        color: #333;
        text-decoration: none;
        margin: 0 10px;
    }
    
    footer a:hover {
        text-decoration: underline;
    }
    
    /* Tablas*/
    .table {
        margin-bottom: 30px;
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 15px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .table tr:hover {
        background-color: #f5f5f5;
    }

    .table th {
        background-color: #f8f8f8;
        color: #333;
    }

    .btn-default {
        background-color: #f8f8f8;
        color: #333;
        style="display: inline-block; width: 120px; padding: 10px 0; background-color: #0368d3; color: white; 
        font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;"
    }
    </style>
</head>

    <script>
        /* Initialization of datatables */
        $(document).ready( function () {
            // Solo inicializar DataTable si la tabla existe en esta página
            if ($('#table-edit').length) {
                $('#table-edit').DataTable();
            }

                $("#autorizarNotificacion").on("click", function(){
        autorizarNotificacion();
    });
    $("#mostrarNotificacion").on("click", function(){
        mostrarNotifiacion();
    });

        } );

        function mostrarNotifiacion(){

        Push.create("Hola mundo",{
            body: "Este es el cuerpo de la notificacion",
            icon: "img/logo.png",
            timeout: 4000,
            onClick: function () {
                window.focus();
                this.close();
        }
    });

}

function autorizarNotificacion(){

    Push.Permission.request(onGranted, onDenied);

}

function onGranted(){

    $("#autorizarNotificacion").css("background-color", "green");

}

function onDenied(){

    $("#autorizarNotificacion").css("background-color", "red");

}


    </script>