<?php

class StageAdherent extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function stageListe()
    {
        $this->load->model('stagesAdherent_model', 'stagesAdherent');
        $this->load->model('stagesAdminList_model', 'stagesAdminList');
        $this->load->view('stagesAdherent');

    }
}

?>