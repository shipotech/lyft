// Función para comprobar si un input está vacio
function checkCampos(value) {
    var camposRellenados = true;
    if( value.length <= 0 ) {
        camposRellenados = false;
        return false;
    }

    if(camposRellenados == false) {
        return false;
    } else {
        return true;
    }
}