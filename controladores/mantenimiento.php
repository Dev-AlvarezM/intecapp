<script type="text/javascript" 
    src="../vistas/ADMIN/js/push.min.js">
</script>

<script>
    function eliminar(id){
        let text = "¿Está seguro de que quieres eliminar?";
        if (confirm(text) == true) {
            document.location="../../modelos/mantenimiento_delete.php?id="+id;
        } else {
            alert("Elemento no eliminado");
        }
    }  

    function editar(id){
        document.location="../../vistas/ADMIN/Editar_MANTENIMIENTO.php?id="+id;    
    }   
    
    function comentario(id){
        document.location="../../vistas/ADMIN/COMENTARIOS.php?id="+id;    
    } 

    function push(){

        Push.Permission.request();

        Push.create('Mantenimiento nuevo', {

            body: 'Se ha ingresado un nuevo mantenimiento',

            icon: "../vistas/ADMIN/img/intecap.png",

            timeout: 1500000,              

            vibrate: [100, 100, 100],    

            onClick: function() {

                window.location="https://spacedeveolopers.com";

            }  

        });

    }
</script>
