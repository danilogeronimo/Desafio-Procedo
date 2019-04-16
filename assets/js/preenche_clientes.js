$(document).ready(function(){ 
  
  //carrega datatables
  var table = $('#tabela_clientes').DataTable({
    ajax: "../lista_clientes/busca_clientes",
    columns:[
      { data: 'nome' },
      { data: 'cidade' },
      { data: 'uf' },
      { data: 'situacao' },
      { data: 'cod' },
      { data: 'email' },
      { data: 'cnpj' },
      { data: 'telefone' },
      {"defaultContent": "<button id='btnEdita'>Edita</button><button id='btnRemove'>Remove</button>"}        
    ]    
  });

  //edita cliente na tabela
  $('#tabela_clientes tbody').on( 'click', '#btnEdita', function () {
    
    // lista no modal os dados selecionados na tabela
    var dt = table.row( $(this).parents('tr') ).data();
    $('#edita_cliente_modal').modal('show');

    $("#cod").val(dt.cod);
    $("#nome").val(dt.nome);
    $("#email").val(dt.email);
    $("#cnpj").val(dt.cnpj);
    $("#telefone").val(dt.telefone);
    $("#estado").append('<option value="">'+dt.uf+'</option>' );
    $('#cidade').append('<option value="">'+dt.cidade+'</option>' );
    $("#id_estado_edit").val(dt.id_estado);
    $("#id_cidade").val(dt.id_cidade);
    $("#situacao").val(dt.id_situacao);

    // envia os novos dados ao banco
    $("#btnAtualiza").on('click',function(){
      $.ajax({
        url:'../registra_cliente/edita_cliente',
        method:'POST',
        dataType:'json',
        data: $('#atualizaClienteForm').serialize(),
        success: function(){
          $('#edita_cliente_modal').modal('hide');
        }
      });
    });

  });

  //exclui cliente da tabela
  $('#tabela_clientes tbody').on( 'click', '#btnRemove', function () {    
    var dt = table.row( $(this).parents('tr') ).data();    
    $('#remove_cliente_modal').modal('show');

    $("#btnModalRemove").on('click',function(){   
      $.ajax({
        url:'../registra_cliente/remove_cliente/',
        method:'post',
        data:{'cod': dt.cod},
        success: function(){
          $('#remove_cliente_modal').modal('hide');
        }
      });
    });
  });

  // Filtragem por campos
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
