<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos - TIENDA</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos-formulario2.css">

</head>
<body> 
    <main>

        <div class="contenedor-barra">
            <div class="barra">
                <a href="../index.php" class="btn volver">Volver</a>
                <h1>EDITAR PRODUCTO</h1>
            </div>
        </div>

        <div class="bg-white contenedor sombra">
            <h4>Rellena todos los campos de nuevo</h4>
            <!-- INICIO DEL FORMULARIO -->
            <label for="formulario" class="label__form"></label>
            <form action="../funciones/funcion_editar.php" id="productos" class="formulario" method="post" enctype="multipart/form-data">
                 
            <?php 
                include '../conexion.php';
                //recogemos la variable id mediante GET
                $Id= $_GET['id'];
                $id_product = "SELECT * FROM Productos WHERE Id='$Id'";
                //ejecutamos la conexion y nos traemos los datos del ID seleccionado 
                $resultado = mysqli_query($conexion, $id_product);

                //si lo encuentra lo muestra en el formulario
                while($fila = mysqli_fetch_assoc($resultado)){
            ?>

                    <!-- Añado un input oculto(hidden), para recoger el valor de ID, para determinar
                            cual es el producto que vamos a modificar -->
                    <input type="hidden" class="formulario__input" value="<?php echo $fila['Id']; ?>" name='id'>
            
            <!-- NOMBRE -->
            <div class="formulario__grupo">
                        <label for="nombre" class="formulario__label">Nombre</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" value="<?php echo $fila['Nombre'] ;?>" name="nombre" id="nombre">
                        </div>
                    </div>

                    <!-- FAMILIA -->
                    <div class="formulario__grupo">
                        <label for="familia" class="formulario__label">Familia</label>
                        <div class="formulario__grupo-input">
                            <select type = "text" class="formulario__input" name="familia" id="familia">
                                <option value=""><?php echo $fila['Familia'] . " - Selecciona opcion";?></option>
                                <option value="Miel">Miel</option>
                                <option value="Material">Material</option>
                            </select> 
                        </div>
                    </div>


                    <!-- DESCRIPCION -->
                    <div class="formulario__grupo">
                        <label for="descripcion" class="formulario__label">Descripcion</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" value="<?php echo $fila['Descripcion'];?>" name="descripcion" id="descripcion">
                        </div>
                    </div>


                    <!-- FORMATO -->
                    <div class="formulario__grupo">
                        <label for="formato" class="formulario__label">Formato</label>
                        <div class="formulario__grupo-input">
                            <select type = "text" class="formulario__input" name="formato" id="formato">
                                <option value=""><?php echo $fila['Formato'] . " - Selecciona opcion";?></option>
                                <option value="u">Unidad</option>
                                <option value="250 gr">250 gr</option>
                                <option value="500 gr">500 gr</option>
                                <option value="1000 gr">1000 gr</option>
                            </select>
                        </div>
                    </div>


                    <!-- STOCK -->
                    <div class="formulario__grupo">
                        <label for="stock" class="formulario__label"><b>Stock</b></label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" value="<?php echo $fila['Stock'];?>" name="stock" id="stock">
                        </div>
                    </div>


                    <!-- PRECIO -->
                    <div class="formulario__grupo">
                        <label for="precio" class="formulario__label">Precio</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" value="<?php echo $fila['Precio'];?>" name="precio" id="precio">
                        </div>
                    </div>

                    <!-- IMAGEN -->

                        <div class="formulario__grupo">
                            <label for="imagen" class="formulario__label">Imagen</label>
                            <div class="formulario__grupo-input">
                                <input type="file" class="formulario__input file"  name="imagen" id="imagen" />
                            </div>
                            <!--
                            <div class="formulario__grupo">
                                <button name="submit" class="formulario__btn" >Cargar</button>
                            </div>
                            -->
                        </div>

                    

                    <!-- ENVIAR -->
                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                        <input type="hidden" id="accion" value="crear">
                        <input type="submit" name="actualizar" class="formulario__btn" value="Actualizar" id="Actualizar">
                    </div>   

                    <?php
                }  ?>
            
            </form>
        </div>

    </main> 
</body>
</html>
