<script>
    function eliminar(id){
        let text = "¿Está seguro de que quieres eliminar?";
        if (confirm(text) == true) {
            document.location="../../modelos/usuario_delete.php?id="+id;
        } else {
            alert("Elemento no eliminado");
        }
    }  

    function editar(id){
        document.location="../../vistas/ADMIN/Editar_USUARIO.php?id="+id; 
    }  
    
    function editarPass(id){
        document.location="../../vistas/ADMIN/Editar_USUARIO_pass.php?id="+id; 
    }  

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

<script>
// Espera a que el DOM esté completamente cargado
window.onload = function() {
   // Gráfico de Barras (Bar Chart)
   var ctxBar = document.getElementById('barChart').getContext('2d');
   
   var barChart = new Chart(ctxBar, {
       type: 'bar',
       data: {
           labels: ['Informática', 'Informática', 'Informática', 'Informática', 'Informática', 'Informática'],
           datasets: [{
               label: 'usuario',
               data: [20, 38, 27, 50, 13, 55],
               backgroundColor: '#1E90FF',  // Azul brillante para el fondo de las barras
               borderColor: '#4682B4',      // Azul más oscuro para el borde
               borderWidth: 1
           }]
       },
       options: {
           responsive: true,
           maintainAspectRatio: false,  // Esto permite que el gráfico se ajuste al tamaño del contenedor
           scales: {
               y: {
                   beginAtZero: true
               }
           }
       }
   });
}
</script>