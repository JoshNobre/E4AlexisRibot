<?php

class TournoisAdherent extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function tournoisListe()
    {
        $this->load->model('tournoisAdherent_model', 'tournoisAdherent');
        $this->load->model('tournoisAdminList_model', 'tournoisAdminList');
        $this->load->view('tournoisAdherent');

    }
}

?>