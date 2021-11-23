(function( $ ) {
    $(function() {
        $("#cepEvento").mask("00000-000");
        
     });
})(jQuery);

$(document).on('blur','#cepEvento', function(){
    const cep = $(this).val();

    $.ajax({
       url: 'https://viacep.com.br/ws/'+cep+'/json/',
       method: 'GET',
       dataType: 'json',
       success:function(data){
            if(data.erro){
                alert('Endereço não encontrado')
            }

           $("#ufEvento").val(data.uf);
           $("#cidadeEvento").val(data.localidade);
           $("#enderecoEvento").val(data.logradouro);
           $("#bairroEvento").val(data.bairro);
           
       }
    })
})   