<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BilanCotisation_model extends CI_Model
{
    protected $table = 'cotisation';

    public function getCotReelle() {
        return $this->db->select('sum(Montant_Cotisation) as Montant_Cotisation')
            ->from($this->table)
            ->where('Cotisation_Payee', 1)
            ->get()
            ->result();
    }

    public function getCot() {
        return $this->db->select('sum(Montant_Cotisation) as Montant_Cotisation')
            ->from($this->table)
            ->get()
            ->result();
    }
}