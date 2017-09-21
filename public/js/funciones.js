function carga_ajax(ruta,valor,div)
{
	//$.post(ruta);
	$.post(
			 ruta, {id:valor},function( data ) 
			 {
				$( "#"+div+" ").html( data );
			 }
		  );
}