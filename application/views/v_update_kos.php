<script>
    <?php if ($this->session->flashdata('pesan')) { ?>
        var isi = <?= json_encode($this->session->flashdata('pesan')) ?>;
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Berhasil!',
            text: isi,
            showConfirmButton: false,
            timer: 1500
        })
    <?php } ?>
</script>
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
<div class="row">
    <?php if ($user->level == 'Admin') { ?>
        <div class="col">
            <a name="" id="" class="btn btn-danger btn-sm border-0 float-right mb-3 d-md-block d-none" href="<?= site_url('admin/kos'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
        </div>
    <?php } elseif ($user->level == 'User') { ?>
        <div class="col">
            <a name="" id="" class="btn btn-danger btn-sm border-0 float-right mb-3 d-md-block d-none" href="<?= site_url('kos'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
        </div>
    <?php } ?>
</div>
<?php if ($user->level == 'Admin') { ?>
    <?= form_open_multipart(site_url('kos/proses_update_kos/') . $list->id_kos); ?>
    <?php $checked = explode(',', $list->fasilitas); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 mb-4" style="min-height: 50vh;">
                <div class="card-body mb-3" id="map"></div>
                <div class="form-row pl-3 pr-3">
                    <div class="form-group col-md-6">
                        <label for="">Latitude</label>
                        <input id="latitude" class="form-control" type="text" text name="latitude" value="<?= $list->latitude; ?>" placeholder="Latitude">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Longitude</label>
                        <input id="longitude" class="form-control" type="text" text name="longitude" value="<?= $list->longitude; ?>" placeholder="Longitude">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 mb-4">
                <div class="card-body">
                    <h1 class="h5 text-gray-800 font-weight-bold mb-3">Update Data Kos</h1>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="my-input">Pemilik Kos</label>
                            <input id="my-input" class="form-control" type="text" name="pemilik_kos" value="<?= $list->pemilik_kos; ?>" placeholder="Pemilik kos" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="my-input">Nama Kos</label>
                            <input id="my-input" class="form-control" type="text" name="nama_kos" value="<?= $list->nama_kos; ?>" placeholder="Nama kos" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="my-select">Jenis Kos</label>
                            <select id="my-select" class="form-control" name="jenis_kos">
                                <option value="">-Pilih-</option>
                                <option value="Laki - laki" <?= ($list->jenis_kos == 'Laki - laki') ? 'selected' : ''; ?>>Laki - laki</option>
                                <option value="Perempuan" <?= ($list->jenis_kos == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                <option value="Campuran" <?= ($list->jenis_kos == 'Campuran') ? 'selected' : ''; ?>>Campuran</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="my-input">Jumlah Kamar</label>
                            <input id="my-input" class="form-control" type="number" name="jumlah_kamar" value="<?= $list->jumlah_kamar; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="my-input">Sisa Kamar</label>
                            <input id="my-input" class="form-control" type="number" name="sisa_kamar" value="<?= $list->sisa_kamar; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nomor Whatsapp</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text border-0  text-white rounded-left" id="my-addon" style="background-color: #298505;">+62</span>
                                </div>
                                <input class="form-control" type="number" name="no_wa" placeholder="xxxxxxxxxxxx" aria-label="Recipient's text" aria-describedby="my-addon" value="<?= $list->no_wa; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Biaya Kos</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text border-0 bg-primary text-white rounded-left" id="my-addon">Rp.</span>
                                </div>
                                <input class="form-control" type="number" name="biaya_kos" placeholder=".000,00" aria-label="Recipient's text" aria-describedby="my-addon" value="<?= $list->biaya_kos; ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="my-input">Kecamatan</label>
                            <input id="my-input" class="form-control" type="text" name="kecamatan" placeholder="Kecamatan" value="<?= $list->kecamatan; ?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="my-textarea">Alamat Kos</label>
                            <input id="my-textarea" class="form-control" style="resize: none;" name="alamat_kos" rows="1" placeholder="Alamat kos" value="<?= $list->alamat_kos; ?>" autocomplete="off"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <?php
                        if ($list->gambar1 != null) { ?>
                            <img class="img-thumbnail d-block mb-2" src="<?= site_url('uploads/kos/') . $list->gambar1; ?>" width="100px" height="100px" style="object-fit: cover;" alt="">
                        <?php } else { ?>
                            <img class="img-thumbnail d-block mb-2" src="<?= base_url('uploads/kos/default.jpg'); ?>" width="100px" height="100px" style="object-fit: cover;" alt="">
                        <?php } ?>
                        <input type="text" name="image_lama" class="form-control-file" id="image_lama" style="border: 1px solid gainsboro; padding: 1px; border-radius: 5px; background: white;" hidden value="<?= $list->gambar1; ?>">
                        <input type="file" name="image" class="form-control-file" id="image" style="border: 1px solid gainsboro; padding: 1px; border-radius: 5px; background: white;">
                    </div>
                    <div class="form-group">
                        <label for="my-textarea">Deskripsi Kos</label>
                        <textarea id="my-textarea" class="form-control" style="resize: none;" name="deskripsi" rows="3"><?= $list->deskripsi; ?></textarea>
                    </div>
                    <label for="fasilitas">Fasilitas</label>
                    <div class="form-row row-cols-lg-2">
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wifi" value="WIFI" name="fasilitas[]" <?php in_array('WIFI', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="wifi"> WIFI</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="km" value="Kamar mandi dalam" name="fasilitas[]" <?php in_array('Kamar mandi dalam', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="km"> Kamar mandi dalam</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tt" value="Tempat tidur" name="fasilitas[]" <?php in_array('Tempat tidur', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="tt"> Tempat tidur</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="du" value="Dapur umum" name="fasilitas[]" <?php in_array('Dapur umum', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="du"> Dapur umum</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ac" value="AC" name="fasilitas[]" <?php in_array('AC', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="ac"> AC</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tv" value="TV" name="fasilitas[]" <?php in_array('TV', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="tv"> TV</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="mb" value="Meja belajar" name="fasilitas[]" <?php in_array('Meja belajar', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="mb"> Meja belajar</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rt" value="Ruang tamu" name="fasilitas[]" <?php in_array('Ruang tamu', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="rt"> Ruang tamu</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" hidden checked name="fasilitas[]" type="checkbox" value="" id="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm border-0" style="background-color: #298505;">Update</button>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
<?php } ?>
<?php if ($user->level == 'User') { ?>
    <?= form_open_multipart(site_url('kos/proses_update_kos/') . $list->id_kos); ?>
    <?php $checked = explode(',', $list->fasilitas); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 mb-4" style="min-height: 50vh;">
                <div class="card-body mb-3" id="map"></div>
                <div class="form-row pl-3 pr-3">
                    <div class="form-group col-md-6">
                        <label for="">Latitude</label>
                        <input id="latitude" class="form-control" type="number" text name="latitude" value="<?= $list->latitude; ?>" placeholder="Latitude" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Longitude</label>
                        <input id="longitude" class="form-control" type="number" text name="longitude" value="<?= $list->longitude; ?>" placeholder="Longitude" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 mb-4">
                <div class="card-body">
                    <h1 class="h5 text-gray-800 font-weight-bold mb-3">Update Data Kos</h1>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="my-input">Pemilik Kos</label>
                            <input id="my-input" class="form-control" type="text" name="pemilik_kos" value="<?= $list->pemilik_kos; ?>" placeholder="Pemilik kos" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="my-input">Nama Kos</label>
                            <input id="my-input" class="form-control" type="text" name="nama_kos" value="<?= $list->nama_kos; ?>" placeholder="Nama kos" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="my-select">Jenis Kos</label>
                            <select id="my-select" class="form-control" name="jenis_kos">
                                <option value="">-Pilih-</option>
                                <option value="Laki - laki" <?= ($list->jenis_kos == 'Laki - laki') ? 'selected' : ''; ?>>Laki - laki</option>
                                <option value="Perempuan" <?= ($list->jenis_kos == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                <option value="Campuran" <?= ($list->jenis_kos == 'Campuran') ? 'selected' : ''; ?>>Campuran</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="my-input">Jumlah Kamar</label>
                            <input id="my-input" class="form-control" type="number" name="jumlah_kamar" value="<?= $list->jumlah_kamar; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="my-input">Sisa Kamar</label>
                            <input id="my-input" class="form-control" type="number" name="sisa_kamar" value="<?= $list->sisa_kamar; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nomor Whatsapp</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text border-0  text-white rounded-left" id="my-addon" style="background-color: #298505;">+62</span>
                                </div>
                                <input class="form-control" type="number" name="no_wa" placeholder="xxxxxxxxxxxx" aria-label="Recipient's text" aria-describedby="my-addon" value="<?= $list->no_wa; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Biaya Kos</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text border-0 bg-primary text-white rounded-left" id="my-addon">Rp.</span>
                                </div>
                                <input class="form-control" type="number" name="biaya_kos" placeholder=".000,00" aria-label="Recipient's text" aria-describedby="my-addon" value="<?= $list->biaya_kos; ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="my-input">Kecamatan</label>
                            <input id="my-input" class="form-control" type="text" name="kecamatan" placeholder="Kecamatan" value="<?= $list->kecamatan; ?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="my-textarea">Alamat Kos</label>
                            <input id="my-textarea" class="form-control" style="resize: none;" name="alamat_kos" rows="1" placeholder="Alamat kos" value="<?= $list->alamat_kos; ?>" autocomplete="off"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <?php
                        if ($list->gambar1 != null) { ?>
                            <img class="img-thumbnail d-block mb-2" src="<?= site_url('uploads/kos/') . $list->gambar1; ?>" width="100px" height="100px" style="object-fit: cover;" alt="">
                        <?php } else { ?>
                            <img class="img-thumbnail d-block mb-2" src="<?= base_url('uploads/kos/default.jpg'); ?>" width="100px" height="100px" style="object-fit: cover;" alt="">
                        <?php } ?>
                        <input type="text" name="image_lama" class="form-control-file" id="image_lama" style="border: 1px solid gainsboro; padding: 1px; border-radius: 5px; background: white;" hidden value="<?= $list->gambar1; ?>">
                        <input type="file" name="image" class="form-control-file" id="image" style="border: 1px solid gainsboro; padding: 1px; border-radius: 5px; background: white;">
                    </div>
                    <div class="form-group">
                        <label for="my-textarea">Deskripsi Kos</label>
                        <textarea id="my-textarea" class="form-control" style="resize: none;" name="deskripsi" rows="3"><?= $list->deskripsi; ?></textarea>
                    </div>
                    <label for="fasilitas">Fasilitas</label>
                    <div class="form-row row-cols-lg-2">
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wifi" value="WIFI" name="fasilitas[]" <?php in_array('WIFI', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="wifi"> WIFI</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="km" value="Kamar mandi dalam" name="fasilitas[]" <?php in_array('Kamar mandi dalam', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="km"> Kamar mandi dalam</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tt" value="Tempat tidur" name="fasilitas[]" <?php in_array('Tempat tidur', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="tt"> Tempat tidur</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="du" value="Dapur umum" name="fasilitas[]" <?php in_array('Dapur umum', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="du"> Dapur umum</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ac" value="AC" name="fasilitas[]" <?php in_array('AC', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="ac"> AC</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tv" value="TV" name="fasilitas[]" <?php in_array('TV', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="tv"> TV</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="mb" value="Meja belajar" name="fasilitas[]" <?php in_array('Meja belajar', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="mb"> Meja belajar</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rt" value="Ruang tamu" name="fasilitas[]" <?php in_array('Ruang tamu', $checked) ? print 'checked' : ' ' ?>>
                                <label class="form-check-label" for="rt"> Ruang tamu</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">
                                <input class="form-check-input" hidden checked name="fasilitas[]" type="checkbox" value="" id="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm border-0" style="background-color: #298505;">Update</button>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
<?php } ?>
<script src="<?= base_url('assets/js/map.js'); ?>"></script>
<script>
    curLocation = [<?= $list->latitude; ?>, <?= $list->longitude; ?>];
    map.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });
    // saat didrag
    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true',
        }).bindPopup(position).update();

        $("#latitude").val(position.lat)
        $("#longitude").val(position.lng)

    });
    map.addLayer(marker);


    var latInput = document.querySelector('[name=latitude]');
    var lngInput = document.querySelector('[name=longitude]');
    map.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng).addTo(map)
                .bindPopup(e.latlng.toString());
        }
        latInput.value = lat;
        lngInput.value = lng;
    });
</script>