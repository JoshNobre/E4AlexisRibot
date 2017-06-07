<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StagesAdherent_model extends CI_Model
{
	public function getParticipants($nom) {
		return $this->db->select('Nom, Prenom, a.Num_Licence, s.Id_Stage, Nom_Stage')
			->from('stage s, participer p, adherent a')  
			->where('s.Id_Stage = p.Id_Stage and a.Num_Licence = p.Num_Licence')
			->where('Nom_Stage', $nom)
			->get()
			->result();
	}


}