<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materiel_model extends CI_Model
{
    protected $table = 'materiel';

    public function addMateriel($nomMateriel, $qteStock, $prixAchat, $prixLocation) {
        $this->db->set('Nom_Materiel', $nomMateriel);
        $this->db->set('QteStock_Materiel', $qteStock);
        $this->db->set('Prix_Achat', $prixAchat);
        $this->db->set('Prix_Location', $prixLocation);

        return $this->db->insert($this->table);
    } 
}