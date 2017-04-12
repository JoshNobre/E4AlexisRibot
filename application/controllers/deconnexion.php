<?php

class Deconnexion extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function deco()
    {
    	session_unset();
    	redirect("connexion/accueil");
    }
}

?>