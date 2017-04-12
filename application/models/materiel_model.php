<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materiel_model extends CI_Model
{
    protected $table = 'materiel';

    public function addMateriel($nomMateriel, $qteStock, $prix) {
        $this->db->set('Nom_Materiel', $nomMateriel);
        $this->db->set('QteStock_Materiel', $qteStock);
        $this->db->set('Prix_Materiel', $prix);

        return $this->db->insert($this->table);
    } 
}