<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
	<div class="section-header">
		<h1>Tagihan</h1>
	</div>
	<div class="section-body">


		<div class="row" id="content" data-url="<?= base_url('tagihan') ?>">
			<div class="col-12 col-md-6 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4>Input Tagihan</h4>
					</div>

					<div class="card-body">
						<form action="<?= base_url('tagihan/proses_tambah') ?>" id="form-tambah" method="POST">
							<h5>Data Mahasiswa</h5>
							<hr>
							<div class="form-row">
								<div class="form-group col-2">
									<label>No. Tagihan</label>
									<input type="text" name="no_tagihan" value="PJ<?= mt_rand(100000, 999999) ?>"
										readonly class="form-control">
								</div>

								<div class="form-group col-3">
									<label for="nama_mahasiswa">Nama Mahasiswa</label>
									<select name="nama_mahasiswa" id="nama_mahasiswa" class="form-control">
													<option value="">Pilih Pembayaran</option>
													<?php foreach ($mahasiswas as $mahasiswa) : ?>
														<option value="<?= $mahasiswa->nama ?>"><?= $mahasiswa->nama ?></option>
													<?php endforeach ?>
												</select>
								</div>
								<div class="form-group col-3">
												<label for="semester">Semester</label>
												<select name="semester" class="form-control">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
												</select>
											</div>
										</div>
										<h5>Data Pembayaran</h5>
										<hr>
										<div class="form-row">
											<div class="form-group col-3">
												<label for="nama_pembayaran">Nama Pembayaran</label>
												<select name="nama_pembayaran" id="nama_pembayaran" class="form-control">
													<option value="">Pilih Pembayaran</option>
													<?php foreach ($pembayaran as $barang) : ?>
														<option value="<?= $barang->nama_pembayaran ?>"><?= $barang->nama_pembayaran ?></option>
													<?php endforeach ?>
												</select>
											</div>
												<div class="form-group col-2">
												<label>Jumlah</label>
												<input type="text" name="jumlah" value="" readonly class="form-control">
											</div>
											<!-- <div class="form-group col-2">
												<label>Jumlah</label>
												<input type="number" name="sub_total" value="400.000" class="form-control" readonly>
											</div> -->
											<div class="form-group col-1">
												<label for="">&nbsp;</label>
												<button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
											</div>
											<input type="hidden" name="satuan" value="">
										</div>
										<div class="keranjang">
											<h5>Detail Tagihan</h5>
											<hr>
											<table class="table table-bordered" id="keranjang">
												<thead>
													<tr>
														<td width="35%">Nama Pembayaran</td>
														<td width="15%">Jumlah</td>
														<td width="15%">Aksi</td>
													</tr>
												</thead>
												<tbody>

												</tbody>
												<tfoot>
													<tr>
														<td colspan="1" align="right"><strong>Total : </strong></td>
														<td id="total"></td>

														<td>
															<input type="hidden" name="total_hidden" value="">
															<input type="hidden" name="max_hidden" value="">
															<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
														</td>
													</tr>
												</tfoot>
											</table>
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

<?= $this->section('script') ?>
<script>
		console.log('capek')
		$(document).ready(function() {
			$('tfoot').hide()

			$(document).keypress(function(event) {
				if (event.which == '13') {
					event.preventDefault();
				}
			})

			$('#nama_pembayaran').on('change', function() {

				if ($(this).val() == '') reset()
				else {
					const url_get_all_barang = $('#content').data('url') + '/get_all_pembayaran'
					console.log('url_get_all_barang',url_get_all_barang)
					$.ajax({
						url: url_get_all_barang,
						type: 'POST',
						dataType: 'json',
						data: {
							nama_pembayaran: $(this).val()

						},
						
						success: function(data) {
							console.log(data.jumlah)
							$('input[name="jumlah"]').val(data.jumlah)
							$('button#tambah').prop('disabled', false)

							// $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())

							// $('input[name="jumlah"]').on('keydown keyup change blur', function() {
							// 	$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
							// })
						},

					})
				}
			})

			$(document).on('click', '#tambah', function(e) {
				const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
				console.log('url_keranjang_barang',url_keranjang_barang)
				const data_keranjang = {
					nama_barang: $('select[name="nama_pembayaran"]').val(),
					// harga_barang: $('input[name="harga_barang"]').val(),
					jumlah: $('input[name="jumlah"]').val(),
					// satuan: $('input[name="satuan"]').val(),
					// sub_total: $('input[name="sub_total"]').val(),
				}

				console.log(data_keranjang)


				if (parseInt($('input[name="max_hidden"]').val()) <= parseInt(data_keranjang.jumlah)) {
					alert('stok tidak tersedia! stok tersedia : ' + parseInt($('input[name="max_hidden"]').val()))
				} else {
				
					// $.ajax({
					// 	url: url_keranjang_barang,
					// 	type: 'POST',
					// 	data: data_keranjang,
					// 	success: function(data) {
						console.log('data_keranjang.nama_barang><', data_keranjang.nama_barang);
						var tambah_data = `
						<tr class="row-keranjang">
							<td class="nama_barang">
								`+data_keranjang.nama_barang+`
								<input type="hidden" name="nama_barang_hidden[]" value="`+data_keranjang.nama_barang+`">
							</td>
							
							<td class="jumlah">
							`+data_keranjang.jumlah+`
								<input type="hidden" name="jumlah_hidden[]" value="`+data_keranjang.jumlah+`">
							</td>

							<td class="aksi">
								<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang=""><i class="fa fa-trash"></i></button>
							</td>
						</tr> `;
							
							if ($('select[name="nama_barang"]').val() == data_keranjang.nama_barang) $('option[value="' + data_keranjang.nama_barang + '"]').hide()
							reset()

							$('table#keranjang tbody').append(tambah_data)
							$('tfoot').show()

							$('#total').html('<strong>' + hitung_total() + '</strong>')
							$('input[name="total_hidden"]').val(hitung_total())
					// 	}
					// })
				}

			})


			$(document).on('click', '#tombol-hapus', function() {
				$(this).closest('.row-keranjang').remove()

				$('option[value="' + $(this).data('nama-barang') + '"]').show()

				if ($('tbody').children().length == 0) $('tfoot').hide()
			})

			$('button[type="submit"]').on('click', function() {
				// $('input[name="kode_barang"]').prop('disabled', true)
				$('select[name="nama_pembayaran"]').prop('disabled', true)
				// $('input[name="harga_barang"]').prop('disabled', true)
				$('input[name="jumlah"]').prop('disabled', true)
				// $('input[name="sub_total"]').prop('disabled', true)
			})

			function hitung_total() {
				let total = 0;
				$('.jumlah').each(function() {
					total += parseInt($(this).text())
				})

				return total;
			}

			function reset() {
				$('#nama_pembayaran').val('')
				$('input[name="jumlah"]').val('')
				// $('input[name="kode_barang"]').val('')
				// $('input[name="harga_barang"]').val('')
				
				// $('input[name="sub_total"]').val('')
				// $('input[name="jumlah"]').prop('readonly', true)
				$('button#tambah').prop('disabled', true)
			}
		})
	</script>
<?= $this->endSection() ?>