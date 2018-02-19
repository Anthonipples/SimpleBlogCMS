<?php
/**
* 
*/
class Pages extends CI_Controller
{
	public function View($page = 'home'){
		if(! file_exists(APPPATH.'views/pages/'.$page.'.php')){
			show_404();
		}
		$data['title'] = ucfirst($page);

		$this->load->View('templates/header');
		$this->load->View('pages/'.$page,$data);
		$this->load->View('templates/footer');
	}
}