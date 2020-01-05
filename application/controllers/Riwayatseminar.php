<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayatseminar extends CI_Controller {

    function __construct(){
        parent::__construct();      
        $this->load->model('model_rwytseminar');

    }

	function render_view($data) {
        $this->template->load('template', $data); //Display Page
       
    }

	public function index() {
        $data = array(
                    'page_content'  => 'riwayat_seminar/index',
                    'ribbon'        => '<li class="active">Riwayat Seminar</li>',
                    'page_name'     => 'Riwayat Seminar'
                );
        $this->render_view($data); //Memanggil function render_view
    }

    public function view() {
        $uri = $this->uri->segment(3);
        $data = array(
            'id'  => $uri,
        );
        
        if($uri != ''){
            $my_data = $this->model_rwytseminar->view_where('guru',$data)->result();
            $nama_guru = ucwords($my_data[0]->nama);
            $data = array(
                        'page_content'  => 'riwayat_seminar/index',
                        'ribbon'        => '<li class="active">Riwayat Seminar</li>',
                        'page_name'     => 'Riwayat Seminar '.$nama_guru
                    );
        }else{
            $data = array(
                    'page_content'  => 'riwayat_seminar/index',
                    'ribbon'        => '<li class="active">Riwayat Seminar</li>',
                    'page_name'     => 'Guru Tidak Ditemukan'
                );
        }
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil_rwytseminar()
    {
        $my_data = $this->model_rwytseminar->viewOrdering('riwayat_seminar','id','asc')->result();
        echo json_encode($my_data);
    }

    public function tampil_rwytseminarbyguru()
    {
        $data = array(
            'id_guru'  => $this->uri->segment(3),
        );
        $my_data = $this->model_rwytseminar->view_where('riwayat_seminar',$data)->result();

        // $my_data = $this->model_rwytseminar->viewOrdering('riwayat_seminar','id','asc')->result();
        echo json_encode($my_data);
    }

    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_rwytseminar->view_where('riwayat_seminar',$data)->result();
        echo json_encode($my_data);
    }

    public function simpan_rwytseminar()
    {
        $data = array(
            'id_guru' => $this->input->post('id_guru'),
            'judul_seminar'  => $this->input->post('judul_seminar'),
            'nama_instansi'  => $this->input->post('nama_instansi'),
            'penyelenggara'  => $this->input->post('penyelenggara'),
            'createdAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_rwytseminar->insert($data,'riwayat_seminar');
        echo json_encode($action);
        
    }

    public function update_rwytseminar()
    {
        $data_id = array(
            'id'  => $this->input->post('e_id')
        );
        $data = array(
            'judul_seminar'  => $this->input->post('e_judul_seminar'),
            'nama_instansi'  => $this->input->post('e_nama_instansi'),
            'penyelenggara'  => $this->input->post('e_penyelenggara'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_rwytseminar->update($data_id,$data,'riwayat_seminar');
        echo json_encode($action);
        
    }

    public function delete_rwytseminar()
    {
        $data_id = array(
            'id'  => $this->input->post('id')
        );
        $data = array(
            'isdeleted'  => 1,
        );
        $action = $this->model_rwytseminar->update($data_id,$data,'riwayat_seminar');
        echo json_encode($action);
        
    }
}