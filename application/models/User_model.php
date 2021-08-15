<?php 
	class User_model extends CI_Model{
		public function __construct()
		{
			$this->db=$this->load->database('default',true);
		}
		public function getUser($email){
			return $this->db->where('email',$email)->get('users')->row();
		}
		public function getUserById($id){
			return $this->db->where('id',$id)->get('users')->row();
		}
	}


?>
