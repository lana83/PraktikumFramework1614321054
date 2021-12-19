<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function __construct()
	{

		parent:: __construct();
		$this->load->model('Obat_model');

	}

	public function index()
	{
		$data['obat'] = $this->Obat_model->get_data_obat();
		$data['main_view'] = 'data_obat_view';
		$this->load->view('template', $data);
	}

	public function add_obat()
	{
		$data['kode_supplier'] = $this->Obat_model->getkodeSupplier();
		$data['main_view'] = 'add_obat_view';
		$this->load->view('template', $data);
	}

	public function simpan(){
		if($this->input->post("submit")){
			$this->form_validation->set_rules('kode_obat', 'Kode Obat', 'trim|required');
			$this->form_validation->set_rules('kode_supplier', 'Kode Supplier', 'trim|required');
			$this->form_validation->set_rules('nama_obat', 'Nama obat', 'trim|required');
			$this->form_validation->set_rules('produsen', 'Produsen', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('jml_stok', 'Jumlah Stok', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$config['upload_path'] = './image/'; 
				$config['allowed_types'] = 'jpg|png'; 
				$config['max_size'] = 2000;

				$this->load ->library('upload', $config);
				if($this->upload ->do_upload('foto')){
					if($this->Obat_model->insert($this->upload->data()) == TRUE) {
						$data['notif'] = 'Penambahan Data Berhasil';
						$data['main_view'] = 'add_obat_view';
						$this->load->view('template', $data);
					}else{
						$data['notif'] = 'Penambahan Data Gagal!';
						$datas ['main_view'] = 'add_obat_View'; 
						$this->load->view('template', $data);
					}
				}else{
					$data['main_view'] = 'add_obat_view';
					$data['notif'] = $this->upload->display_errors(); 
					$this->load->view('template', $data);
				}
			}else{
				$data['notif'] = validation_errors(); 
				$data['main_view'] = 'add_obat_view';
				$this->load->view('template', $data);
			}
		}
	}

	public function delete_obat($obat){ 
		if ($this->Obat_model->delete_obat($obat)) {
			$data['notif'] = 'Hapus Berhasil'; 
			$data['main_view'] = 'data_obat_view'; 
			$this->load-view('template', $data); redirect('obat/add_obat');
			$data['supplier'] = $this->Supplier_model->get_data_obat();
		}
	}

	public function ambil_obat($kode_obat) {
		$data['main_view'] = 'edit_obat_view';
		$data['data'] = $this->Obat_model->detil_obat($kode_obat); 
		$this->load->view('template', $data);
	}

	public function update_obat($kode_obat){

		$data['main_view'] = 'data_obat_view'; 
		$this->Obat_model->edit_obat($kode_obat); 
		$this->load->view('template', $data); 
		redirect('index.php/Obat/');
	}

}