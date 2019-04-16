<div class="form-center">
	<h2>Forneça o email cadastrado</h2>
	 <?php 
	    echo form_open('login_controller/envia_email');
	 	echo form_input('email','','placeholder="Email"'); 
	 	echo form_submit('','Enviar');
	 ?>
</div>