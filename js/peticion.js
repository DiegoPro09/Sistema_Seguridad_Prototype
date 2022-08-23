$(obtener_registros());

function obtener_registros(ingreso_personas)
{
	$.ajax({
		url : '../php/Search.php',
		type : 'POST',
		dataType : 'html',
		data : { ingreso_personas: ingreso_personas },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
