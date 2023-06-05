<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function index()
	{

		$crud = new grocery_CRUD();
		
        $crud->set_table('category');
		$crud->set_subject('category');
		$crud->unset_columns(['created_at','updated_at']);

		$display = [
			'name' 		=> 'Nama',
		];
		
		$crud->display_as($display);

		$fields = ['name'];
		
		$crud->fields($fields);
		
		$output = $crud->render();

		$this->load->view('wrapper/header', $output);
        $this->load->view('category/index', $output);
		$this->load->view('tampilan/index');

	}

}
