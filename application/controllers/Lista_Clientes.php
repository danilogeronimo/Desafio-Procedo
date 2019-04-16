<?php 

class Lista_Clientes extends CI_Controller{
  public function view(){
    $this->carrega_pagina();    
  }

  public function carrega_pagina(){    
    $this->load->view('templates/header');
    $this->load->view('pages/lista_clientes');
    $this->load->view('templates/footer');
  }

  //retorna lista de clientes para o ajax para popular o dataTables
  public function busca_clientes(){
    $this->load->model('cliente_model');

    //pega todos os clientes
    $clientes = $this->cliente_model->lista();

    //variaveis DataTables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $arrayClientes = array(
      "draw" => $draw,
      "recordsTotal" => $clientes->num_rows(),
      "recordsFiltered" => $clientes->num_rows(),
      "data" => $clientes->result()
    );

    echo json_encode($arrayClientes);
  }
}