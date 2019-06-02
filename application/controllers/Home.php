<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{

		parent::__construct();
		$this->load->model('Registration_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$matriculas = $this->Registration_model->allRegistrations();
		$cursos = $this->db->get('cursos')->result_array();
		$professores = $this->db->get('professor')->result_array();
		$template['page'] = "home_site";
		$template['page_title'] = "Home";
		$template['matriculas'] = $matriculas;
		$template[ 'cursos'] = $cursos;
		$template[ 'professores'] = $professores;
		// $template['data'] = $allCilinics;
		// $template['services'] = $services;
		$this->load->view( 'template', $template);
		// $this->load->view('home_site');
	}



}
