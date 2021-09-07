<?php 

//Comprobacion de que el formulario ha sido enviado con todas las variables que hayamos fijado en el index.view.php
if (isset($_POST['enviar'])){

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

    /*
    // imagen
    $imagen = $_POST['imagen'];
    $imgContenido = addslashes(file_get_contents($imagen));


    // control de errores imagen
    if(isset($_POST['submit'])){
        $revisar = getimagesize($_FILES['imagen']['tmp_name']);
        if($revisar !== false){
            $imagen = $_FILES['imagen']['tmp_name'];
            $imgContenido = addslashes(file_get_contents($imagen));
        } else {
            $errores .= "Por favor vuelve a cargar la imagen.";
            $enviado = false;
        }
    }
*/
	

	//Control de errores nombre
	if(!empty($nombre)){
		//limpiamos o verificamos que es una cadena
		$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa un nombre <br>";
		$enviado = false;
	}

	//control de errores familia
	if(!empty($familia)){
		//limpiamos o verificamos que es una cadena
		$familia = filter_var($familia, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa los apellidos <br>";
		$enviado = false;
	}

	//control de errores descripcion
	if(!empty($descripcion)) {
		$descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa un email <br>";
		$enviado = false;
	}


	//Control de errores formato 
	if(!empty($formato)){
		$formato = filter_var($formato, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa un telefono <br>";
		$enviado = false;
	}


	//Control de errores stock
	if(!empty($stock) && (is_numeric($stock))){
		$stock = filter_var($stock, FILTER_SANITIZE_STRING);
	} else {
		$errores .= "Por favor ingresa el stock <br>";
		$enviado = false;
    }
    
    //Control de errores precio
	if(!empty($precio) && (is_numeric($precio))){
		$precio = filter_var($precio, FILTER_SANITIZE_NUMBER_FLOAT);
	} else {
		$errores .= "Por favor ingresa el precio \n <br>";
		$enviado = false;
    }



	//Mensaje de errores
	if($enviado == false){
		//echo $errores;
		echo "<script>alert('ERROR:  $errores '); </script>";

	

	} else {

		//Conexion con la base de datos que se llama Usuarios
		$conexion = new mysqli ('localhost', 'root', '', 'Productos' );

		if ($conexion->connect_errno){
			die('Lo siento, hubo un problema en la conexion con el Servidor.');
		} else {

			$sql = "SELECT * FROM Productos"; //Se traen los elementos de la base de datos
			$connect = $conexion->query($sql); //La conexion se ejecuta

			$control_nombre = true; // variable para el control de errores del nombre ya registrado

			//El metodo fetch_assoc trae la informacion del elemento de cada fila que queramos
			while ($fila = $connect->fetch_assoc()){

				// comprobacion de si el email introducido ya se encuentra en la BBDD
				if ($fila['Nombre'] == $nombre) {

					$control_nombre=false; // control de errores
				}
			}

			if ($control_nombre == false){ // sacamos el mensaje si se ha encontrado el mail

				echo "<script>alert('Producto registrado.'); </script>";

			} else { // en caso de que no se encuentre, se continua con el registro

                /*
				//Con prepare statements los usuarios no podrán inyectar nada en nuestra base de datos, es más seguro
				//Ahora en vez de escribir directamente los valores ponemos 3 signos de interrogación
				$statement = $conexion->prepare("INSERT INTO Productos (Id, Nombre, Familia, Descripcion, Formato, Stock, Precio, Imagen) VALUES (?, ?, ?, ?, ?, ?, ?, $imagen)");
				//La variable statement es igual a la conexión ejecutando el método prepare: Prepara una inserción de un nuevo Usuario en la tabla que va a tener 3 valores
				
				// Remplazamos los placeholder ? con los valores que queremos usar.
				$statement->bind_param('issssiib', $id, $nombre, $familia, $descripcion, $formato, $stock, $precio, $imagen); //Método bind_param nos dice qué valores vamos a poner en los signos de interrgogación. 
				
				$id = NULL;

				// Ejecutamos la sentencia.
                $statement->execute();
                */
                

                $query = "INSERT INTO Productos (Id, Nombre, Familia, Descripcion, Formato, Stock, Precio, Imagen) 
						VALUES (null, '$nombre', '$familia', '$descripcion', '$formato', '$stock', '$precio', '$imagen')";
                
                $resultado = $conexion->query($query); //La conexion se ejecuta

                if($resultado){
                    // Saludo de todo correcto
                    echo "<script>alert('Producto registrado:  $nombre '); window.location='../index.php'; </script>";
                    
                } else {
                    // Aviso de fallo en el registro
					echo "<script>alert('Registro fallido. Vuelva a intentarlo.'); </script>";
                }
			}
		}
	}
}


?>