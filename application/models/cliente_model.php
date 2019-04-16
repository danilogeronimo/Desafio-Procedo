<?php
class Cliente_Model extends CI_Model {

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

  public function cadastra($cliente){
    $data = array(
      'nome' => $cliente['nome'],
      'email' => $cliente['email'],
      'cnpj' => $cliente['cnpj'],
      'telefone' => $cliente['telefone'],
      'origem' => $cliente['origem'],
      'estado_cod' => $cliente['estado'],
      'cidade_cod' => $cliente['cidade'],
      'situacao' => $cliente['situacao'],
      'observacao' => $cliente['observacao']
    );
    if($this->db->insert('cliente', $data)){
      return true;
    }else{
      return false;
    }
  }

  public function excluir($id){
    $this->db->where('cod', $id);
    if($this->db->delete('cliente')){
      return true;
    }else{
      return false;
    }    
  }

  public function atualiza($cliente){
    print_r($cliente);
    $this->db->set('nome',$cliente['nome']);
    $this->db->set('email',$cliente['email']);
    $this->db->set('cnpj',$cliente['cnpj']);
    $this->db->set('situacao',$cliente['situacao']);
    $this->db->where('cod',$cliente['cod']);

    if($this->db->update('cliente')){
      return true;
    }else{
      return false;
    }
  }

  public function lista(){
    $sql = "SELECT cli.cod, cli.nome,cli.email,cli.cnpj,cli.telefone,cid.nome AS 'cidade', est.uf, sit.status as 'situacao', sit.cod as 'id_situacao', est.id_estado, cid.id as 'id_cidade' FROM cliente AS cli, cidade AS cid, estado AS est, situacao as sit WHERE cli.estado_cod = est.id_estado AND cli.cidade_cod = cid.id AND cli.situacao = sit.cod GROUP BY cli.nome";
    $query = $this->db->query($sql);
    return $query;
  }

}