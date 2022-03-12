<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
		<div class="section-header">
			<h1>Mahasiswa</h1>
		</div>
		<div class="section-body">
			<div class="col-12 ">
				<p>
					<a href="<?= base_url('mahasiswa/tambah') ?>" class="btn btn-success btn-lg"><i
							class="fa fa-plus "></i> Tambah baru</a>
				</p>
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
						<h4>Data Mahasiswa</h4>
					</div>
                    
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table table-striped table-md">
								<tr>
									<th>No</th>
									<th>Nama Mahasiswa</th>
									<th>Nim</th>
									<th>Jurusan</th>

									<th>Action</th>
								</tr>
								</thead>
								<tbody>

                                <?php
                                $no = 1;
                                foreach ($mahasiswas as $mahasiswa) : ?>
									<tr>
                                        <td><?= $no++ ?></td>
										<td><?= $mahasiswa->nama ?></td>
										<td><?= $mahasiswa->nim ?> </td>
										<td><?= $mahasiswa->jurusan ?> </td>
										<td>
											<!-- <a href="<?= base_url('mahasiswa/ubah/' . $mahasiswa->id) ?>"
												class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a> -->
                                            <a href="<?= base_url('mahasiswa/delete/' . $mahasiswa->id) ?>"
												class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></a>
										</td>
									</tr>
									<?php endforeach ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
        </section>
		<?= $this->endSection() ?>