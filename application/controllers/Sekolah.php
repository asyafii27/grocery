<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sekolah extends CI_Controller {

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

			$crud->set_table('modul');
			$crud->set_subject('Modul');
			$crud->unset_columns(['created_at','updated_at']);

			$display = [
				'name'				=> 'Nama',
				'description'		=> 'Deskripsi',
			];

			$crud->display_as($display);

			$fields = [
				'name', 'description'
			];

			$requiredfields = [
				'name', 'description'
			];

			$editfields = $fields;
			$crud->fields($fields);

			$crud->edit_fields($editfields);

			$crud->required_fields($requiredfields);


			$crud->set_field_upload('foto','assets/uploads/files');

			$output = $crud->render();

			$this->load->view('wrapper/header', $output);
    		$this->load->view('sekolah/home', $output);
			$this->load->view('wrapper/footer', $output);
            
	}

}
