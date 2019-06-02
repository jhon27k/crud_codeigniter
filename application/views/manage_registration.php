<div class="dashboard-headline">
    <h3>Visualizar Matrículas</h3>
    <!-- Breadcrumbs -->
    <nav id="breadcrumbs" class="dark">
        <ul>
            <li><a href="<?php echo base_url() ?>">Início</a></li>
            <li>Matrículas</li>
            <li>Visualizar</li>
        </ul>
    </nav>
</div>

<div class="row">

    <div class="col-xl-12">
        <a type="button" href="<?php echo base_url('Registration/pdf') ?>" class="button ripple-effect button-sliding-icon margin-top-30">Gerar pdf
            <i class="icon-material-outline-arrow-right-alt"></i></a>
        <div class="dashboard-box">
            <div class="content with-padding">
                <table class="table table-striped table-bordered" style="width:100%" id="users-table">
                    <thead>
                        <tr>
                            <th>id Aluno</th>
                            <th>Aluno</th>
                            <th>Curso</th>
                            <th>Professor</th>
                            <!-- <th>Opções</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($matriculas as $value) : ?>
                            <tr>
                                <td><?php echo $value['id_aluno'] ?></td>
                                <td><?php echo $value['nome_aluno'] ?>
                                    <i data-tippy-placement="top" data-tippy-content="<?php echo "Nascimento " . $value['data_nas'] ?>" class="icon-feather-calendar" style="color:<?php echo !empty($value['id_aluno']) ? 'inherit' : 'lightcoral' ?>">
                                    </i>
                                    <i data-tippy-placement="top" data-tippy-content="
                                                                            <?php echo ""      . $value['rua'] . ", " . $value['numero']
                                                                                . ". <br>" . $value['bairro'] . " - " . $value['cidade'] . "/" . $value['estado']
                                                                                . ". <br>" . $value['cep'] ?>" class="icon-feather-map-pin" style="color:
                                                                            <?php echo !empty($value['rua']) ? 'inherit' : 'lightcoral' ?>">
                                    </i>
                                </td>
                                <td><?php echo $value['curso_nome'] ?>
                                    <i data-tippy-placement="top" data-tippy-content="<?php echo "ID: " . $value['idCurso'] ?>" class="icon-feather-lock" style="color:<?php echo !empty($value['idCurso']) ? 'inherit' : 'lightcoral' ?>">
                                    </i>
                                </td>
                                <td><?php echo $value['prof_nome'] ?>
                                    <i data-tippy-placement="top" data-tippy-content="<?php echo "ID: " . $value['id_aluno'] ?>" class="icon-feather-alert-lock" style="color:<?php echo !empty($value['id_aluno']) ? 'inherit' : 'lightcoral' ?>">
                                    </i>
                                </td>
                                <!-- <td>
                                                    <?php if ($value['name'] != strtolower("consultas")) { ?>
                                                                        <a class='button' href='<?php echo base_url(); ?>ManageServices/edit_service/<?php echo $value['id']; ?>'> Editar </a>
                                                                        <a class='button' style="background-color: #e43b3b" href='<?php echo base_url(); ?>ManageServices/service_delete/<?php echo $value['id']; ?>'> Excluir </a>
                                                    <?php } ?>
                                                </td> -->
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>