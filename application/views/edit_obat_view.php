<div class="row"> 
	<div class="col-lg-12">
		<h1 class="page-header">Tambah Obat</h1> 
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
					<div class="col-lg-12">
						<form role="form" method="post" enctype="multipart/form-data"
						action="<?php echo base_url('index.php/Obat/update_obat/').$data->KODE_OBAT; ?>"> 
							<?php
							echo' 
							<div class="col-md-9 col-sm-9 col-xs-9 col-lg-9"> 
							<div class="form-group">
							<label>Kode Obat</label> 
							<input class="form-control" name="kode_obat" value="'.$data->KODE_OBAT.'">
							</div>

							<div class="form-group">
							<label>Kode Supplier</label>
							<input class="form-control" name="kode_supplier" value="'.$data->KODE_SUPPLIER.'"> 
							</div>

							<div class="form-group">
							<label>Nama Obat</label>
							<input class="form-control" name="nama obat" value="'.$data->NAMA_OBAT.'"> 
							</div>

							<div class="form-group">
							<label>Produsen</label>
							<input class="form-control" name="produsen" value="'.$data->PRODUSEN.'"> 
							</div>

							<div class="form-group">
							<label>Harga</label>
							<input class="form-control" name="harga" value="'.$data->HARGA.'">
							</div>

							
							<div class="form-group">
							<label>Jumlah stok</label>
							<input class="form-control" name="jml_stok" value="'.$data->JML_STOK.'"> 
							</div>

							<div class="form-group">
							<label>FOTO</label>
							<input type="file" name="foto" value="'.$data->FOTO.'"> 
							</div> 
							</div>

							<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
							<div id="foto">
							<img src="'.base_url().'image/'.$data->FOTO.'" style="width: 170px; height: 230px">
							</div> 
							</div>
							<br>
							';
							?>
							<div class="col-md-4 col-sm-4 col-x5-4 col-lg-4">
								<input type="submit" class="btn btn-block btn-danger" name="submit" value="update"> 
							</div>
						</form> 
					</div> 
				</div> 
			</div> 
		</div> 
	</div> 
</div>
