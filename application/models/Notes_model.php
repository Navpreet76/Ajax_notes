<?php
	
class Notes_model extends CI_Model
{
	public function add_note($note)
	{
		$this->db->insert('posts', $note);
		return $this->db->affected_rows();
	}

	public function get_notes()
	{
		return $this->db->get('posts')->result_array();
	}
}

?>