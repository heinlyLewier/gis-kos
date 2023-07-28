<script>
    <?php if ($this->session->flashdata('pesan')) { ?>
        var isi = <?= json_encode($this->session->flashdata('pesan')) ?>;
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Gagal!!',
            text: isi,
            showConfirmButton: false,
            timer: 1500
        })
    <?php } ?>
</script>
<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class=" col-md-4 ">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h1 class="card-title h4 mb-4  font-weight-bold text-center" style="color: #298505;"><?= $title; ?></h1>
                    <?= form_open(site_url() . 'auth'); ?>

                    <div class="form-group">
                        <label for="my-input">Username</label>
                        <input id="my-input" class="form-control" type="text" name="username" value="<?= set_value('username'); ?>" placeholder="Username" autocomplete="off">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Password</label>
                        <input id="" class="form-control form-password" type="password" name="password" value="" placeholder="Password" autocomplete="off">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class=" form-group form-check mb-3">
                        <input class="form-check-input show-password" type="checkbox" id="autoSizingCheck">
                        <label class="form-check-label" for="autoSizingCheck">
                            Lihat Password
                        </label>
                    </div>

                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="btn btn-success border-0  btn-sm btn-block" style="background-color: #298505;">Masuk</button>
                        <a name="" id="" class="nav-link " href="<?= site_url('registrasi'); ?>" role="button">Buat sebuah akun!</a>
                    </div>
                    <?= form_close(); ?>

                </div>
            </div>
            <span class="text-white" style="font-size: 12px;">Copyright &copy; Skripsi GIS Pemetaan Rumah Kos Kota Ambon 2023 - <?= date('Y'); ?></span>
        </div>
    </div>
</div>