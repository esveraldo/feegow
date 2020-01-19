<?php include_once 'commom/header.php'; ?>
<div class="row">
    <div class="container box text-center">
        <h2>Seja bem vindo.</h2><br />
        <?php

        use App\DI\Container;

$api = Container::getReadApi();
        if ($api->apiEspecialidade("https://api.feegow.com.br/api/specialties/list") == null) {
            ?>
            <p class="text-center">Desculpe, nenhuma especialidade encontrada.</p>
            <?php
        } else {
            ?>
            <form class="form-inline" id="form_specialties" method="POST" id="" action="">
                <input type="hidden" name="send_specialties" />
                <label>Selecione a especialidade:</label>
                <select class="form-control" name="specialty" id="specialty">
                    <optgroup label="Escolha seu profissional:">
                        <option selected disabled> -- </option>
                        <?php foreach ($api->apiEspecialidade("https://api.feegow.com.br/api/specialties/list") as $especialidades) { ?>
                            <option value="<?php echo $especialidades['especialidade_id']; ?>"><?php echo $especialidades['nome']; ?></option>
                            <?php
                        }
                        ?>
                    </optgroup>
                </select>
                <button type="submit" name="" id="btn_solicitar_especialista" class="btn btn-info btn-sm">Agendar</button>
            </form>
        <?php } ?>
    </div>
</div>

<?php if (isset($_POST['send_specialties'])) { ?>
<div class="row professional" id="professional">
        <div class="container box text-center">
            <?php
            $especialidade_id = isset($_POST['specialty']) && !empty($_POST['specialty']) ? $_POST['specialty'] : "";
            if ($especialidade_id != null) {
                $arrayobject = new ArrayObject($api->apiProfessional("https://api.feegow.com.br/api/professional/list")["content"]);
                $iterator = $arrayobject->getIterator();
                while ($iterator->valid()) {
                    if ($iterator->current()["especialidades"][0]["especialidade_id"] == $especialidade_id) {
                        ?>
                            <div class="card" style="width: 100%; margin-top: 30px;">
                                <?php 
                                $imagem = @$iterator->current()["sexo"] == "Feminino" ? "assets/images/medica.png" : "assets/images/medico.png"; 
                                $foto = @$iterator->current()["foto"] != null ? @$iterator->current()["foto"] : $imagem;      
                                ?>
                                <img src="<?=$foto;?>" class="card-img-top" alt="Imagem profissional" height="100px;">
                                <div class="card-body">
                                    <p class="card-text" style="font-size: 18px; font-weight: bold;">Dr: <?php echo @$iterator->current()["nome"]; ?></p>
                                    <p class="card-text">CRM: <?php echo $iterator->current()["documento_conselho"]; ?></p>
                                    <form method="POST" id="" action="">
                                        <input type="hidden" name="_specialty" value="<?=$iterator->current()["especialidades"][0]["especialidade_id"]?>" />
                                        <input type="hidden" name="_professional" value="<?=@$iterator->current()["profissional_id"]?>"/> 
                                        <button class="btn btn-primary" type="submit">Agendar</button>
                                    </form>
                                </div>
                            </div>
                        <?php
                    }
                    $iterator->next();
                }
            } else {
                ?>
                <p class="text-center" style="margin-top: 25px;">Desculpe, nenhum profissional encontrado.</p>
<?php }  ?>
        </div>
    </div>
<?php } ?>

<div class="row">
    <div class="container box">
        <br />
        <form method="post" id="register_form" action="helpers/record-clients.php">
            <div class="tab-content" style="margin-top:16px;">
                <!--INÍCIO DO FORMULÁRIO-->
                <div class="tab-pane active" id="login_details">
                    <div class="panel panel-default">
                        <div class="panel-heading">Preencha seus dados</div>
                        <div class="panel-body">

                            <input type="hidden" name="specialty_id" id="specialty_id" value="<?php echo $_POST['_specialty'] ?>" />   
                            <input type="hidden" name="professional_id" id="professional_id" value="<?php echo $_POST['_professional'] ?>" />
                            <input type="hidden" name="source_id" id="source_id" value="teste source" />
                            <input type="hidden" name="date_time" id="date_time" value="<?= date("Y-m-d H:i:s") ?>" />

                            <div class="form-group">
                                <label>Nome Completo</label>
                                <input type="text" name="name" id="name" class="form-control" />
                                <span id="error_name" class="text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label>Cpf</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" onkeydown="Mascara(this, Cpf);" onkeypress="Mascara(this, Cpf);" onkeyup="Mascara(this, Cpf);" maxlength="15" />
                                <span id="error_cpf" class="text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label>Data de nascimento</label>
                                <input type="text" name="birthdate" id="birthdate" class="form-control" onkeydown="Mascara(this, Data);" onkeypress="Mascara(this, Data);" onkeyup="Mascara(this, Data);" maxlength="15" />
                                <span id="error_birthdate" class="text-danger"></span>
                            </div>                            <br />
                            <div align="center">
                                <button type="button" name="" id="btn_solicitar_horario" class="btn btn-info btn-lg">Solicitar horários</button>
                            </div>
                            <br />
                            <br />
                            <div align="center" class="resposta"></div>
                            <br />
                        </div>
                    </div>
                </div>
                <!--FIM DO FORMULÁRIO-->
            </div>
        </form>
    </div>
</div>
<script src="assets/js/clients.js"></script>
<script src="assets/js/send.js"></script>
<script>
                                    /*Função Pai de Mascaras*/
                                    function Mascara(o, f) {
                                        v_obj = o
                                        v_fun = f
                                        setTimeout("execmascara()", 1)
                                    }

                                    /*Função que Executa os objetos*/
                                    function execmascara() {
                                        v_obj.value = v_fun(v_obj.value)
                                    }

                                    /*Função que Determina as expressões regulares dos objetos*/
                                    function leech(v) {
                                        v = v.replace(/o/gi, "0")
                                        v = v.replace(/i/gi, "1")
                                        v = v.replace(/z/gi, "2")
                                        v = v.replace(/e/gi, "3")
                                        v = v.replace(/a/gi, "4")
                                        v = v.replace(/s/gi, "5")
                                        v = v.replace(/t/gi, "7")
                                        return v
                                    }


                                    /*Função que padroniza CPF*/
                                    function Cpf(v) {
                                        v = v.replace(/\D/g, "")
                                        v = v.replace(/(\d{3})(\d)/, "$1.$2")
                                        v = v.replace(/(\d{3})(\d)/, "$1.$2")

                                        v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2")

                                        return v
                                    }

                                    /*Função que padroniza DATA*/
                                    function Data(v) {
                                        v = v.replace(/\D/g, "")
                                        v = v.replace(/(\d{2})(\d)/, "$1/$2")
                                        v = v.replace(/(\d{2})(\d)/, "$1/$2")
                                        return v
                                    }
</script>
<?php include_once 'commom/footer.php'; ?>
