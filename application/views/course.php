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

            <form method="post" class="validate" action="<?php echo base_url('Student/addStudent') ?>" role="form" enctype="multipart/form-data">

                <div class="content with-padding padding-bottom-10">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="submit-field">
                                <h5>Nome</h5>
                                <input type="text" class="with-border" name="nome" maxlength="100" required>
                                <!-- <span style="font-size: 0.8em">Máximo de 100 caracteres</span> -->
                            </div>
                        </div>

                        <div class="col-xl-6">
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
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="submit-field">
                                <h5>Rua</h5>
                                <input type="text" class="with-border" name="rua" id="rua" maxlength="10" required>
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
                                <input type="text" class="with-border" name="bairro" id="bairro" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="submit-field">
                                <h5>Cidade</h5>
                                <input type="text" class="with-border" name="cidade" id="cidade" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="submit-field">
                                <h5>Estado</h5>
                                <input type="text" class="with-border" name="estado" id="estado" maxlength="10" required>
                            </div>
                        </div>
                    </div>


                    <div class="headline">
                        <h3><i class="icon-feather-folder-plus"></i> Escolha o curso</h3>
                    </div>
                    <div class="content with-padding padding-bottom-50">
                        <div class="row">
                            <div class="col-xl-9 col-md-9">
                                <div class="section-headline margin-top-10 margin-bottom-12">
                                    <h5>Cursos Cadastrados</h5>
                                </div>
                                <select class="selectpicker" data-live-search="true" name="curso">
                                    <option>Hot Dog, Fries and a Soda</option>
                                    <option>Burger, Shake and a Smile</option>
                                    <option>Sugar, Spice and all things nice</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-md-3">
                                <div class="section-headline margin-top-10 margin-bottom-12">
                                    <h5> Cadastrar curso</h5>
                                </div>
                                <a href="#" class="button ripple-effect button-sliding-icon" style="background-color:#cccccc ; color:gray">Novo curso <i class="icon-feather-arrow-right"></i></a>
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
    $(document).ready(function() {
        console.log('ready');
        $("#cep").blur(function() {
            console.log("entrou no cep");
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
                            // $("#reg_clnc_complement").val(dados.complemento);
                        } //end if.
                        else {
                            clean_up_form_doc();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep � inválido.
                    clean_up_form_doc();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                clean_up_form_doc();
            }
        });
    });

    // var myVarSet = setInterval(getaddress, 1000);
    // document.getElementById("reg_clnc_streetadd").addEventListener("change", getaddress);
    // document.getElementById("clinic_cep").addEventListener("change", getaddress);
    // document.getElementById("reg_clnc_name").addEventListener("change", getaddress);

    // function getaddress() {
    //     console.log("entrou no getadress");
    //     if (document.getElementById('reg_clnc_streetadd').value != '' && document.getElementById('clinic_cep').value != '' && document.getElementById('reg_clnc_name').value != '') {
    //         var address = document.getElementById('clinic_cep').value + ',' + document.getElementById('reg_clnc_streetadd').value + ',' + document.getElementById('reg_clnc_number').value;
    //         console.log(address);
    //         getLatitudeLongitude(showResult, address)
    //         clearInterval(myVarSet);
    //     }
    // }
</script>

<!-- <div class="row">
    <div class="col-xl-12">
        <div class="dashboard-box">
            <div class="content with-padding">
                <table class="table table-striped table-bordered" style="width:100%" id="users-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nome do serviço</th>
                            <th>Opções</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($services as $value) : ?>
                                                <tr>
                                                    <td><?php echo $value['id'] ?></td>
                                                    <td><?php echo $value['name'] ?></td>
                                                    <td>
                                                        <?php if ($value['name'] != strtolower("consultas")) { ?>
                                                                                <a class='button' href='<?php echo base_url(); ?>ManageServices/edit_service/<?php echo $value['id']; ?>'> Editar </a>
                                                                                <a class='button' style="background-color: #e43b3b" href='<?php echo base_url(); ?>ManageServices/service_delete/<?php echo $value['id']; ?>'> Excluir </a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->