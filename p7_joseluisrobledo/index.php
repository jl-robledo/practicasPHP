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

        <h1>Nuevo material de lectura</h1>

        <!--Boton para INSERTAR NUEVO EDITOR -->
        <div class="formulario__grupo formulario__grupo-btn-enviar">
            <button onclick="location.href='editor.php'" class="formulario__btn">Nuevo Editor</button>
        </div>


        <!--Boton para INSERTAR NUEVO LIBRO -->
        <div class="formulario__grupo formulario__grupo-btn-enviar">
            <button onclick="location.href='libro.php'" class="formulario__btn">Nuevo Libro</button>
        </div>


        <!--Boton para INSERTAR NUEVA REVISTA-->
        <div class="formulario__grupo formulario__grupo-btn-enviar">
            <button onclick="location.href='revista.php'" class="formulario__btn">Nueva Revista</button>
        </div>




        <h1>Biblioteca</h1>

        <!--Boton para ver los libros-->
        <div class="formulario__grupo formulario__grupo-btn-enviar">
            <button onclick="location.href='showBiblioLibro.php'" class="formulario__btn">Libros</button>
        </div>


        <!--Boton para ver las revista-->
        <div class="formulario__grupo formulario__grupo-btn-enviar">
            <button onclick="location.href='showBiblioMagazine.php'" class="formulario__btn">Revistas</button>
        </div>



        <h1>Base de Datos</h1>

        <!--Boton para ver el diagrama de la base de datos-->
        <div class="formulario__grupo formulario__grupo-btn-enviar">
            <button onclick="location.href='bbdd.php'" class="formulario__btn">Diagrama BBDD</button>
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