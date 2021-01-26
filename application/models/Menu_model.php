<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Menu_Model extends CI_Model
{

	public function getSubMenu()
	{
		$query = "SELECT user_sub_menu.*,user_menu.menu
					FROM user_sub_menu JOIN user_menu
					ON user_sub_menu.menu_id=user_menu.id";

		return $this->db->query($query)->result_array();
	}

	public function ubah($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('menu', $data);
		return TRUE;
	}

	public function hapus($id)
	{
		$this->db->get_where('user_menu', ['id' => $id])->row_array();
		$this->db->where('id', $id);
		$this->db->delete('user_menu');
	}

	public function tampil($id)
	{
		$query = "SELECT user_sub_menu.*,user_menu.menu
					FROM user_sub_menu JOIN user_menu
					ON user_sub_menu.menu_id=user_menu.id
					WHERE user_sub_menu.id=$id";

		return $this->db->query($query)->row_array();
	}

	public function hapussm($id)
	{
		$this->db->where('submenu.id', $id);
		return $this->db->delete('submenu');
	}

}

?>
