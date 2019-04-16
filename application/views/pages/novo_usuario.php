<div class="form-center">
  <h2 id="teste">Novo Usuário</h2>
  <?php 
    echo form_open('registra_usuario/valida_cadastro'); 
    echo validation_errors();
  ?>

  <p>    
  <?php 
    echo form_label('Nome:','nome');
    echo form_input('nome','','placeholder="Nome"'); 
  ?>
  </p>
  <p>
  <?php 
    echo form_label('Email:','email');
    echo form_input('email','','placeholder="Email"'); 
  ?>
  </p>
  <p>
  <?php 
    echo form_label('Senha: ','senha');
    echo form_password('senha','','placeholder="Senha"');
   ?>  
  </p>
  <p>
    <?php 
    echo form_label('Sexo: ','sexo');
    $sexo = array(
      0 => 'Selecionar',
      'Masculino' => 'Masculino',
      'Feminino' => 'Feminino'
    );
    echo form_dropdown('sexo',$sexo); 
    ?>
  </p>
  <p>
  <?php
    echo form_label('Tel:','telefone');
    echo form_input('telefone','','placeholder="Telefone"'); 
  ?>  
  </p>
  <p>
  <?php 

  $e = [];
  foreach ($estados as $row){
    $e[$row->id_estado] = $row->uf;
  }  
  echo form_label('Estado:','estado');
  echo form_dropdown('estado',$e,'','class="" id="id_estado"'); 
  ?>

  </p>
  <p>
  <?php
    foreach ($cidades as $row) {
      $c[$row->id] = $row->nome;
    }
    echo form_label('Cidade','cidade');
    echo form_dropdown('cidade',$c,'','class="" id="cidade_select"'); 
  ?>  
  </p>
  <p>
    <?php 
      $s = array("1"=>"Ativo", "0"=>"Inativo");
      echo form_label("Situacao:","situacao");
      echo form_dropdown('situacao',$s);
    ?>
  </p>
  <p>
  <?php 
    echo form_submit('',"Cadastrar"); 
    echo form_reset('limpa_form',"Limpar");
  ?>   
  </p>
  <?php echo form_close(); ?>
</div>