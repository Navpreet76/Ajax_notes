<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function index()
	{
		$this->view_note = array();

		$this->load->model('Notes_model');
		$get_all_notes['notes'] = $this->Notes_model->get_notes();
		
		$this->load->view('posts_view', $get_all_notes);
	}

	function create()
	{
		if(!empty($this->input->post('note')))
		{
			$this->load->model('Notes_model');
			$now = date("Y-m-d H:i:s");

			$note_details = array(
					'description' => $this->input->post('note'),
					'created_at' => $now,
					'updated_at' => $now
			);

			$insert_note = $this->Notes_model->add_note($note_details);

			if($insert_note == 1)
			{
				$description = array(
					'description' => $this->input->post('note')
				);
				echo json_encode($description);
			}	
		}
	}
}