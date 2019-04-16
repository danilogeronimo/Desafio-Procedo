<?php 
class Cidades_Model extends CI_Model{
  public function lista_cidades(){
    $this->db->select('nome,id');
    $this->db->from('cidade');
    $query = $this->db->get();

    return $query->result(); 
  }

  public function lista_cidades_id($id){
    $sql = "SELECT c.nome, c.id, e.id_estado FROM cidade AS c JOIN estado AS e ON c.estado = e.id_estado WHERE e.id_estado=".$id."";    
    $query = $this->db->query($sql);
    return $query->result();
  }

}
