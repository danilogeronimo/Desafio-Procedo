<html>
<head>
  <title>Desafio Procedo</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>"> 
  <link rel="stylesheet" href="<?php echo base_url('assets/css/desafio.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/DataTables/datatables.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap.min.css'); ?>">
  <script type="text/javascript" src="<?php echo base_url('assets/jquery/js/jquery-3.3.1.min.js'); ?>"></script>  
  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>  
  <script type="text/javascript" src="<?php echo base_url('assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/busca_estados.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/mascaras.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/preenche_clientes.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/preenche_usuarios.js'); ?>"></script>
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">Desafio Procedo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">  
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Login');?>">Home</a>
      </li>    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastros
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo base_url('Registra_Usuario/carrega_pagina') ?>">Usuário</a>
          <a class="dropdown-item" href="<?php echo base_url('Registra_Cliente/carrega_pagina') ?>">Cliente</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Listagem
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo base_url('Lista_Usuarios/carrega_pagina') ?>">Usuários</a>
          <a class="dropdown-item" href="<?php echo base_url('Lista_Clientes/carrega_pagina') ?>">Clientes</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<div class="container text-center">