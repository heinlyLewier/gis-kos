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
<div class="card border-0 mb-4 shadow" style="background-image: url('<?= base_url('assets/img/bg.jpg'); ?>');">
    <div class="card-body text-center  bg-gradient-white border-0">
        <a href="#" data-toggle="modal" data-target="#ubahprofil">
            <?php if ($user->img == null) { ?>
                <img src="<?= base_url('uploads/profil/default.jpg'); ?>" class="rounded-circle" alt="..." style="object-fit: cover; width: 150px; height: 150px;">
            <?php } else { ?>
                <img src="<?= base_url('uploads/profil/' . $user->img); ?>" class="rounded-circle" alt="..." style="object-fit: cover; width: 150px; height: 150px;">
            <?php } ?>
        </a><br>
        <p class="badge badge-success font-weight-bold" style="background-color:#298505;"><?= $user->status; ?></p>
        <h5 class="card-title font-weight-bold text-dark"><?= $user->nama; ?></h5>
        <small class="card-title text-dark font-weight-bold">Username : <?= $user->username; ?></small><br>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4 border-0">
            <h1 class="h5 mx-3 mt-3 font-weight-bold text-gray-800">
                Update Profil
            </h1>
            <div class="card-body">
                <?= form_open('profil/update_profil'); ?>
                <input class="form-control" type="text" hidden name="id_user" value="<?= $user->id_user; ?>">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?= $user->nama; ?>" class="form-control" placeholder="Nama">
                    <?= form_error('nama', '<small class="text-danger">', ' </small>'); ?>
                </div>
                <div class="form-group">
                    <label for="" class="d-block">Username</label>
                    <input type="text" name="username" id="username" value="<?= $user->username; ?>" class="form-control" placeholder="Username">
                    <?= form_error('username', '<small class="text-danger">', ' </small>'); ?>
                </div>
                <hr>
                <div class="form-group">
                    <button type="submit" name="btn-ubahuser" class="btn btn-md btn-primary border-0" style="background-color:#298505;">Update profil</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card mb-4 border-0">
            <h1 class=" h5 mx-3 mt-3 font-weight-bold text-gray-800">
                Update Password
            </h1>
            <div class="card-body">
                <?= form_open('profil/update_password'); ?>
                <input class="form-control" type="text" hidden name="id_user" value="<?= $user->id_user; ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="my-input">Password</label>
                        <input id="" class="form-control form-password" type="password" name="password" value="" placeholder="Password" autocomplete="off">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="my-input">Konfirmasi Password</label>
                        <input id="" class="form-control form-password" type="password" name="konfir_password" value="" placeholder="Konfirmasi password" autocomplete="off">
                    </div>
                </div>
                <div class=" form-group form-check mb-3">
                    <input class="form-check-input show-password" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">
                        Lihat Password
                    </label>
                </div>
                <hr>
                <div class="form-group">
                    <button type="submit" name="btn-ubahpass" class="btn  btn-md btn-primary border-0" style="background-color:#298505;">Update password</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

</div>
<?= form_open_multipart('profil/update_foto/' . $user->id_user); ?>
<!-- Modal profil -->
<div class="modal fade" id="ubahprofil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-gray-800" id="exampleModalLabel">Ubah foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php
                    if ($user->img != null) { ?>
                        <img class="img-thumbnail d-block mb-2" src="<?= site_url('uploads/profil/') . $user->img; ?>" width="100px" height="100px" style="object-fit: cover;" alt="">
                    <?php } else { ?>
                        <img class="img-thumbnail d-block mb-2" src="<?= base_url('uploads/profil/default.jpg'); ?>" width="100px" height="100px" style="object-fit: cover;" alt="">
                    <?php } ?>
                    <input type="text" name="image_lama" class="form-control-file" id="image_lama" style="border: 1px solid gainsboro; padding: 1px; border-radius: 5px; background: white;" hidden value="<?= $user->img; ?>">
                    <input type="file" name="image" class="form-control-file" id="image" style="border: 1px solid gainsboro; padding: 1px; border-radius: 5px; background: white;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="btn-ubahprofil" class="btn btn-sm btn-primary border-0" style="background-color:#298505;">Update foto</button>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>