<h2>Bem vindo</h2>
<pre>
<?php echo $this->session->email ?>
</pre>
<ul>
  <li>cliente</li>
  <li>cliente</li>
  <li>cliente</li>
  <li>cliente</li>
  <li>cliente</li>
</ul>
<a href="<?php if($this->session->has_userdata('logado')){echo base_url('login_controller/logout');} ?>">Sair</a>