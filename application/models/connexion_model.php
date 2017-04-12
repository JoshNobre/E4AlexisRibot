<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connexion_model extends CI_Model
{
	protected $table = 'utilisateur';
    protected $table2 = 'personnel';
	
	public function accept($login, $mdp)
	{
        return $this->db->select('Id, Login, Password')
            ->from($this->table)
            ->where('Login', $login)
            ->where('Password', $mdp)
            ->get()
            ->result();
	}

    public function getTypeOfUser($login) {
        return $this->db->select('Type_Utilisateur')
            ->from($this->table)
            ->where('Login', $login)
            ->get()
            ->result();
    }

    public function get_admin($id) {
        return $this->db->select('Id, Nom_Personnel, Prenom_Personnel, Fonction_Personnel')
            ->from($this->table2)
            ->where('Id', $id)
            ->get()
            ->result();
    }

    public function getNumLicence() {
        return $this->db->select('Num_Licence')
            ->from('adherent')
            ->get()
            ->result();
    }
}