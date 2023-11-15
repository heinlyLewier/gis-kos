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
<?php if ($user->level == 'Admin') { ?>
	<div class="card border-0 mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable">
					<thead class="text-center">
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Status</th>
							<th>Level</th>
							<th>Foto</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($list->result() as $key => $value) { ?>
							<?php if ($value->level != 'Admin') { ?>
								<tr>
									<td scope="row" class="text-center" style="width: 10px;">
										<?= $no++; ?>
									</td>
									<td style="width: 15rem;">
										<?= $value->nama; ?>
									</td>
									<td style="width: 15rem;">
										<?= $value->username; ?>
									</td>
									<td style="width: 15rem;">
										<?= $value->status; ?>
									</td>
									<td style="width: 15rem;">
										<?= $value->level; ?>
									</td>
									<td style="width: 15rem;" class="text-center">
										<?php if ($value->img != null) { ?>
											<img class="img-thumbnail" src="<?= base_url('uploads/profil/' . $value->img); ?>" width="100px" height="100px" style="object-fit: cover;" alt="">
										<?php } else { ?>
											<img class="img-thumbnail" src="<?= base_url('uploads/profil/default.jpg'); ?>" width="100px" height="100px" style="object-fit: cover;" alt="">
										<?php } ?>
									</td>
									<td class="text-center">
										<div class="btn-group btn-group-sm border-0" role="group" aria-label="b">

											<?php if ($value->status == 'Tidak Aktif') : ?>
												<a name="" id="" class="btn btn-danger hapus_user" href="<?= site_url('admin/delete_user/') . $value->id_user . '/' . $value->img; ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
											<?php endif; ?>
											<?php if ($value->status == 'Aktif') : ?>
												<i class="far fa-times-circle text-black-50 fa-1x"></i>
											<?php endif; ?>
										</div>
									</td>
								</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php } ?>
<?php if ($user->level == 'User') { ?>
	<!-- 404 Error Text -->
	<div class="text-center">
		<div class="error mx-auto" data-text="404">404</div>
		<p class="lead text-gray-800 mb-5">Page Not Found</p>
		<p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
		<a href="<?= site_url('home'); ?>">&larr; Back to Dashboard</a>
	</div>
<?php } ?>