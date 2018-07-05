function validarForm() {
	var nombre, apelidos, correo, usuario, clave, telefono, expresion;

	nombre = document.getElementById("nombre").value;
	apelidos = document.getElementById("apelidos").value;
	correo = document.getElementById("correo").value;
	usuario = document.getElementById("usuario").value;
	clave = document.getElementById("clave").value;
	telefono = document.getElementById("telefono").value;

	if(nombre === "")
	{
		alert("el campo esta vacio");
		return false;
	}
}