<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
	        check_not_login();
         $this->template->load('Template', 'profil/profil');
	}
}
