<?php 

class Lista_usuarios extends CI_Controller{
  public function view(){
    $this->carrega_pagina();    
  }

  public function carrega_pagina(){    
    $this->load->view('templates/header');
    $this->load->view('pages/lista_usuarios');
    $this->load->view('templates/footer');
  }

  //retorna lista de usuarios para o ajax para popular o dataTables
  public function busca_usuarios(){
    $this->load->model('usuario_model');

    //pega todos os usuarios
    $usuarios = $this->usuario_model->lista();

    //variaveis DataTables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $arrayUsuarios = array(
      "draw" => $draw,
      "recordsTotal" => $usuarios->num_rows(),
      "recordsFiltered" => $usuarios->num_rows(),
      "data" => $usuarios->result()
    );

    echo json_encode($arrayUsuarios);
  }
}