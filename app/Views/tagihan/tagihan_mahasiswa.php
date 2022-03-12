<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
		
		<div class="section-header">
			<h1>Tagihan</h1>
		</div>
		<div class="section-body">
			<div class="col-12 ">
				
				<?php if(session()->getFlashdata('success')) : ?>
                       
					   <div class="alert alert-success alert-dismissible show fade">
						 <div class="alert-body">
						   <button class="close" data-dismiss="alert">
							 <span>&times;</span>
						   </button>
						   <?=session()->getFlashdata('success')?>
						 </div>
					   </div>
					   <?php endif; ?>
					   <?php if(session()->getFlashdata('error')) : ?>
						  
						  <div class="alert alert-danger alert-dismissible show fade">
							<div class="alert-body">
							  <button class="close" data-dismiss="alert">
								<span>&times;</span>
							  </button>
							  <?=session()->getFlashdata('error')?>
							</div>
						  </div>
						  <?php endif; ?>
				<div class="card">
					<div class="card-header">
						<h4>Data Tagihan</h4>
					</div>
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table table-striped table-md">
								<tr>
									<th>No</th>
									<th>No Tagihan</th>
									<th>Nama Mahasiswa</th>
									<th>Semester</th>
									<th>Total Tagihan</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($tagihan as $mahasiswa) : ?>
									
									<tr>
										<td><?= $no ++ ?></td>
										<td><?= $mahasiswa->no_tagihan ?></td>
										<td><?= $mahasiswa->nama_mahasiswa ?></td>
										<td><?= $mahasiswa->semester ?></td>
									
										<td>Rp <?= $mahasiswa->total ?></td>
										<td>
											<?php if($mahasiswa->status == 'lunas') {?>
										<a href=""
												class="btn btn-success btn-sm">Lunas</a>
												<?php } else{?>
													<a href=""
												class="btn btn-warning btn-sm">Belum Lunas</a>
												<?php }?>
												</td>
										<td>
										<a href="<?= base_url('tagihan/lihat_detail/' . $mahasiswa->no_tagihan) ?>"
												class="btn btn-primary btn-sm"><i class="fa fa-eye"> </i> detail</a>
										<a href="<?= base_url('tagihan/ubah_status/' . $mahasiswa->id) ?>"
												class="btn btn-success btn-sm"><i class="fa fa-pen"> </i> bayar</a>
										</td>
									</tr>
								
									<?php endforeach ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
        </section>
		<?= $this->endSection() ?>