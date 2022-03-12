<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
		<div class="section-header">
			<h1>Pembayaran</h1>
		</div>
			<div class="section-body">

				<div class="row">
					<div class="col-12 col-md-6 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4>Input Pembayaran</h4>
							</div>

							<div class="card-body">
								<form action="<?= base_url('pembayaran/proses_tambah') ?>" id="form-tambah" method="POST" autocomplete="off">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="nama_pembayaran"><strong>Pembayaran</strong></label>
											<input type="text" name="nama_pembayaran" placeholder="Masukkan Pembayaran"
												autocomplete="off" class="form-control" required>
										</div>
                                        <div class="form-group col-md-6">
											<label for="jumlah"><strong>Jumlah</strong></label>
											<input type="number" name="jumlah" placeholder="Masukkan Jumlah"
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