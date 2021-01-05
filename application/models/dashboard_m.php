<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	Class Dashboard_m extends CI_Model
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
			    if($query->num_rows()>0)
			    {
			      return $query->row()->qta;
			    }
			    else
			    {
			      return 0;
			    }   
		    }

	}
?>