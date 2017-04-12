<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TournoisAdherent_model extends CI_Model
{
	public function getParticipants($nom) {
		return $this->db->select('Nom, Prenom, a.Num_Licence, t.Id_Tournoi, Nom_Tournoi')
			->from('tournoi t, participer p, adherent a')  
			->where('t.Id_Tournoi = p.Id_Tournoi and a.Num_Licence = p.Num_Licence')
			->where('Nom_Tournoi', $nom)
			->get()
			->result();
	}


}