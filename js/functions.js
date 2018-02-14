$(document).on('submit','form',function(e){


    e.preventDefault();
    $form =$(this);

    var formdata = new FormData($form[0]);

    var request = new XMLHttpRequest();

    request.upload.addEventListener('progress',function(e){

        var percent = Math.round(e.loaded / e.total * 100);
        $form.find('.progress-bar').width(percent + '%').html(percent + '%');

    });

    request.addEventListener('load',function(e){

        $form.find('progresss-bar').addClass('progress-bar-success').html('Upload completed!');
    });

    setTimeout("window.open(self.location, '_self');", 1000);
    //Arquivo resposável por processar o recebimento do arquivo
    request.open('post','Main.php');
    request.send(formdata)
});

$(document).ready(function(){


    $("#modal").dialog({

      draggable: true,
        minWidth: 500,
         minHeight: 500

    })

});
$(document).ready(function(){

    $('table').dataTable({

        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "oLanguage":{
            "sProcessing": "Carregando...",
            "sLengthMenu": "Exibindo _MENU_ registros por página",
            "sZeroRecords": "Nenhum registro encontrado",
            "sInfo": "Exibindo _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Exibindo 0 até 0 de 0 registros ",
            "sInfoFiltered": "filtrando para  _MAX_ total registros",
            "sSearch": "Pesquisar",
            "oPaginate":{
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"

            }

        }

    });
});

window.onload = function(){
    document.getElementById('conteudo').style.display = "block";
    setTimeout(function() {
        document.getElementById('carregando').style.display = "none";
    }, 2000);
}