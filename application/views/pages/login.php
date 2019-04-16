<div class="form-center">
  <h2>Login</h2>
  <?php 
    echo form_open('Login_Controller/valida_login'); 
    echo validation_errors();
  ?>

  <p>
  <?php echo form_input('email','','placeholder="Email"'); ?>
  </p>
  <p>
  <?php echo form_password('senha','','placeholder="Senha"'); ?>  
  </p>
  <p><small>Novo Usuário? Clique no menu Cadastros para cadastrar um novo acesso!</small></p>
  <small>
    <?php 
      $url = base_url().'Login_Controller/recupera_senha';      
      echo form_label('<a href="'.$url.'">Esqueceu a senha?</a>','recupera_senha'); 
    ?>
  </small>
  <p>
  <?php echo form_submit('',"Entrar"); ?>  
  </p>
  <?php echo form_close(); ?>
</div>