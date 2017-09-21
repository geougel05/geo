<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout("template");
		$this->load->model('geo_model','geo');
	}

	public function index()
	{
		$distritos   = $this->geo->getDistrito();

		$this->layout->view('index',compact("distritos"));
	}


	public function setcomboNiveles($id=null)
	{


		$id=$this->input->post("id",true);
		if ($id) {
			$datos=$this->geo->getdatosNiveles($id);

			echo "<option value='0'> - Seleccione un nivel educativo -</option>";

			foreach ($datos as $niv) {

				echo "<option value='".$niv->id_nivel."'>".$niv->nomNivel."</option>";
			}
		}

	}

	public function setcomboInstitucion($id_nivel=null,$id_dist=null)
	{

		$id_nivel=$this->input->post("id_nivel",true);
		$id_dist=$this->input->post("id_dist",true);

		if ( (!empty($id_dist)) and !(empty($id_nivel)) ) {


			$datos=$this->geo->getdatosInstitucion($id_dist,$id_nivel);


			echo "<option value='0'> - Seleccione una institucion educativa -</option>";

			foreach ($datos as $ins) {

				echo "<option value='".$ins->id_ie."'>".$ins->nom_ie."</option>";
			}


		}

	}

	public function setdatos_ie()
	{

		$id_inst=$this->input->post("id_inst",true);

		$datos =  $this->geo->getdatosInstitucionId($id_inst);


		$dataview["ie"] = $datos;
		echo json_encode($dataview);


		//$data["nivel"] = $id_nivel;
		//return $data;

	}

	public function form_privada()
	{


		if($this->input->post())
		{
			$data = $this->input->post();
			$this->registroprivada($data);
			//var_dump($data);
		}else
		{
			//$this->layout->view('Agregar_personal');
			$this->layout->view('formulario_privada');
		}






	}

	public function setdatosprivada($codlocal=null)
	{
			$datos=$this->geo->getdatosprivada($codlocal);
			$dataview["privada"] = $datos;
			echo json_encode($dataview);

	}

	public function registroprivada($datos)
	{


		$codlocal 	= $datos["codlocal"];
		$num_creacion	= $datos["num_creacion"];
		$num_vigente	= $datos["num_vigente"];
		$nom_director 	= $datos["nom_director"];
		$direccion 	= $datos["direccion"];
		$fono 		= $datos["fono_iiee"];
		$mail_director 	= $datos["mail_director"];
		$referencia 	= $datos["referencia"];
		$razon_promo	= $datos["razon_promotor"];
		$ruc_dni	= $datos["ruc_dni"];
		$mail_promo	= $datos["mail_promotor"];
		$latitud		= $datos["latitud_val"];
		$longitud	= $datos["longitud_val"];


		$data_privada = array
		(

			"codlocal"		 => $codlocal,
			"num_reso_crea"	 => $num_creacion,
			"num_reso_vigente"	 => $num_vigente,
			"direccion"	 	=> $direccion,
			"latitud"	 		=> $latitud,
			"longitud"	 	=> $longitud,
			"nom_director"	 	=> $nom_director,
			"fono_iiee"	 	=> $fono,
			"mail_director"	 	=> $mail_director,
			"referencia"	 	=> $referencia,
			"razon_promotor" 	=> $razon_promo,
			"ruc_dni" 		=> $ruc_dni,
			"mail_promotor" 	=> $mail_promo,
			"estado"		=>1


		);

		$id_privada = $this->geo->insertarPrivada($data_privada);

		if ($id_privada )
		{
		    $mensaje = "Sus datos fueron agregado exitosamente";

		    $this->layout->view('respuesta_privada',compact("mensaje"));

		    //redirect(base_url()."Respuesta-privada",301);
		}else
		{
		    $this->session->set_flashdata('mensaje', "Sus datos no fueron agregados , verifique con el administrador del sistema");
		//       $this->layout->view('Respuesta_personal');
		//
		//redirect(base_url()."Respuesta-privada",301);
		//
		$mensaje = "Sus datos no fueron agregados , verifique con el administrador del sistema";

		    $this->layout->view('respuesta_privada',compact("mensaje"));
		}

		//redirect(base_url()."Cpanel/Respuesta-personal",301);

	}













}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */