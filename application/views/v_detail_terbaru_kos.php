<section class="about  min-vh-100 py-5" id="about">
    <div class="row align-items-center container my-0 mx-auto">
        <div class="col-md-12">
            <a name="" id="" class="btn btn-danger btn-md border-0 my-5 float-right mb-3 d-md-block d-none" href="<?= site_url('terbaru'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
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