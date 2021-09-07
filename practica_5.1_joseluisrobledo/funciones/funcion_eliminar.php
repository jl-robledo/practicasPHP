<?php 

include "../conexion.php";


// lo mandamos a traves de la URL
$id = $_GET['id'];

//consulta para eliminar el registro
$eliminar ="DELETE FROM Productos WHERE Id = '$id'";

//ejecutamos la consulta
$resultadoEliminar = mysqli_query($conexion, $eliminar);

if ($resultadoEliminar){
    // Saludo de todo correcto y nos lleva a la lista de productos
    echo "<script>alert('Producto Eliminado:  $nombre '); </script>";
    header("Location: ../index.php");
                
    } else {
        // Aviso de fallo en la actualizacion y nos lleva a la pagina anterior para intentarlo de nuevo
        echo "<script>alert('Eliminacion fallida. Vuelva a intentarlo.'); window.history.go(-1); </script>";
    }

?>