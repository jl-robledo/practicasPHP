<?php 

    include "../conexion.php";

    if(!isset($_POST['busqueda'])){
        $_POST['busqueda'] = "";

        //Asignamos el valor de busqueda en vacio para que no de ningun error
        $busqueda = $_POST['busqueda'];

    }

    $busqueda = $_POST['busqueda'];

    $read = "SELECT * FROM Productos WHERE Nombre LIKE '%".$busqueda."%' OR 
                                            Descripcion LIKE '%".$busqueda."%' OR
                                            Formato LIKE '%".$busqueda."%' OR
                                            Precio LIKE '%".$busqueda."%'      
                                            ORDER BY Id ASC";

    
    $resultado = mysqli_query($conexion, $read);



    /*

    // mostrar todos los productos
    $read = "SELECT * FROM Productos ORDER BY Id ASC";

    $resultado = mysqli_query($conexion, $read);

    */

?>
