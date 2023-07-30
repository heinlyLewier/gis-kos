<section class="dataKos py-5 min-vh-100" id="dataKos">
    <div class="container mt-5">
        <?= form_open('terbaru'); ?>
        <div class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="keyword" autocomplete="off" autofocus>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" autofocus>Search</button>
        </div>
        <?= form_close(); ?>
    </div>
    <div class="mx-2 align-items-center">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-1 mt-4 text-center">
                <?php if (!empty($keyword)) { ?>
                    <p class="text-gray-700">Menampilkan data dengan kata kunci : "<?= $keyword; ?>"</p>
                <?php } ?>
            </div>
            <?php if ($list->num_rows() > 0) { ?>
                <?php foreach ($list->result() as $key => $value) { ?>
                    <a name="" id="" class="nav-link" href="<?= site_url('terbaru/detail/' . $value->id_kos); ?>" role="button">
                        <div class="col-md-3">
                            <div class="card border-0 shadow-sm text-center" style=" height: 25rem;">
                                <?php if ($value->gambar1 != null) { ?>
                                    <img class="img-fluid mb-2" src="<?= base_url('uploads/kos/' . $value->gambar1); ?>" style="object-fit: cover; width: 100%; height: 170px;" alt="">
                                <?php } else { ?>
                                    <img class="img-fluid mb-2" src="<?= base_url('uploads/kos/default.jpg'); ?>" style="object-fit: cover; width: 100%; height: 170px;" alt="">
                                <?php } ?>
                                <p>
                                    <span class="h5"><?= $value->nama_kos; ?></span><br>
                                    <span class="text-black-50" style="font-size: 2vh;"><?= $value->alamat_kos; ?>, <?= $value->kecamatan; ?></span><br>
                                    <span class="text-black-50 font-weight-bold" style="font-size: 15px;">Sisa Kamar : <?= $value->sisa_kamar; ?></span>
                                </p>
                                <hr class="mb-0">
                                <div class="btn-group-sm text-center" role="group" aria-label="Basic example">
                                    <a name="" id="" class="btn btn-sm btn-primary border-0" href="<?= site_url('peta/lokasi/' . $value->id_kos); ?>" role="button"><i class="fas fa-route"></i> Lokasi</a>
                                    <a name="" id="" class="btn btn-sm btn-success border-0" style="background-color: #298505;" href="http:///api.whatsapp.com/send?phone=<?= $value->no_wa; ?>&text=Halo%20Admin,%20Saya%20Mau%20Pesan%20Kamar." role="button" target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            <?php } else { ?>
                Tidak ada data
            <?php } ?>
        </div>
    </div>
</section>