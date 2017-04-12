<?php

class RetrouverAdherent extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function listeAdherents()
    {
        $this->load->model('retrouverAdherent_model', 'retrouverAdherent');
        $this->load->view('retrouverAdherent');
    }
}

?>