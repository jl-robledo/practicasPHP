<div class="bg-white2 contenedor sombra productos">
    <h2 class="label__form">NUEVO PRODUCTO</h2>
        <form action="funciones/funcion_insertar.php" class="formulario" name="registro_producto" method="post" enctype="multipart/form-data">                
          
                <!-- NOMBRE -->
                <div class="formulario__grupo">
                    <label for="nombre" class="formulario__label">Nombre</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Nombre" name="nombre" id="nombre">
                    </div>
                </div>

                <!-- FAMILIA -->
                <div class="formulario__grupo">
                    <label for="familia" class="formulario__label">Familia</label>
                    <div class="formulario__grupo-input">
                        <select type = "text" class="formulario__input" name="familia" id="familia">
                            <option value="">Selecciona una familia</option>
                            <option value="MIEL">Miel</option>
                            <option value="MATERIAL">Material</option>
                        </select> 
                    </div>
                </div>


                <!-- DESCRIPCION -->
                <div class="formulario__grupo">
                    <label for="descripcion" class="formulario__label">Descripcion</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Descripcion" name="descripcion" id="descripcion">
                    </div>
                </div>


                <!-- FORMATO -->
                <div class="formulario__grupo">
                    <label for="formato" class="formulario__label">Formato</label>
                    <div class="formulario__grupo-input">
                        <select type = "text" class="formulario__input" name="formato" id="formato">
                            <option value="">Selecciona un formato</option>
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
                        <input type="text" class="formulario__input" placeholder="Stock" name="stock" id="stock">
                    </div>
                </div>


                <!-- PRECIO -->
                <div class="formulario__grupo">
                    <label for="precio" class="formulario__label">Precio</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Precio" name="precio" id="precio">
                    </div>
                </div>

                <!-- IMAGEN -->
                
                    <div class="formulario__grupo">
                        <label for="imagen" class="formulario__label">Imagen</label>
                        <div class="formulario__grupo-input">
                            <input type="file" class="formulario__input" placeholder="Imagen" name="imagen" id="imagen" />
                        </div>
                        <!--
                        <div class="formulario__grupo">
                            <button name="submit" class="formulario__btn" >Cargar</button>
                        </div>
                        -->
                    </div>
                
                  

                <!-- ENVIAR -->
                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <input type="submit" name="enviar" class="formulario__btn" value="Enviar" id="Enviar">
                </div>   

        </form>
    </div>