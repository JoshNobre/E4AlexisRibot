<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cotisation_model extends CI_Model
{
    protected $table = 'cotisation';
    protected $table2 = 'payer';

    public function insertPaiement($numLicence, $typePaiement, $datePaiement) {
        $data = array('Type_Paiement' => $typePaiement,
        	'Date_Paiement' => $datePaiement);
		$this->db->where('Num_Licence', $numLicence);
		$this->db->update('payer', $data); 
    } 

    public function updateCotisation($idCotisation, $nomPayeur) {

        $data = array('Nom_Payeur' => $nomPayeur,
        	'Cotisation_payee' => 1);
		$this->db->where('Id_Cotisation', $idCotisation);
		$this->db->update('cotisation', $data); 
    }

    public function getCotisation($numLicence) {
    	return $this->db->select('Id_Cotisation')
    		->from($this->table2)
    		->where('Num_Licence', $numLicence)
    		->get()
    		->result();
    }

    public function getNumLicence() {
    	return $this->db->select('Num_Licence, Nom')
    	->from('adherent')
    	->get()
    	->result();
    }

    public function getCotisationPayee($numLicence) {
    return $this->db->select('Date_Paiement')
        ->from($this->table2)
        ->where('Num_Licence', $numLicence)
        ->get()
        ->result();
    }
}