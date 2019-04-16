<?php 
class Registra_Usuario extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('estados_model'); 
    $this->load->model('cidades_model');
  }

  public function view(){
    $this->carrega_pagina();
  }

  public function carrega_pagina(){     
    $this->load->view('templates/header');    
    $data['estados'] = $this->preenche_estados();   
    $data['cidades'] = $this->busca_cidade(); 
    $this->load->view('pages/novo_usuario',$data);
    $this->load->view('templates/footer');
  }

  public function preenche_estados(){
    return $this->estados_model->lista_estados();
  }

  public function busca_cidade(){ 
    if(isset($_POST['estado'])){
      $id = $_POST['estado']; 
      echo json_encode($this->cidades_model->lista_cidades_id($id)); 
    } else{
      return $this->cidades_model->lista_cidades();
    }
  }


  public function valida_cadastro(){
    $this->form_validation->set_rules('nome','Nome','required|trim');
    $this->form_validation->set_rules('email','Email','required|trim|valid_email');
    $this->form_validation->set_rules('senha', 'Senha','callback_valida_senha');
    $this->form_validation->set_rules('sexo','Sexo','required');
    $this->form_validation->set_rules('telefone','Telefone','required');
    $this->form_validation->set_rules('estado', 'Estado', 'required');
    $this->form_validation->set_rules('cidade','Cidade', 'required');
    $this->form_validation->set_rules('situacao','Situação','required');

    if($this->form_validation->run() == TRUE){
      $this->cadastra_usuario();
    }else{
      $this->view();
    }
  }

  public function cadastra_usuario(){
    $this->load->model('usuario_model');
    $this->valida_senha();
    if($this->usuario_model->cadastra($_POST)){
      $this->load->view('templates/header');
      $this->load->view('pages/sucesso');
      $this->load->view('templates/footer');
    }else{
      $this->load->view('templates/header');
      $this->load->view('pages/erro');
      $this->load->view('templates/footer');
    }
  }

  public function remove_usuario(){
    $this->load->model('usuario_model');
    
    if($this->usuario_model->excluir($_POST['cod'])){
      $this->load->view('templates/header');
      $this->load->view('pages/sucesso');
      $this->load->view('templates/footer');
    }else{
      $this->load->view('templates/header');
      $this->load->view('pages/erro');
      $this->load->view('templates/footer');
    }
  }

  public function edita_usuario(){
    $this->load->model('usuario_model');

    if($this->usuario_model->atualiza($_POST)){
      $this->load->view('templates/header');
      $this->load->view('pages/sucesso');
      $this->load->view('templates/footer');
    }else{
      $this->load->view('templates/header');
      $this->load->view('pages/erro');
      $this->load->view('templates/footer');
    }
  }


  public function valida_senha($senha = ''){
    $senha = trim($senha);

    $regex_lowercase = '/[a-z]/';
    $regex_uppercase = '/[A-Z]/';
    $regex_number = '/[0-9]/';
    $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';

    if (empty($senha))
    {
      $this->form_validation->set_message('valida_senha', 'O campo {field} é obrigatório.');
      return FALSE;
    }
    if (preg_match_all($regex_lowercase, $senha) < 1)
    {
      $this->form_validation->set_message('valida_senha', 'O campo {field} deve conter pelo menos um caracter com a letra minúscula.');
      return FALSE;
    }
    if (preg_match_all($regex_uppercase, $senha) < 1)
    {
      $this->form_validation->set_message('valida_senha', 'O campo {field} deve conter pelo menos um caracter com a letra maiúscula.');
      return FALSE;
    }
    if (preg_match_all($regex_number, $senha) < 1)
    {
      $this->form_validation->set_message('valida_senha', 'O campo {field} deve conter pelo menos um número.');
      return FALSE;
    }
    if (preg_match_all($regex_special, $senha) < 1)
    {
      $this->form_validation->set_message('valida_senha', 'O campo {field} deve conter pelo menos um caracter especial.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
      return FALSE;
    }
    if (strlen($senha) < 5)
    {
      $this->form_validation->set_message('valida_senha', 'O campo {field} deve conter no mínimo seis caracteres.');
      return FALSE;
    }

    return TRUE;
  }

}