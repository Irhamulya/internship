<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	Class Menu_Model extends CI_Model
	{
		
		public function getSubMenu()
		{
			$query="SELECT user_sub_menu.*,user_menu.menu
					FROM user_sub_menu JOIN user_menu
					ON user_sub_menu.menu_id=user_menu.id";
					
			return $this->db->query($query)->result_array();
		}
		public function ubah($data, $id){
		    $this->db->where('id',$id);
		    $this->db->update('menu', $data);
		    return TRUE;
		}
		public function hapus($id)
    	{
	    	$this->db->where('menu.id', $id);
    	    return $this->db->delete('menu');
    	}
    	public function tampilsm($id)
    	{
    	   return $this->db->get_where('submenu', ['id' => $id])->row_array();
		}
		public function hapussm($id)
    	{
	    	$this->db->where('submenu.id', $id);
	        return $this->db->delete('submenu');
    	}

	}

?>