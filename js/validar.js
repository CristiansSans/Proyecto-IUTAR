function validar() {
var nombre, apellido, cedula, carrera, servicio, semestre, periodo, expresion;
nombre = document.getElementById("nombre").value;
apellido = document.getElementById("apellido").value;
cedula = document.getElementById("cedula").value;
carrera = document.getElementById("carrera").value;
servicio = document.getElementById("servicio").value;
semestre = document.getElementById("semestre").value;
periodo = document.getElementById("periodo").value;
if (nombre === "" || apellido === "" || cedula === "" || carrera === "" || servicio === "" || semestre === "" || periodo === "" || expresion === "" ){
	alert("Por favor llenar todos los campos");
	return false;
}
else if (nombre.length>30){
    alert ("nombre muy largo");
    return false;
}
    else if (apellido.length>30){
    alert ("apellidos son muy largos");
    return false;
}
    else if (cedula.length>10){
    alert ("cedula es muy larga");
    return false;
}
    else if (carrera.length>30){
    alert ("carrera no es la correcta");
    return false;
}
    else if (semestre.length>20){
    alert ("semestre no valido");
    return false;
}
    else if (servicio.length>15){
    alert ("el estatus no es correcto");
    return false;
}
    else if (periodo.length>10){
    alert ("periodo no es correcto");
    return false;
}
  else if (isNaN (cedula)){
    alert ("La Cedula Solo acepta Caracteres numericos");
    return false;
}
}