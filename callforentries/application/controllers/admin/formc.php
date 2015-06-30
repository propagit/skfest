<?php

class Formc extends CI_Controller {

	function __construct()
	{
		parent::__construct();   
		session_start();
		if(!isset($_SESSION[md5('adminLoggedIn')]))
		{
			header('Location:http://www.stkildafestival.com.au');
		}
		$this->load->model('Survey_model');		
	}
	
	function index()
	{		
		$data['title'] = "Form Creator Tool";
		$sid = $this->session->userdata('sid');
		if ($sid > 0)
		{
			$data['survey'] = $this->Survey_model->get_survey($sid);
			$data['questions'] = $this->Survey_model->get_questions($sid);
			foreach($data['questions'] as $quest)
			{
				if ($quest['type'] == 3 || $quest['type'] == 4 || $quest['type'] == 5)
				{
					$data['options'][$quest['id']] = $this->Survey_model->get_options($quest['id']);
				}
			}
			$group = $this->Survey_model->get_last_group($sid);
			$data['group'] = $group;
			for($i=0;$i<$group;$i++)
			{
				$data['mquestions'][$i] = $this->Survey_model->get_mquestions($sid,$i);
				foreach($data['mquestions'][$i] as $quest)
				{				
					$data['moptions'][$i] = $this->Survey_model->get_options($quest['id']);
					
				}
			}
		}		
		$this->load->view('admin/survey/start_view',$data);
	}
	
	function start()
	{
		$this->session->unset_userdata('sid');
		redirect('form');
	}
	
	function do_start()
	{
		if ((! isset($_POST['title']) || $_POST['title'] == "") && (! isset($_POST['send_form_to']) || $_POST['send_form_to'] == ""))
		{
			redirect('form');
		}
		$data = array(
			'uid' => $this->session->userdata('uid'),
			'title' => $_POST['title'],
			'finish_note' => '',
			'emailTo' => $_POST['formto']
			);
		$sid = $this->Survey_model->start_survey($data);
		$this->session->set_userdata('sid',$sid);
		redirect('formc');		
	}
		
	function update()
	{
		$sid = $this->uri->segment(3);
		$this->session->set_userdata('sid',$sid);
		redirect('formc');
	}
	
	function preview()
	{		
		$sid = $this->session->userdata('sid');
		if ($sid > 0)
		{
			$data['survey'] = $this->Survey_model->get_survey($sid);
			$data['questions'] = $this->Survey_model->get_questions($sid);
			foreach($data['questions'] as $quest)
			{
				if ($quest['type'] == 3 || $quest['type'] == 4 || $quest['type'] == 5)
				{
					$data['options'][$quest['id']] = $this->Survey_model->get_options($quest['id']);
				}
			}
			
			$group = $this->Survey_model->get_last_group($sid);
			$data['group'] = $group;
			for($i=0;$i<$group;$i++)
			{
				$data['mquestions'][$i] = $this->Survey_model->get_mquestions($sid,$i);
				foreach($data['mquestions'][$i] as $quest)
				{				
					$data['moptions'][$i] = $this->Survey_model->get_options($quest['id']);
					
				}
			}
			
			$data['title'] = "Form Preview: ".$data['survey']['title'];
			$this->load->view('form/preview_view',$data);
		}		
		else 
		{
			redirect('formc');
		}
	}
	
	function get_answers()
	{
		$qid = $this->uri->segment(3);
		$answers = $this->Survey_model->get_answers($qid);
		$i = 1;
		foreach($answers as $a)
		{
			print "<p><b>Answer $i:</b> ".$a['answer']."</p>";
			$i++;
		}
	}
	
	function statistics()
	{
		$sid = $this->uri->segment(3);
		$data['survey'] = $this->Survey_model->get_survey($sid);
		$data['questions'] = $this->Survey_model->get_questions($sid);
		foreach($data['questions'] as $quest)
		{
			$data['answers'][$quest['id']] = $this->Survey_model->get_answers($quest['id']);			
		}
		foreach($data['questions'] as $quest)
		{
			if ($quest['type'] == 3 || $quest['type'] == 4 || $quest['type'] == 5 || $quest['type'] == 6)
			{
				$data['options'][$quest['id']] = $this->Survey_model->get_options($quest['id']);
			}
		}
		$data['title'] = "Statistics of survey: ".$data['survey']['title'];
		$this->load->view('survey/statistics_view',$data);
		
	}
	
	function publish()
	{
		if ($this->session->userdata('sid') > 0)
		{
			$sid = $this->session->userdata('sid');
			$data = array('publish' => 1);
			$this->Survey_model->update_survey($sid,$data);
			$data['survey'] = $this->Survey_model->get_survey($sid);
			$data['title'] = "Form Publish: ".$data['survey']['title'];
			$this->session->unset_userdata('sid');			
			$this->load->view('form/link_view',$data);
		}
		else 
		{
			redirect('formc');
		}
	}
	
	
	/** SET OF METHODS FOR SURVEY **/
	function edit_survey_title()
	{
		$sid = $this->session->userdata('sid');
		$data = array('title' => $_POST['title'], 'emailTo' => $_POST['formto'] );
		$this->Survey_model->update_survey($sid,$data);
		redirect('formc');
	}
	
	/** Remove the current survey */
	
	function cancel()
	{
		$sid = $this->session->userdata('sid');
		if (! $sid)
		{
			redirect('formc');
		}
		$this->Survey_model->remove_survey($sid);
		$this->session->unset_userdata('sid');
		redirect('formc');
	}
	
	function create_short_question()
	{
		if ($_POST['question'] == "")
		{
			$this->session->set_userdata('question',1);
		}
		else {
			$required = 0;
			if (isset($_POST['required'])) {
				$required = 1;
			}
			
			$data = array(
				'sid' => $this->session->userdata('sid'),
				'question' => addslashes($_POST['question']),
				'type' => 1,
				'required' => $required
				);
			$this->Survey_model->create_question($data);
			$this->session->unset_userdata('question');
		}
		redirect('formc');
	}
	
	function create_long_question()
	{
		if ($_POST['question'] == "")
		{
			$this->session->set_userdata('question',2);
		}
		else {
			$required = 0;
			if (isset($_POST['required'])) {
				$required = 1;
			}
			
			$data = array(
				'sid' => $this->session->userdata('sid'),
				'question' => addslashes($_POST['question']),
				'type' => 2,
				'required' => $required
				);
			$this->Survey_model->create_question($data);
			$this->session->unset_userdata('question');
		}
		redirect('formc');
	}
	
	function create_checkbox_question()
	{
		if ($_POST['question'] == "")
		{
			$this->session->set_userdata('question',3);
		}
		else {
			$options = count($_POST);
			$required = 0;
			if (isset($_POST['required'])) {
				$required = 1;
			}
			$options = $options - 1 - $required;
			
			$data = array(
				'sid' => $this->session->userdata('sid'),
				'question' => addslashes($_POST['question']),
				'type' => 3,
				'required' => $required
				);
			$qid = $this->Survey_model->create_question($data);
			
			$data = array();
			
			for($i=1;$i<=$options;$i++)
			{
				$data[] = $_POST['checkbox_option_'.$i];
			}
			$this->Survey_model->add_options($qid,$data);
			
			$this->session->unset_userdata('question');
		}
		redirect('formc');
	}
	
	function create_radio_question()
	{
		if ($_POST['question'] == "")
		{
			$this->session->set_userdata('question',4);
		}
		else {
			$options = count($_POST);
			$required = 0;
			if (isset($_POST['required'])) {
				$required = 1;
			}
			$options = $options - 1 - $required;
			
			$data = array(
				'sid' => $this->session->userdata('sid'),
				'question' => addslashes($_POST['question']),
				'type' => 4,
				'required' => $required
				);
			$qid = $this->Survey_model->create_question($data);
			
			$data = array();
			
			for($i=1;$i<=$options;$i++)
			{
				$data[] = addslashes($_POST['radio_option_'.$i]);
			}
			$this->Survey_model->add_options($qid,$data);
			
			$this->session->unset_userdata('question');
		}
		redirect('formc');
	}
	
	function create_dropdown_question()
	{
		if ($_POST['question'] == "")
		{
			$this->session->set_userdata('question',5);
		}
		else {
			$options = count($_POST);
			$required = 0;
			if (isset($_POST['required'])) {
				$required = 1;
			}
			$options = $options - 1 - $required;
			
			$data = array(
				'sid' => $this->session->userdata('sid'),
				'question' => addslashes($_POST['question']),
				'type' => 5,
				'required' => $required
				);
			$qid = $this->Survey_model->create_question($data);
			
			$data = array();
			
			for($i=1;$i<=$options;$i++)
			{
				$data[] = addslashes($_POST['dropdown_option_'.$i]);
			}
			$this->Survey_model->add_options($qid,$data);
			
			$this->session->unset_userdata('question');
		}
		redirect('formc');
	}
	
	function create_multiple_question()
	{
		if ($_POST['number_of_question'] == "")
		{
			$this->session->set_userdata('question',6);
		}
		else {
			$number_of_question = $_POST['number_of_question'];
			//$number_of_option = count($_POST) - $number_of_question - 1;
			$number_of_option = count($_POST) - $number_of_question - 2;
			$requireds = array();
			for($i=1;$i<=$number_of_question;$i++)
			{
				if (isset($_POST['required_'.$i])) {
					$requireds[] = 1;
				}
				else {
					$requireds[] = 0;
				}
			}
			
			$data = array();
			for($i=1;$i<=$number_of_option;$i++)
			{
				$data[] = addslashes($_POST['multiple_option_'.$i]);
			}
			
			$group = $this->Survey_model->get_last_group($this->session->userdata('sid'));
			$group = $group + 1;
			for($i=1;$i<=$number_of_question;$i++)
			{
				$quest = array(
					'sid' => $this->session->userdata('sid'),
					'question' => addslashes($_POST['question_'.$i]),
					'title' => addslashes($_POST['question_title']),
					'type' => 6,
					'group' => $group,
					'required' => $requireds[$i-1]
						);
				$qid = $this->Survey_model->create_question($quest);
				$this->Survey_model->add_options($qid,$data);
			}
			$this->session->unset_userdata('question');
		}
		redirect('formc');
	}
	
	function update_finish_note()
	{
		$id = $this->session->userdata('sid');
		$data = array(
			'finish_note' => $_POST['finish_note']
			);
		$this->Survey_model->update_survey($id,$data);
		redirect('formc');
	}
		
	function required()
	{
		$id = $this->uri->segment(3);
		$data = array('required' => $this->uri->segment(4));
		$this->Survey_model->update_question($id,$data);
		redirect('survey');
	}	
	/** END OF SET OF METHODS FOR SURVEY **/
	
	/** SET OF METHODS FOR QUESTION **/	
	function get_question()
	{
		$qid = $this->uri->segment(3);
		$q = $this->Survey_model->get_question($qid);
		print $q['question'];
	}
	
	function edit_question()
	{
		$id = $_POST['id'];
		$data = array('question' => $_POST['question']);
		$this->Survey_model->update_question($id,$data);
		redirect('formc');
	}
	
	function remove()
	{
		$id = $this->uri->segment(3);
		$this->Survey_model->delete_question($id);
		redirect('formc');
	}
	/** END OF SET OF METHODS FOR QUESTION **/
	
	/** SET OF METHODS FOR OPTION **/	
	function add_option()
	{
		$qid = $this->uri->segment(3);
		$qt = $this->uri->segment(4);
		$data = array(
				'qid' => $qid,
				'value' => "Click me to update"
				);
		$oid = $this->Survey_model->add_option($qid,$data);
		print "<div id=\"option-".$oid."\"";
		if ($qt == 3)
			print " class=\"box-checkbox\"><input type=\"checkbox\" />";
		else if ($qt == 4)
			print " class=\"box-radio\"><input type=\"radio\" name=\"".$qid."\" />";
		else if ($qt == 5)
			print " class=\"box-select\">";
		print " Click me to update ( <a href=\"#\" onClick=\"javascript:editOption(".$oid.")\">Edit</a> | <a href=\"javascript:removeOption(".$oid.")\">Remove</a> )</div>";
	}
	
	function add_question()
	{
		$sid = $this->session->userdata('sid');
		$group = $_POST['group'];
		$question = $_POST['question'];
		$this->Survey_model->add_question($sid,$group,$question);
		redirect('formc');
	}
	
	function add_options()
	{
		$sid = $this->session->userdata('sid');
		$group = $_POST['group'];
		$option = $_POST['option'];
		$this->Survey_model->add_moptions($sid,$group,$option);
		redirect('formc');
	}
	
	function remove_option()
	{
		$id = $this->uri->segment(3);
		$this->Survey_model->delete_option($id);
		redirect('formc');
	}
	
	function remove_group()
	{
		$sid = $this->session->userdata('sid');
		$group = $this->uri->segment(3);
		$this->Survey_model->delete_group($sid,$group);
		redirect('formc');
	}
	
	function remove_moption()
	{
		$id = $this->uri->segment(3);
		$this->Survey_model->delete_moption($id);
		redirect('formc');
	}
	
	function remove_question()
	{
		$id = $this->uri->segment(3);
		$this->Survey_model->delete_question($id);
		redirect('formc');
	}
	
	function edit_option()
	{
		$id = $_POST['id'];
		$data = array('value' => $_POST['option']);
		$this->Survey_model->update_option($id,$data);
		redirect('formc');
	}
	
	function edit_moption()
	{
		$id = $_POST['id'];
		$data = array('value' => $_POST['option']);
		$this->Survey_model->update_moption($id,$data);
		redirect('formc');
	}
	function edit_mquestion_title()
	{	
		$sid = $this->session->userdata('sid');
		$group = $_POST['group'];
		$data = array('title' => $_POST['uquestion_title']);
		$this->Survey_model->update_mquestion_title($sid,$group,$data);
		redirect('formc');	
	}
	
	
	/** For AJAX */
	function get_option()
	{
		$oid = $this->uri->segment(3);
		$q = $this->Survey_model->get_option($oid);
		print $q['value'];
	}	
	function get_question_title()
	{
		$gid = $this->uri->segment(3);
		$sid = $this->session->userdata('sid');
		$q = $this->Survey_model->get_question_title($sid,$gid);
		print $q[0]['title'];
	}
	/** END OF SET OF METHODS FOR OPTION **/	
}

?>