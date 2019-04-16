<?php 

class Login_Controller extends CI_Controller{

  public function view(){
    $this->login();
  }

  public function login(){
    if(!file_exists(APPPATH.'/views/pages/login.php')){
      show_404();
    }

    $this->load->view('templates/header');    
    $this->load->view('pages/login');
    $this->load->view('templates/footer');
  }

  public function logout(){
    if($this->session->has_userdata('logado')){
      $this->session->sess_destroy();
      $this->load->view('templates/header'); 
      $this->load->view('pages/logout');
      $this->load->view('templates/footer');      
    }
  }

  public function recupera_senha(){
    $this->load->view('templates/header');
    $this->load->view('pages/recupera_senha');
    $this->load->view('templates/footer');
  }

  public function envia_email(){
    $this->load->model('usuario_model');

    $this->load->library('email', array('mailtype' =>'html'));
    $this->email->from('localhost',"System Admin");
    $this->email->to($this->input->post('email'));
    $this->email->subject("Recadastrar Senha");
    $e = $this->input->post('email');
    $s = $this->usuario_model->senha($e);
    
    
    $mensagem = "<p>A sua senha é: <strong>".$s[0]->senha."</strong> vê se não esquece, eim?</p>";
    

    $this->email->message($mensagem);

    if($this->email->send()){
      $this->load->view('templates/header');
      $this->load->view('pages/email_enviado');
      $this->load->view('templates/footer');

    }else{
      $this->load->view('templates/header');
      $this->load->view('pages/email_falha');
      $this->load->view('templates/footer');
    }
    
  }

  // public function nova_senha(){
  //   $this->load->view('templates/header');
  //   $this->load->view('pages/nova_senha');
  //   $this->load->view('templates/footer');

  // }

  public function autenticado(){
    if($this->session->has_userdata('logado')){
      $this->load->view('templates/header'); 
      $this->load->view('pages/autenticado');
      $this->load->view('templates/footer');       
    }else{
      redirect('Login_Controller');
    }

  }

  public function valida_login(){
    $this->form_validation->set_rules('email','Email','required|trim|valid_email');
    $this->form_validation->set_rules('senha','Senha','trim|required');    
    
    if($this->form_validation->run()==TRUE && $this->autentica_usuario() == TRUE){
      $data = array(        
        'email'     => $this->input->post('email'),
        'logado' => TRUE
      );
      $this->session->set_userdata($data);
      redirect('Lista_Clientes/carrega_pagina');       
    }   
    $this->login();
  }

  public function autentica_usuario(){
    $this->load->model('usuario_model');
   
    if($this->usuario_model->verifica_acesso()){
      return true;
    }else{
      return false;
    }
  }
}