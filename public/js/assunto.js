function insertAssunto() {
    event.preventDefault();
    if ($("#Descricao").val() == '') {
        $("#alert_descricao").removeAttr("style");
        $("#alert_descricao").addClass('alert alert-warning alert-dismissible fade show');
    } else {
        let _token   = $('meta[name="csrf-token"]').attr('content');
        let _Descricao = $("#Descricao").val();
        let _Codl = $("#livro").find('option:selected').attr('id');
        $.ajax({
            type: 'POST',
            url: "\insert_assunto",
            data: {
                _token: _token,
                _Codl: _Codl,
                _Descricao: _Descricao
            },
            success: function(data) {
                if (data['success']) {
                    $("#Descricao").val("");
                    $("#livro").val("");
                    $("#success_descricao").removeAttr("style");
                    $("#success_descricao").addClass('alert alert-success alert-dismissible fade show');
                }
            }
        });
    }
}

$(".btnExcluirAssunto").on( "click", function() {
    $id = $(this).attr('id').split(",");
    let _token   = $('meta[name="csrf-token"]').attr('content');
    let _Codl = $id[0];
    let _CodAs = $id[1];
    $.ajax({
        type: 'POST',
        url: "\delete_assunto",
        data: {
            _token: _token,
            _Codl: _Codl,
            _CodAs: _CodAs
        },
        success: function(data) {
            if (data['success']) {
                $("#Descricao").val("");
                $("#livro").val("");
                $("#success_descricao_delete").removeAttr("style");
                $("#success_descricao_delete").addClass('alert alert-success alert-dismissible fade show');
                location.reload();

            }
        }
    });
})
