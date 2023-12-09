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
<div class="card border-0 mb-4">
    <div class="card-body">
        <a name="" id="" class="btn btn-primary btn-md border-0 float-right mb-3" href="<?= site_url('kos/add'); ?>" role="button" style="background-color:#298505;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Kos</a>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Pemilik Kos</th>
                        <th>Nama Kos</th>
                        <th>Alamat Kos</th>
                        <th>Gambah Kos</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($list->result() as $key => $value) { ?>
                        <tr>
                            <td scope="row" class="text-center" style="width: 10px;"><?= $no++; ?></td>
                            <td style="width: 15rem;"><?= $value->pemilik_kos; ?></td>
                            <td style="width: 15rem;"><?= $value->nama_kos; ?></td>
                            <td style="width: 15rem;"><?= $value->alamat_kos; ?></td>
                            <td style="width: 15rem;" class="text-center">
                                <?php if ($value->gambar1 != null) { ?>
                                    <img class="img-thumbnail" src="<?= base_url('uploads/kos/' . $value->gambar1); ?>" width="100px" height="100px" style="object-fit: cover;" alt="">
                                <?php } else { ?>
                                    <img class="img-thumbnail" src="<?= base_url('uploads/kos/default.jpg'); ?>" width="100px" height="100px" style="object-fit: cover;" alt="">
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm border-0" role="group" aria-label="b">
                                    <a name="" id="" class="btn btn-primary border-0" style="background-color:#298505;" href="<?= site_url('kos/detail/') . $value->id_kos; ?>" role="button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a name="" id="" class="btn btn-danger border-0 alert_notif" href="<?= site_url('kos/delete/') . $value->id_kos . '/' . $value->gambar1; ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <a name="" id="" class="btn btn-primary border-0" href="<?= site_url('kos/update/') . $value->id_kos; ?>" role="button"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>