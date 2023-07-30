<section class="dataKos py-5 min-vh-100" id="dataKos">
    <div class="mx-auto align-items-center">
        <div class="row mx-auto justify-content-center align-items-center text-right pt-5">
            <div class="col-md-12 mb-2 align-items-center">
                <?= form_open('terbaru'); ?>
                <div class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="keyword" autocomplete="off" autofocus>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" autofocus>Search</button>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="col-md-12 mb-3 text-left">
                <?php if (!empty($keyword)) { ?>
                    <p class="text-gray-700">Menampilkan data dengan kata kunci : "<?= $keyword; ?>"</p>
                <?php } ?>
            </div>
            <?php if ($list->num_rows() > 0) { ?>
                <?php foreach ($list->result() as $key => $value) { ?>
                    <div class="col-md-3">
                        <div class="card m-2 border-0 shadow-sm">
                            <div class=" card-body p-2">
                                <?php if ($value->gambar1 != null) { ?>
                                    <img class="img-fluid mb-2" src="<?= base_url('uploads/kos/' . $value->gambar1); ?>" style="object-fit: cover; width: 100%; height: 170px;" alt="">
                                <?php } else { ?>
                                    <img class="img-fluid mb-2" src="<?= base_url('uploads/kos/default.jpg'); ?>" style="object-fit: cover; width: 100%; height: 170px;" alt="">
                                <?php } ?>
                                <table class="table table-borderless table-sm text-left">
                                    <tbody>
                                        <tr class="font-weight-bold">
                                            <td>Nama Kos</td>
                                            <td>:</td>
                                            <td><?= $value->nama_kos; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Kos</td>
                                            <td>:</td>
                                            <td><?= $value->alamat_kos; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan</td>
                                            <td>:</td>
                                            <td><?= $value->kecamatan; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Sisa Kamar</td>
                                            <td>:</td>
                                            <td><?= $value->sisa_kamar; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a name="" id="" class="btn btn-sm btn-primary border-0" href="<?= site_url('peta/lokasi/' . $value->id_kos); ?>" role="button"><i class="fas fa-route"></i> Lihat Lokasi</a>
                                    <a name="" id="" class="btn btn-warning btn-sm" href="<?= site_url('terbaru/detail/' . $value->id_kos); ?>" role="button"><i class="fa fa-eye" aria-hidden="true"></i> Detail</a>
                                    <a name="" id="" class="btn btn-sm btn-success border-0" style="background-color: #298505;" href="http:///api.whatsapp.com/send?phone=<?= $value->no_wa; ?>&text=Halo%20Admin,%20Saya%20Mau%20Pesan%20Kamar." role="button" target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                Tidak ada data
            <?php } ?>
        </div>
    </div>
</section>