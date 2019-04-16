$(document).ready(function(){ 
  
  //carrega datatables
  var table = $('#tabela_usuarios').DataTable({
    ajax: "../lista_usuarios/busca_usuarios",
    columns:[
      { data: 'nome' },
      { data: 'cidade' },
      { data: 'uf' },
      { data: 'situacao' },
      { data: 'cod' },
      { data: 'email' },
      { data: 'sexo' },
      { data: 'telefone' },
      {"defaultContent": "<button id='btnEdita'>Edita</button><button id='btnRemove'>Remove</button>"}        
    ]    
  });

  //edita usuario na tabela
  $('#tabela_usuarios tbody').on( 'click', '#btnEdita', function () {
    
    // lista no modal os dados selecionados na tabela
    var dt = table.row( $(this).parents('tr') ).data();
    $('#edita_usuario_modal').modal('show'); 

    $("#cod").val(dt.cod);
    $("#nome").val(dt.nome);
    $("#email").val(dt.email);
    $("#sexo").append('<option value="">'+dt.sexo+'</option>' );
    $("#telefone").val(dt.telefone);
    $("#estado").append('<option value="">'+dt.uf+'</option>' );
    $('#cidade').append('<option value="">'+dt.cidade+'</option>' );
    $("#id_estado_edit").val(dt.id_estado);
    $("#id_cidade").val(dt.id_cidade);
    $("#situacao").val(dt.id_situacao);

    // envia os novos dados ao banco
    $("#btnAtualiza").on('click',function(e){
      $.ajax({
        url:'../registra_usuario/edita_usuario',
        method:'post',
        dataType:'json',
        data: $('#atualizaUsuarioForm').serialize(),
        success: function(){
          $('#edita_usuario_modal').modal('hide');
        }
      });
    });
      
  });


  //exclui usuario da tabela
  $('#tabela_usuarios tbody').on( 'click', '#btnRemove', function () {    
    var dt = table.row( $(this).parents('tr') ).data();    
    $('#remove_usuario_modal').modal('show');

    $("#btnModalRemove").on('click',function(){  
      $.ajax({
        url:'../registra_usuario/remove_usuario/',
        method:'post',
        data:{'cod': dt.cod},
        success: function(){
          $('#remove_usuario_modal').modal('hide');
        }
      });
    });
  });

  //Filtragem por campos
  filtros( table );
  table.on( 'draw', function () {
    filtros( table );
  });

  function filtros( table ) {
    table.columns().every( function () {
      var column = table.column( this, {search: 'applied'} );

      var select = $('<select><option value="">Filtro</option></select>').appendTo( $(column.footer()).empty() ).on( 'change', function () {
          var val = $.fn.dataTable.util.escapeRegex($(this).val());
          column.search( val ? '^'+val+'$' : '', true, false ).draw();
      });

      column.data().unique().sort().each( function ( d, j ) {
        select.append( '<option value="'+d+'">'+d+'</option>' );
      } );
    
      var currSearch = column.search();
      if ( currSearch ) {
        select.val( currSearch.substring(1, currSearch.length-1) );
      }
    });
  }

});
