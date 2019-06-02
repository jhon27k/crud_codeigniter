<?php 



class Registration_model extends CI_Model {
 
    function __construct()
    {
        // Chamar o construtor do Model
        parent:: __construct();    
    }
    
    function CursosProf(){
        $query = $this->db->select( 'cursos.idCursos as idCurso,
								cursos.nome as curso_nome,
								professor.idProfessor as prof_id,
								professor.nome as prof_nome');
     $this->db->join('professor', 'professor.idProfessor = cursos.id_prof', 'inner');
        $this->db->from('cursos');

        $query = $this->db->get();

        $query = $query->result_array();

        return $query;

    }

    function allRegistrations()
    {
        $query = $this->db->select( '
                                aluno.idAluno as id_aluno,
                                aluno.data_nacimento as data_nas,
                                aluno.logradouro as rua,
                                aluno.numero as numero,
                                aluno.bairro as bairro,
                                aluno.nome as nome_aluno,
                                aluno.cidade as cidade,
                                aluno.estado as estado,
                                aluno.data_cad as cad,
                                aluno.cep as cep,
                                aluno.id_curso as id_curso,
                                cursos.id_prof as id_prof,
                                cursos.idCursos as idCurso,
								cursos.nome as curso_nome,
								professor.idProfessor as prof_id,
                                professor.nome as prof_nome');
        $this->db->join('cursos', 'cursos.idCursos = aluno.id_curso', 'inner');
        $this->db->join('professor', 'professor.idProfessor = cursos.id_prof', 'inner');
        $this->db->from('aluno');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }


    function add_registration($data){
        // var_dump($data); die();
        $data['data_nacimento'] = date('d/m/Y', strtotime($data['data_nascimento']));
        unset( $data['data_nascimento']);
        $data['data_cad'] = date('d/m/Y');
        if ($this->db->insert('aluno', $data)) {
            $aluno_curso['id_aluno'] = $this->db->insert_id();
            $aluno_curso['id_curso'] = $data['id_curso'];
            if($this->db->insert('aluno_cursos', $aluno_curso)){
                $result['status'] = "success";
            }
            else{
                $result['status'] = "success";
            }
            
        } else {
            $result['status'] = "success";
        }

        return $result;




}




}
