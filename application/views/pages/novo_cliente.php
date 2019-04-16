<div class="form-center">
  <?php 
    echo form_open('registra_cliente/valida_cadastro'); 
    echo validation_errors();
  ?>
  <h2 id="teste">Novo Cliente</h2>

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
    echo form_label('CNPJ:','cnpj');
    echo form_input('cnpj','','placeholder="CNPJ"'); 
  ?>
  </p>
 
  <p>
  <?php
    echo form_label('Tel:','telefone');
    echo form_input('telefone','','placeholder="Telefone"'); 
  ?>  
  </p>
  <p>
    Origem
  </p>
  <?php echo form_checkbox('origem[]', 'Site', false); ?> Site
  <br>
  <?php echo form_checkbox('origem[]', 'Boca a Boca', false); ?> Boca a Boca
  <br>
  <?php echo form_checkbox('origem[]', 'Facebook', false); ?> Facebook
  <br>
  <?php echo form_checkbox('origem[]', 'Indicação', false); ?> Indicação
  </p>
  <p>
  <?php   
  foreach($estados as $row){
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
    $s = array("1"=>"Ativo", "2"=>"Inativo");
    echo form_label("Situacao:","situacao");
    echo form_dropdown('situacao',$s);
  ?>
  </p>
  <p>
  <?php 
    $data = array(
      'name'          => 'observacao',
      'id'            => 'observacao',
      'value'         => '',
      'maxlength'     => '100',
      'size'          => '50',
      'style'         => 'width:50%'
    );
    echo form_label("Observação:","observacao");
    echo form_textarea($data); 
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