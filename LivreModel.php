<?php

class LivreModel extends CI_Model {

    // Seul les fonctions concernées sont affichées
      
    function get_livre($id) {
        return $this->db->get_where('livre',array('id'=>$id))->row_array();
    }

    function get_count(){
        return $this->db->count_all('livre');
    }
    
    function get_all_livres($start=NULL,$count=NULL) {
        
        if(isset($start)&& isset($count)) :
            
            return $this->db->get('livre',$count,$start)->result_array();
           
                // retourne $count livre a partir de $start livre
        else: 
            return $this->db->get('livre')->result_array();
        endif;
    }
}
