<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>

<h1>Usuario</h1>

<div class="container-fluid">

    <div class="mb-3 d-flex justify-content-between align-items-center flex-wrap" style="gap:8px;">

        <?php if ($user['cargo'] == "Admin") { ?>
        <!-- Filtros por cargo -->
        <div style="display:flex; gap:6px; flex-wrap:wrap;">
            <button onclick="filtrarCargo('todos')" id="btn-todos"
                class="btn btn-sm btn-secondary filtro-btn active-filtro">
                <i class="fa fa-users"></i> Todos
            </button>
            <button onclick="filtrarCargo('Admin')" id="btn-Admin"
                class="btn btn-sm btn-secondary filtro-btn">
                <i class="fa fa-user-shield"></i> Administradores
            </button>
            <button onclick="filtrarCargo('Instructor')" id="btn-Instructor"
                class="btn btn-sm btn-secondary filtro-btn">
                <i class="fa fa-chalkboard-teacher"></i> Instructores
            </button>
            <button onclick="filtrarCargo('Mantenimiento')" id="btn-Mantenimiento"
                class="btn btn-sm btn-secondary filtro-btn">
                <i class="fa fa-tools"></i> Mantenimiento
            </button>
        </div>

        <!-- Botón agregar -->
        <a href="../ADMIN/AGREGAR USUARIO.php"
           class="btn btn-primary"
           style="width:120px; padding:10px 0; background-color:#007bff; color:white;
                  font-size:13px; font-family:'Times New Roman',serif; text-decoration:none;
                  border-radius:1px; text-align:center; display:inline-block;">
            <i class="fa fa-user-plus"></i> Agregar
        </a>
        <?php } ?>
    </div>

    <table id="table-edit" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Teléfono</th>
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

<style>
    .active-filtro {
        background-color: #007bff !important;
        color: white !important;
        border-color: #007bff !important;
    }
</style>

<script>
    function filtrarCargo(cargo) {
        document.querySelectorAll('.filtro-btn').forEach(function(btn) {
            btn.classList.remove('active-filtro');
        });
        document.getElementById('btn-' + cargo).classList.add('active-filtro');

        var filas = document.querySelectorAll('#table-edit tbody tr');
        filas.forEach(function(fila) {
            var celdaCargo = fila.cells[3]; // índice 3 porque ahora Foto es cells[0]
            if (!celdaCargo) return;
            var textoCargo = celdaCargo.textContent.trim();
            fila.style.display = (cargo === 'todos' || textoCargo === cargo) ? '' : 'none';
        });
    }
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>