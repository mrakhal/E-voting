<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_model extends CI_Model
{
	function __construct()
	{
		$this->load->database();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}

	function getRow($d)
	{
		if ( !$d['where'] ) {
			$d['where'] = '"1"="1"';
		}
		$this->db->where($d['where']);
		$table = $this->db->get($d['table']);
		return $table->num_rows();
	}

	function getAll($d)
	{
		if ( !$d['select'] ) {
			$d['select'] = '*';
		}
		if ( !$d['where'] ) {
			$d['where'] = '"1"="1"';
		}
		if ( !$d['limit'] ) {
			$d['limit'] = 100;
		}
		if ( !$d['start'] ) {
			$d['start'] = 0;
		}
		if ( !$d['order'] ) {
			$d['order'] = 'id ASC';
		}
		$this->db->select($d['select']);
		$this->db->where($d['where']);
		$this->db->limit($d['limit'], $d['start']);
		$this->db->order_by($d['order']);
		$table = $this->db->get($d['table']);
		return $table->result_array();
	}

	function getDetail($d)
	{
		if ( !$d['select'] ) {
			$d['select'] = '*';
		}
		if ( !$d['where'] ) {
			$d['where'] = '"1"="1"';
		}
		if ( !$d['limit']) {
			$d['limit'] = 1;
		}
		$this->db->limit($d['limit']);
		$this->db->select($d['select']);
		$this->db->where($d['where']);
		$table = $this->db->get($d['table']);
		return $table->result_array();
	}

	function add($d)
	{
		return $this->db->insert($d['table'], $d['data']);
	}

	function update($d)
	{
		$this->db->where($d['where']);
		return $this->db->update($d['table'], $d['data']);
	}

}
