(function($) {
    $(function() {
        $("#cepEvento").mask("00000-000");
    });
})(jQuery);

$(document).on("input", "#cepEvento", function() {
    const cep = $(this).val();

    console.log(cep);

    if (cep.length == 9) {
        $.ajax({
            url: "https://viacep.com.br/ws/" + cep + "/json/",
            method: "GET",
            dataType: "json",
            success: function(data) {
                if (data.erro) {
                    $("#cepEvento").addClass("is-invalid");
                    return;
                }
                $("#cepEvento").addClass("is-valid");
                $("#ufEvento").val(data.uf);
                $("#cidadeEvento").val(data.localidade);
                $("#enderecoEvento").val(data.logradouro);
                $("#bairroEvento").val(data.bairro);
            }
        });
    } else {
        $("#cepEvento").removeClass(["is-invalid", "is-valid"]);
        $("#ufEvento").val("");
        $("#cidadeEvento").val("");
        $("#enderecoEvento").val("");
        $("#bairroEvento").val("");
    }
});
