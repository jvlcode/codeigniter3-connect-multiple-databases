<?php 
	class Post_model extends CI_Model{
		public function __construct()
		{	
			$this->db=$this->load->database('my_db2',true);
		}
		public function getUserPosts($user_id){
			return $this->db->where('user_id',$user_id)->get('posts')->result();
		}
	}


?>
