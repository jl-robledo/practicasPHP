<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de usuarios nuevos</title>
    <link href="http://fonts.googleapis.com/css2?family=Roboto:wght;@400;700display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos-formulario.css">
</head>
<body>
    <main>

            <h1 class="formulario__grupo">Datos del Editor</h1>

            <!-- INICIO DEL FORMULARIO -->
            <form action=" " class="formulario" name="registro_editor" method="post" enctype="multipart/form-data">

                <!-- nombre -->
                <div class="formulario__grupo">
                    <label for="nombre" class="formulario__label">Nombre</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Nombre" name="nombre" id="nombre">
                    </div>
                </div>

               
                <!-- direccion -->
                <div class="formulario__grupo">
                    <label for="direccion" class="formulario__label">Direccion</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Direccion" name="direccion" id="direccion">
                    </div>
                </div>


                <!-- telefono -->
                <div class="formulario__grupo">
                    <label for="telefono" class="formulario__label">Telefono</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Telefono" name="telefono" id="telefono">
                    </div>
                </div>

                <!-- website -->
                <div class="formulario__grupo">
                    <label for="website" class="formulario__label"><b>Website</b></label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Website" name="website" id="website">
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


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/formulario.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin = "anonymous"></script>

</body>
</html>