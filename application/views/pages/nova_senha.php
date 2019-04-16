<div class="form-center">
	<h2>Cadastre a nova senha</h2>
	 <?php 
	    echo form_open('login_controller/nova_senha');
	    echo validation_errors();
	 	echo form_input('senha',''); 
	 	echo form_submit('','Enviar');
	 ?>
</div>