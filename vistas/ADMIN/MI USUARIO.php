<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>

<body style="background-color: #f0f0f0; color: #333; font-family: Arial, sans-serif; text-align: center;">
    <div style="width: 50%; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color: #007bff;">Mi Usuario</h3><br>
        <form action="#" method="post" style="text-align: left;">
            <center>
                <p>
                    <label for="nombre" style="color: #000000;">
                        <i class="fas fa-user"></i> Nombre<br>
                        <H5> <?php echo $user['nombre']; ?> </H5>
                    </label><br>
                </p>
                <p>
                    <label for="nombre" style="color: #000000;">
                        <i class="fas fa-user-circle"></i> Usuario<br>
                        <H5> <?php echo $user['nom_usuario']; ?> </H5>
                    </label>
                </p><br>
                <p>
                    <label for="nombre" style="color: #000000;">
                        <i class="fas fa-map-marker-alt"></i> Dirección<br>
                        <H5> <?php echo $user['direccion']; ?> </H5>
                    </label>
                </p><br>
                <p>
                    <label for="nombre" style="color: #000000;">
                        <i class="fas fa-briefcase"></i> Cargo<br>
                        <H5> <?php echo $user['cargo']; ?> </H5>
                    </label>
                </p><br>
                <p>
                    <label for="nombre" style="color: #000000;">
                        <i class="fas fa-check-circle"></i> Estado<br>
                        <H5> <?php echo $user['estado']; ?></H5>
                    </label><br><br>
                </p>
                
                
    <!-- Pie de página -->
    <footer>
        <p>&copy; INTECAP, QUICHÉ</p>
    </footer>
</div><!-- .main-container -->
<?php include 'footer.php'; ?>
</div><!-- .main-container -->
<!--Samayoa-->
    <!-- jQuery y Bootstrap JS (importante para el menú desplegable) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>