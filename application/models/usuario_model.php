<?php
class Usuario_Model extends CI_Model {

  public function verifica_acesso(){
    $this->db->where('email',$this->input->post('email'));
    $this->db->where('senha',$this->input->post('senha'));
    $query = $this->db->get('usuario');
    
    if($query->num_rows() == 1){
      return true;
    } else{
      return false;
    }
  }  

  public function verifica_email(){
    $this->db->where('email',$this->input->post('email'));
    $query = $this->db->get('usuario');

    if($query->num_rows()==1){
      return true;
    }else{
      return false;
    }
  }

  public function cadastra($usuario){
    $data = array(
      'nome' => $usuario['nome'],
      'email' => $usuario['email'],
      'senha' => $usuario['senha'],
      'sexo' => $usuario['sexo'],
      'telefone' => $usuario['telefone'],
      'estado_cod' => $usuario['estado'],
      'cidade_cod' => $usuario['cidade'],
      'situacao' => $usuario['situacao']
    );
    if($this->db->insert('usuario', $data)){
      return true;
    }else{
      return false;
    }
  }
  public function excluir($id){
    $this->db->where('cod', $id);
    if($this->db->delete('usuario')){
      return true;
    }else{
      return false;
    }    
  }


  public function atualiza($usuario){
    $this->db->set('nome',$usuario['nome']);
    $this->db->set('email',$usuario['email']);
    $this->db->set('sexo',$usuario['sexo']);
    $this->db->set('telefone',$usuario['telefone']);
    $this->db->set('situacao',$usuario['situacao']);
    $this->db->where('cod',$usuario['cod']);

    if($this->db->update('usuario')){
      return true;
    }else{
      return false;
    }
  }

  public function lista(){
    $sql = "SELECT user.cod, user.nome,user.email,user.sexo,user.telefone,cid.nome AS 'cidade', est.uf, sit.status as 'situacao', sit.cod as 'id_situacao', est.id_estado, cid.id as 'id_cidade' FROM usuario AS user, cidade AS cid, estado AS est, situacao as sit WHERE user.estado_cod = est.id_estado AND user.cidade_cod = cid.id AND user.situacao = sit.cod GROUP BY user.nome";
    $query = $this->db->query($sql);
    return $query;
  }

  public function senha($email){
    $sql = "SELECT senha FROM usuario WHERE email ='".$email."'";    
    $query = $this->db->query($sql);
    return $query->result();
  }

}