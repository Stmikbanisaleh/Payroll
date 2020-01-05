<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayatsertifikasi extends CI_Controller {

    function __construct(){
        parent::__construct();      
        $this->load->model('model_rwytsertifikasi');

    }

	function render_view($data) {
        $this->template->load('template', $data); //Display Page
       
    }

	public function index() {
        $data = array(
                    'page_content'  => 'riwayat_sertifikasi/index',
                    'ribbon'        => '<li class="active">Riwayat sertifikasi</li>',
                    'page_name'     => 'Riwayat sertifikasi'
                );
        $this->render_view($data); //Memanggil function render_view
    }

    public function view() {
        $uri = $this->uri->segment(3);
        $data = array(
            'id'  => $uri,
        );
        
        if($uri != ''){
            $my_data = $this->model_rwytsertifikasi->view_where('guru',$data)->result();
            $nama_guru = ucwords($my_data[0]->nama);
            $data = array(
                        'page_content'  => 'riwayat_sertifikasi/index',
                        'ribbon'        => '<li class="active">Riwayat sertifikasi</li>',
                        'page_name'     => 'Riwayat sertifikasi '.$nama_guru
                    );
        }else{
            $data = array(
                    'page_content'  => 'riwayat_sertifikasi/index',
                    'ribbon'        => '<li class="active">Riwayat sertifikasi</li>',
                    'page_name'     => 'Guru Tidak Ditemukan'
                );
        }
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil_rwytsertifikasi()
    {
        $my_data = $this->model_rwytsertifikasi->viewOrdering('riwayat_sertifikasi','id','asc')->result();
        echo json_encode($my_data);
    }

    public function tampil_rwytsertifikasibyguru()
    {
        $data = array(
            'id_guru'  => $this->uri->segment(3),
        );
        $my_data = $this->model_rwytsertifikasi->view_where('riwayat_sertifikasi',$data)->result();

        // $my_data = $this->model_rwytsertifikasi->viewOrdering('riwayat_sertifikasi','id','asc')->result();
        echo json_encode($my_data);
    }

    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_rwytsertifikasi->view_where('riwayat_sertifikasi',$data)->result();
        echo json_encode($my_data);
    }

    public function simpan_rwytsertifikasi()
    {
        $data = array(
            'id_guru' => $this->input->post('id_guru'),
            'judul_sertifikasi'  => $this->input->post('judul_sertifikasi'),
            'nama_instansi'  => $this->input->post('nama_instansi'),
            'penyelenggara'  => $this->input->post('penyelenggara'),
            'createdAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_rwytsertifikasi->insert($data,'riwayat_sertifikasi');
        echo json_encode($action);
        
    }

    public function update_rwytsertifikasi()
    {
        $data_id = array(
            'id'  => $this->input->post('e_id')
        );
        $data = array(
            'judul_sertifikasi'  => $this->input->post('e_judul_sertifikasi'),
            'nama_instansi'  => $this->input->post('e_nama_instansi'),
            'penyelenggara'  => $this->input->post('e_penyelenggara'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_rwytsertifikasi->update($data_id,$data,'riwayat_sertifikasi');
        echo json_encode($action);
        
    }

    public function delete_rwytsertifikasi()
    {
        $data_id = array(
            'id'  => $this->input->post('id')
        );
        $data = array(
            'isdeleted'  => 1,
        );
        $action = $this->model_rwytsertifikasi->update($data_id,$data,'riwayat_sertifikasi');
        echo json_encode($action);
        
    }
}