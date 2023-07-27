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
<?php if ($this->session->userdata('level') == 'Admin') { ?>
    <div class="card border-0 mb-4">
        <div class="card-body">
            <a name="" id="" class="btn btn-primary btn-sm border-0 float-right mb-3" href="<?= site_url('kos/add'); ?>" role="button" style="background-color:#298505;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Kos</a>

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
                                        <a name="" id="" class="btn btn-primary" style="background-color: #248A50;" href="<?= site_url('kos/detail/') . $value->id_kos; ?>" role="button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a name="" id="" class="btn btn-danger alert_notif" href="<?= site_url('admin/delete/') . $value->id_kos . '/' . $value->gambar1; ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <a name="" id="" class="btn btn-dark" href="<?= site_url('kos/update/') . $value->id_kos; ?>" role="button"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($this->session->userdata('level') == 'User') { ?>
    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Page Not Found</p>
        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
        <a href="<?= site_url('home'); ?>">&larr; Back to Dashboard</a>
    </div>
<?php } ?>