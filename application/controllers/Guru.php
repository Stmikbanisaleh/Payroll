<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

	private function _cunstruct()
	{
		$this->load->model('guru');
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function index()
	{
		$my_data = $this->db->get('guru')->result_array();
		$data = array(
			'page_content' 	=> '../guru/index',
			'ribbon' 		=> '<li class="active">Dashboard</li><li>Master Guru</li>',
			'page_name' 	=> 'Master Guru',
			'js' 			=> 'js_file',
			'mydata' 		=> $my_data
		);
		$this->render_view($data); //Memanggil function render_view
	}

	public function simpan_guru()
	{
		$data = array(
			'nik'  => $this->input->post('nik'),
			'nama'  => $this->input->post('nama'),
			'jabatan'  => $this->input->post('jabatan'),
			'alamat' => $this->input->post('alamat'),
		);
		$result = $this->db->insert('guru', $data);
		if ($result) {
			echo $result;
		} else {
			echo 'insert gagal';
		}
	}

	public function tampil_guru()
	{
		$my_data = $this->db->get('guru')->result_array();
		echo json_encode($my_data);
	}
}
