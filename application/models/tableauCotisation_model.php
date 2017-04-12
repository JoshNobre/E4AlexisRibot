<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TableauCotisation_model extends CI_Model
{
    public function getInfosCotisation() {
        return $this->db->select('cotisation.Id_Cotisation, Nom_Payeur, Montant_Cotisation, Type_Cotisation, Cotisation_Payee, adherent.Num_Licence, Nom, Prenom')
            ->from('adherent, cotisation, payer')
            ->where('payer.Id_Cotisation = cotisation.Id_Cotisation and payer.Num_Licence = adherent.Num_Licence')
            ->get()
            ->result();
    }
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