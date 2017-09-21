<?php
class Geo_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	public function getDistrito()
	{
		$estado = 1;
		$query=$this->db
				->select("id_distrito,nomDistrito")
				->from("distrito")
				->where("estado",$estado)
				->order_by("nomDistrito")
				->get();
		$datos = $query->result();

		if($datos)
		{


			foreach($datos as $dato)
			{
				$data[$dato->id_distrito]=$dato->nomDistrito;
			}
		}

		return  $data;

	}

	public function getNivel()
	{
		$estado = 1;
		$query=$this->db
				->select("id_nivel,nomNivel")
				->from("nivel")
				->where("estado",$estado)
				->order_by("nomNivel")
				->get();
		$datos = $query->result();

		if($datos)
		{


			foreach($datos as $dato)
			{
				$data[$dato->id_nivel]=$dato->nomNivel;
			}
		}

		return  $data;

	}

	public function getdatosNiveles($id)
	{
		$query=$this->db
				->select("ins.id_nivel,niv.nomNivel")
				->from("institucion as ins")
				->join("nivel as niv","niv.id_nivel = ins.id_nivel","inner")
				->where("ins.id_distrito",$id)
				->group_by("ins.id_nivel")
				->order_by("ins.id_nivel")
				->get();

				return $query->result();
	}

	public function getdatosInstitucion($id_dist,$id_nivel)
	{
		$where = array('ins.id_distrito' => $id_dist, 'ins.id_nivel' => $id_nivel);
		$query=$this->db
				->select("*")
				->from("institucion as ins")
				->where($where)
				->order_by("ins.nom_ie")
				->get();

				//echo $this->db->last_query();die();
				return $query->result();
	}

	public function getdatosInstitucionId($id_inst)
	{
		$where = array('ins.id_ie' => $id_inst);
		$query=$this->db
				->select("*")
				->from("institucion as ins")
				->join("nivel as niv","niv.id_nivel = ins.id_nivel","inner")
				->join("distrito as dis","dis.id_distrito = ins.id_distrito","inner")
                ->join("redes as red","red.id_red = ins.red","inner")
				->join("turno as tur","tur.id_turno = ins.id_turno","inner")
                ->where($where)
				->get();

				//echo $this->db->last_query();die();
				return $query->result();
	}

	public function getdatosprivada($codlocal=null)
	{
		$where = array("cod_local"=>$codlocal,"estado"=>1);
		$query=$this->db
				->select("*")
				->from("privadas")
				->where($where)
				->get();
				return $query->result();
	}

	public function insertarPrivada($data=array())
	{
		$this->db->insert('registro_privada',$data);
		return $this->db->insert_id();
	}




}
