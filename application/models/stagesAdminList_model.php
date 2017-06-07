<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StagesAdminList_model extends CI_Model
{
	protected $table = 'stage';
	protected $table2 = 'participer';
	protected $table3 = 'adherent';
	protected $table4 = 'lieu';

	public function getStage() {
		return $this->db->select('Id_Tournoi, Nom_Tournoi')
			->from($this->table)
			->get()
			->result();
	}

	public function getAdherent() {
        return $this->db->select('Num_Licence, Nom, Prenom')
            ->from($this->table3)
            ->get()
            ->result();
	}

	public function addAdherentStage($numLicence, $idStage, $idLieu, $dateStage) {

		$this->db->set('Num_Licence', $numLicence);
        $this->db->set('Id_Stage', $idStage);
        $this->db->set('Id_Lieu', $idLieu);
        $this->db->set('Date_Stage', $dateStage);

		return $this->db->insert($this->table2);
	}

	public function getLieu() {
        return $this->db->select('Id_Lieu, Ville_Lieu')
            ->from($this->table4)
            ->get()
            ->result();
	}
}