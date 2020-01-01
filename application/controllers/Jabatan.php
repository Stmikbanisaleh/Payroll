<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	function render_view($data) {
        $this->template->load('template', $data); //Display Page
       
    }

	public function index() {
        $data = array(
                    'page_content'  => 'jabatan/view',
                    'ribbon'        => '<li class="active">Jabatan</li>',
                    'page_name'     => 'Jabatan'
                );
        $this->render_view($data); //Memanggil function render_view
    }

    public function simpan_jabatan()
    {
         $this->load->model('model_jabatan');
        $data = array(
            'id'  => $this->input->post('id'),
            'nama'  => $this->input->post('nama'),
        );
        $action = $this->model_jabatan->insert($data,'jabatan');
        echo json_encode($action);
    }
}