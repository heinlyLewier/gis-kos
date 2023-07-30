<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIS-KOS | <?= $title; ?></title>
    <!-- icon shortcut -->
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/logo.png" type="image/x-icon">
    <!-- my css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css">
    <!-- fontawesome -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <!-- sweetalert2 -->
    <script src="<?= base_url('assets/'); ?>vendor/sweetalert/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/sweetalert/sweetalert2.min.css">
    <!-- leaflet -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/leaflet/leaflet.css" />
    <script src="<?= base_url('assets/'); ?>vendor/leaflet/leaflet.js"></script>
    <link href='<?= base_url('assets/'); ?>vendor/leaflet/dist/leaflet.fullscreen.css' rel='stylesheet' />
    <script src='<?= base_url('assets/'); ?>vendor/leaflet/dist/Leaflet.fullscreen.min.js'></script>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/geolocation/dist/L.Control.Locate.min.css" />
    <script src="<?= base_url('assets/'); ?>vendor/geolocation/src/L.Control.Locate.js"></script>
    <!-- control search -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/leaflet-search-master/src/leaflet-search.css" />
    <script src="<?= base_url('assets/'); ?>vendor/leaflet-search-master/dist/leaflet-search.src.js"></script>
</head>

<body data-spy="scroll" data-target="#navbarSupportedContent">
    <script>
        <?php if ($this->session->flashdata('gagal')) { ?>
            var isi = <?= json_encode($this->session->flashdata('gagal')) ?>;
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Gagal!',
                text: isi,
                showConfirmButton: false,
                timer: 1500
            })
        <?php } ?>
    </script>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand d-none d-lg-block" href="<?= site_url('./'); ?>">GIS-KOS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('terbaru'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('peta'); ?>">Peta</a>
                        </li>
                        <?php if ($this->session->userdata('level') == 'User') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('home'); ?>">Dashboard</a>
                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('level') == 'Admin') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('admin'); ?>">Dashboard</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <a class="nav-link text-warning logout" href="<?= site_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </nav>
    </header>
    <?php if ($content) {
        $this->load->view($content);
    } ?>
    <footer class="text-center text-white" style="background: rgb(38, 119, 6);">
        <!-- Grid container -->
        <div class="container pt-3 pb-0">
            <!-- Section: Social media -->
            <section class="mb-3">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/heinly.heinly.35" target="_blank" role="button"><i class="fab fa-facebook"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://instagram.com/heinly_lewier?igshid=MzNlNGNkZWQ4Mg==" target="_blank" role="button"><i class="fab fa-instagram"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/heinlyLewier" target="_blank" role="button"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: green; font-size: 12px;">
            Copyright &copy Skripsi GIS Pemetaan Rumah Kos di Kota Ambon 2023 - <?= date('Y'); ?> | Design by heinly_lewier
        </div>
        <!-- Copyright -->
    </footer>

    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<script>
    $('.logout').on('click', function() {
        var getLink = $(this).attr('href');
        Swal.fire({
            text: "Yakin ingin keluar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonColor: '#3085d6',
            cancelButtonText: "Batal"

        }).then(result => {
            //jika klik ya maka arahkan ke proses.php
            if (result.isConfirmed) {
                window.location.href = getLink
            }
        })
        return false;
    });
</script>