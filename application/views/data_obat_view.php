<?php
if (!empty($notif)) {
	echo '<div class=alert alert-danger>';
	echo $notif;
	echo'</div>';
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Data obat</h1> 
	</div> 
</div>
<div class="row"> 
	<div class="col-lg-12"> 
		<div class="panel panel-default"> 
			<div class="panel-heading">
				Data - Data Obat 
			</div> 

			<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
			<a href="add_obat/" class="btn btn-info btn-sm">
			<i class="glyphicon glyphicon-trash"> </i> TAMBAH DATA </a> 
			</div> 

			<div class="panel-body"> 
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead> 
							<tr>
								<th>Kode Obat</th> 
								<th>Kode Supplier</th> 
								<th>Nama Obat</th> 
								<th>Produsen</th> 
								<th>Harga</th> 
								<th>Jumlah stok</th> 
								<th>Foto</th>
								<th>Aksi</th> 
							</tr> 
						</thead> 
						<tbody> 
							<?php
							$no = 1;
							foreach($obat as $data) {
								echo'
								<tr>
								<td>'.$data->KODE_OBAT. '</td>
								<td>'.$data->KODE_SUPPLIER. '</td> 
								<td>'.$data->NAMA_OBAT. '</td> 
								<td>'.$data->PRODUSEN. '</td> 
								<td>'.$data->HARGA. '</td> 
								<td>'.$data->JML_STOK. '</td> 
								<td>'.$data->FOTO. '</td> 
								<td>
								<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<a href="'.base_url().'index.php/obat/delete_obat/'.$data->KODE_OBAT.'" class="btn btn-danger btn-sm">
								<i class="glyphicon glyphicon-trash"> </i> Hapus </a> 
								</div> 
								<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<a href="'.base_url().'index.php/obat/ambil_obat/' .$data->KODE_OBAT.'" class="btn btn-info btn-sm">
								<i class="glyphicon glyphicon-search"> </i> Edit </a> 
								</div> 
								</td> 
								</tr> '; }
							?>
							</tbody>
						</table> 
					</div> 
				</div> 
			</div> 
		</div>
	</div>

