/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {

    $("#btn_solicitar_horario").click(function (event) {
        event.preventDefault();
        var dados = $('#register_form').serialize();

        $.ajax({
            url: 'helpers/record-clients.php',
            dataType: 'html',
            type: 'POST',
            data: dados,

        }).done(function (response) {
            console.log(response);
            $(".resposta").html('<div class="alert alert-success">Agendado com sucesso! </a></strong></div>');
        })
                .fail(function (response) {
                    console.log(response);
                    $(".resposta").html('<div class="alert alert-danger">Erro ao gravar os dados!</div>');
                });
    });
});


