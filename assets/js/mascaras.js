$( document ).ready(function() {

  function mascara(o,f){;
    v_obj=o;
    v_fun=f;
    setTimeout(execmascara(),1);
  }

  function execmascara(){
    v_obj.value=v_fun(v_obj.value);
  }
    
  //telefone
  $('input[name=telefone]').on('keypress', function(){
    mascara(this, tel_replace);
  });

  function tel_replace(v){
    v=v.replace(/\D/g,"");                 
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); 
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");  
    return v.substr(0, 15);
  }

  //cnpj
  $('input[name=cnpj]').on('keypress',function(){
    mascara(this, cnpj_replace);
  });

  function cnpj_replace(v){
    v=v.replace(/\D/g, '');
    v=v.replace(/^(\d{2})(\d{3})?(\d{3})?(\d{4})?(\d{2})?/, "$1.$2.$3/$4-$5");
    return v.substr(0, 18);
  }

}); 