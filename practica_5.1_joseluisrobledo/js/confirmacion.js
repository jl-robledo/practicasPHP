function confirmacion(e){
    if (confirm("¿Estas seguro de que quieres elimnar el producto?")){
        return true;
    } else {
        // cancelamos el proceso de eliminar
        e.preventDefault();
    }
}

//asignamos una variable al selector borrar, uso la clase porque no le pues id
let linkBorrar = document.querySelectorAll(".btn-borrar");

// bucle para que cada vez que se pinche en el elemnto de borrar se ejecute la funcion confirmacion
for (var i=0 ; i<linkBorrar.length ; i++){
    linkBorrar[i].addEventListener('click', confirmacion);
}



/* VALIDACION PARA EL BUSCADOR */
function validarBuscador(formulario){
    // si el fomulario esta vacio
    if(formulario.palabra.value.length==0){
        formulario.palabra.focus();
        alert('Introduce el nombre de un producto para buscar.');
        return false;
    } else {
        //si todo esta correcto continua
        return true;
    }
}