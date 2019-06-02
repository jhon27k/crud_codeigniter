<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth dashboard-header not-sticky">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">
				<!-- Logo -->
				<div id="logo">
					<a href="<?php echo base_url() ?>">
						<img src="<?php echo base_url('assets/hireo/images/logo2.png') ?>" alt="logotipo"></img>
					</a>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation">
					<ul id="responsive">

						<li class=""><a href="#">Alunos</a>
							<ul class="dropdown-nav">
								<li><a href="<?php echo base_url('Registration') ?>">Nova matrícula</a>

								</li>
							</ul>
						</li>

						<li class=""><a href="#">Cursos</a>
							<ul class="dropdown-nav">
								<!-- <li><a href="<?php echo base_url('Course') ?>">Gerenciar cursos</a> -->
								<li><a href="<?php echo base_url('Course/add_course') ?>">Cadastrar curso</a>
								</li>
							</ul>
						</li>

						<li class=""><a href="#">Professores</a>
							<ul class="dropdown-nav">
								<!-- <li><a href="<?php echo base_url('Teacher') ?>">Gerenciar professores</a></li> -->
								<li><a href="<?php echo base_url('Teacher/add_teacher') ?>">Cadastrar professor</a></li>
							</ul>
						</li>

						<li class=""><a href="#">Matrículas</a>
							<ul class="dropdown-nav">
								<li><a href="<?php echo base_url('Registration/viewRegistrations') ?>">Visualizar matriculas</a></li>
							</ul>
						</li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->