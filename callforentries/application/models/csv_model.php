<?php

class Csv_model extends CI_Model {

	function __construct()
	{
		 parent::__construct();
	}
	
	function get_subscribe()
	{
		//$this->db->where('sid','107');
		$query = $this->db->get('subscribe');
		return $query->result_array();
	}
	
	function get_stallfood_holder_app()
	{
		//$this->db->where('sid','107');
		$query = $this->db->get('applications_food');
		return $query->result_array();
	}
	
	function get_stallmarket_holder_app()
	{
		//$this->db->where('sid','107');
		$query = $this->db->get('applications_market');
		return $query->result_array();
	}
	
	function get_permanent_trader_app()
	{
		//$this->db->where('sid','107');
		$query = $this->db->get('applications_permanent_trader');
		return $query->result_array();
	}
	
	function get_design_competition()
	{
		//$this->db->where('sid','107');
		$query = $this->db->get('design_competition');
		return $query->result_array();
	}
	
	function get_email_subscription()
	{
		//$this->db->where('sid','107');
		$query = $this->db->get('email_subscription');
		return $query->result_array();
	}
	
	function get_expression_of_interest()
	{
		//$this->db->where('sid','107');
		$query = $this->db->get('expression_of_interest');
		return $query->result_array();
	}
	
	function get_community_grants()
	{
		//$this->db->where('sid','107');
		$query = $this->db->get('community_grants');
		return $query->result_array();
	}
	
	function get_event_proposal()
	{
		//$this->db->where('sid','107');
		$query = $this->db->get('event_proposal');
		return $query->result_array();
	}
	
	function get_host()
	{
		//$this->db->where('sid','107');
		$query = $this->db->get('host');
		return $query->result_array();
	}
	
	function get_musicians()
	{
		//$this->db->where('sid','107');
		$query = $this->db->get('musicians_entry');
		return $query->result_array();
	}
	
	function get_children_entertainers()
	{
		//$this->db->where('sid','107');
		$query = $this->db->get('children_entertainers');
		return $query->result_array();
	}
}

?>