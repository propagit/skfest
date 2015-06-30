<?php

class Survey_model extends CI_Model {

	function __construct()
	{
		 parent::__construct();
	}
	
	function start_survey($data)
	{
		$this->db->insert('survey',$data);
		return $this->db->insert_id();
	}
	
	function get_all_survey()
	{
		$query = $this->db->get('survey');
		return $query->result_array();
	}
	
	
	function add_answer($data)
	{
		$this->db->insert('answer',$data);
	}
	
	function get_survey($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('survey');
		foreach($query->result_array() as $r)
		{
			return $r;
		}
	}
	
	function update_response($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('survey');
		$survey = $query->first_row('array');
		$response = $survey['response'] + 1;
		$data = array('response' => $response);
		$this->db->where('id',$id);
		$this->db->update('survey',$data);
	}
	
	function get_psurveys($uid)
	{
		$this->db->where('uid',$uid);
		$this->db->where('publish',1);
		$query = $this->db->get('survey');
		return $query->result_array();
	}
	
	function get_upsurveys($uid)
	{
		$this->db->where('uid',$uid);
		$this->db->where('publish',0);
		$query = $this->db->get('survey');
		return $query->result_array();
	}
	
	function update_survey($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('survey',$data);
	}
	
	function remove_survey($id)
	{
		/** DELETE ALL OPTIONS OF QUESTION */
		$query = $this->db->query("SELECT * FROM question WHERE sid = $id");
		foreach($query->result_array() as $r)
		{
			if ($r['type'] >= 3)
			{
				$this->db->where('qid',$r['id']);
				$this->db->delete('option');
			}
		}
		
		/** DELETE ALL QUESTIONS OF SURVEY */
		$this->db->where('sid',$id);
		$this->db->delete('question');
		
		$this->db->where('id',$id);
		$this->db->delete('survey');
	}
	
	function create_question($data)
	{
		$this->db->insert('question',$data);
		return $this->db->insert_id();
	}
	
	function get_questions($sid)
	{
		$sql = "SELECT * FROM question WHERE sid = $sid ORDER BY id ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function get_mquestions($sid,$i)
	{
		$i = $i + 1;
		$sql = "SELECT * FROM question WHERE sid = $sid AND type = 6 AND `group` = $i ORDER BY id ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function get_question($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('question');
		foreach($query->result_array() as $r)
		{
			return $r;
		}
	}
	
	function update_question($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('question',$data);
	}
	
	function delete_question($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('question');
		
		$this->db->where('qid',$id);
		$this->db->delete('option');
	}
	
	function delete_group($sid,$group)
	{
		/** DELETE ALL OPTIONS OF QUESTION */
		$query = $this->db->query("SELECT * FROM `question` WHERE `sid` = $sid AND type = 6 AND `group` = $group");
		foreach($query->result_array() as $r)
		{
			$this->db->where('qid',$r['id']);
			$this->db->delete('option');
		}
		
		/** DELETE ALL QUESTIONS OF GROUP */
		$this->db->where('group',$group);
		$this->db->where('sid',$sid);
		$this->db->delete('question');
		
	}
	
	function add_question($sid,$group,$question)
	{
		/** ADD QUESTION */
		$data = array(
				'sid' => $sid,
				'question' => $question,
				'type' => 6,
				'group' => $group,
				'required' => 0
				);
		$this->db->insert('question',$data);
		$qid = $this->db->insert_id();
		
		/** GET OPTIONS */
		$sql = "SELECT * FROM `question` WHERE `sid` = $sid AND `type` = 6 AND `group` = $group";
		$query = $this->db->query($sql);
		$question = $query->first_row('array');
		$oqid = $question['id'];
		
		$sql = "SELECT * FROM `option` WHERE `qid` = $oqid";
		$query = $this->db->query($sql);
		/** ADD OPTIONS FOR NEW QUESTION */
		foreach($query->result_array() as $option)
		{
			$sql = "INSERT INTO `option` (`qid`,`value`) VALUES ($qid,'".$option['value']."')";
			$this->db->query($sql);
		}
	}
	
	function add_moptions($sid,$group,$option)
	{
		/** GET QUESTIONS */
		$sql = "SELECT * FROM `question` WHERE `sid` = $sid AND `type` = 6 AND `group` = $group";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $question)
		{
			$qid = $question['id'];
			$data = array('qid' => $qid, 'value' => $option);
			$this->db->insert('option',$data);
		}
	}
	
	function add_options($qid,$data)
	{
		foreach($data as $value)
		{
			$sql = "INSERT INTO `option` (`qid`,`value`) VALUES ($qid,'$value')";			 
			$this->db->query($sql);
		}
	}
	
	function add_option($qid,$data)
	{
		$this->db->insert('option',$data);
		return $this->db->insert_id();
	}
	
	function delete_option($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('option');
	}
	
	function get_options($qid)
	{
		$sql = "SELECT * FROM `option` WHERE `qid` = $qid ORDER BY `id` ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function get_question_title($sid,$gid)
	{
		$sql = "SELECT * FROM `question` WHERE `sid` = $sid and `group` = $gid";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function update_selected($qid,$value)
	{
		$this->db->where('qid',$qid);
		$this->db->where('value',$value);
		$query = $this->db->get('option');
		$option = $query->first_row('array');
		$id = $option['id'];
		$selected = $option['selected'] + 1;
		$this->db->where('id',$id);
		$data = array('selected' => $selected);
		$this->db->update('option',$data);		
	}
	
	function get_answers($qid)
	{
		$sql = "SELECT * FROM `answer` WHERE `qid` = $qid ORDER BY `id` ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
		
	function get_option($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('option');
		foreach($query->result_array() as $r)
		{
			return $r;
		}
	}
		
	function update_option($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('option',$data);
	}
	
	function delete_moption($id)
	{
		$sql = "SELECT * FROM `option` WHERE id = $id";
		$query = $this->db->query($sql);
		$option = $query->first_row('array');
		$qid = $option['qid'];
		$value = $option['value'];
		
		$sql = "SELECT * FROM question WHERE id = $qid";
		$query = $this->db->query($sql);
		$question = $query->first_row('array');
		$group = $question['group'];
		
		$sql = "SELECT `option`.`id` FROM `question`, `option` WHERE `question`.`id` = `option`.`qid` AND `question`.`group` = $group AND `option`.`value` = '".$value."'";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $r)
		{
			$oid = $r['id'];
			$this->db->where('id',$oid);
			$this->db->delete('option',$data);
		}
	}
	
	function update_moption($id,$data)
	{
		$sql = "SELECT * FROM `option` WHERE id = $id";
		$query = $this->db->query($sql);
		$option = $query->first_row('array');
		$qid = $option['qid'];
		$value = $option['value'];
		
		$sql = "SELECT * FROM question WHERE id = $qid";
		$query = $this->db->query($sql);
		$question = $query->first_row('array');
		$group = $question['group'];
		
		$sql = "SELECT `option`.`id` FROM `question`, `option` WHERE `question`.`id` = `option`.`qid` AND `question`.`group` = $group AND `option`.`value` = '".$value."'";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $r)
		{
			$oid = $r['id'];
			$this->db->where('id',$oid);
			$this->db->update('option',$data);
		}
	}
	
	function get_last_group($sid)
	{
		$sql = "SELECT * FROM question WHERE sid = $sid AND type = 6 ORDER BY id DESC";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) 
		{
			$question = $query->first_row('array');
			return $question['group'];
		} else {
			return false;
		}
	}
	function update_mquestion_title($sid,$group,$data)
	{
		$this->db->where('sid',$sid);
		$this->db->where('group',$group);
		$this->db->update('question',$data);
	}

}

?>