<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
		<div class="section-header">
			<h1>Mahasiswa</h1>
		</div>
			<div class="section-body">

				<div class="row">
					<div class="col-12 col-md-6 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4>Input Mahasiswa</h4>
							</div>

							<div class="card-body">
								<form action="<?= base_url('mahasiswa/proses_tambah') ?>" id="form-tambah" method="POST" autocomplete="off">
									<div class="form-row">
										<div class="form-group col-md-12">
											<label for="nama"><strong>Nama Lengkap</strong></label>
											<input type="text" name="nama" placeholder="Masukkan Nama "
												autocomplete="off" class="form-control" required>
										</div>
										<div class="form-group col-md-12">
											<label for="nama_nim"><strong>NIM</strong></label>
											<input type="number" name="nim" placeholder="Masukkan NIM "
												autocomplete="off" class="form-control" required>
										</div>
										<div class="form-group col-md-12">
											<label for="jurusan"><strong>Jurusan</strong></label>
											<input type="text" name="jurusan" placeholder="Masukkan Jurusan "
												autocomplete="off" class="form-control" required>
										</div>
                                       
									</div>
									<hr>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i
												class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
										<button type="reset" class="btn btn-danger"><i
												class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
    </div>
</section>
<?= $this->endSection() ?>