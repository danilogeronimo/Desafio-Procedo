<table id="tabela_usuarios" class="display" style="width:100%">
  <thead>
      <tr>
          <th>Nome</th>
          <th>Cidade</th>
          <th>Estado</th>
          <th>Situação</th>
          <th>Cod</th>
          <th>Email</th>
          <th>Sexo</th>
          <th>Telefone</th>
          <th>Opções</th>
      </tr>
  </thead>
  <tbody></tbody>
  <tfoot>
    <tr>
      <th>Nome</th>     
      <th>Cidade</th>
      <th>Estado</th>
      <th>Situacao</th>
    </tr>
  </tfoot>
</table>

<!-- Modal Remove -->
<div id="remove_usuario_modal" class="modal fade">  
  <div class="modal-dialog">  
    <div class="modal-content">  
      <div class="modal-header">  
       <button type="button" class="close" data-dismiss="modal">&times;</button>  
       <h4 class="modal-title">Remover Usuário?</h4>  
      </div>  
      <div class="modal-body">  
        <label>Você tem certeza que deseja remover o usuário selecionado?</label>
        <form method="post" id="removeUsuario" action=""> 
          <input type="submit" name="btnModalRemove" id="btnModalRemove" value="Remover" class="btn btn-success" /> 
        </form>
      </div>
      <div class="modal-footer">  
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>  
      </div> 
    </div>     
  </div>  
</div> 

<!-- Modal Edita-->
<div id="edita_usuario_modal" class="modal fade">  
  <div class="modal-dialog">  
    <div class="modal-content">  
    <div class="modal-header">  
     <button type="button" class="close" data-dismiss="modal">&times;</button>  
     <h4 class="modal-title">Editar Usuário</h4>  
    </div>  
    <div class="modal-body">  
     <form method="post" id="atualizaUsuarioForm" action="">  
      <label>Nome</label>  
      <input type="text" name="nome" id="nome" class="form-control" />  
      <br /> 
      <label>Email</label>  
      <input type="text" name="email" id="email" class="form-control" />  
      <br />  
      <label>Sexo</label>  
      <select name="sexo" id="sexo"></select> 
      <br /> 
      <br />   
      <label>Telefone</label>  
      <input type="text" name="telefone" id="telefone" class="form-control" />    
      <br />     
      <label>Estado</label>  
      <select name="estado" id="estado"></select> 
      <br />  
      <label>Cidade</label>  
      <select name="cidade" id="cidade"></select> 
      <br />  
      <label>Situação</label>  
      <select name="situacao">
          <option value="1">Ativo</option>
          <option value="2">Inativo</option>
       </select> 
      <br />  
      <input type="hidden" name="cod" id="cod" />  
      <input type="hidden" name="id_estado" id="id_estado" />  
      <input type="hidden" name="id_cidade" id="id_cidade" />  
      <input type="submit" name="btnAtualiza" id="btnAtualiza" value="Salvar" class="btn btn-success" />  
     </form>  
    </div>  
    <div class="modal-footer">  
         <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>  
    </div>  
   </div>  
  </div>  
</div>  