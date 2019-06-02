<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Course_model');
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
        $template['page'] = "course";
        $template['page_title'] = "Gerenciar cursos";
        $this->load->view('template', $template);
    }

    public function add_course(){
        $professores = $this->db->get('professor')->result_array();
        $template['page'] = "add_course";
        $template['page_title'] = "Cadastrar cursos";
        $template['professores'] = $professores;
        $this->load->view('template', $template);
    }

    public function addCurso()
    {   
        $data = $_POST;
        $response = $this->Course_model->cad_course($data);
        if ($response) {
            $this->session->set_flashdata('message', array('message' => 'Curso cadastrado com sucesso', 'title' => '', 'class' => 'success'));
            redirect(base_url() . "Course/add_course");
        } else {
            $this->session->set_flashdata('message', array('message' => 'Erro ao cadastrar, verifique sua conexão e tente novamente', 'title' => 'Warning !', 'class' => 'warning'));
            redirect(base_url() . "Couse/add_course");
        }
    }

    

}
