<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StagesAdmin_model extends CI_Model
{
	protected $table = 'stage';
	protected $table2 = 'lieu';

	public function ajouter_stage($nomStage)
	{
        $this->db->set('Nom_Stage', $nomStage);
        
        return $this->db->insert($this->table);
	}

	public function ajouter_lieu($adresse, $cp, $ville, $pays) {
        $this->db->set('Adresse_Lieu', $adresse);
        $this->db->set('CP_Lieu', $cp);
        $this->db->set('Ville_Lieu', $ville);
        $this->db->set('Pays_Lieu', $pays);
        
        return $this->db->insert($this->table2);
	}
}