<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>

<link rel="stylesheet" href="/intecapp/wwwroot/css/MI_USUARIO.css">
<link rel="stylesheet" href="css/tema.css">

<body>
    <div class="form-container">
        <br>
        <h3 class="titulo-perfil">Mi Usuario</h3>
        <br>

        <form action="#" method="post">
            <div style="text-align: center;">
                <p>
                    <img src="<?php echo $user['foto']; ?>" alt="Foto de <?php echo htmlspecialchars($user['nombre']); ?>" class="foto-usuario">
                </p>

                <br>

                <p class="dato-label">
                    <i class="fas fa-user"></i> Nombre<br>
                    <h5 class="dato-valor"><?php echo $user['nombre']; ?></h5>
                </p>
                <br>

                <p class="dato-label">
                    <i class="fas fa-user-circle"></i> Usuario<br>
                    <h5 class="dato-valor"><?php echo $user['nom_usuario']; ?></h5>
                </p>
                <br>

                <p class="dato-label">
                    <i class="fas fa-mobile-alt"></i> Teléfono<br>
                    <h5 class="dato-valor"><?php echo $user['telefono']; ?></h5>
                </p>
                <br>
                
                <p class="dato-label">
                    <i class="fas fa-graduation-cap"></i> Área de Especialización<br>
                    <h5 class="dato-valor"><?php echo $user['area_especializacion']; ?></h5>
                </p>
                <br>

                <p class="dato-label">
                    <i class="fas fa-briefcase"></i> Cargo<br>
                    <h5 class="dato-valor"><?php echo $user['cargo']; ?></h5>
                </p>
                <br>

                <p class="dato-label">
                    <i class="fas fa-check-circle"></i> Estado<br>
                    <h5 class="dato-valor"><?php echo $user['estado']; ?></h5>
                </p>
                <br>

            </div>
        </form>
        <button id="btn-cambiar-tema" class="btn-tema">🌙 Oscuro</button>

        <footer>
            <p>&copy; INTECAP, QUICHÉ</p>
        </footer>
    </div>
    <br><br><br>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>