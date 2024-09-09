function insertLivro() {
    event.preventDefault();
    
    var chkAssunto = new Array();
    var listAssunto = '';
        $("input[name='assunto[]']:checked").each(function ()
    {
        chkAssunto.push( $(this).val());
        listAssunto = listAssunto+','+$(this).val();
    });

    var chkAutor = new Array();
    var listAutor = '';
        $("input[name='Autor[]']:checked").each(function ()
    {
        chkAutor.push( $(this).val());
        listAutor = listAutor+','+$(this).val();
    });
    
    if ($("#titulo").val() == '') {
        $("#alert_titulo").removeAttr("style");
        $("#alert_titulo").addClass('alert alert-warning alert-dismissible fade show');
    } else if ($("#editora").val() == ''){
        $("#alert_editora").removeAttr("style");
        $("#alert_editora").addClass('alert alert-warning alert-dismissible fade show');
    } else if ($("#valor").val() == ''){
        $("#alert_valor").removeAttr("style");
        $("#alert_valor").addClass('alert alert-warning alert-dismissible fade show');
    } else if (chkAssunto.length == 0){
        $("#alert_assunto").removeAttr("style");
        $("#alert_assunto").addClass('alert alert-warning alert-dismissible fade show');
    } else if (chkAutor.length == 0){
        $("#alert_autor").removeAttr("style");
        $("#alert_autor").addClass('alert alert-warning alert-dismissible fade show');
    }
      else {
        let _token   = $('meta[name="csrf-token"]').attr('content');
        let _titulo = $("#titulo").val();
        let _editora = $("#editora").val();
        let _edicao = $("#edicao").find('option:selected').attr('id');
        let _valor = $("#valor").val();
        let _ano = $("#ano").find('option:selected').attr('id');
       
        $.ajax({
            type: 'POST',
            url: "\insert_livro",
            data: {
                _token: _token,
                _titulo: _titulo,
                _editora: _editora,
                _edicao: _edicao,
                _valor: _valor,
                _ano: _ano,
                chkAssunto,
                listAssunto,
                chkAutor,
                listAutor
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


function mascaraValor(campo,evento){
    alert(campo.value);
    var tecla = (!evento) ? window.event.keyCode : evento.which;
  var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
  var resultado  = "";
  var mascara = "###,##".reverse();
  for (var x=0, y=0; x<mascara.length && y<valor.length;) {
    if (mascara.charAt(x) != '#') {
      resultado += mascara.charAt(x);
      x++;
    } else {
      resultado += valor.charAt(y);
      y++;
      x++;
    }
  }
}