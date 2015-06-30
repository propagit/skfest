<?php
class Menu_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function add($data) {
        $this->db->insert('menus',$data);
        return $this->db->insert_id();
    }
    function id($id) {
        $this->db->where('id',$id);
        $query = $this->db->get('menus');
        return $query->first_row('array');
    }
    function top($editable) {
        $this->db->where('position',1);
        $this->db->where('editable >= ',$editable);
        $query = $this->db->get('menus');
        return $query->result_array();
    }
    function mid(){
        $this->db->where('position',0);
        $query = $this->db->get('menus');
        return $query->result_array();
    }
    function get_all_links()
	{
		 $this->db->order_by('order','asc');
		$query = $this->db->get('links');
        return $query->result_array();
	}
    function get_links($menu_id,$parent_id) {
        $this->db->where('menu_id',$menu_id);
        $this->db->where('parent_id',$parent_id);
        $this->db->order_by('order','asc');
        $query = $this->db->get('links');
        return $query->result_array();
    }
    function get_link($id) {
        $this->db->where('id',$id);
        $query = $this->db->get('links');
        return $query->first_row('array');
    }
    function get_child_links($parent_id) {
        $this->db->where('parent_id',$parent_id);
        $this->db->order_by('order','asc');
        $query = $this->db->get('links');
        return $query->result_array();
    }
    function insert_link($data) {
        $this->db->insert('links',$data);
        return $this->db->insert_id();
    }
    function update_link($id,$data) {
        $this->db->where('id',$id);
        return $this->db->update('links',$data);
    }
    function delete_link($id) {
        $this->db->where('id',$id);
        return $this->db->delete('links');
    }
    
    
    function root_categories() {
        $this->db->where('parent_id',0);
        $this->db->order_by('name','asc');
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    function get($category_id) {
        $this->db->where('category_id',$category_id);
        $this->db->order_by('name','asc');
        $query = $this->db->get('pages');
        return $query->result_array();
    }
    function sub_categories($parent_id) {
        $this->db->where('parent_id',$parent_id);
        $this->db->order_by('name','asc');
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    
    function addpage($data)
    {       
        $this->db->insert('pages',$data);
        return $this->db->insert_id();
    }
    
    function getpage($id)
    {       
        $this->db->where('id',$id);
        $query = $this->db->get('pages');
        return $query->first_row('array');
        
    }
    function updatepage($id,$data)
    {
        //print_r($id);
        //print_r($data);
        $this->db->where('id',$id);
        return $this->db->update('pages',$data);
        
    }
    function deletepage($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('pages');
    }
	
	//news
	function getallnews() {
        $this->db->order_by('order','asc');
        $query = $this->db->get('news');
        return $query->result_array();
    }
	function addnews($data)
    {       
        $this->db->insert('news',$data);
        return $this->db->insert_id();
    }
    
    function getnews($id)
    {       
        $this->db->where('id',$id);
        $query = $this->db->get('news');
        return $query->first_row('array');
        
    }
    function updatenews($id,$data)
    {
        //print_r($id);
        //print_r($data);
        $this->db->where('id',$id);
        return $this->db->update('news',$data);
        
    }
    function deletenews($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('news');
    }
	function update_order_news($id,$data) {
        $this->db->where('id',$id);
        return $this->db->update('news',$data);
    }
}
?>