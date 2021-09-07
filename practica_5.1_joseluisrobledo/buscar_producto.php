
    <div class="bg-white2 contenedor sombra productos">
        <div class="contenedor-productos">
            <h2 class="label__form">LISTADO DE PRODUCTOS</h2>
            <form action="index.php" method="POST" class="formulario">
                <input type="text" id="busqueda" name="busqueda" class="formulario__input sombra" placeholder="Buscar Producto" >
                <input type="submit" name="buscar" class="btn_search " value="Buscar">
            </form>

            <div class="contenedor-tabla">
                <table id="listado-productos" class="listado-productos">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Formato</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Editar / Eliminar</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php
                        include "funciones/funcion_buscar.php";
                      
                        while ($fila = mysqli_fetch_array($resultado)){
                        // cierro php para abrir las celdas de la tabla        
                        ?>
                        <tr>
                            <td><?php echo $fila['Nombre']  ?></td>
                            <td><?php echo $fila['Descripcion'] ?></td>
                            <td><?php echo $fila['Formato']  ?></td>
                            <td><?php echo $fila['Stock']  ?></td>
                            <td><?php echo $fila['Precio'] . " €" ?></td>
                            <td><img src= "data:image/png;base64,<?php echo base64_encode($fila['Imagen']); ?>"/></td>
                            <td>
                                <!-- si despues del archivo de php ponemos ? le podemos pasar una variable -->
                                <a href="formularios/formulario_editar.php?id=<?php echo $fila['Id']; ?>" class="btn-editar btn">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="funciones/funcion_eliminar.php?id=<?php echo $fila['Id']; ?>" class="btn-borrar btn" >
                                    <i class="far fa-trash-alt"></i>
                                </a>       
                            </td>
                        </tr>

                        <?php
                        }   
                        ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>