<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscription_model extends CI_Model
{
	protected $table = 'utilisateur';
	
	public function ajouter_utilisateur($login, $mdp, $typeUtilisateur, $dateInscription)
	{
        $this->db->set('Login', $login);
        $this->db->set('Password', $mdp);
        $this->db->set('Type_Utilisateur', $typeUtilisateur);
        $this->db->set('Date_Inscription', $dateInscription);
        
        return $this->db->insert($this->table);
	}

	public function getId($login) {
		return $this->db->select('Id')
                        ->from($this->table)
                        ->where('Login', $login)
                        ->get()
                        ->result();
	}
}