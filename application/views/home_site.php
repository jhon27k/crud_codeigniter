<!-- Dashboard Headline -->
<div class="dashboard-headline">
    <span>Que bom ter você aqui novamente!</span>

    <!-- Breadcrumbs -->
    <nav id="breadcrumbs" class="dark">
        <ul>
            <li><a href="#">Início</a></li>
            <li>Dashboard</li>
        </ul>
    </nav>
</div>


<div class="indicators-container">
    <div class="indicator-widget">
        <div class="indicator-text">
            <span>Alunos cadastrados</span>
            <h4 class="counter-up"><?php echo count($matriculas) ?></h4>
        </div>
        <div class="indicator-icon">
            <i class="icon-feather-user-check" style="color: #36bd78;background-color: rgba(54, 189, 120, 0.1);"></i>
        </div>
    </div>
    <div class="indicator-widget">
        <div class="indicator-text">
            <span>Cursos cadastrados</span>
            <h4 class="counter-up"><?php echo count($cursos) ?></h4>
        </div>
        <div class="indicator-icon">
            <i class="icon-feather-clipboard" style="color: #b81b7f;background-color: rgba(184, 27, 127, 0.1)"></i>
        </div>
    </div>
    <div class="indicator-widget">
        <div class="indicator-text">
            <span>Professores cadastrados</span>
            <h4 class="counter-up"><?php echo count($professores) ?></h4>
        </div>
        <div class="indicator-icon">
            <i class="icon-feather-users" style="color: #efa80f;background-color: rgba(239, 168, 15, 0.1) "></i>
        </div>
    </div>
    <div class="indicator-widget">
        <div class="indicator-text">
            <span>Matriculas realizadas</span>
            <h4 class="counter-up"><?php echo count($matriculas) ?></h4>
        </div>
        <div class="indicator-icon">
            <i class="icon-feather-clipboard" style="color: #efa80f;background-color: rgba(239, 168, 15, 0.1) "></i>
        </div>
    </div>
</div>