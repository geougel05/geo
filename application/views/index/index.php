<div class="container">



	<div class="page-header col-md-12 ">

		<div class="row">

			 <div class="col-md-6"><img src="<?php echo base_url()?>public/images/ugel_logo.jpg" alt=""></div>
			 <div class="col-md-6"><img src="<?php echo base_url()?>public/images/ugel_cabecera.jpg" alt=""></div>
		</div>
	</div>
	<br/>
	<div class="row">

	  <div class="col-md-4">

	  	<div class="panel panel-default" id="panel_datos">
	  	<div class="panel-heading">Ubica tu institucion educativa</div>
		  <div class="panel-body" >

		<br>
	  	<form id="frm_ie" method="post">
			  <div class="form-group" >
			    	<label >Distrito</label>
			    	<br/>
			    	<select class="form-control" id="distrito"  name="distrito">
			    				<option value="0"> - Seleccione un distrito -</option>
					<?php

						foreach ($distritos as $key=> $dist)
						{

							?>

							  <option value="<?php echo $key;?>"><?php echo $dist;?></option>
						 <?php
						 }
					?>
				</select>
			  </div>
			  <br/>

			    <div class="form-group">
			    	<label >Nivel Educativo</label>
			    	<br/>
			          		<select class="form-control" id="nivel" name="nivel">
					    	<option value="0">- Seleccione un nivel educativo -</option>
					</select>
			  </div>

			  <br/>
			   <div class="form-group">
			    	<label >Instituciòn Educativa</label>
			    	<br/>
			    	<select class="form-control" id="institucion" name="institucion">
			    				<option value="0"> - Seleccione una institucion educativa -</option>

				</select>
			  </div>

			  <br/>
			  <input type="button" class="btn btn-default" id="btn_buscar" name="btn_buscar" value="Buscar"/>
		</form>

		<br/>
		<div id="dire_ie">

		</div>

	</div>
	</div>
	  </div>
	  <div class="col-lg-8 col-sm-12">
	  	<div class="panel panel-default" id="panel_mapa">
	  	<div class="panel-heading">Mapa de ubicacion</div>
		  <div class="panel-body" id="map">




		  </div>
               
             
         
		</div>
	  </div>       
         <div class="col-md-12">
	  	<div class="panel panel-default" id="panel_mapa">
	  	<div class="panel-heading">Imagenes de la ubicacion</div>
		  <div class="panel-body" id="street-view">




		  </div>
               
             
         
		</div>
	  </div>
        
        
        
        
         
	</div>   
    
 
</div>




			 <script>

				var map;
				var marker;
				function initMap() {
				  map = new google.maps.Map(document.getElementById('map'), {
				    center: {lat: -12.03, lng: -77.012},
				    zoom: 14
				  });

				  marker = new google.maps.Marker({
				    position:  {lat: -12.03, lng: -77.012},
				    map: map,
				    title: 'San Juan de Lurigancho'
				  });

				}

			</script>



			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQfWg81uxLwcIveB3YoTXKtD6eq89YgyA&callback=initMap" async defer></script>

			<script>

				$("#distrito").change(function() {


				                $("#distrito option:selected").each(function()
				                {
				                    id = $('#distrito').val();
				                    $("#institucion").html("");

				                    $("#institucion").append(" <option value='0'> - Seleccione una institucion educativa -</option> ");



				                      $.post("<?php echo site_url();?>index/setcomboNiveles", {
				                        id : id
				                    }, function(data) {

				                    	$("#nivel").html(data);

				                	});
				            	});
				});

				$("#nivel").change(function() {

				                $("#nivel option:selected").each(function()
				                {
				                    nive = $('#nivel').val();
				                    dist = $('#distrito').val();



				              $.post("<?php echo site_url();?>index/setcomboInstitucion", {
				                        id_nivel :  nive,
				                        id_dist : dist
				                    }, function(data) {

				                    	$("#institucion").html(data);
				                	});
				            	});

				});

			</script>

			<script>
				$("#btn_buscar").click(function(){

					var _dist = $("#distrito").val();
					var _nivel = $("#nivel").val();
					var _ie = $("#institucion").val();

					var _map;
					var _dir;
					var _lat;
					var _lng;

					$("#map").html("");

					$.ajax({
						type: "POST",
						data: { 'id_inst':_ie },
						url:"<?php echo site_url('index/setdatos_ie')?>",
						dataType: "json",
						error: function(){
							  alert("error petición ajax");
						},
						success: function(data){

							jQuery.each(data.ie, function(index, item) {
							        //  alert(item.nom_ie)

							        _lat = parseFloat(item.latitud_ie);
							        _lng = parseFloat(item.longitud_ie);

							         _map = new google.maps.Map(document.getElementById('map'), {
								    center: {lat: _lat, lng: _lng},
								    zoom: 16
								  });

								 marker = new google.maps.Marker({
								    position:   {lat: _lat, lng: _lng},
								    map: _map,
								    title: item.nom_ie
								  });
                                
                                 panorama = new google.maps.StreetViewPanorama(
                                    document.getElementById('street-view'),
                                    {
                                      position: {lat: _lat, lng: _lng},
                                      pov: {heading: 100, pitch: 0},
                                      zoom: 1
                                    });
                                
                                
                                                             
								 $("#dire_ie").html("");
								 $("#dire_ie").append(
								 	"<label> "+item.nom_ie+"</label>"
								 	+"<br/>"
								 	+"<label> Dirección   : "+item.dir_ie+"</label>"
								 	+"<br/>"
								 	+"<label> Distrito    : "+item.nomDistrito+"</label>"
								 	+"<br/>" 
                                    +"<label> Director   : "+item.director+"</label>"
								 	+"<br/>"
								 	+"<label> Teléfono    : "+item.telefono+"</label>"
								 	+"<br/>"  
								 	+"<label> Red   : "+item.nom_red+"</label>"
								 	+"<br/>"
								 	+"<label> Turno : "+item.nom_turno+"</label>"
								 	+"<br/>"
								 	+"<br/>"                                   
								 	+'<input type="button" id="printer" name="printer" value="Imprimir" onclick="gmapPrint();">');



							});

						}
					});

				});

			</script>
			<script>
				function gmapPrint()
				{
				    	window.print();
				}

			</script>

