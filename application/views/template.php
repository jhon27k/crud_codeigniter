<!doctype html>
<html lang="pt" region="br">
<?php $this->load->view('Templates/header-script.php'); ?>

<body class="gray">

<!-- Wrapper -->
<div id="wrapper">

    <?php 
        $this->load->view('Templates/header-menu.php'); 
        $this->load->view('Templates/main-content.php', $page);
        $this->load->view('Templates/footer-script');
    ?>

</body>
</html>