<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de usuarios nuevos</title>
    <link href="http://fonts.googleapis.com/css2?family=Roboto:wght;@400;700display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos-formulario.css">
</head>
<body>
    <main>

        <div class="mostrar__producto">
            <table class="mostrar__producto-tabla">
                <thead>
                    <tr>
                        <th><h1>Revistas:</h1></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Conectamos a la base de datos
                    include("conexion.php");
                    $query = "SELECT * FROM readingmaterial INNER JOIN magazine on readingmaterial.Id = magazine.Id_Rm";

                    $resultado = $conexion->query($query);

                    while ($fila = $resultado->fetch_assoc()){
                    // cierro php para abrir las celdas de la tabla        
                    ?>
                        <tr>
                            <td><?php echo "<b>Titulo:  " . $fila['Titulo'] . 
                                            "</b><br>Referencia:  " . $fila['Id'] . 
                                            "<br>Paginas:  " . $fila['Paginas'] . 
                                            "<br>Precio:  " . $fila['Precio'] . " €" . 
                                            "<br>Contenido Extra:  " . $fila['AddResources']; ?>
                            </td>
                            
                        </tr>
                <?php
                }

                ?>
                </tbody>

            </table>

            <!-- VOLVER -->                
            <div class="formulario__grupo formulario__grupo-btn-enviar">
                <input type="button" class="formulario__btn" value="Volver" id="Enviar" onclick="location.href='index.php'">
            </div>  

        </div>
                
        </main>


        <footer class="footer">
            <div class="container">
                <p>&copy;2021 pagina diseñada por @joseluisrobledo</p>
                <p><a href="mapaWeb.html" class="mapa">Mapa Web</a></p>
            </div>
        </footer>

<script src="formulario.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin = "anonymous"></script>

</body>
</html>