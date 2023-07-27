<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIS-KOS|Welcome</title>
    <!-- icon shortcut -->
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/logo.png" type="image/x-icon">
    <!-- my css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css">
    <!-- fontawesome -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <!-- leaflet -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/leaflet/leaflet.css" />
    <script src="<?= base_url('assets/'); ?>vendor/leaflet/leaflet.js"></script>
    <link href='<?= base_url('assets/'); ?>vendor/leaflet/dist/leaflet.fullscreen.css' rel='stylesheet' />
    <script src='<?= base_url('assets/'); ?>vendor/leaflet/dist/Leaflet.fullscreen.min.js'></script>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/geolocation/dist/L.Control.Locate.min.css" />
    <script src="<?= base_url('assets/'); ?>vendor/geolocation/src/L.Control.Locate.js"></script>

    <!-- sweetalert2 -->
    <script src="<?= base_url('assets/'); ?>vendor/sweetalert/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/sweetalert/sweetalert2.min.css">
</head>

<body data-spy="scroll" data-target="#navbarSupportedContent">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand d-none d-lg-block" href="<?= site_url('terbaru'); ?>">GIS-KOS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('terbaru'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="<?= site_url('peta'); ?>">Peta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#dataKos">Tentang</a>
                        </li>
                    </ul>
                </div>
                <a name="" id="" class="nav-link text-warning" href="#" role="button">Dashboard</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('auth/logout/') . $user->username; ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <section class="about  min-vh-100" id="about">
        <div class="row align-items-center container my-5  mx-auto">
            <div class="col-md-12">
                <a name="" id="" class="btn btn-danger btn-sm border-0 my-5 float-right mb-3 d-md-block d-none" href="<?= site_url('terbaru'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
            </div>
            <div class="col card border-0 mb-4" style="min-height: 50vh;">
                <div class="card-body" id="map"></div>
            </div>

            <div class="card border-0 mb-4" style="min-height: 50vh;">
                <div class="card-body">
                    <h1 class="text-gray-800 font-weight-bold h5">Detail Data Kos</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table text-gray-800">
                                <tbody>
                                    <tr>
                                        <th style="width: 20rem;">Nama Kos</th>
                                        <th style="width: 5px;">:</th>
                                        <td><?= $list->nama_kos; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20rem;">Pemilik Kos</th>
                                        <th style="width: 5px;">:</th>
                                        <td><?= $list->pemilik_kos; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20rem;">Kecamatan</th>
                                        <th style="width: 5px;">:</th>
                                        <td><?= $list->kecamatan; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20rem;">Alamat Kos</th>
                                        <th style="width: 5px;">:</th>
                                        <td><?= $list->alamat_kos; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20rem;">Nomor Whatsapp</th>
                                        <th style="width: 5px;">:</th>
                                        <td><a href="http:///api.whatsapp.com/send?phone=<?= $list->no_wa; ?>&text=Halo%20Admin,%20Saya%20Mau%20Pesan%20Kamar." target="_blank" rel="noopener noreferrer" style="text-decoration: none;"><?= $list->no_wa; ?></a></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20rem;">Jumlah Kamar</th>
                                        <th style="width: 5px;">:</th>
                                        <td><?= $list->jumlah_kamar; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20rem;">Sisa Kamar</th>
                                        <th style="width: 5px;">:</th>
                                        <td><?= $list->sisa_kamar; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20rem;">Biaya Kos</th>
                                        <th style="width: 5px;">:</th>
                                        <td><?= 'Rp. ' .  number_format($list->biaya_kos, 2, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20rem;">Fasilitas Kos</th>
                                        <th style="width: 5px;">:</th>
                                        <td><?= $list->fasilitas ? $list->fasilitas : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20rem;">Deskripsi</th>
                                        <th style="width: 5px;">:</th>
                                        <td><?= $list->deskripsi; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <?php if ($list->gambar1 != null) { ?>
                                <img class="img-thumbnail" width="100%" style="height: 500px; object-fit: cover;" src="<?= base_url('uploads/kos/' . $list->gambar1); ?>" alt="">
                            <?php } else { ?>
                                <img class="img-thumbnail" width="100%" style="height: 500px; object-fit: cover;" src="<?= base_url('uploads/kos/default.jpg'); ?>" alt="">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var map = L.map('map', {
                    fullscreenControl: {
                        pseudoFullscreen: false
                    }
                }).setView([-3.693580, 128.181137], 13)

                var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    minZoom: 19,
                    attribution: '<small>&copy; 2023 GisKos Pemetaan Rumah Kos | Design by heinly</small>'
                }).addTo(map);

                var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    maxZoom: 19,
                    minZoom: 19,
                    attribution: '<small>&copy; 2023 GisKos Pemetaan Rumah Kos | Design by heinly</small>'
                });

                var baseMap = {
                    'Light': osm,
                    'Satelite': Esri_WorldImagery
                };
                L.control.layers(baseMap).addTo(map);

                navigator.geolocation.getCurrentPosition(function(location) {
                    var marker = L.marker([<?= $list->latitude; ?>, <?= $list->longitude; ?>]).addTo(map);
                    marker.bindPopup(
                        '<h6 class="mb-0">' + '<?= $list->latitude; ?>,' + '<?= $list->longitude; ?>' + '</h6>' +
                        "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                        location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $list->latitude ?>,<?= $list->longitude ?>' class='btn btn-sm border-0 btn-success text-light mt-2' target='_blank' style='background-color:#298505'><i class='fas fa-route'></i> Rute</a>"
                    ).openPopup();
                });
            </script>
        </div>
    </section>
    <footer class="text-center text-white mt-5" style="background: rgb(38, 119, 6);">
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