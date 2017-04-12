<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TableauAdherent_model extends CI_Model
{
     public function getInfosAdherent() {
        return $this->db->select('*')
            ->from('adherent')
            ->get()
            ->result();
    }
}