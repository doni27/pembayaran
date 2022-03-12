<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
		
		<div class="section-header">
			<h1>Detail Tagihan</h1>
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
									<th>Nama Pembayaran</th>
									<th>Jumlah</th>
								
								</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($datas as $tagihan) : ?>
									
									<tr>
										<td><?= $no ++ ?></td>
										<td><?= $tagihan->no_tagihan ?></td>
										<td><?= $tagihan->nama_tagihan ?></td>
										<td><?= $tagihan->sub_total ?></td>
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