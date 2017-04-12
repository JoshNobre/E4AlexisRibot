<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RetrouverAdherent_model extends CI_Model
{
    protected $table = 'groupe';
    protected $table2 = 'adherent';

    public function getGroupe() {
        return $this->db->select('Id_Groupe, Num_Groupe, Categorie_Groupe')
        	->from($this->table)
        	->get()
        	->result();
    }

    public function getAdherent($idGrp) {
    	return $this->db->select('Nom, Prenom')
    		->from($this->table2)
    		->where('Id_Groupe', $idGrp)
    		->get()
    		->result();
    }
}