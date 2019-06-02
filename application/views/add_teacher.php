<div class="dashboard-headline">
    <h3>Professores</h3>
    <!-- Breadcrumbs -->
    <nav id="breadcrumbs" class="dark">
        <ul>
            <li><a href="<?php echo base_url() ?>">Início</a></li>
            <li>Professores</li>
            <li>cadastro</li>
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

            <form method="post" class="validate" action="<?php echo base_url('Teacher/addTeacher') ?>" role="form" enctype="multipart/form-data">

                <div class="content with-padding padding-bottom-10">
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

                    <div class="col-xl-4 margin-bottom-10">
                        <button type="submit" class="button btn-sm ripple-effect button-sliding-icon margin-top-30">Finalizar cadastro
                            <i class="icon-material-outline-arrow-right-alt"></i></button>
                        <button type="reset" href="#" class="button gray margin-left-10 ripple-effect margin-top-30">Limpar
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="dashboard-box">
            <div class="content with-padding">
                <table class="table table-striped table-bordered" style="width:100%" id="users-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nome</th>
                            <th>Nascimento</th>
                            <th>Opções</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($professores as $value) : ?>
                            <tr>
                                <td><?php echo $value['idProfessor'] ?></td>
                                <td><?php echo $value['nome'] ?></td>
                                <td><?php echo $value['data_nascimento'] ?></td>
                                <td>

                                    <a class='button' href='<?php echo base_url(); ?>Teacher/edit_teacher/<?php echo $value['idProfessor']; ?>'> Editar </a>
                                    <a class='button' style="background-color: #e43b3b" href='<?php echo base_url(); ?>Teacher/delete_teacher/<?php echo $value['idProfessor']; ?>'> Excluir </a>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>