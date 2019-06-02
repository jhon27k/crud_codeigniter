<div class="dashboard-headline">
    <h3>Cursos</h3>
    <!-- Breadcrumbs -->
    <nav id="breadcrumbs" class="dark">
        <ul>
            <li><a href="<?php echo base_url() ?>">Início</a></li>
            <li>Cursos</li>
            <li>Cadastro</li>
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

            <form method="post" class="validate" action="<?php echo base_url('Course/addCurso') ?>" role="form" enctype="multipart/form-data">

                <div class="content with-padding padding-bottom-10">
                    <div class="row margin-bottom-30">
                        <div class="col-xl-12 col-md-12">
                            <div class="section-headline margin-top-10 margin-bottom-10">
                                <h5>Professor</h5>
                            </div>
                            <select class="selectpicker" data-live-search="true" name="id_prof" required>
                                <option value="">Selecione</option>
                                <?php foreach ($professores as $key => $value) { ?>
                                    <option value="<?php echo $value['idProfessor'] ?>"><?php echo $value['nome'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="submit-field">
                                <h5>Nome do curso</h5>
                                <input type="text" class="with-border" name="nome" maxlength="100" required>
                                <!-- <span style="font-size: 0.8em">Máximo de 100 caracteres</span> -->
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-4 margin-bottom-10">
                        <button type="submit" class="button btn-sm ripple-effect button-sliding-icon margin-top-30">Finalizar Cadastro
                            <i class="icon-material-outline-arrow-right-alt"></i></button>
                        <button type="reset" href="#" class="button gray margin-left-10 ripple-effect margin-top-30">Limpar
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>
</div>