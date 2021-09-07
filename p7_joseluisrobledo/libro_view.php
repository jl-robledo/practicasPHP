<!DOCTYPE html>
<html>
<head>
	<title>Formulario Inicial</title>

		<link rel="stylesheet" type="text/css" href="estilos-formulario.css">
		
</head>
<body>

	<main>
        <h1 class="formulario__grupo">Insertar Libro Nuevo</h1>

            <!-- INICIO DEL FORMULARIO -->
            <form action=" " class="formulario" name="registro_producto" method="post" enctype="multipart/form-data">

                <!-- editor -->
                <div class="formulario__grupo">
                    <label for="editor" class="formulario__label">Editor</label>
                    <div class="formulario__grupo-input">
                        <select type = "text" class="formulario__input" name="editor" id="editor">
                            <option value="">Selecciona un editor...</option>
                            <!-- MOSTRAMOS LOS DATOS DE LOS EDITORES REGISTRADOS -->
                            <?php
                                // CONEXION A LA BBDD BIBLIOTECA
                                include 'conexion.php';
                                //conexion y consulta a la tabla de editores
                                $sql ="SELECT * FROM Editor";
                                $resultado = $conexion->query($sql);
                                while ($fila = $resultado->fetch_assoc()){
                                    echo "<option value='" . $fila['Id'] . "'>" . $fila['Nombre'] . "</option>";

                                }
                            ?>  
                        </select> <br><br>
                    </div>
                </div>


                <!-- titulo -->
                <div class="formulario__grupo">
                    <label for="titulo" class="formulario__label">Titulo</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Titulo" name="titulo" id="titulo">
                    </div>
                </div>

               
                <!-- paginas -->
                <div class="formulario__grupo">
                    <label for="paginas" class="formulario__label">Numero de paginas</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Numero de paginas" name="paginas" id="paginas">
                    </div>
                </div>


                <!-- PRECIO -->
                <div class="formulario__grupo">
                    <label for="precio" class="formulario__label">Precio</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Precio" name="precio" id="precio">
                    </div>
                </div>

                <!-- autor -->
                <div class="formulario__grupo">
                    <label for="autor" class="formulario__label"><b>Autor</b></label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Autor" name="autor" id="autor">
                    </div>
                </div>

                <!-- capitulos -->
                <div class="formulario__grupo">
                    <label for="capitulos" class="formulario__label"><b>Capitulos</b></label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Capitulos" name="capitulos" id="capitulos">
                    </div>
                </div>


                <!-- ENVIAR -->
                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <input type="submit" name="enviar" class="formulario__btn" value="Enviar" id="Enviar">
                </div>  
                
                <!-- VOLVER -->                
                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <input type="button" class="formulario__btn" value="Volver" id="Enviar" onclick="location.href='index.php'">
                </div>  

                    
            </form>	
    						
	</main>

    <footer class="footer">
        <div class="container">
            <p>&copy;2021 pagina diseñada por @joseluisrobledo</p>
            <p><a href="mapaWeb.html" class="mapa">Mapa Web</a></p>
        </div>
    </footer>      


</body>
</html>