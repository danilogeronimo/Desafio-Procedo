<?php 
class Estados_Model extends CI_Model{

  public function lista_estados(){
    $query = $this->db->query("SELECT uf,id_estado FROM estado;");
    
    return $query->result();
  }

}
