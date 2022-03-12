<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
		<div class="section-header">
			<h1>Pembayaran</h1>
		</div>
		<div class="section-body">
			<div class="col-12 ">
				<p>
					<a href="<?= base_url('pembayaran/tambah') ?>" class="btn btn-success btn-lg"><i
							class="fa fa-plus "></i> Tambah baru</a>
				</p>
				<div class="card">
					<div class="card-header">
						<h4>Data Pembayaran</h4>
					</div>
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table table-striped table-md">
								<tr>
									<th>No</th>
									<th>Nama Pembayaran</th>
									<th>Jumlah</th>

									<th>Action</th>
								</tr>
								</thead>
								<tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?= $this->endSection() ?>