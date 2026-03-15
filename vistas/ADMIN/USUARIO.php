<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>

<h1>Usuario</h1>

<div class="container-fluid">

    <div class="mb-3 text-right">
        <?php if ($user['cargo'] == "Admin") { ?>
            <a href="../ADMIN/AGREGAR USUARIO.php" 
               class="btn btn-primary" 
               style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white;
                      font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;">
                <i class="fa fa-user-plus"></i> Agregar
            </a>
        <?php } ?>
    </div>

    <table id="table-edit" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Cargo</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php include('listas/usuario_list.php'); ?>
        </tbody>
    </table>

</div>

<footer>
    <p>&copy; INTECAP, QUICHÉ</p>
</footer>

<?php include 'footer.php'; ?>
<?php include '../../controladores/usuario.php'; ?>

</div><!-- .main-container -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>