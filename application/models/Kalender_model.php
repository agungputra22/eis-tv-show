<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kalender_model extends CI_Model{

	function get_all_events(){
		$q = $this->db2->select('*, DATE_FORMAT(`birth_date`,"%d") AS born_date, DATE_FORMAT(`birth_date`,"%m") AS born_month, YEAR(birth_date) AS born_year, YEAR(curdate()) - YEAR(birth_date) AS age')
			->from('events')
			->get();

		if($q->num_rows() > 0){
			$res = $q->result_array();
			return $res;
		} else {
			return NULL;
		}
	}

	function get_events_by_fulldate($fulldate){
		$q = $this->db2->select('*, DATE_FORMAT(`birth_date`,"%d") AS born_date, DATE_FORMAT(`birth_date`,"%m") AS born_month, YEAR(birth_date) AS born_year, YEAR(curdate()) - YEAR(birth_date) AS age')
			->from('events')
			->where('birth_date',$fulldate)
			->get();

		if($q->num_rows() > 0){
			$res = $q->result_array();
			return $res;
		} else {
			return NULL;
		}
	}

	function get_events_by_month_and_date($month_and_date){
		$q = $this->db2->select('*, DATE_FORMAT(`birth_date`,"%d") AS born_date, DATE_FORMAT(`birth_date`,"%m") AS born_month, YEAR(birth_date) AS born_year, YEAR(curdate()) - YEAR(birth_date) AS age')
			->from('events')
			->like('birth_date','-'.$month_and_date)
			->get();

		if($q->num_rows() > 0){
			$res = $q->result_array();
			return $res;
		} else {
			return array();
		}
	}
	
	function get_events_by_month($month){
		$q = $this->db2->select('*, DATE_FORMAT(`birth_date`,"%d") AS born_date, DATE_FORMAT(`birth_date`,"%m") AS born_month, YEAR(birth_date) AS born_year, YEAR(curdate()) - YEAR(birth_date) AS age')
			->from('events')
			->like('birth_date','-'.$month.'-')
			->get();

		if($q->num_rows() > 0){
			$res = $q->result_array();
			return $res;
		} else {
			return NULL;
		}
	}
	
	function get_events_by_year($year){
		$q = $this->db2->select('*, DATE_FORMAT(`birth_date`,"%d") AS born_date, DATE_FORMAT(`birth_date`,"%m") AS born_month, YEAR(birth_date) AS born_year, YEAR(curdate()) - YEAR(birth_date) AS age')
			->from('events')
			->like('birth_date',$year.'-')
			->get();

		if($q->num_rows() > 0){
			$res = $q->result_array();
			return $res;
		} else {
			return NULL;
		}
	}
	
	function get_events_by_name($name){
		$q = $this->db2->select('*, DATE_FORMAT(`birth_date`,"%d") AS born_date, DATE_FORMAT(`birth_date`,"%m") AS born_month, YEAR(birth_date) AS born_year, YEAR(curdate()) - YEAR(birth_date) AS age')
			->from('events')
			->like('name',$name)
			->get();

		if($q->num_rows() > 0){
			$res = $q->result_array();
			return $res;
		} else {
			return NULL;
		}
	}
	
	function get_event_by_id($id){
		$q = $this->db2->select('*, DATE_FORMAT(`birth_date`,"%d") AS born_date, DATE_FORMAT(`birth_date`,"%m") AS born_month, YEAR(birth_date) AS born_year, YEAR(curdate()) - YEAR(birth_date) AS age')
			->from('events')
			->where('id',$id)
			->get();

		if($q->num_rows() > 0){
			$row = $q->row_array();
			return $row;
		} else {
			return NULL;
		}
	}

	function create_event(){
		$data = array(
			'nik_shift'     			=> $this->input->post('nik_shift'),
			'nama_karyawan_shift'		=> $this->input->post('name'),
			'tanggal_shift'				=> $this->input->post('birth_date'),
			'jabatan_karyawan_shift' 	=> $this->input->post('jabatan_karyawan_shift'),
			'dept_karyawan_shift' 		=> $this->input->post('dept_karyawan_shift'),
			'jam_kerja' 				=> $this->input->post('jam_shift'),
			'keterangan_shift' 			=> $this->input->post('keterangan_shift'),
			'no_co_shift' 				=> $this->input->post('no_co_shift')
		);
		$this->db2->insert('tmp_karyawan_shift',$data);
		if($this->db2->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

	function update_event($id){
		$kolom = trim($this->input->post('kolom'));
		// $nilai = removeTags(trim($this->input->post('nilai')));
		$nilai = "8";
		$data = array(
			$kolom  => $nilai
		);
		$this->db2->trans_start();
		$this->db2->where('id_karyawan_shift',$id)->update('tmp_karyawan_shift', $data);
		$this->db2->trans_complete();

		if ($this->db2->affected_rows() == '1')
		{
			return TRUE;
		}
		else
		{
			if ($this->db2->trans_status() === false)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}
	
	function delete_event($id){
		$this->db2->where('id_karyawan_shift',$id)->delete('tmp_karyawan_shift');
		if($this->db2->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

}