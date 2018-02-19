<?php
/**
* 
*/
class Posts extends CI_Controller
{
	public function index(){
		$data['title'] = 'Latest Posts';

		$data['posts'] = $this->Post_model->get_posts();
		
		$this->load->View('templates/header');
		$this->load->View('posts/index',$data);
		$this->load->View('templates/footer');
	}

	public function view($slug = NULL){
		$data['post'] = $this->Post_model->get_posts($slug);
		if(empty($data['post'])){
			show_404();
		}
		$data['title'] = $data['post']['title'];

		$this->load->View('templates/header');
		$this->load->View('posts/view',$data);
		$this->load->View('templates/footer');
	}

public function create(){
	$data['title'] = 'Create Post';
	$this->form_validation->set_rules('title','Title','required');
	$this->form_validation->set_rules('body','Body','required');

	if($this->form_validation->run() === false){
		$this->load->View('templates/header');
		$this->load->View('posts/create',$data);
		$this->load->View('templates/footer');
	}else{
		$this->Post_model->create_post();
		redirect('posts');
	}

		
}

}