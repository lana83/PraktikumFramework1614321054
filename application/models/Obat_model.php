<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model {

	public function insert($foto) 
	{ 
		$data = array(
			'kode_obat' => $this->input->post('kode_obat'), 
			'kode_supplier' => $this->input->post('kode_supplier'), 
			'nama_obat' => $this->input->post('nama_obat'),
			'produsen' => $this->input->post('produsen'), 
			'harga'=> $this->input->post('harga'), 
			'jml_stok' => $this->input->post('jml_stok'), 
			'foto'=> $foto['file_name']
		);

		$this->db->insert('obat', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function getkodeSupplier(){
//MENGAMBIL KODE SUPLIER YANG ADA DI TABEL SUPLIER 
		return $this->db->order_by('kode_supplier')
		->get('supplier')
		->result();
	}
	public function get_data_obat(){ 
		return $this->db->get('obat')
		->result();
	}

	public function delete_obat($obat){ 
		$this->db->where('kode_obat', $obat)
		->delete('obat');
	}

	public function detil_obat($kode_obat) {
		return $this->db->where('KODE_OBAT', $kode_obat)
						->get('obat')
						->row();
	}

	public function edit_obat($kode_obat)
	{
		$data = array(
			'KODE_OBAT' 	=> $this->input->post('kode_obat'), 
			'KODE_SUPPLIER' => $this->input->post('kode_supplier'), 
			'nama_obat' 	=> $this->input->post('nama_obat'), 
			'produsen' 		=> $this->input->post('produsen'), 
			'harga'			=> $this->input->post('harga'),
			'jml_stok' 		=> $this->input->post('jml_stok'),
			'foto'			=> $this->input->post('foto')
		);
		$this->db->where('KODE_OBAT', $kode_obat); 
		$this->db->update('obat', $data);
	}
}