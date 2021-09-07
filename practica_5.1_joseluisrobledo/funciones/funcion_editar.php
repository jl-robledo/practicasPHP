<?php 

if(isset($_POST['actualizar'])){
	// validamos los nuevos datos introducidos
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$familia = $_POST['familia'];
	$descripcion = $_POST['descripcion'];
	$formato = $_POST['formato'];
	$stock = $_POST['stock'];
    $precio = $_POST['precio'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    //Control de errores 
	$errores = "";
	$enviado=true;

	//Control de errores nombre
	if(!empty($nombre)){
		//limpiamos o verificamos que es una cadena
		$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa un nombre de prodcuto.\\n";
		$enviado = false;
	}

	//control de errores familia
	if(!empty($familia)){
		//limpiamos o verificamos que es una cadena
		$familia = filter_var($familia, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa la familia del producto.\\n";
		$enviado = false;
	}

	//control de errores descripcion
	if(!empty($descripcion)) {
		$descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa una descripcion.\\n";
		$enviado = false;
	}


	//Control de errores formato 
	if(!empty($formato)){
		$formato = filter_var($formato, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa un formato.\\n";
		$enviado = false;
	}


	//Control de errores stock
	if(!empty($stock) && (is_numeric($stock))){
		$stock = filter_var($stock, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa el stock.\\n";
		$enviado = false;
    }
    
    //Control de errores precio
	if(!empty($precio) && (is_numeric($precio))){
		$precio = filter_var($precio, FILTER_SANITIZE_NUMBER_FLOAT);
	} else {
		$errores .= "Por favor ingresa el precio.\\n";
		$enviado = false;
    }

	if(empty($imagen)){
		$errores .= "Por favor ingresa una foto para el prodcuto.";
	}


	//Mensaje de errores
	if($enviado == false){
		//echo $errores;
		echo "<script>alert('ERROR:  $errores '); window.histoy.go(-1);</script>";

	} else {

		// insercion del formulario
		include ("../conexion.php");

		//preparamos la sentencia para actualizar los datos
		$actualizar ="UPDATE Productos SET Nombre='$nombre', Familia='$familia', Descripcion='$descripcion',
						Formato='$formato', Stock='$stock', Precio='$precio', Imagen='$imagen' WHERE Id='$id'";

		//ejecutamos la sentencia
		$resultado = mysqli_query($conexion,$actualizar);

		if($resultado){
			// Saludo de todo correcto y nos lleva a la lista de productos
			echo "<script>alert('Producto Actualizado:  $nombre '); window.location='../index.php'; </script>";
			
		} else {
			// Aviso de fallo en la actualizacion y nos lleva a la pagina anterior para intentarlo de nuevo
			echo "<script>alert('Actualizacion fallida. Vuelva a intentarlo.'); window.history.go(-1); </script>";
		}

	}

}

?>