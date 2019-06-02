<div class="dashboard-headline">
    <h3>Matrícula</h3>
    <!-- Breadcrumbs -->
    <nav id="breadcrumbs" class="dark">
        <ul>
            <li><a href="<?php echo base_url() . 'dashboard#' ?>">Início</a></li>
            <li>Aluno</li>
            <li>Matricular aluno</li>
        </ul>
    </nav>
</div>

<div class="row">
    <!-- Dashboard Box -->
    <div class="col-xl-12">
        <div class="dashboard-box margin-top-0">
            <?php
            if ($this->session->flashdata('message')) {
                $message = $this->session->flashdata('message');
                ?>
                <div class="alert alert-<?php echo $message['class']; ?>" id="successMessage">
                    <button class="close" data-dismiss="alert" type="button"></button>
                    <!--     <h4><?php echo $message['title']; ?></h4> -->
                    <p><?php echo $message['message']; ?></p>
                </div>
            <?php
        }
        ?>
            <div class="headline">
                <h3><i class="icon-feather-folder-plus"></i> <?php echo $page_title ?></h3>
            </div>

            <form method="post" class="validate" action="<?php echo base_url('Registration/addRegistration') ?>" role="form" enctype="multipart/form-data">

                <div class="content with-padding padding-bottom-10">
                    <div class="row margin-bottom-30">
                        <div class="col-xl-9 col-md-9">
                            <div class="section-headline margin-top-10 margin-bottom-12 ">
                                <h5>Escolha o Curso </h5>
                            </div>
                            <select class="selectpicker" data-live-search="true" name="id_curso" id="sel_curso" required>
                                <option value="">Selecione</option>
                                <?php foreach ($cursos as $key => $value) { ?>
                                    <option value="<?php echo $value['idCurso'] ?>"><?php echo ucfirst($value['curso_nome']) . ". Prof: " . ucfirst($value['prof_nome']) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xl-3 col-md-3">
                            <div class="section-headline margin-top-10 margin-bottom-10">
                                <h5> Cadastrar curso</h5>
                            </div>
                            <a href="<?php echo base_url('Course/add_course')?>" class="button ripple-effect button-sliding-icon" style="background-color:#cccccc ; color:gray">Novo curso <i class="icon-feather-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-8">
                            <div class="submit-field">
                                <h5>Nome</h5>
                                <input type="text" class="with-border" name="nome" maxlength="100" required>
                                <!-- <span style="font-size: 0.8em">Máximo de 100 caracteres</span> -->
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Nascimento</h5>
                                <input type="date" class="with-border" name="data_nascimento" maxlength="100" required>
                                <!-- <span style="font-size: 0.8em">Máximo de 100 caracteres</span> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Cep</h5>
                                <input type="text" class="with-border" name="cep" id="cep" maxlength="10" required>
                                *Digite o cep para preencher os campos automaticamente
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="submit-field">
                                <h5>Rua</h5>
                                <input readonly type="text" class="with-border" name="logradouro" id="rua" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="submit-field">
                                <h5>Número</h5>
                                <input type="text" class="with-border" name="numero" id="numero" maxlength="10" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Bairro</h5>
                                <input readonly type="text" class="with-border" name="bairro" id="bairro" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="submit-field">
                                <h5>Cidade</h5>
                                <input readonly type="text" class="with-border" name="cidade" id="cidade" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="submit-field">
                                <h5>Estado</h5>
                                <input readonly type="text" class="with-border" name="estado" id="estado" maxlength="10" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 margin-bottom-10">
                        <button type="submit" class="button btn-sm ripple-effect button-sliding-icon margin-top-30">Finalizar matrícula
                            <i class="icon-material-outline-arrow-right-alt"></i></button>
                        <button type="reset" href="#" class="button gray margin-left-10 ripple-effect margin-top-30">Limpar
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>
</div>



<script>
    // $("#sel_curso").change(function() {
    //     alert(this.value);
    // });

    // $("#sel_curso").change(function() {
    //     alert(this.value);
    // });


    $(document).ready(function() {
        // console.log('ready');
        $("#cep").blur(function() {
            var cep = $(this).val().replace(/\D/g, '');
            if (cep != "") {
                var validacep = /^[0-9]{8}$/;
                if (validacep.test(cep)) {
                    //Preenche os campos com "..." enquanto consulta webservice.
                    $('#rua').val("...");
                    $('#bairro').val("...");
                    $('#numero').val("...");
                    $('#estado').val("...");
                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                        if (!("erro" in dados)) {
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#estado").val(dados.uf);
                            $("#cidade").val(dados.localidade);
                            $("#numero").val('');
                        } //end if.
                        else {
                            $('#cep').val('');
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep inválido.
                    $('#cep').val('');
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                alert("Formato de CEP inválido.");
                $('#cep').val('');
            }
        });

    });
</script>