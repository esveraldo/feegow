/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {

    $('#btn_solicitar_horario').click(function () {

        var name = '';
        var cpf = '';
        var birthdate = '';
        
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if ($.trim($('#name').val()).length == 0)
        {
            name = 'Nome é obrigatorio.';
            $('#error_name').text(name);
            $('#name').addClass('has-error');
        } else
        {
            name = '';
            $('#error_name').text(name);
            $('#name').removeClass('has-error');
        }

        if ($.trim($('#cpf').val()).length == 0)
        {
            cpf = 'CPF é obrigatorio.';
            $('#error_cpf').text(cpf);
            $('#cpf').addClass('has-error');
        } else
        {
            cpf = '';
            $('#error_cpf').text(cpf);
            $('#cpf').removeClass('has-error');
        }

        if ($.trim($('#birthdate').val()).length == 0)
        {
            birthdate = 'Nascimento é obrigatorio.';
            $('#error_birthdate').text(birthdate);
            $('#birthdate').addClass('has-error');
        } else
        {
            birthdate = '';
            $('#error_birthdate').text(birthdate);
            $('#birthdate').removeClass('has-error');
        }

        
    });

});


