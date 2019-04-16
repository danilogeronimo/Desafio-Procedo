<?php 
class Registra_Cliente extends CI_Controller{

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
    $this->load->view('pages/novo_cliente',$data);
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
    $this->form_validation->set_rules('cnpj', 'CNPJ','required|trim');
    $this->form_validation->set_rules('telefone','Telefone','required|trim');
    $this->form_validation->set_rules('origem','Origem');
    $this->form_validation->set_rules('estado', 'Estado', 'required');
    $this->form_validation->set_rules('cidade','Cidade', 'required');
    $this->form_validation->set_rules('situacao','Situação','required');

    if($this->form_validation->run() == TRUE){
      $this->cadastra_cliente();
    }else{
      $this->view();
    }
  }

  public function cadastra_cliente(){ 
    $this->load->model('cliente_model');
    $this->formata_campo_origem();
    if($this->cliente_model->cadastra($_POST)){ 
      $this->load->view('templates/header');
      $this->load->view('pages/sucesso');
      $this->load->view('templates/footer');     
    }else{
      $this->load->view('templates/header');
      $this->load->view('pages/erro');
      $this->load->view('templates/header');
    }
  }
  
  public function remove_cliente(){
    $this->load->model('cliente_model');
    
    if($this->cliente_model->excluir($_POST['cod'])){
      $this->load->view('templates/header');
      $this->load->view('pages/sucesso');
      $this->load->view('templates/header');
    }else{
      $this->load->view('templates/header');
      $this->load->view('pages/erro');
      $this->load->view('templates/header');
    }
  }


  public function edita_cliente(){
    $this->load->model('cliente_model');

    if($this->cliente_model->atualiza($_POST)){
      $this->load->view('templates/header');
      $this->load->view('pages/sucesso');
      $this->load->view('templates/header');
    }else{
      $this->load->view('templates/header');
      $this->load->view('pages/erro');
      $this->load->view('templates/header');
    }
  }

  public function formata_campo_origem(){
    $origem = $this->input->post('origem');
    $origem = implode(',',$origem);

    if(!empty($origem)){
      $_POST['origem'] = $origem;
    }else{
      $_POST['origem'] = "";      
    }
  }

}