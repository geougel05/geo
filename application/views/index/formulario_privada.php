<div class="container-fluid">



	<div class="page-header col-md-12 ">

		<div class="row">

			 <div class="col-md-6"><img src="<?php echo base_url()?>public/images/ugel_logo.jpg" alt=""></div>
			 <div class="col-md-6"><img src="<?php echo base_url()?>public/images/ugel_cabecera.jpg" alt=""></div>
		</div>
	</div>
	<br/>
	<div class="row">

	  <div class="col-md-6">

	  <?php echo form_open_multipart(null,array("name"=>"frm_valido","id"=>"frm_valido","role"=>"form"));?>

	  	<div class="panel panel-default" id="panel_datos">
	  	<div class="panel-heading">Formulario para llenado de datos de la institución privada</div>
		  <div class="panel-body" >

		<br>


		<div class="form-group">
	  	<div class="row ">
	  		<div class="col-md-12 relleno_gris">
	  			<label>Datos de la institución educativa privada</label>
	  		</div>

	  	</div>
	 	 </div>
		  <div class="form-group">

		  	<div class="row">

		  		<div class="col-lg-4 col-md-4 col-sm-12">
		  			<label >Código Local</label>
		  			<input type="text" class="form-control" id="codlocal" name="codlocal" placeholder="Ingrese código local" onkeyup="llenardatoprivada();"/>
		  		</div>
		  		<div class="col-lg-8 col-md-8 col-sm-12">
		  			<label >Institución Educativa</label>
		  			<input type="text" class="form-control" id="ii_ee" name="ii_ee" placeholder="" disabled/>
		  		</div>

		  	</div>
			<br/>
		  	<div class="row">

		  		<div class="col-lg-6 col-md-6 col-sm-12">
		  			<label >Número de resolución de creación</label>
		  			<input type="text" class="form-control" id="num_creacion" name="num_creacion" placeholder="Ingrese Número de resolución de creación" />
		  		</div>
		  		<div class="col-lg-6 col-md-6 col-sm-12">
		  			<label >Número de resolución vigente</label>
		  			<input type="text" class="form-control" id="num_vigente" name="num_vigente" placeholder="Ingrese Número de resolución vigente" />
		  		</div>

		  	</div>
		  	<br/>
		  	<div class="row">

		  		<div class="col-lg-12 col-md-12 col-sm-12">
		  			<label >Dirección</label>
		  			<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese dirección" />
		  		</div>
		  		<div class="col-lg-6 col-md-6 col-sm-12">
		  			<br/>
		  			<label >Latitud</label>
		  			<input type="text" class="form-control" id="latitud" name="latitud" placeholder="" disabled/>
		  		</div>
		  		<div class="col-lg-6 col-md-6 col-sm-12">
		  			<br/>
		  			<label >Longitud</label>
		  			<input type="text" class="form-control" id="longitud" name="longitud" placeholder="" disabled/>
		  		</div>

		  	</div>
		  	<br/>
		  	<div class="row">

		  		<div class="col-lg-8 col-md-8 col-sm-12">
		  			<label >Nombre del director</label>
		  			<input type="text" class="form-control" id="nom_director" name="nom_director" placeholder="Ingrese Nombre del director" />
		  		</div>
		  		<div class="col-lg-4 col-md-4 col-sm-12">
		  			<label >Teléfono de la institución</label>
		  			<input type="text" class="form-control" id="fono_iiee" name="fono_iiee" placeholder="Ingrese teléfono" />
		  		</div>

		  		<div class="col-lg-12 col-md-12 col-sm-12">
		  		<br/>
		  			<label >Correo electrónico del director</label>
		  			<input type="text" class="form-control" id="mail_director" name="mail_director" placeholder="Ingrese correo electrónico del director" />
		  		</div>

		  	</div>
		  	<br/>
		  	<div class="row">

		  		<div class="col-lg-12 col-md-12 col-sm-12">
		  			<label >Referencia</label>
		  			<input type="text" class="form-control" id="referencia" name="referencia" placeholder="Ingrese referencia" />
		  		</div>


		  	</div>
		  	<br/>
		  	<div class="form-group">
			  	<div class="row ">
			  		<div class="col-md-12 relleno_gris">
			  			<label>Datos del promotor de la institución educativa privada</label>
			  		</div>

			  	</div>
		 	</div>
		 	<br/>
		 	<div class="row">

		  		<div class="col-lg-8 col-md-8 col-sm-12">
		  			<label >Razón social y/o Nombre Completo del promotor</label>
		  			<input type="text" class="form-control" id="razon_promotor" name="razon_promotor" placeholder="Ingrese  Razón social  y/o Nombre del promotor" />
		  		</div>
		  		<div class="col-lg-4 col-md-4 col-sm-12">
		  			<label >RUC y/o DNI</label>
		  			<input type="text" class="form-control" id="ruc_dni" name="ruc_dni" placeholder="Ingrese ruc y/o dni" />
		  		</div>
		  		<div class="col-lg-12 col-md-12 col-sm-12">
		  		<br/>
		  			<label >Correo electrónico del promotor</label>
		  			<input type="text" class="form-control" id="mail_promotor" name="mail_promotor" placeholder="Ingrese correo electrónico del promotor" />
		  		</div>

		  	</div>

		  </div>

			  <br/>

			<input type="hidden" class="form-control" id="latitud_val" name="latitud_val"  value="" />
			<input type="hidden" class="form-control" id="longitud_val" name="longitud_val"  value="" />

			  <button type="submit" class="btn btn-default" title="Registrar datos">Registrar datos</button>
		</form>


	</div>
	</div>
	  </div>
	  <div class="col-lg-6 col-sm-12">
	  	<div class="panel panel-default" id="panel_mapa">
	  	<div class="panel-heading">Arrastre el marcador para obtener la latitud y longitud de su institución</div>
		  <div class="panel-body" id="map">




		  </div>



		</div>
	  </div>




	</div>


</div>
<script>


	$('#btn_envio').click(function (e) {

		alert("hola mundo btn")
	  });
</script>




			 <script>

				var map;
				var marker;
				function initMap() {
				  map = new google.maps.Map(document.getElementById('map'), {
				    center: {lat: -12.03, lng: -77.012},
				    zoom: 14,

				  });

				  geocoder = new google.maps.Geocoder();



				  marker = new google.maps.Marker({
				    position:  {lat: -12.03, lng: -77.012},
				    map: map,
				    title: 'San Juan de Lurigancho',
				    draggable: true
				  });


			  	google.maps.event.addListener(map, 'click', function() {
				  document.getElementById("posicion").innerHTML = event.latLng;
				});


			  	 google.maps.event.addListener(marker, 'drag', function() {
				        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
				            if (status == google.maps.GeocoderStatus.OK) {
				                if (results[0]) {

				                	$("#latitud").val(marker.getPosition().lat());
				                	$("#longitud").val(marker.getPosition().lng());
				                	$("#latitud_val").val(marker.getPosition().lat());
				                	$("#longitud_val").val(marker.getPosition().lng());

				                }
				            }
				        });
				    });






				}



			</script>



			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQfWg81uxLwcIveB3YoTXKtD6eq89YgyA&callback=initMap" async defer></script>



			<script>
				function gmapPrint()
				{
				    	window.print();
				}


				function llenardatoprivada()
				{
					var codlocal =  $("input[id='codlocal']").val();
					var url 		= "<?php echo site_url('setdatosprivada/')?>"+codlocal;
					var nombres 	= $("input[id='ii_ee']");




					if(codlocal.length ==6)
					{
						$.ajax({
								type: "POST",
								url:url,
								dataType: "json",
								error: function(){
									  alert("error petición ajax");
								},
								success: function(data){

									jQuery.each(data.privada, function(index, item) {

										$(nombres).val(item.nom_privada);

									});

								}
						});


					}


				}


			</script>

