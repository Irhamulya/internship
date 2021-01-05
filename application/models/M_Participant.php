<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Participant extends CI_Model
	{
		
		public function getDiv()
		{
			$query="SELECT pendaftar.*,ketentuan.divisi 
					FROM pendaftar JOIN ketentuan 
					ON pendaftar.id_div=ketentuan.id";
					
			return $this->db->query($query)->result_array();
		}
		public function getDiv2()
		{
			$query="SELECT peserta.*,ketentuan.divisi 
					FROM peserta JOIN ketentuan 
					ON peserta.id_div=ketentuan.id";
					
			return $this->db->query($query)->result_array();
		}

		public function getDiv3()
		{
			$query="SELECT history.*,ketentuan.divisi 
					FROM history JOIN ketentuan 
					ON history.id_div=ketentuan.id";
					
			return $this->db->query($query)->result_array();
		}


		public function tampil($id)
    	{
    	   return $this->db->get_where('pendaftar', ['id' => $id])->row_array();
		}
		public function hapus($id)
    	{
	    	$this->db->where('pendaftar.id', $id);
        return $this->db->delete('pendaftar');
    	}
}

	

?>