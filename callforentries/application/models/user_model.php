<?php
class User_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function authenticate($data) {
		$this->db->where('username',$data['username']);
		$this->db->where('password',md5($data['password']));
		$this->db->where('access_level','9');
		$query = $this->db->get('admin');
		if (!empty($query)) {
			return $query->first_row('array');
		}
		return false;
	}
	function validate($u,$p) {
		$this->db->where('username',$u);
		$this->db->where('password',md5($p));
		$this->db->where('access_level <','9');
		$query = $this->db->get('admin');
		if (!empty($query)) {
			return $query->first_row('array');
		}
		return false;
	}
	function add_send_your_design($data)
	{
		$this->db->insert('design_competition',$data);
		return $this->db->insert_id();
	}
	
	function add_expression_of_interest($data)
	{
		$this->db->insert('expression_of_interest',$data);
		return $this->db->insert_id();
	}
	
	function add_community_grants($data)
	{
		$this->db->insert('community_grants',$data);
		return $this->db->insert_id();
	}
	
	function add_event_proposal($data)
	{
		$this->db->insert('event_proposal',$data);
		return $this->db->insert_id();
	}
	
	function add_host($data)
	{
		$this->db->insert('host',$data);
		return $this->db->insert_id();
	}
	
	function add_email_subcription($data)
	{
		$this->db->insert('email_subscription',$data);
		return $this->db->insert_id();
	}
	
	function add_subscribe($data)
	{
		$this->db->insert('subscribe',$data);
		return $this->db->insert_id();
	}
	function validate_member($u,$p) {
		$this->db->where('username',$u);
		$this->db->where('password',$p);
		$query = $this->db->get('membership');
		if (!empty($query)) {
			return $query->first_row('array');
		}
		return false;
	}
	function add_member($data)
	{
		$this->db->insert('members',$data);
		return $this->db->insert_id();
	}
	function add_permanent_trader($data)
	{
		$this->db->insert('applications_permanent_trader',$data);
		return $this->db->insert_id();
	}
	function update_permanent_trader($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('applications_permanent_trader', $data); 
	}
	function add_sh_market($data)
	{
		$this->db->insert('applications_market',$data);
		return $this->db->insert_id();
	}
	function update_sh_market($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('applications_market', $data); 
	}
	function add_sh_food($data)
	{
		error_reporting(E_ALL);
		//echo "<pre>". print_r($data,true) ."</pre>";		
		//if($this->db->insert('applications_food',$data))
		//{
			//echo 'executed';	
		//}
		//echo $this->db->_error_message();
		$this->db->insert('applications_food',$data);
		return $this->db->insert_id();
		
		//echo 'called';
		//exit;
	}
	function update_sh_food($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('applications_food', $data); 
	}
	function get_sh_food($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('applications_food');
		return $query->first_row('array');
	}
	function add_musicians_entry($data)
	{
		$this->db->insert('musicians_entry',$data);
		return $this->db->insert_id();
	}
	function update_musicians_entry($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('musicians_entry', $data); 
	}
	function add_children_entertainers($data)
	{
		$this->db->insert('children_entertainers',$data);
		return $this->db->insert_id();
	}
	
}
?>