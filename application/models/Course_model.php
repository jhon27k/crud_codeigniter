<?php 



class Course_model extends CI_Model {
 
    function __construct()
    {
        // Chamar o construtor do Model
        parent:: __construct();    
    }
    
    function cad_course($data){
        $data['data_cad'] = date('d/m/Y');
        if($this->db->insert('cursos', $data)){
            return true;
        }
        else{
            return false;
        }
    }





}


?>