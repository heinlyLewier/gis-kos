<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIS-KOS | <?= $title; ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo.png'); ?>" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- sweetalert2 -->
    <script src="<?= base_url('assets/'); ?>vendor/sweetalert/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/sweetalert/sweetalert2.min.css">
</head>

<body style="background-color:#298505 ;">
    <?php
    if ($content) {
        $this->load->view($content);
    }
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('.show-password').click(function() {
            if ($(this).is(':checked')) {
                $('.form-password').attr('type', 'text');
            } else {
                $('.form-password').attr('type', 'password');
            }
        });
    });
</script>