<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_Model extends CI_Model
{

	public function getDivisi()
	{
		$query = "SELECT peserta.*,ketentuan.divisi
					FROM peserta JOIN ketentuan
					ON peserta.id_div=ketentuan.id";

		return $this->db->query($query)->result_array();
	}

	public function getDiv3()
	{
		$query = "SELECT history.*,ketentuan.divisi 
					FROM history JOIN ketentuan 
					ON history.id_div=ketentuan.id";

		return $this->db->query($query)->result_array();
	}


	public function absen()
	{
		$query = "SELECT peserta.*,user.id 
					FROM peserta JOIN user 
					ON peserta.email=user.email";

		return $this->db->query($query)->result_array();
	}



	public function tampil($id)
	{
		$query = "SELECT peserta.*,ketentuan.divisi
					FROM peserta JOIN ketentuan
					ON peserta.id_div=ketentuan.id
					WHERE peserta.id=$id";

		return $this->db->query($query)->row_array();
	}

	public function hapus($id)
	{
		$this->db->get_where('peserta', ['id' => $id])->row_array();
		$this->db->where('id', $id);
		$this->db->delete('peserta');
	}

}


?>
