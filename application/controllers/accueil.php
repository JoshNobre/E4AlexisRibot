<?php

class Accueil extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function pagePrincipale()
    {
       $this->load->view('accueil');
    }
}

?>