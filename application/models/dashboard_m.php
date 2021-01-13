<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard_m extends CI_Model
{

	public function Hitungpeserta()
	{
		$query = $this->db->get('peserta');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function Hitunguser()
	{
		$query = $this->db->get('user');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function Hitungqouta()
	{
		$this->db->select_sum('qta');
		$query = $this->db->get('ketentuan');
		if ($query->num_rows() > 0) {
			return $query->row()->qta;
		} else {
			return 0;
		}
	}


	public function hapus($id)
	{
		$this->db->get_where('ketentuan', ['id' => $id])->row_array();
		$this->db->where('id', $id);
		$this->db->delete('ketentuan');
	}
	public function hapuswt($id)
	{
		$this->db->get_where('worktime', ['id' => $id])->row_array();
		$this->db->where('id', $id);
		$this->db->delete('worktime');
	}

}

?>
