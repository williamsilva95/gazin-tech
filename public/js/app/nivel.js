function inserir(){
    $.get("nivel/create", function(resposta){
        window.location.href = "nivel/create"
    });
}

function editar(id){
    $.get("nivel/edit/" + id, function(resposta){
        window.location.href = "nivel/edit/" + id
    });
}

function visualizar(id){
    $.get("nivel/show/" + id, function(resposta){
        window.location.href = "nivel/show/" + id
    });
}

function deletar(id, descricao){

    swal({
        title: 'Excluir Nível',
        text: 'Deseja realmente excluir Nível:' + descricao + '?',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim",
        cancelButtonText: "Não",
        closeOnConfirm: false,
        closeOnCancel: true
    }).then((result) => {
        if(result.value) {
            $.ajax({
                type: "POST",
                url: "nivel/destroy",
                data: {_token: _token, id: id},
                success: function(data){
                    if (data.success == true) {
                        swal({
                            title: data.msg,
                            type: "success",
                            timer: 2000,
                            showConfirmButton: false
                        }).then((result) => {
                            location.reload();
                        });
                    }else{
                        swal("Nível", data.msg , "error");
                    }
                    CustomPreload.hide();
                }, error: function(){
                    CustomPreload.hide();
                    swal("Funções", 'Não é permitido a exclusão do Nível.' , "error");
                }
            }).fail(function(resposta) {
                if(resposta.status == 401){
                    CustomPreload.hide();
                    swal("Funções", "Sem permissão para acessar essa funcionalidade." , "error");
                }
            });
        }
    });
}
