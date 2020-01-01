<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	function render_view($data) {
        $this->template->load('template', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../guru/index',
        			'ribbon' 		=> '<li class="active">Dashboard</li><li>Master Guru</li>',
        			'page_name' 	=> 'Master Guru',
        			'js' 			=> 'js_file'
        		);
        $this->render_view($data); //Memanggil function render_view
    }
}