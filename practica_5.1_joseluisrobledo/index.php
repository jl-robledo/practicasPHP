<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LISTADO DE PRODUCTOS</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos-formulario2.css">

</head>
<body> 
    <main>
    <div class="contenedor-barra">
        <h2 class="label__form">Edicion Base de Datos de Productos</h2>
    </div>
    <!-- FORMULARIO DE INSERTAR PRODUCTO -->
    <?php
        include "formularios/formulario_insertar.php";
    ?>
     


    <!-- FORMULARIO DE BUSCADOR PRODUCTO, MOSTRAR PRODUCTOS TOTALES O EL RESULTADO DE LAS BUSQUEDAS -->
    <?php
        include "buscar_producto.php";
    ?>

    


    </main> 
    <!-- añado el script para que nos salga la confirmacion -->
    <script src="js/confirmacion.js"></script>
   
</body>
</html>