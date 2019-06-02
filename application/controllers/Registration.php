<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{


    function __construct()
    {

        parent::__construct();
        $this->load->model('Registration_model');
    }

    public function index()
    {
        // $cursos = $this->db->get('cursos')->result_array();
        $cursos = $this->Registration_model->CursosProf();
        $template['page'] = "registration";
        $template['page_title'] = "Matrícular Aluno";
        $template['cursos'] = $cursos;
        // $template['data'] = $allCilinics;
        // $template['services'] = $services;
        $this->load->view('template', $template);

    }

    public function addRegistration(){
        $data = $_POST;
        $response = $this->Registration_model->add_registration($data);

        if ($response['status'] == "success") {
            $this->session->set_flashdata('message', array('message' => 'Matricula cadastrada com sucesso', 'title' => '', 'class' => 'success'));
            redirect(base_url() . "Registration/");
        } else {
            $this->session->set_flashdata('message', array('message' => 'Erro ao cadastrar, verifique sua conexão e tente novamente', 'title' => 'Warning !', 'class' => 'warning'));
            redirect(base_url() . "Registration/");
        }
    }

    function viewRegistrations(){
        $matriculas = $this->Registration_model->allRegistrations();
        $template['page'] = "manage_registration";
        $template['page_title'] = "Gerenciar matriculas";
        $template['matriculas'] = $matriculas;
        $this->load->view('template', $template);
    }

    	public function pdf(){
        $matriculas = $this->Registration_model->allRegistrations();
        // var_dump($matriculas); die();
		$this->load->library('fpdf_gen');
		$pdf = new FPDF("L", "mm", "A4");
		$this->fpdf->SetAuthor('Jonathas mendonça');
		$this->fpdf->SetTitle('Relatório pdf', 0);
		$this->fpdf->AliasNbPages('{nb}');
		$this->fpdf->SetAutoPageBreak(true);
        $this->fpdf->SetFont('Times', '', 20);
        $this->fpdf->Write(12, utf8_decode('RELATÓRIO '), "");
        $this->fpdf->Ln(10);
        $this->fpdf->Write(12, utf8_decode('Contém todos as matriculas realizadas no sistema '), "");
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Times', 'B', 15);

        $this->fpdf->Cell(70, 10, 'Aluno ', 1, 0, 'L');
        $this->fpdf->Cell(60, 10, 'Curso ', 1, 0, 'L');
        $this->fpdf->Cell(60, 10, 'Professor ', 1, 0, 'L');
        foreach ($matriculas as  $resultado){
            $this->fpdf->ln();
            $this->fpdf->SetFont('Arial', 'B', 8);
            $this->fpdf->Cell(70, 10, utf8_decode($resultado[ 'nome_aluno']), 1, 0, 'L');
            $this->fpdf->Cell(60, 10, utf8_decode($resultado[ 'curso_nome']), 1, 0, 'L');
            $this->fpdf->Cell(60, 10, utf8_decode($resultado[ 'prof_nome']), 1, 0, 'L');
        }

		echo $this->fpdf->Output(utf8_decode('relatório.pdf'), 'D');
		// $pdf->Output();
	}






}
