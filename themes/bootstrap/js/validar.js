function validarForm() {

	var validar = false;
	var rut,nombre, apellidos, correo, tipoUsuario,usuario, clave, telefono, expresion;


	nombre = document.getElementById("nombre").value;
	apellidos = document.getElementById("apellidos").value;
	correo = document.getElementById("correo").value;
	tipoUsuario= document.getElementById("tipoUsuario").value;
	usuario = document.getElementById("usuario").value;
	clave = document.getElementById("clave").value;
	telefono = document.getElementById("telefono").value;
	rut = document.getElementById("rut").value;

	if(rut === "" || tipoUsuario === "" || clave === "" || usuario==="")
	{
		//alert("Debe rellenar los campos con *");
		document.getElementById('campos').innerHTML="Debe rellenar los campos con *";
		validar = false;
	}
	else
	{
		validar=true;
	}

	/*Valida nombre y apellido*/
	if(nombre == /^[a-z0-9ü][a-z0-9ü_]{3,9}$/)
	{
		
	}

	/*Validacion rut*/
	var tmpstr = "";
	if (rut.length> 0)
	{
		crut = rut;
		largo = crut.length;
		if ( largo <2 )
		{
			document.getElementById('error_rut').innerHTML="Rut Incorrecto";
			//alert('rut inválido')
			//Objeto.focus()
			return false;
		}
		for ( i=0; i <crut.length ; i++ )
		if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
		{
			tmpstr = tmpstr + crut.charAt(i);
		}
		rut = tmpstr;
		crut=tmpstr;
		largo = crut.length;
 
		if ( largo> 2 )
			rut = crut.substring(0, largo - 1);
		else
			rut = crut.charAt(0);
 
		dv = crut.charAt(largo-1);

		if ( rut == null || dv == null )
		return 0;

		var dvr = '0';
		suma = 0;
		mul  = 2;

		for (i= rut.length-1 ; i>= 0; i--)
		{
			suma = suma + rut.charAt(i) * mul;
			if (mul == 7)
				mul = 2;
			else
				mul++;
		}

		res = suma % 11;
		if (res==1)
			dvr = 'k';
		else if (res==0)
			dvr = '0';
		else
		{
			dvi = 11-res;
			dvr = dvi + "";
		}
		document.getElementById('error_rut').innerHTML=" ";
		if ( dvr != dv.toLowerCase() )
		{
			//alert('El Rut Ingreso es Invalido')
			//Objeto.focus()
			document.getElementById('error_rut').innerHTML="Rut Incorrecto";
			validar = false;
		}
	}
	/*fin validacion rut*/
   	/*validar correo*/
	document.getElementById('error_correo').innerHTML=" ";
	if (!/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(correo)){
   		document.getElementById('error_correo').innerHTML="correo Incorrecto";
   		validar=false;
  		}
	return validar;
}
function validarRut()
{
	/*Validacion rut*/
	var rut=document.getElementById("rut").value;
	var tmpstr = "";
	if (rut.length> 0)
	{
		crut = rut;
		largo = crut.length;
		if ( largo <2 )
		{
			document.getElementById('error_rut').innerHTML="Rut Incorrecto";
			//alert('rut inválido')
			//Objeto.focus()
			return false;
		}
		for ( i=0; i <crut.length ; i++ )
		if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
		{
			tmpstr = tmpstr + crut.charAt(i);
		}
		rut = tmpstr;
		crut=tmpstr;
		largo = crut.length;
 
		if ( largo> 2 )
			rut = crut.substring(0, largo - 1);
		else
			rut = crut.charAt(0);
 
		dv = crut.charAt(largo-1);

		if ( rut == null || dv == null )
		return 0;

		var dvr = '0';
		suma = 0;
		mul  = 2;

		for (i= rut.length-1 ; i>= 0; i--)
		{
			suma = suma + rut.charAt(i) * mul;
			if (mul == 7)
				mul = 2;
			else
				mul++;
		}

		res = suma % 11;
		if (res==1)
			dvr = 'k';
		else if (res==0)
			dvr = '0';
		else
		{
			dvi = 11-res;
			dvr = dvi + "";
		}
		document.getElementById('error_rut').innerHTML=" ";
		if ( dvr != dv.toLowerCase() )
		{
			//alert('El Rut Ingreso es Invalido')
			//Objeto.focus()
			document.getElementById('error_rut').innerHTML="Rut Incorrecto";
			validar = false;
		}
	}
}
function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
    function validarCorreo()
    {
    var correo=document.getElementById("correo").value;
    document.getElementById('error_correo').innerHTML=" ";
   	/*validar correo*/
	if (!/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(correo)){
   		document.getElementById('error_correo').innerHTML="correo Incorrecto";
  		}
    }