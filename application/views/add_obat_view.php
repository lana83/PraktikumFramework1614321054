<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tambah obat</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Tambahkan Data Obat
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						
						<?php
						if(!empty($notif)){
							echo '<div class="alert alert-danger">';
							echo $notif;
							echo '</div>';
						}
						?>
						<form role="form" method="post" enctype="multipart/form-data"
						action="<?php echo base_url('index.php/Obat/simpan'); ?>">

						<div class="form-group">
							<label>Kode obat</label>
							<input class="form-control" placeholder="Kode Obat" name="kode_obat">
						</div>
						<div class="form-group">
							<label>Kode Supplier</label>
							<select class="form-control" name="kode_supplier">
								<option disabled selected>Pilih Kode Supplier</option>
								<?php
									foreach ($kode_supplier as $data) {
										echo '<option>' .$data->KODE_SUPPLIER. '</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Nama obat</label>
							<input class="form-control" placeholder="Nama Obat" name="nama_obat">
						</div>
						<div class="form-group">
							<label>Produsen</label>
							<input class="form-control" placeholder="Produsen" name="produsen">
						</div>
						<div class="form-group">
							<label>Harga</label>
							<input class="form-control" placeholder="Harga" name="harga">
						</div>
						<div class="form-group">
							<label>Jumlah stok</label>
							<input class="form-control" placeholder="Jumlah stok" name="jml_stok">
						</div>
						<div class="form-group">
							<label>File input</label>
							<input type="file" name="foto">
						</div>
						<input type="submit" class="btn btn-success" name="submit" value="submit">
						<button type="reset" class="btn btn-warning">Reset</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
