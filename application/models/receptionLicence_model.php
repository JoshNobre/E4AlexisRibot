<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReceptionLicence_model extends CI_Model
{
	protected $table = 'adherent';
	protected $table2 = 'adulte';
	protected $table3 = 'enfant';

	public function get_adherent() {
        return $this->db->select('Num_Licence, Nom, Prenom')
            ->from($this->table)
            ->get()
            ->result();
	}

	public function get_adulte($numLicence) {
		$query = $this->db->select('*')
            ->from($this->table2)
            ->where('Num_Licence', $numLicence)
            ->get()
            ->result();
        
        foreach($query->result() as $row) {
        	echo $row->Num_Licence;
        }
	}

	public function get_enfant($numLicence) {
		return $this->db->select('*')
            ->from($this->table3)
            ->where('Num_Licence', $numLicence)
            ->get()
            ->result();
	}

	public function get_grp() {
		return $this->db->select('Id_Groupe, Categorie_Groupe')
            ->from('Groupe')
            ->get()
            ->result();
	}

	public function valider_licence($numLicence, $nomTraitementFiche, $dateEnregistrementLigue) {
		$data = array('NomTraitementFiche' => $nomTraitementFiche,
			'DateEnregistrementLigue' => date('d-m-Y', strtotime($dateEnregistrementLigue)));
		$this->db->where('Num_Licence', $numLicence);
		$this->db->update('adherent', $data);
	}

	public function set_grp($idGrp, $numLicence) {
		$data = array('Id_Groupe' => $idGrp);
		$this->db->where('Num_Licence', $numLicence);
		$this->db->update('adherent', $data);
	}

	public function getNumLicenceAdulte($numLicence) {
		return $this->db->select('Num_Licence')
			->from($this->table2)
			->where('Num_Licence', $numLicence)
			->get()
			->result();
	}

	public function verifExistLicence($numLicence) {
		return $this->db->select('NomTraitementFiche')
			->from($this->table)
			->where('Num_Licence', $numLicence)
			->get()
			->result();
	}
}