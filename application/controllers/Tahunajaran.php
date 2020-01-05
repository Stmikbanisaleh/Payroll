<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahunajaran extends CI_Controller {

    function __construct(){
        parent::__construct();      
        $this->load->model('model_tahunajaran');

    }

	function render_view($data) {
        $this->template->load('template', $data); //Display Page
       
    }

	public function index() {
        $data = array(
                    'page_content'  => 'tahun_ajaran/index',
                    'ribbon'        => '<li class="active">Jabatan</li>',
                    'page_name'     => 'Tahun Ajaran'
                );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil_thajaran()
    {
        $my_data = $this->model_tahunajaran->viewOrdering('tahun_ajaran','id','asc')->result();
        echo json_encode($my_data);
    }

    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_tahunajaran->view_where('tahun_ajaran',$data)->result();
        echo json_encode($my_data);
    }

    public function simpan_thajaran()
    {
        $data = array(
            // 'id'  => $this->input->post('id'),
            'tahun_ajaran'  => $this->input->post('tahun_ajaran'),
            'createdAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_tahunajaran->insert($data,'tahun_ajaran');
        echo json_encode($action);
        
    }

    public function update_thajaran()
    {
        $data_id = array(
            'id'  => $this->input->post('e_id')
        );
        $data = array(
            'tahun_ajaran'  => $this->input->post('e_tahun_ajaran'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_tahunajaran->update($data_id,$data,'tahun_ajaran');
        echo json_encode($action);
        
    }

    public function delete_thajaran()
    {
        $data_id = array(
            'id'  => $this->input->post('id')
        );
        $data = array(
            'isdeleted'  => 1,
        );
        $action = $this->model_tahunajaran->update($data_id,$data,'tahun_ajaran');
        echo json_encode($action);
        
    }
}