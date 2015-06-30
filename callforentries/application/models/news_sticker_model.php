<?php
class News_sticker_model extends CI_Model {
	function __construct() {
        parent::__construct();
    }
	
	function add($data) {
		$this->db->insert('jq_newsticker',$data);
		return $this->db->insert_id();
	}
	function update($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('jq_newsticker',$data);
	}
	function id($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('jq_newsticker');
		return $query->first_row('array');
	}
	function get(){
		$this->db->order_by('news_order','desc');
		$query = $this->db->get('jq_newsticker');
		return $query->result_array();
	}
	function get_active(){
		$this->db->where('published',1);
		$this->db->order_by('news_order','desc');
		$query = $this->db->get('jq_newsticker');
		return $query->result_array();
	}
	function search($row) {
		$sql = "SELECT * FROM `jq_newsticker` ORDER BY `news_order` DESC LIMIT $row,10";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function delete($id) {
		$this->db->where('id',$id);
		$this->db->delete('jq_newsticker');
	}
	
	function latest($limit) {
		$this->db->where('published',1);
		$this->db->order_by('news_order','desc');
		if ($limit >= 1) {
			$this->db->limit($limit);
		}
		$query = $this->db->get('jq_newsticker');
		return $query->result_array();
	}
}
?>