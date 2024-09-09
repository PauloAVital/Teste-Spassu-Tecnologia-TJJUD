function insertAutor() {
    event.preventDefault();
    if ($("#nome").val() == '') {
        $("#alert_nome").removeAttr("style");
        $("#alert_nome").addClass('alert alert-warning alert-dismissible fade show');
    } else {
        let _token   = $('meta[name="csrf-token"]').attr('content');
        let _Nome = $("#nome").val();
        let _Codl = $("#livro").find('option:selected').attr('id');
        $.ajax({
            type: 'POST',
            url: "\insert_autor",
            data: {
                _token: _token,
                _Codl: _Codl,
                _Nome: _Nome
            },
            success: function(data) {

                if (data['success']) {
                    $("#nome").val("");
                    $("#livro").val("");
                    $("#success_autor").removeAttr("style");
                    $("#success_autor").addClass('alert alert-success alert-dismissible fade show');
                }
            }
        });
    }
}

$(".btnExcluirAutor").on( "click", function() {
    $id = $(this).attr('id').split(",");
    let _token   = $('meta[name="csrf-token"]').attr('content');
    let _Codl = $id[0];
    let _CodAu = $id[1];
    $.ajax({
        type: 'POST',
        url: "\delete_autor",
        data: {
            _token: _token,
            _Codl: _Codl,
            _CodAu: _CodAu
        },
        success: function(data) {
            if (data['success']) {
                $("#Nome").val("");
                $("#livro").val("");
                $("#success_autor_delete").removeAttr("style");
                $("#success_autor_delete").addClass('alert alert-success alert-dismissible fade show');
                location.reload();
            }
        }
    });
})
