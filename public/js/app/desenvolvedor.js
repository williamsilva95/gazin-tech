function inserir(){
    $.get("desenvolvedor/create", function(resposta){
        window.location.href = "desenvolvedor/create"
    });
}

function editar(id){
    $.get("desenvolvedor/edit/" + id, function(resposta){
        window.location.href = "desenvolvedor/edit/" + id
    });
}

function visualizar(id){
    $.get("desenvolvedor/show/" + id, function(resposta){
        window.location.href = "desenvolvedor/show/" + id
    });
}

function deletar(id, nome){

    swal({
        title: 'Excluir Desenvolvedor',
        text: 'Deseja realmente excluir Desenvolvedor:' + nome + '?',
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
                url: "desenvolvedor/destroy",
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
                        swal("Desenvolvedor", data.msg , "error");
                    }
                    CustomPreload.hide();
                }, error: function(){
                    CustomPreload.hide();
                    swal("Funções", 'Não é permitido a exclusão do Desenvolvedor.' , "error");
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
