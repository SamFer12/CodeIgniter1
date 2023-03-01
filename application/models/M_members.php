<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_members extends CI_Model {
	
	public function select($arr = null){
        if ($arr != null){
            $this->db->where($arr);
        }

				$this->db->select('*');
				$this->db->from('tbl_admin');
		$data = $this->db->get();
		return $data;
	}

	public function insert($arr = null){
            
        $response = $this->db->insert('tbl_admin', $arr);
		
		return $response;
	}

	public function update($arr = null, $where = null){
		$data = $this->db->update('tbl_admin', $arr, $where);
		return $data;
	}

	public function delete($arr = null){
		$data = $this->db->delete('tbl_admin', $arr);
		return $data;
	}
}