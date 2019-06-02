<?php 



class Teacher_model extends CI_Model {
 
    function __construct()
    {
        // Chamar o construtor do Model
        parent:: __construct();    
    }
    
    function add_teacher($data){
        $data['data_nascimento'] = date('d/m/Y', strtotime($data['data_nascimento']));
        $data['data_cad'] = date('d/m/Y');
        
        if($this->db->insert('professor', $data)){
            return true;
        }
        else{
            return false;
        }
    }


    function update_teacher($data)
    {
        $data['data_nascimento'] = date('d/m/Y', strtotime($data['data_nascimento']));
        $this->db->where('idProfessor', $data['idProfessor']);
        if ($this->db->update('professor', $data)) {
            return true;
        } else {
            return false;
        }
    }


    







}


?>