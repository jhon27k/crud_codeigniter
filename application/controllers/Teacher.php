<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacher extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Teacher_model');
    }

    public function index()
    {
        $template['page'] = "teacher";
        $template['page_title'] = "Professores cadastrados";

        $this->load->view('template', $template);

    }

    public function add_teacher()
    {
        $professores = $this->db->get('professor');
        $this->load->model('Teacher_model');
        $template['page'] = "add_teacher";
        $template['page_title'] = "Cadastrar professores";
        $template['professores'] = $professores->result_array();
        $this->load->view('template', $template);
    }


    function addTeacher(){
        $data = $_POST;
        $response = $this->Teacher_model->add_teacher($data);
        if($response){
            $this->session->set_flashdata('message', array('message' => 'Professor cadastrado com sucesso', 'title' => '', 'class' => 'success'));
            redirect(base_url() . "Teacher/add_teacher");
        }else{
            $this->session->set_flashdata('message', array('message' => 'Erro ao cadastrar, verifique sua conexão e tente novamente', 'title' => 'Warning !', 'class' => 'warning'));
            redirect(base_url() . "Teacher/add_teacher");
        }
    }

    public function edit_teacher()
    {
        $id = $this->uri->segment(3);
        $professor = $this->db->get_where('professor', array('idProfessor' => $id));
        $this->load->model('Teacher_model');
        $template['page'] = "edit_teacher";
        $template['page_title'] = "Editar professor";
        $template['professor'] = $professor->row_array();
        $this->load->view('template', $template);
    }


    public function update_teacher($id)
    {
        $data = $_POST;
        $data['idProfessor'] = $id;
        $response = $this->Teacher_model->update_teacher($data);
        if ($response) {
            $this->session->set_flashdata('message', array('message' => 'Professor atualizado com sucesso', 'title' => '', 'class' => 'success'));
            redirect(base_url() . "Teacher/add_teacher");
        } else {
            $this->session->set_flashdata('message', array('message' => 'Erro ao atualizar, verifique sua conexão e tente novamente', 'title' => 'Warning !', 'class' => 'warning'));
            redirect(base_url() . "Teacher/add_teacher");
        }

    }

    public function delete_teacher($id){
        $query = $this->db->delete('professor', array('idProfessor' => $id));
        if ( $query) {
            $this->session->set_flashdata('message', array('message' => 'Professor apagado com sucesso', 'title' => '', 'class' => 'success'));
            redirect(base_url() . "Teacher/add_teacher");
        } else {
            $this->session->set_flashdata('message', array('message' => 'Erro ao apagar, verifique sua conexão e tente novamente', 'title' => 'Warning !', 'class' => 'warning'));
            redirect(base_url() . "Teacher/add_teacher");
        }
        // var_dump($query); die();
    }









}
