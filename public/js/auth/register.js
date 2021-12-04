$(".cpf").mask("000.000.000-00");
$(".cep").mask("00000-000");
$(".uf").mask("SS");
$(".phone").mask("(00) 0000-0000");
$(".cellphone").mask("(00) 00000-0000");

$("#cep").on("blur", () => {
    $.ajax({
        url: "https://viacep.com.br/ws/" + $("#cep").val() + "/json/",
        method: "GET",
        dataType: "json",
        success: (data) => {
            if (data.erro) {
                alert("Endereço não encontrado!");
            }
            $("#uf").val(data.uf);
            $("#city").val(data.localidade);
            $("#street").val(data.logradouro);
            $("#district").val(data.bairro);
        },
    });
});
