<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MaterielAdherent_model extends CI_Model
{
    protected $table = 'materiel';
    protected $table2 = 'acheter';
    protected $table3 = 'louer';
    protected $table4 = 'cotisation';
    protected $table5 = 'payer';

    public function getMateriel() {
        return $this->db->select('Id_Materiel, Nom_Materiel, Prix_Achat, Prix_Location')
        	->from($this->table)
        	->get()
        	->result();
    } 

    public function insertAchat($dateAchat, $numLicence, $idMateriel, $qte) {
    	$this->db->set('Date_Achat', $dateAchat);
        $this->db->set('Num_Licence', $numLicence);
        $this->db->set('Id_Materiel', $idMateriel);
        $this->db->set('QteAchetee', $qte);

        return $this->db->insert($this->table2);
    }

    public function insertLocation($dateLocation, $numLicence, $idMateriel, $qte, $temps) {
    	$this->db->set('Date_location', $dateLocation);
        $this->db->set('Num_Licence', $numLicence);
        $this->db->set('Id_Materiel', $idMateriel);
        $this->db->set('QteLouee', $qte);
        $this->db->set('Temps_Location', $qte);

        return $this->db->insert($this->table3);
    }

    public function insertCotisation($montantCotisation, $typeCotisation) {
    	$this->db->set('Montant_Cotisation', $montantCotisation);
        $this->db->set('Type_Cotisation', $typeCotisation);

        return $this->db->insert($this->table4);
    }

    public function insertPaiement($numLicence, $idCotisation) {
        $this->db->set('Num_Licence', $numLicence);
        $this->db->set('Id_Cotisation', $idCotisation);

        return $this->db->insert($this->table5);
    }

    public function getIdCotisation() {
        return $this->db->select('Id_Cotisation')
            ->from($this->table4)
            ->order_by('Id_Cotisation', 'desc')
            ->get()
            ->result();
    }
}