<?php 

class Game_model extends CI_Model {

	public function getAllUserByHighscore() 
	{
		$this->db->from('user');
		$this->db->order_by("highscore", "desc");
		$this->db->limit(50);
		$query = $this->db->get();
		return $query->result_array();
	}

}