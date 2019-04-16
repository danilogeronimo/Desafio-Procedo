$( document ).ready(function() {
    
	$('#id_estado').change(function(){
		var id = parseInt($(this).children("option:selected").val());    
		$.ajax({
		  method: "POST",
		  url: "busca_cidade",
		  dataType:'json',
      data: { estado: id },
      success:function(data){         
        $('#cidade_select').children().each(function(){
          $(this).remove();
        });
        $.each(data,function(i,d){
          $('#cidade_select').append('<option value="'+d.id+'">' + d.nome + '</option>');
        })
      }
		});
	});

});