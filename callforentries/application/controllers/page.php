<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		//$this->load->model('Page_model');
		$this->load->model('Menu_model');
		//$this->load->model('Page_Menu_model');
		$this->load->model('Gallery_model');
		$this->load->model('News_sticker_model');
		$this->load->model('User_model');
	}

	function index()
	{
		$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get_active();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/home');
		$this->load->view('common/footer');	
	}
	function musicians()
	{
		#redirect(base_url().'page/pages/69');
		 $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/musicians');
		$this->load->view('common/footer');	
	}
	function musicians_show()
	{
		//redirect(base_url());
		 $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/musicians');
		$this->load->view('common/footer');	
	}
	function musicians_payment($id)
	{
		$data['music_id'] = $id;
		 $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/musicians_payment');
		$this->load->view('common/footer');	
	}
	function add_musicians_entry()
	{
		#print_r($_FILES['mp3']['name']);exit;
		
		$data = array();
		foreach($_POST as $key => $value)
		{
			$data[$key] = $value;
		}
		$fee_exempt = "No";
		if(isset($_POST['fee_exempt']))
		{
			$fee_exempt = "Yes";
		}
		$data['fee_exempt'] = $fee_exempt;

		$id = $this->User_model->add_musicians_entry($data);
		//echo $id;
		if($id)
		{
			$this->session->set_flashdata('musicians_entry', 'Your musician entry has been successfully added to the system');
			
			# check for file and add
			
			# check if an image has been uploaded
			if($_FILES['mp3']['name']){
				$file_data = array(
					'dir' => './uploads/mp3/',
					'allowed_types' => 'mp3|MP3|pdf',
					'max_size' => 5120,
					'field_name' => 'mp3'
				);
				
				$file_name = $this->_add_file($file_data);
				if($file_name){
					$update_data = array();
					$update_data['mp3'] = json_encode(
											array(
											'file_name' => $file_name,
											'file_path' => base_url() . 'uploads/mp3/' . $file_name
											)
										);
					$this->User_model->update_musicians_entry($id,$update_data);	
				}
	
			}
			
		}
		else
		{
			$this->session->set_flashdata('musicians_entry', 'There was error adding your musician entry. Please try again');
		}
		if($fee_exempt == "Yes")
		{
			redirect('page/musicians_thank_you/');
		}
		
		redirect(base_url().'page/musicians_payment/'.$id);
		/*
		echo '<pre>';
        print_r($data);
        echo  '</pre>';
		*/
		
	}
	function add_musicians_payment($id)
	{
		//$data = array();
//		foreach($_POST as $key => $value)
//		{
//			$data[$key] = $value;
//		}
//		$id = $this->User_model->add_musicians_entry($data);
//		if($id)
//		{
//			$this->session->set_flashdata('musicians_entry', 'Your musician entry has been successfully added to the system');
//		}
//		else
//		{
//			$this->session->set_flashdata('musicians_entry', 'There was error adding your musician entry. Please try again');
//		}
//		redirect(base_url().'page/musicians/'.$id);
		/*
		echo '<pre>';
        print_r($data);
        echo  '</pre>';
		*/
		
		//echo "hallo";
		
		$data['payment_method'] = 'Cheque';
		$data['band_name'] = $_POST['Band_name'];
		$data['contact_email'] = $_POST['Contact_email'];
		$data['billing_name'] = $_POST['Billing_name'];
		$data['billing_address'] = $_POST['Billing_address1'];
		
		$this->User_model->update_musicians_entry($id,$data);
		
		
		redirect(base_url()."page/musicians_thank_you_cheque");
	}
	
	function add_musicians_payment2($id)
	{
		//$data = array();
//		foreach($_POST as $key => $value)
//		{
//			$data[$key] = $value;
//		}
//		$id = $this->User_model->add_musicians_entry($data);
//		if($id)
//		{
//			$this->session->set_flashdata('musicians_entry', 'Your musician entry has been successfully added to the system');
//		}
//		else
//		{
//			$this->session->set_flashdata('musicians_entry', 'There was error adding your musician entry. Please try again');
//		}
//		redirect(base_url().'page/musicians/'.$id);
		/*
		echo '<pre>';
        print_r($data);
        echo  '</pre>';
		*/
		
		//echo "hallo";
		
		//$data['payment_method'] = 'Cheque';
		$data['band_name'] = $_POST['band'];
		$data['contact_email'] = $_POST['email'];
		$data['billing_name'] = $_POST['name'];
		$data['billing_address'] = $_POST['addr'];
		
		$this->User_model->update_musicians_entry($id,$data);
		
		
		//redirect(base_url()."page/musicians_thank_you_cheque");
	}
	
	function add_musicians_payment_cc($id,$payment_number)
	{
		$data['payment_method'] = 'Credit Card';
		$data['payment_number'] = $payment_number;
		$this->User_model->update_musicians_entry($id,$data);
		
		redirect(base_url()."page/musicians_thank_you");
		//echo "hallo";
	}
	function musicians_thank_you()
	{
        $page = $this->Menu_model->getpage(66);
        $data['page']=$page;

		$data['links'] = $this->Menu_model->get_links(1,0);
        $this->load->view('common/header',$data);
        $this->load->view('pages/page');
		$this->load->view('common/footer');	
		
		
		#$data['links'] = $this->Menu_model->get_links(1,0);
		#$data['all']=$this->News_sticker_model->get();
		#$data['page'] = $this->Menu_model->getpage();
		//$data['news'] = $this->Menu_model->getallnews();
		#$this->load->view('common/header',$data);
		#$this->load->view('pages/form/musicians_thank_you');
		#$this->load->view('common/footer');	
	}
	function musicians_thank_you_cheque()
	{
		$page = $this->Menu_model->getpage(67);
        $data['page']=$page;

		$data['links'] = $this->Menu_model->get_links(1,0);
        $this->load->view('common/header',$data);
        $this->load->view('pages/page');
		$this->load->view('common/footer');	
		
		
		/*$data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/musicians_thank_you_cheque');
		$this->load->view('common/footer');	*/
	}
	function children_entertainers()
	{
		redirect(base_url().'page/pages/69');
		 $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/children_entertainers');
		$this->load->view('common/footer');	
	}
	function add_children_entertainers()
	{
		$data = array();
		foreach($_POST as $key => $value)
		{
			$data[$key] = $value;
		}
		if($this->User_model->add_children_entertainers($data))
		{
			$this->session->set_flashdata('children_entertainers', 'Your children entertainers entry has been successfully added to the system');
		}
		else
		{
			$this->session->set_flashdata('children_entertainers', 'There was error adding your children entertainers entry. Please try again');
		}
		redirect(base_url().'page/children_entertainers');
		/*
		echo '<pre>';
        print_r($data);
        echo  '</pre>';
		*/
	}
	function send_your_art()
	{
		//$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/send_your_art');
		$this->load->view('common/footer');	
	}
	
	function community_grants()
	{

        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/community_grants');
		$this->load->view('common/footer');	
	}
	function event_proposal()
	{
		redirect(base_url().'page/pages/69');
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/event_proposal');
		$this->load->view('common/footer');	
	}
	
	function add_expression_of_interest()
	{
		$yalukit = $_POST['yalukit'];
		$name = $_POST['name'];
		$business = $_POST['business'];
		$address = $_POST['address'];
		$suburb = $_POST['suburb'];
		$state = $_POST['state'];
		$pcode = $_POST['pcode'];
		$email = $_POST['email'];
		$re_email = $_POST['re_email'];
		$phone = $_POST['phone'];
		$detail = $_POST['detail'];
		$yakulit_bfr = $_POST['yalukit_bfr'];
		
		//$agree = $_POST['agree'];
		
		$data['yalukit'] = $yalukit;
		$data['name'] = $name;
		$data['business'] = $business;
		$data['address'] = $address;
		$data['suburb'] = $suburb;
		$data['state'] = $state;
		$data['postcode'] = $pcode;
		$data['email'] = $email;
		$data['re_email'] = $re_email;
		$data['phone'] = $phone;
		$data['detail'] = $detail;
		$data['yalukit_bfr'] = $yakulit_bfr;
		
		
		$this->User_model->add_expression_of_interest($data);
		
		
		$message = "A new expression of interest has saved in database. <br/><br/>

The details are as follows :<br/>

Yalukit: ".$yakulit_bfr."<br/>
Name: ".$name."<br/>
Business: ".$business."<br/>
Address: ".$address."<br/>
Suburb: ".$suburb."<br/>
State: ".$state."<br/>
Postcode: ".$pcode."<br/>
Email: ".$email."<br/>
Phone: ".$phone."<br/>
Detail: ".$detail."<br/>
Yalukit_before: ".$yakulit_bfr."<br/>";
		
		//load email content
		//$data['content'] = $message;
		//$message = $this->load->view('email_template',$data, TRUE);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';	
		$this->email->initialize($config);
		$this->email->from('noreply@stkildafestival.com.au','Stkilda Festival');
		//$this->email->to('skftraders@portphillip.vic.gov.au');
		$this->email->to('AdeMel@portphillip.vic.gov.au');
		$this->email->bcc('notify@propagate.com.au');
		$this->email->subject('New expression of interest @ St Kilda Festival Website');
		$this->email->message($message);
		$this->email->send();
		
		
		
		$this->session->set_flashdata('success', 'Thank you, you have been successfully subcribed');
		
		redirect(base_url().'page/expression_of_interest');
		
		//echo "<pre>". print_r($data,true) ."</pre>";
	}
	
	function add_community_grants()
	{
		$group = $_POST['group'];
		$event_name = $_POST['event_name'];
		$withinpp = $_POST['withinpp'];
		$group_benefit = $_POST['group_benefit'];
		$festival_benefit = $_POST['festival_benefit'];
		$amount = $_POST['amount'];
		$funding_for = $_POST['funding_for'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		
		//$agree = $_POST['agree'];
		
		$data['group'] = $group;
		$data['event'] = $event_name;
		$data['withinpp'] = $withinpp;
		$data['group_benefit'] = $group_benefit;
		$data['festival_benefit'] = $festival_benefit;
		$data['amount'] = $amount;
		$data['funding_for'] = $funding_for;
		$data['ct_name'] = $name;
		$data['ct_phone'] = $phone;
		$data['ct_email'] = $email;		
		
		$this->User_model->add_community_grants($data);
		
		$this->session->set_flashdata('success', 'Thank you, you have been successfully subcribed');
		
		redirect(base_url().'page/community_grants');
		
		//echo "<pre>". print_r($data,true) ."</pre>";
	}
	
	function add_event_proposal()
	{
		$name = $_POST['name'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$re_email = $_POST['re_email'];
		$phone = $_POST['phone'];
		$activity = $_POST['activity'];
		$web = $_POST['web'];
		$group = $_POST['group'];
		$description = $_POST['description'];
		$considered_for = $_POST['considered_for'];
		$referees = $_POST['referees'];
		$requirements = $_POST['requirements'];
		$manage_impact = $_POST['manage_impact'];
		
		//$agree = $_POST['agree'];
		
		$data['ct_name'] = $name;
		$data['ct_address'] = $address;
		$data['ct_email'] = $email;
		$data['re_email'] = $re_email;
		$data['ct_phone'] = $phone;
		$data['activity'] = $activity;
		$data['group_name'] = $group;
		$data['event_desc'] = $description;
		$data['considered_for'] = $considered_for;
		$data['referees'] = $referees;
		$data['requirements'] = $requirements;
		$data['manage_impact'] = $manage_impact;	
		$data['website'] = $web;	
		
		$this->User_model->add_event_proposal($data);
		
		$this->session->set_flashdata('success', 'Thank you, you have been successfully subcribed');
		
		redirect(base_url().'page/event_proposal');
		
		//echo "<pre>". print_r($data,true) ."</pre>";
	}
	
	function email_subscription()
	{
		//$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/email_subscription');
		$this->load->view('common/footer');	
	}
	
	function host()
	{
		redirect(base_url().'page/pages/69');
		//$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/host');
		$this->load->view('common/footer');	
	}
	
	function member()
	{
		//$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/member');
		$this->load->view('common/footer');	
	}
	
	function subscribe()
	{
		//$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/subscribe');
		$this->load->view('common/footer');	
	}
	
	function expression_of_interest()
	{
		$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/expression_of_interest');
		$this->load->view('common/footer');	
	}
	
	function add_send_your_art()
	{
		$firstname = $_POST['firstname'];
		
		$surname = $_POST['surname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		if(isset($_POST['live'])){
			$live = $_POST['live'];
		}
		else
		{$live = 'No';}
		$detail = $_POST['detail'];
		//$agree = $_POST['agree'];
		
		$data['firstname'] = $firstname;
		$data['lastname'] = $surname;
		$data['phone'] = $phone;
		$data['email'] = $email;
		$data['lws'] = $live;
		$data['details'] = $detail;
		
		$this->User_model->add_send_your_design($data);
		
		$this->session->set_flashdata('success', 'Thank you, you have been successfully subcribed');
		
		redirect(base_url().'page/send_your_art');
		
		//echo "<pre>". print_r($data,true) ."</pre>";
	}
	
	function add_email_subscription()
	{
		$firstname = $_POST['firstname'];
		$surname = $_POST['surname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$pcode = $_POST['pcode'];
		//$agree = $_POST['agree'];
		
		$data['name'] = $firstname;
		$data['lastname'] = $surname;
		$data['phone'] = $phone;
		$data['email'] = $email;
		$data['postcode'] = $pcode;
		
		$this->User_model->add_email_subcription($data);
		
		$this->session->set_flashdata('success', 'Thank you, you have been successfully subcribed');
		
		redirect(base_url().'page/email_subscription');
		
		//echo "<pre>". print_r($data,true) ."</pre>";
	}
	
	function add_host()
	{
		# print_r($_POST);exit();
		
		$business = $_POST['business'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$re_email = $_POST['re_email'];
		$address = $_POST['address'];
		$web = $_POST['web'];
		$business_type = $_POST['business_type'];
		$availability = $_POST['availability'];
		$night_desc = $_POST['night_desc'];
		$equipment = $_POST['equipment'];
		$equipment_desc = $_POST['equipment_desc'];
		#$comedy_host = $_POST['comedy_host'];
		#$logo = $_POST['logo'];
		$social_media = $_POST['social_media'];
		$activity = $_POST['activity'];
		$forum_host = isset($_POST['forum_host']) ? $_POST['forum_host'] : 'no';
		//$agree = $_POST['agree'];
		
		$data['business_name'] = $business;
		$data['ct_name'] = $name;
		$data['address'] = $address;
		$data['phone'] = $phone;
		$data['email'] = $email;
		$data['re_email'] = $re_email;
		$data['website'] = $web;
		$data['business_type'] = $business_type;
		$data['availability'] = $availability;
		$data['night_desc'] = $night_desc;
		$data['equipment'] = $equipment;
		$data['equipment_desc'] = $equipment_desc;
		#$data['comedy_host'] = $comedy_host;
		$data['forum_host'] = $forum_host;
		#$data['logo'] = $logo;
		$data['social_media'] = $social_media;
		$data['activity'] = $activity;
		
		$this->User_model->add_host($data);
		
		$this->session->set_flashdata('success', 'Thank you, you have been successfully subcribed');
		
		redirect(base_url().'page/host');
		
		//echo "<pre>". print_r($data,true) ."</pre>";
	}
	
	function add_subscribe()
	{
		
		$email = $_POST['email'];
		
		$data['email'] = $email;
		
		$this->User_model->add_subscribe($data);
		
		$this->session->set_flashdata('success', 'Thank you, you have been successfully subcribed');
		
		redirect(base_url().'page/subscribe');
		
		//echo "<pre>". print_r($data,true) ."</pre>";
	}
	
	function member_login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$result =  $this->User_model->validate_member($username,$password);
		//echo "<pre>". print_r($result,true) ."</pre>";
		if($result)
		{
			 $this->session->set_userdata('memberLoggedIn', $result['name']);
			if($result['name'] == 'Stallholders - Food') 
			{
			  #redirect(base_url().'page/sh_food_login'); 
			  redirect(base_url().'page/pages/59'); 
			}
			else if($result['name'] == 'Stallholders - Market/General') 
			{	
				#redirect(base_url().'page/sh_market_login');
				redirect(base_url().'page/pages/60'); 
			}
			else if($result['name'] == 'Permanent Traders') 
			{	
				#redirect(base_url().'page/pt_login');
				redirect(base_url().'page/pages/58'); 
			}
		}
		else
		{
			$this->session->set_flashdata('error','Wrong username/password');
			redirect(base_url().'page/member');
		}
	}
	
	function sh_food_login()
	{
	  if($this->session->userdata('memberLoggedIn') && $this->session->userdata('memberLoggedIn') == 'Stallholders - Food')
	  {
		$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$data['page'] =  $data['pages'] = $this->Menu_model->getpage(59);
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/sh_food_login');
		$this->load->view('common/footer');	
	  }
	  else
	  {
		  redirect(base_url().'page/member');
	  }
	}
	
	function sh_market_login()
	{
	  if($this->session->userdata('memberLoggedIn') && $this->session->userdata('memberLoggedIn') == 'Stallholders - Market/General')
	  {
		$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		
		redirect(base_url().'page/pages/60');
		/*
		$data['page'] =  $data['pages'] = $this->Menu_model->getpage(60);
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/sh_market_login');
		$this->load->view('common/footer');	
		*/
	  }
      else
	  {
		  redirect(base_url().'page/member');
	  }
	}
	
	function pt_login()
	{
	   if($this->session->userdata('memberLoggedIn') && $this->session->userdata('memberLoggedIn') == 'Permanent Traders')
	  {
		$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$data['page'] =  $data['pages'] = $this->Menu_model->getpage(58);
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/pt_login');
		$this->load->view('common/footer');	
	  }
	   else
	  {
		  redirect(base_url().'page/member');
	  }
	}
	
	function sh_food_form()
	{
	  if($this->session->userdata('memberLoggedIn') && $this->session->userdata('memberLoggedIn') == 'Stallholders - Food')
	  {
		$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['day']=date('d');
		$data['month']=date('M');
		$data['year']=date('Y');
		$data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/sh_food_form');
		$this->load->view('common/footer');	
	  }
	  else
	  {
		  redirect(base_url().'page/member');
	  }
	}
	function sh_market()
	{
		$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
		$data['day']=date('d');
		$data['month']=date('M');
		$data['year']=date('Y');
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/test_form');
		$this->load->view('common/footer');	
	}
	function sh_market_form()
	{
	  if($this->session->userdata('memberLoggedIn') && $this->session->userdata('memberLoggedIn') == 'Stallholders - Market/General')
	  {
		$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/sh_market_form');
		$this->load->view('common/footer');
	  }
	  else
	  {
		  redirect(base_url().'page/member');
	  }
	}
	
	function pt_form()
	{
	  if($this->session->userdata('memberLoggedIn') && $this->session->userdata('memberLoggedIn') == 'Permanent Traders')
	  {
		$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		$this->load->view('common/header',$data);
		$this->load->view('pages/form/pt_form');
		$this->load->view('common/footer');	
	  }
	  else
	  {
		  redirect(base_url().'page/member');
	  }
	}
	
	function new_participant()
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$cat = $_POST['cat'];
		
		$data['name']=$name;
		$data['email']=$email;
		$data['phone']=$phone;
		$data['membership_type']=$cat;
		
		if($cat == 1) {$cate = 'Stallholders - Food';}
		if($cat == 2) {$cate = 'Stallholders - Market/General';}
		if($cat == 3) {$cate = 'Permanent Traders';}
		
		$this->User_model->add_member($data);
		
		$message = "Thank you for registering your interest in participating in St Kilda Festival. St Kilda Festival staff will be in contact within 24 hours to provide you with login details so that you can access our website secure area.<br/><br/>

If you have any further questions please contact :<br/>


Angela de Mel <br/>
Trader Liaison<br/>
St Kilda Festival<br/>
T: 03 9209 6266 / 0434 316 784<br/>
E: ademel@portphillip.vic.gov.au";
		
		//load email content
		//$data['content'] = $message;
		//$message = $this->load->view('email_template',$data, TRUE);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';	
		$this->email->initialize($config);
		$this->email->from('noreply@stkildafestival.com.au','Stkilda Festival');
		$this->email->to($email);
		$this->email->bcc('notify@propagate.com.au');
		$this->email->subject('Member Signup @ St Kilda Festival Website');
		$this->email->message($message);
		$this->email->send();
		
		
		
		$message = "A new member has signed up to the <a href='www.stkildafestival.com.au'>www.stkildafestival.com.au</a> St Kilda Business area. <br/><br/>

The details are as follows :<br/>


Name: ".$name."<br/>
Tel: ".$phone."<br/>
Email: ".$email."<br/>
Membership Type: ".$cate."<br/>";
		
		//load email content
		//$data['content'] = $message;
		//$message = $this->load->view('email_template',$data, TRUE);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';	
		$this->email->initialize($config);
		$this->email->from('noreply@stkildafestival.com.au','Stkilda Festival');
		$this->email->to('skftraders@portphillip.vic.gov.au');
		$this->email->cc('ademel@portphillip.vic.gov.au');
		$this->email->bcc('notify@propagate.com.au');
		$this->email->subject('Member Signup @ St Kilda Festival Website');
		$this->email->message($message);
		$this->email->send();
		
		redirect(base_url().'page/member');
	}
	
	function test()
	{
		$images = $this->Gallery_model->get_photos(4);
		//$data['images'] = $images;
		//$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
		$data['all']=$this->News_sticker_model->get();
		//$data['news'] = $this->Menu_model->getallnews();
		//$this->load->view('common/header',$data);
		$this->load->view('pages/test',$data);
		//$this->load->view('common/footer');	
	}
	function home($id=1)
	{
		$this->session->set_flashdata('idlink',$id);
		redirect('/');
	}
	function pages($id='')
	{
		if($id<>""){
        $page = $this->Menu_model->getpage($id);
        $data['page']=$page;
        }
        else
        {
            $data['page']="";
        }
		/*
        $images = $this->Gallery_model->get_photos($pages['gallery']);
        $width = 0;
        
        $path =  base_url()."uploads/galleries/".md5("cdkgallery".$pages['gallery'])."/";
        foreach($images as $i)
        {
			if($i['video'] == 0)
			{
            	list($w) = getimagesize($path.$i['name']);
            	$width = $width + $w + 10;
			}
			else
			{
				$width = $width + 926 + 10;
			}
        }
        $width = $width + 270;
        $data['images'] = $images;
        $data['width'] = $width;
		*/
		$data['links'] = $this->Menu_model->get_links(1,0);
        $this->load->view('common/header',$data);
        $this->load->view('pages/page');
		$this->load->view('common/footer');	
	}
	
	function form_food_process()
	{
		//error_reporting(E_ALL);
      if($this->session->userdata('memberLoggedIn') && $this->session->userdata('memberLoggedIn') == 'Stallholders - Food')
	  {
		$strip = array("\r\n", "\n", "\r", ",");
	   if($_POST)
	   {
		foreach($_POST as $name => $value) 
		{
			$value = str_replace($strip," ",$value);
			//$value = mysql_real_escape_string($value);
		}
		 
		$data['given_name'] = $_POST['given_name']; 
		$data['surname'] = $_POST['surname'];
		$data['business_name'] = $_POST['business_name'];
		$data['abn'] = $_POST['abn'];
		$data['address'] = $_POST['address'];
		$data['suburb'] = $_POST['suburb'];
		$data['state'] = $_POST['state'];
		$data['postcode'] = $_POST['postcode'];
		$data['email'] = $_POST['email'];
		$data['confirm_email'] = $_POST['confirm_email'];
		$data['telephone'] = $_POST['telephone_prefix'].$_POST['telephone']; 
		$data['mobile'] = $_POST['mobile'];
		#$data['fax'] = $_POST['fax_prefix'].$_POST['fax'];
		
		#$data['receive_information'] = "N/A";
		#if (isset($_POST['receive_information'])) { $data['receive_information'] = $_POST['receive_information']; }
		
		$data['previous_participant'] = "N/A";
		if (isset($_POST['previous_participant'])) { $data['previous_participant'] = $_POST['previous_participant']; }
		
		$data['stall_brief_description'] = $_POST['stall_brief_description'];
		
		$data['stall_type'] = "N/A";
		if (isset($_POST['stall_type'])) {$data['stall_type'] = $_POST['stall_type'];}
		
		$data['stall_width'] = $_POST['stall_width'];
		$data['stall_depth'] = $_POST['stall_depth'];
		$data['stall_height'] = $_POST['stall_height'];
		
		$data['stall_towbar'] = "N/A";
		if (isset($_POST['stall_towbar'])) { $data['stall_towbar'] = $_POST['stall_towbar']; }
		$data['stall_towbar_length'] = $_POST['stall_towbar_length'];
		
		$data['product_info'] = "";
		for($i=1;$i<=25;$i++) {
		   if($_POST['product_name'.$i] != '' && $_POST['product_price'.$i] != '')
		   {
			$data['product_info'] .= $_POST['product_name'.$i].' '.$_POST['product_price'.$i];
			
		   }
		}
		$data['product_info'] = addslashes($data['product_info']);
		
		$data['coolroom'] = "N/A";
		if (isset($_POST['coolroom'])) { $data['coolroom'] = $_POST['coolroom']; }
		$data['coolroom_width'] = $_POST['coolroom_width'];
		$data['coolroom_depth'] = $_POST['coolroom_depth'];
		$data['coolroom_length'] = $_POST['coolroom_length'];
		
		$data['power_required_coolroom'] = "N/A";
		if (isset($_POST['power_required_coolroom'])) {
			$data['power_required_coolroom'] = $_POST['power_required_coolroom'];
			
		}
		
		$data['hire_package'] = "N/A";
		if (isset($_POST['hire_package'])) {
			$data['hire_package'] = $_POST['hire_package']; 
		}
		
		$data['power_option'] = "N/A";
		if (isset($_POST['power_option'])) {
			$data['power_option'] = $_POST['power_option'];
			
		}
		
		
		$data['health_registration'] = "N/A";
		$data['new_trader'] = "N/A";
		if (isset($_POST['health_registration'])) { $data['health_registration'] = $_POST['health_registration']; }
		if (isset($_POST['new_trader'])) { $data['new_trader'] = $_POST['new_trader']; }
		
		$data['fss_title']="";
			if (isset($_POST['fss_title'])) { $data['fss_title'] = $_POST['fss_title']; }
		$data['fss_fn']="";
			if (isset($_POST['fss_fn'])) { $data['fss_fn'] = $_POST['fss_fn']; }
		$data['fss_ln']="";
			if (isset($_POST['fss_ln'])) {$data['fss_ln'] = $_POST['fss_ln']; }
		$data['fss_wf']="";
			if (isset($_POST['fss_wf'])) { $data['fss_wf'] = $_POST['fss_wf']; }
		$data['fss_hf']="";
			if (isset($_POST['fss_hf'])) { $data['fss_hf'] = $_POST['fss_hf']; }
		$data['fss_on']="";
			if (isset($_POST['fss_on'])) { $data['fss_on'] = $_POST['fss_on']; }
		$data['fss_mo']="";
			if (isset($_POST['fss_mo'])) { $data['fss_mo'] = $_POST['fss_mo']; }
		$data['fss_fx']="";
			if (isset($_POST['fss_fx'])) { $data['fss_fx'] = $_POST['fss_fx']; }
		$data['fss_em']="";
			if (isset($_POST['fss_em'])) { $data['fss_em'] = $_POST['fss_em']; }
			
		$data['contact_same'] = "N/A";
		if (isset($_POST['contact_same'])) {
			$data['contact_same'] = $_POST['contact_same']; 
		}
		
		$data['contact_title']="";
			if (isset($_POST['contact_title'])) { $data['contact_title'] = $_POST['contact_title']; }
		$data['contact_fn']="";
			if (isset($_POST['contact_fn'])) { $data['contact_fn'] = $_POST['contact_fn']; }
		$data['contact_ln']="";
			if (isset($_POST['contact_ln'])) { $data['contact_ln'] = $_POST['contact_ln']; }
		$data['contact_wf']="";
			if (isset($_POST['contact_wf'])) { $data['contact_wf'] = $_POST['contact_wf']; }
		$data['contact_hf']="";
			if (isset($_POST['contact_hf'])) { $data['contact_hf'] = $_POST['contact_hf']; }
		$data['contact_on']="";
			if (isset($_POST['contact_on'])) { $data['contact_on'] = $_POST['contact_on']; }
		$data['contact_mo']="";
			if (isset($_POST['contact_mo'])) { $data['contact_mo'] = $_POST['contact_mo']; }
		$data['contact_fx']="";
			if (isset($_POST['contact_fx'])) { $data['contact_fx'] = $_POST['contact_fx']; }
		$data['contact_em']="";
			if (isset($_POST['contact_em'])) { $data['contact_em'] = $_POST['contact_em']; }
		
		
		$data['vehicle_parking'] = "N/A";
		if (isset($_POST['vehicle_parking'])) {
			$vehicle_parkings = $_POST['vehicle_parking'];
			$temp = $vehicle_parkings[0];
			for($i=1;$i<count($vehicle_parkings);$i++) {
				$temp .= " - ".$vehicle_parkings[$i];
			}
			if (isset($_POST['number_vehicle'])) {
				$number_vehicle = $_POST['number_vehicle'];
			}
			$temp .= " // Number of vehicles: ".$number_vehicle;
			for($i=1;$i<=$number_vehicle;$i++) {
				$temp .= " // Car ".$i.": Registration: ".$_POST['veh_'.$i.'_reg'].", Make: ".$_POST['veh_'.$i.'_make'].", Model: ".$_POST['veh_'.$i.'_model'].", Type: ".$_POST['veh_'.$i.'_type'];
				if(isset($_POST['veh_'.$i.'_require']))
				{
					$temp .=" I will require Festival allocated parking for this vehicle (not required for actual food vans, only support vehicles requiring car parking facilities)";
				}
			}
			$data['vehicle_parking'] = $temp;
		}
		
		$data['idemnity'] = $_POST['idem_date']." day of ".$_POST['idem_month'].", ".$_POST['idem_year']." by ".$_POST['idem_name'];
	
		$data['idemnity_agree'] = "N/A";
		if (isset($_POST['idemnity_agree'])) { $data['idemnity_agree'] = "Yes"; }
		
		$data['accessibility'] = "N/A";
		if (isset($_POST['accessibility'])) {
			$accessibilities = $_POST['accessibility'];
			$temp = $accessibilities[0];
			for($i=1;$i<count($accessibilities);$i++) {
				$temp .= sprintf("
	%s",$accessibilities[$i]);
			}
			$data['accessibility'] = $temp;
		}
		
		$data['fees_agree'] = "N/A";
		if (isset($_POST['fees_agree'])) { $data['fees_agree'] = "Yes"; }
		
		$data['terms_agree'] = "N/A";
		if (isset($_POST['terms_agree'])) { $data['terms_agree'] = "Yes"; }
		
		$data['declaration_agree'] = "N/A";
		if (isset($_POST['declaration_agree'])) { $data['declaration_agree'] = "Yes"; }
		
		//echo "<pre>". print_r($data,true) ."</pre>";
		
		$id = $this->User_model->add_sh_food($data);
		
		$stall_photo = "";
		if ($_FILES['stall_photo']['name'] != "") {
			
			$file_type = $_FILES['stall_photo']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			//if ($file_type == "jpg" || $file_type == "png" || $file_type == "gif") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['stall_photo']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}
				if (!getimagesize($_FILES['stall_photo']['tmp_name'])) { 
					echo "Invalid Image File..."; 
					exit(); 
				}
				
				$stall_photo = "food_stall_photo".$id.$_FILES['stall_photo']['name'];
				move_uploaded_file($_FILES['stall_photo']['tmp_name'],"uploads/".$stall_photo);
					
		}
		$data['stall_photo'] = $stall_photo;
		
		$coolroom_photo = "";
		//echo "<pre>". print_r($_FILES['coolroom_photo'],true) ."</pre>";
		//exit;
		if ($_FILES['coolroom_photo']['name'] != "") {
			
	  
			$file_type = $_FILES['coolroom_photo']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			//if ($file_type == "jpg" || $file_type == "jpeg" || $file_type == "png" || $file_type == "gif") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['coolroom_photo']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}
				if (!getimagesize($_FILES['coolroom_photo']['tmp_name'])) { 
					echo "Invalid Image File..."; 
					exit(); 
				}
				//echo 'come in';
				$coolroom_photo = "coolroom".$id.$_FILES['coolroom_photo']['name'];
				move_uploaded_file($_FILES['coolroom_photo']['tmp_name'],"uploads/".$coolroom_photo);
				
			//}
		}
		//echo 'coolrom is '.$_FILES['coolroom_photo']['name'];
//		echo 'coolrom is '.$coolroom_photo;
//		exit;
		$data['coolroom_photo'] = $coolroom_photo;
		
		$mfv_registration = "";
		$mfv1 = '';
		$mfv2 = '';
		
		/*if ($_FILES['mfv_registration1']['name'] != "") {
				
			$file_type = $_FILES['mfv_registration1']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			if ($file_type == "pdf" || $file_type == "doc" || $file_type == "txt" || $file_type == "jpg" || $file_type == "gif" || $file_type == "png") {	
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['mfv_registration1']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}
				$mfv_registration = "food_mfv".$id.$_FILES['mfv_registration1']['name'];
				$mfv1 = $mfv_registration;
				move_uploaded_file($_FILES['mfv_registration1']['tmp_name'],"uploads/".$mfv_registration);
			
			}
			 
		}
		else if($_FILES['mfv_registration2']['name'] != "") {
			
			$file_type = $_FILES['mfv_registration2']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			if ($file_type == "pdf" || $file_type == "doc" || $file_type == "txt" || $file_type == "jpg" || $file_type == "gif" || $file_type == "png") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['mfv_registration2']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}	
				$mfv_registration = "food_mfv2".$id.$_FILES['mfv_registration2']['name'];
				$mfv2 = $mfv_registration;
				move_uploaded_file($_FILES['mfv_registration2']['tmp_name'],"uploads/".$mfv_registration);
				
			}
			 
		}*/
		$data['mfv_registration'] = $mfv_registration;
		
		
		$trade_statement = '';
		/*if($_FILES['mfv_registration3']['name'] != "") {
			
			$file_type = $_FILES['mfv_registration3']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			if ($file_type == "pdf" || $file_type == "doc" || $file_type == "txt" || $file_type == "jpg" || $file_type == "gif" || $file_type == "png") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['mfv_registration3']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}	
				$trade_statement = "food_mfv3".$id.$_FILES['mfv_registration3']['name'];
				move_uploaded_file($_FILES['mfv_registration3']['tmp_name'],"uploads/".$trade_statement);
				
			}
		}
		*/
		$data['trade_statement'] = $trade_statement;
		
		
		$victorian_food_safety = "";
		/*if($_FILES['mfv_registration4']['name'] != "") {
			
			$file_type = $_FILES['mfv_registration4']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			if ($file_type == "pdf" || $file_type == "doc" || $file_type == "txt" || $file_type == "jpg" || $file_type == "gif" || $file_type == "png") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['mfv_registration4']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}	
				$victorian_food_safety = "food_mfv4".$id.$_FILES['mfv_registration4']['name'];
				move_uploaded_file($_FILES['mfv_registration4']['tmp_name'],"uploads/".$victorian_food_safety);
			
			}
		}*/
		
		$data['victorian_food_safety'] = $victorian_food_safety;
		
		$insurance_cert = "";
		if ($_FILES['insurance_cert']['name'] != "") {
			
	  
			//$file_type = $_FILES['insurance_cert']['name'];
			//$file_type_length = strlen($file_type) - 3;
			//$file_type = substr($file_type,$file_type_length);
			//if ($file_type == "pdf" || $file_type == "doc" || $file_type == "txt") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['insurance_cert']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}	
				$insurance_cert = "food_ic".$id.$_FILES['insurance_cert']['name'];
				move_uploaded_file($_FILES['insurance_cert']['tmp_name'],"uploads/".$insurance_cert);
				
		}
		$data['insurance_cert'] = $insurance_cert;
		
		//echo "<pre>". print_r($data,true) ."</pre>";
		
		//exit;
		
		$this->User_model->update_sh_food($id,$data);
//Registration Certificate form (Class 2 & 3 Traders): <a href='".base_url().'uploads/'.$mfv1."'>Download Here</a><br/><br/>

//Notification Form here (Class 4 Traders): <a href='".base_url().'uploads/'.$mfv2."'>Download Here</a><br/><br/>

//Completed Statement of Trade form: <a href='".base_url().'uploads/'.$data['trade_statement']."'>Download Here</a><br/><br/>

//Completed Victorian Food Safety Program for events pages 2 & 3: <a href='".base_url().'uploads/'.$data['victorian_food_safety']."'>Download Here</a><br/><br/>

		$message = "
		Stallholder Food Application<br/><br/>

Application Number: FS".$id."<br/>
================================<br/>
APPLICANT DETAILS<br/>
================================<br/>
Date: ".date('d-m-Y')."<br/>
Given Name: ".$data['given_name']."<br/>
Surname: ".$data['surname']."<br/>
Business Name: ".$data['business_name']."<br/>
ABN: ".$data['abn']."<br/>
Mailing Address: ".$data['address']."<br/>
Suburb: ".$data['suburb']."<br/>
State: ".$data['state']."<br/>
Postcode: ".$data['postcode']."<br/>
Email: ".$data['email']."<br/>
Confirm Email: ".$data['confirm_email']."<br/>
Telephone: ".$data['telephone']."<br/>
Mobile: ".$data['mobile']."<br/>
Previous participant: ".$data['previous_participant']."<br/><br/>

================================<br/>
STALL INFORMATION<br/>
================================<br/>
".$data['stall_brief_description']."<br/><br/>

I will be selling goods from a: ".$data['stall_type']."<br/>
The dimensions of my stalls are: <br/>
Width/Frontage: ".$data['stall_width']."<br/>
Depth: ".$data['stall_depth']."<br/>
Height (including display signage on top of van): ".$data['stall_height']."<br/><br/>

My Structure has a towbar: ".$data['stall_towbar']."	Towbar length: ".$data['stall_towbar_length']."<br/>
Photo of my food van or stall: <a href='".base_url().'uploads/'.$data['stall_photo']."'>Download Here</a><br/><br/>

================================<br/>
PRODUCT INFORMATION<br/>
================================<br/>
".$data['product_info']."<br/><br/>

================================<br/>
PRODUCT STORAGE<br/>
================================<br/>
I wish to bring a cool room: ".$data['coolroom']."<br/>
Cool room dimensions<br/>
Width: ".$data['coolroom_width']."<br/>
Depth: ".$data['coolroom_depth']."<br/>
Towbar length: ".$data['coolroom_length']."<br/>
Photo of my cool room: <a href='".base_url().'uploads/'.$data['coolroom_photo']."'>Download Here</a><br/><br/>

Power required for cool room: ".$data['power_required_coolroom']."<br/><br/>

================================<br/>
HIRES<br/>
================================<br/>
".$data['hire_package']."<br/><br/>

================================<br/>
POWER<br/>
================================<br/>
".$data['power_option']."<br/><br/>

================================<br/>
FOOD ACT REGISTRATION<br/>
================================<br/>
".$data['health_registration']."<br/>
".$data['new_trader']."<br/><br/>

FOOD SAFETY SUPERVISOR CONTACT DETAILS<br/><br/>

Title: ".$data['fss_title']."<br/>
First Name: ".$data['fss_fn']."<br/>
Last Name: ".$data['fss_ln']."<br/>
Other Names: ".$data['fss_on']."<br/>
Work Phone: ".$data['fss_wf']."<br/>
Home Phone: ".$data['fss_hf']."<br/>
Mobile: ".$data['fss_mo']."<br/>
Fax: ".$data['fss_fx']."<br/>
Email: ".$data['fss_em']."<br/>

CONTACT PERSON ON DAY OF EVENT<br/><br/>
Is the contact person the same as the food safety supervisor? ".$data['contact_same']."<br/><br/>

Title: ".$data['contact_title']."<br/>
First Name: ".$data['contact_fn']."<br/>
Last Name: ".$data['contact_ln']."<br/>
Other Names: ".$data['contact_on']."<br/>
Work Phone: ".$data['contact_wf']."<br/>
Home Phone: ".$data['contact_hf']."<br/>
Mobile: ".$data['contact_mo']."<br/>
Fax: ".$data['contact_fx']."<br/>
Email: ".$data['contact_em']."<br/>
 


================================<br/>
VEHICLE ACCESS & PARKING<br/>
================================<br/>
".$data['vehicle_parking']."<br/><br/>

================================<br/>
INSURANCE & IDEMNITY<br/>
================================<br/>
Insurance certificate: <a href='".base_url().'uploads/'.$data['insurance_cert']."'>Download Here</a><br/><br/>

".$data['idemnity']."<br/><br/>

I agree to Indemnify the Council as per the above Indemnity Statement: ".$data['idemnity_agree']."<br/><br/>

================================<br/>
ACCESSIBILITY<br/>
================================<br/>
".$data['accessibility']."<br/><br/>

================================<br/><br/>
POST-EVENT FEES & CHARGES<br/>
================================<br/>
I have read and clearly understand the St Kilda Festival Fee Structure: ".$data['fees_agree']."<br/><br/>

================================<br/>
TERMS & CONDITIONS<br/>
================================<br/>
I have read, clearly understand and agree to all terms and conditions as outlined in the above documents: ".$data['terms_agree']."<br/><br/>

================================<br/>
DECLARATION<br/>
================================<br/><br/>
I confirm that I have completed this application honestly and to the best of my knowledge and that I have read and clearly understood all information contained within this application process: ".$data['declaration_agree']."<br/><br/>

Below is a link to the Terms & Conditions you have read and agreed to in your online application. We recommend you print these off for your records.<br/><br/>

Important Information: <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_305_Itinerant_FOOD_Traders_2015.pdf'>Download Here</a><br/><br/>

General Conditions: <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_306_Itinerant_FOOD_Traders_2015.pdf'>Download Here</a><br/><br/>

Food Trader Checklist : <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_300_Itinerant_FOOD_Traders_2015.pdf'>Download Here</a><br/><br/>
		";
		
		//load email content
		//$data['content'] = $message;
		//$message = $this->load->view('email_template',$data, TRUE);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';	
		$this->email->initialize($config);
		$this->email->from('noreply@stkildafestival.com.au','St Kilda Festival Website');
		$this->email->to('skftraders@portphillip.vic.gov.au');
		$this->email->cc($data['email']);
		$this->email->bcc('notify@propagate.com.au, skftraders@portphillip.com.au , skftraders@portphillip.vic.gov.au'); 
		//$this->email->to('rseptiane@gmail.com');
		$this->email->subject('Stallholder Food Application');
		$this->email->message($message);
		$this->email->send();
		$this->session->set_flashdata('form_mes','The form has been submitted successfully');
		}
		else
		{
			$this->session->set_flashdata('form_mes','Please fill in the details');
		}
		redirect(base_url().'page/sh_food_form');
	  }
	  else
	  {
		  redirect(base_url().'page/member');
	  }
	}
	
	
	function form_food_process_test()
	{
	   error_reporting(E_ALL);
      //if($this->session->userdata('memberLoggedIn') && $this->session->userdata('memberLoggedIn') == 'Stallholders - Food')
	  //{
		$strip = array("\r\n", "\n", "\r", ",");
	   if($_POST)
	   {
		foreach($_POST as $name => $value) 
		{
			$value = str_replace($strip," ",$value);
			//$value = mysql_real_escape_string($value);
		}
		 
		$data['given_name'] = $_POST['given_name']; 
		$data['surname'] = $_POST['surname'];
		$data['business_name'] = $_POST['business_name'];
		$data['abn'] = $_POST['abn'];
		$data['address'] = $_POST['address'];
		$data['suburb'] = $_POST['suburb'];
		$data['state'] = $_POST['state'];
		$data['postcode'] = $_POST['postcode'];
		$data['email'] = $_POST['email'];
		$data['confirm_email'] = $_POST['confirm_email'];
		$data['telephone'] = $_POST['telephone_prefix'].$_POST['telephone']; 
		$data['mobile'] = $_POST['mobile'];
		$data['fax'] = $_POST['fax_prefix'].$_POST['fax'];
		
		$data['receive_information'] = "N/A";
		if (isset($_POST['receive_information'])) { $data['receive_information'] = $_POST['receive_information']; }
		
		$data['previous_participant'] = "N/A";
		if (isset($_POST['previous_participant'])) { $data['previous_participant'] = $_POST['previous_participant']; }
		
		$data['stall_brief_description'] = $_POST['stall_brief_description'];
		
		$data['stall_type'] = "N/A";
		if (isset($_POST['stall_type'])) {$data['stall_type'] = $_POST['stall_type'];}
		
		$data['stall_width'] = $_POST['stall_width'];
		$data['stall_depth'] = $_POST['stall_depth'];
		$data['stall_height'] = $_POST['stall_height'];
		
		$data['stall_towbar'] = "N/A";
		if (isset($_POST['stall_towbar'])) { $data['stall_towbar'] = $_POST['stall_towbar']; }
		$data['stall_towbar_length'] = $_POST['stall_towbar_length'];
		
		$data['product_info'] = "";
		for($i=1;$i<=25;$i++) {
		   if($_POST['product_name'.$i] != '' && $_POST['product_price'.$i] != '')
		   {
			$data['product_info'] .= $_POST['product_name'.$i].' '.$_POST['product_price'.$i];
			
		   }
		}
		$data['product_info'] = addslashes($data['product_info']);
		
		$data['coolroom'] = "N/A";
		if (isset($_POST['coolroom'])) { $data['coolroom'] = $_POST['coolroom']; }
		$data['coolroom_width'] = $_POST['coolroom_width'];
		$data['coolroom_depth'] = $_POST['coolroom_depth'];
		$data['coolroom_length'] = $_POST['coolroom_length'];
		
		$data['power_required_coolroom'] = "N/A";
		if (isset($_POST['power_required_coolroom'])) {
			$data['power_required_coolroom'] = $_POST['power_required_coolroom'];
			
		}
		
		$data['hire_package'] = "N/A";
		if (isset($_POST['hire_package'])) {
			$data['hire_package'] = $_POST['hire_package']; 
		}
		
		$data['power_option'] = "N/A";
		if (isset($_POST['power_option'])) {
			$data['power_option'] = $_POST['power_option'];
			
		}
		
		
		$data['health_registration'] = "N/A";
		$data['new_trader'] = "N/A";
		if (isset($_POST['health_registration'])) { $data['health_registration'] = $_POST['health_registration']; }
		if (isset($_POST['new_trader'])) { $data['new_trader'] = $_POST['new_trader']; }
		
		$data['fss_title']="";
			if (isset($_POST['fss_title'])) { $data['fss_title'] = $_POST['fss_title']; }
		$data['fss_fn']="";
			if (isset($_POST['fss_fn'])) { $data['fss_fn'] = $_POST['fss_fn']; }
		$data['fss_ln']="";
			if (isset($_POST['fss_ln'])) {$data['fss_ln'] = $_POST['fss_ln']; }
		$data['fss_wf']="";
			if (isset($_POST['fss_wf'])) { $data['fss_wf'] = $_POST['fss_wf']; }
		$data['fss_hf']="";
			if (isset($_POST['fss_hf'])) { $data['fss_hf'] = $_POST['fss_hf']; }
		$data['fss_on']="";
			if (isset($_POST['fss_on'])) { $data['fss_on'] = $_POST['fss_on']; }
		$data['fss_mo']="";
			if (isset($_POST['fss_mo'])) { $data['fss_mo'] = $_POST['fss_mo']; }
		$data['fss_fx']="";
			if (isset($_POST['fss_fx'])) { $data['fss_fx'] = $_POST['fss_fx']; }
		$data['fss_em']="";
			if (isset($_POST['fss_em'])) { $data['fss_em'] = $_POST['fss_em']; }
			
		$data['contact_same'] = "N/A";
		if (isset($_POST['contact_same'])) {
			$data['contact_same'] = $_POST['contact_same']; 
		}
		
		$data['contact_title']="";
			if (isset($_POST['contact_title'])) { $data['contact_title'] = $_POST['contact_title']; }
		$data['contact_fn']="";
			if (isset($_POST['contact_fn'])) { $data['contact_fn'] = $_POST['contact_fn']; }
		$data['contact_ln']="";
			if (isset($_POST['contact_ln'])) { $data['contact_ln'] = $_POST['contact_ln']; }
		$data['contact_wf']="";
			if (isset($_POST['contact_wf'])) { $data['contact_wf'] = $_POST['contact_wf']; }
		$data['contact_hf']="";
			if (isset($_POST['contact_hf'])) { $data['contact_hf'] = $_POST['contact_hf']; }
		$data['contact_on']="";
			if (isset($_POST['contact_on'])) { $data['contact_on'] = $_POST['contact_on']; }
		$data['contact_mo']="";
			if (isset($_POST['contact_mo'])) { $data['contact_mo'] = $_POST['contact_mo']; }
		$data['contact_fx']="";
			if (isset($_POST['contact_fx'])) { $data['contact_fx'] = $_POST['contact_fx']; }
		$data['contact_em']="";
			if (isset($_POST['contact_em'])) { $data['contact_em'] = $_POST['contact_em']; }
		
		
		$data['vehicle_parking'] = "N/A";
		if (isset($_POST['vehicle_parking'])) {
			$vehicle_parkings = $_POST['vehicle_parking'];
			$temp = $vehicle_parkings[0];
			$number_vehicle =0;
			for($i=1;$i<count($vehicle_parkings);$i++) {
				$temp .= " - ".$vehicle_parkings[$i];
			}
			if (isset($_POST['number_vehicle'])) {
				$number_vehicle = $_POST['number_vehicle'];
			}
			$temp .= " // Number of vehicles: ".$number_vehicle;
			for($i=1;$i<=$number_vehicle;$i++) {
				$temp .= " // Car ".$i.": Registration: ".$_POST['veh_'.$i.'_reg'].", Make: ".$_POST['veh_'.$i.'_make'].", Model: ".$_POST['veh_'.$i.'_model'].", Type: ".$_POST['veh_'.$i.'_type'];
				if(isset($_POST['veh_'.$i.'_require']))
				{
					$temp .=" I will require Festival allocated parking for this vehicle (not required for actual food vans, only support vehicles requiring car parking facilities)";
				}
			}
			$data['vehicle_parking'] = $temp;
		}
		
		$data['idemnity'] = $_POST['idem_date']." day of ".$_POST['idem_month'].", ".$_POST['idem_year']." by ".$_POST['idem_name'];
	
		$data['idemnity_agree'] = "N/A";
		if (isset($_POST['idemnity_agree'])) { $data['idemnity_agree'] = "Yes"; }
		
		$data['accessibility'] = "N/A";
		if (isset($_POST['accessibility'])) {
			$accessibilities = $_POST['accessibility'];
			$temp = $accessibilities[0];
			for($i=1;$i<count($accessibilities);$i++) {
				$temp .= sprintf("
	%s",$accessibilities[$i]);
			}
			$data['accessibility'] = $temp;
		}
		
		$data['fees_agree'] = "N/A";
		if (isset($_POST['fees_agree'])) { $data['fees_agree'] = "Yes"; }
		
		$data['terms_agree'] = "N/A";
		if (isset($_POST['terms_agree'])) { $data['terms_agree'] = "Yes"; }
		
		$data['declaration_agree'] = "N/A";
		if (isset($_POST['declaration_agree'])) { $data['declaration_agree'] = "Yes"; }
		
		echo "<pre>". print_r($data,true) ."</pre>";
		
		$id = $this->User_model->add_sh_food($data);
	print_r( $id);
		$stall_photo = "";
		if ($_FILES['stall_photo']['name'] != "") {
			
			$file_type = $_FILES['stall_photo']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			//if ($file_type == "jpg" || $file_type == "png" || $file_type == "gif") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['stall_photo']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}
				if (!getimagesize($_FILES['stall_photo']['tmp_name'])) { 
					echo "Invalid Image File..."; 
					exit(); 
				}
				
				$stall_photo = "food_stall_photo".$id.$_FILES['stall_photo']['name'];
				move_uploaded_file($_FILES['stall_photo']['tmp_name'],"uploads/".$stall_photo);
					
		}
		$data['stall_photo'] = $stall_photo;
		
		$coolroom_photo = "";
		//echo "<pre>". print_r($_FILES['coolroom_photo'],true) ."</pre>";
		//exit;
		if ($_FILES['coolroom_photo']['name'] != "") {
			
	  
			$file_type = $_FILES['coolroom_photo']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			//if ($file_type == "jpg" || $file_type == "jpeg" || $file_type == "png" || $file_type == "gif") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['coolroom_photo']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}
				if (!getimagesize($_FILES['coolroom_photo']['tmp_name'])) { 
					echo "Invalid Image File..."; 
					exit(); 
				}
				//echo 'come in';
				$coolroom_photo = "coolroom".$id.$_FILES['coolroom_photo']['name'];
				move_uploaded_file($_FILES['coolroom_photo']['tmp_name'],"uploads/".$coolroom_photo);
				
			//}
		}
		//echo 'coolrom is '.$_FILES['coolroom_photo']['name'];
//		echo 'coolrom is '.$coolroom_photo;
//		exit;
		$data['coolroom_photo'] = $coolroom_photo;
		
		$mfv_registration = "";
		$mfv1 = '';
		$mfv2 = '';
		
		/*if ($_FILES['mfv_registration1']['name'] != "") {
				
			$file_type = $_FILES['mfv_registration1']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			if ($file_type == "pdf" || $file_type == "doc" || $file_type == "txt" || $file_type == "jpg" || $file_type == "gif" || $file_type == "png") {	
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['mfv_registration1']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}
				$mfv_registration = "food_mfv".$id.$_FILES['mfv_registration1']['name'];
				$mfv1 = $mfv_registration;
				move_uploaded_file($_FILES['mfv_registration1']['tmp_name'],"uploads/".$mfv_registration);
			
			}
			 
		}
		else if($_FILES['mfv_registration2']['name'] != "") {
			
			$file_type = $_FILES['mfv_registration2']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			if ($file_type == "pdf" || $file_type == "doc" || $file_type == "txt" || $file_type == "jpg" || $file_type == "gif" || $file_type == "png") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['mfv_registration2']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}	
				$mfv_registration = "food_mfv2".$id.$_FILES['mfv_registration2']['name'];
				$mfv2 = $mfv_registration;
				move_uploaded_file($_FILES['mfv_registration2']['tmp_name'],"uploads/".$mfv_registration);
				
			}
			 
		}*/
		$data['mfv_registration'] = $mfv_registration;
		
		
		$trade_statement = '';
		/*if($_FILES['mfv_registration3']['name'] != "") {
			
			$file_type = $_FILES['mfv_registration3']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			if ($file_type == "pdf" || $file_type == "doc" || $file_type == "txt" || $file_type == "jpg" || $file_type == "gif" || $file_type == "png") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['mfv_registration3']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}	
				$trade_statement = "food_mfv3".$id.$_FILES['mfv_registration3']['name'];
				move_uploaded_file($_FILES['mfv_registration3']['tmp_name'],"uploads/".$trade_statement);
				
			}
		}
		*/
		$data['trade_statement'] = $trade_statement;
		
		
		$victorian_food_safety = "";
		/*if($_FILES['mfv_registration4']['name'] != "") {
			
			$file_type = $_FILES['mfv_registration4']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			if ($file_type == "pdf" || $file_type == "doc" || $file_type == "txt" || $file_type == "jpg" || $file_type == "gif" || $file_type == "png") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['mfv_registration4']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}	
				$victorian_food_safety = "food_mfv4".$id.$_FILES['mfv_registration4']['name'];
				move_uploaded_file($_FILES['mfv_registration4']['tmp_name'],"uploads/".$victorian_food_safety);
			
			}
		}*/
		
		$data['victorian_food_safety'] = $victorian_food_safety;
		
		$insurance_cert = "";
		if ($_FILES['insurance_cert']['name'] != "") {
			
	  
			//$file_type = $_FILES['insurance_cert']['name'];
			//$file_type_length = strlen($file_type) - 3;
			//$file_type = substr($file_type,$file_type_length);
			//if ($file_type == "pdf" || $file_type == "doc" || $file_type == "txt") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['insurance_cert']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}	
				$insurance_cert = "food_ic".$id.$_FILES['insurance_cert']['name'];
				move_uploaded_file($_FILES['insurance_cert']['tmp_name'],"uploads/".$insurance_cert);
				
		}
		$data['insurance_cert'] = $insurance_cert;
		
		echo "<pre>". print_r($data,true) ."</pre>";
		
		exit;
		
		$this->User_model->update_sh_food($id,$data);
//Registration Certificate form (Class 2 & 3 Traders): <a href='".base_url().'uploads/'.$mfv1."'>Download Here</a><br/><br/>

//Notification Form here (Class 4 Traders): <a href='".base_url().'uploads/'.$mfv2."'>Download Here</a><br/><br/>

//Completed Statement of Trade form: <a href='".base_url().'uploads/'.$data['trade_statement']."'>Download Here</a><br/><br/>

//Completed Victorian Food Safety Program for events pages 2 & 3: <a href='".base_url().'uploads/'.$data['victorian_food_safety']."'>Download Here</a><br/><br/>

		$message = "
		Stallholder Food Application<br/><br/>

Application Number: FS".$id."<br/>
================================<br/>
APPLICANT DETAILS<br/>
================================<br/>
Date: ".date('d-m-Y')."<br/>
Given Name: ".$data['given_name']."<br/>
Surname: ".$data['surname']."<br/>
Business Name: ".$data['business_name']."<br/>
ABN: ".$data['abn']."<br/>
Mailing Address: ".$data['address']."<br/>
Suburb: ".$data['suburb']."<br/>
State: ".$data['state']."<br/>
Postcode: ".$data['postcode']."<br/>
Email: ".$data['email']."<br/>
Confirm Email: ".$data['confirm_email']."<br/>
Receive Information about the current or future St Kilda Festivals: ".$data['receive_information']."<br/>
Telephone: ".$data['telephone']."<br/>
Mobile: ".$data['mobile']."<br/>
Fax: ".$data['fax']."<br/>
Previous participant: ".$data['previous_participant']."<br/><br/>

================================<br/>
STALL INFORMATION<br/>
================================<br/>
".$data['stall_brief_description']."<br/><br/>

I will be selling goods from a: ".$data['stall_type']."<br/>
The dimensions of my stalls are: <br/>
Width/Frontage: ".$data['stall_width']."<br/>
Depth: ".$data['stall_depth']."<br/>
Height (including display signage on top of van): ".$data['stall_height']."<br/><br/>

My Structure has a towbar: ".$data['stall_towbar']."	Towbar length: ".$data['stall_towbar_length']."<br/>
Photo of my food van or stall: <a href='".base_url().'uploads/'.$data['stall_photo']."'>Download Here</a><br/><br/>

================================<br/>
PRODUCT INFORMATION<br/>
================================<br/>
".$data['product_info']."<br/><br/>

================================<br/>
PRODUCT STORAGE<br/>
================================<br/>
I wish to bring a cool room: ".$data['coolroom']."<br/>
Cool room dimensions<br/>
Width: ".$data['coolroom_width']."<br/>
Depth: ".$data['coolroom_depth']."<br/>
Towbar length: ".$data['coolroom_length']."<br/>
Photo of my cool room: <a href='".base_url().'uploads/'.$data['coolroom_photo']."'>Download Here</a><br/><br/>

Power required for cool room: ".$data['power_required_coolroom']."<br/><br/>

================================<br/>
HIRES<br/>
================================<br/>
".$data['hire_package']."<br/><br/>

================================<br/>
POWER<br/>
================================<br/>
".$data['power_option']."<br/><br/>

================================<br/>
FOOD ACT REGISTRATION<br/>
================================<br/>
".$data['health_registration']."<br/>
".$data['new_trader']."<br/><br/>

FOOD SAFETY SUPERVISOR CONTACT DETAILS<br/><br/>

Title: ".$data['fss_title']."<br/>
First Name: ".$data['fss_fn']."<br/>
Last Name: ".$data['fss_ln']."<br/>
Other Names: ".$data['fss_on']."<br/>
Work Phone: ".$data['fss_wf']."<br/>
Home Phone: ".$data['fss_hf']."<br/>
Mobile: ".$data['fss_mo']."<br/>
Fax: ".$data['fss_fx']."<br/>
Email: ".$data['fss_em']."<br/>

CONTACT PERSON ON DAY OF EVENT<br/><br/>
Is the contact person the same as the food safety supervisor? ".$data['contact_same']."<br/><br/>

Title: ".$data['contact_title']."<br/>
First Name: ".$data['contact_fn']."<br/>
Last Name: ".$data['contact_ln']."<br/>
Other Names: ".$data['contact_on']."<br/>
Work Phone: ".$data['contact_wf']."<br/>
Home Phone: ".$data['contact_hf']."<br/>
Mobile: ".$data['contact_mo']."<br/>
Fax: ".$data['contact_fx']."<br/>
Email: ".$data['contact_em']."<br/>
 


================================<br/>
VEHICLE ACCESS & PARKING<br/>
================================<br/>
".$data['vehicle_parking']."<br/><br/>

================================<br/>
INSURANCE & IDEMNITY<br/>
================================<br/>
Insurance certificate: <a href='".base_url().'uploads/'.$data['insurance_cert']."'>Download Here</a><br/><br/>

".$data['idemnity']."<br/><br/>

I agree to Indemnify the Council as per the above Indemnity Statement: ".$data['idemnity_agree']."<br/><br/>

================================<br/>
ACCESSIBILITY<br/>
================================<br/>
".$data['accessibility']."<br/><br/>

================================<br/><br/>
POST-EVENT FEES & CHARGES<br/>
================================<br/>
I have read and clearly understand the St Kilda Festival Fee Structure: ".$data['fees_agree']."<br/><br/>

================================<br/>
TERMS & CONDITIONS<br/>
================================<br/>
I have read, clearly understand and agree to all terms and conditions as outlined in the above documents: ".$data['terms_agree']."<br/><br/>

================================<br/>
DECLARATION<br/>
================================<br/><br/>
I confirm that I have completed this application honestly and to the best of my knowledge and that I have read and clearly understood all information contained within this application process: ".$data['declaration_agree']."<br/><br/>

Below is a link to the Terms & Conditions you have read and agreed to in your online application. We recommend you print these off for your records.<br/><br/>

General Information: <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_34.pdf'>Download Here</a><br/><br/>

General Conditions: <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_37.pdf'>Download Here</a><br/><br/>

Food Trader Checklist : <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_36.pdf'>Download Here</a><br/><br/>
		";
		
		//load email content
		//$data['content'] = $message;
		//$message = $this->load->view('email_template',$data, TRUE);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';	
		$this->email->initialize($config);
		$this->email->from('noreply@stkildafestival.com.au','St Kilda Festival Website');
		//$this->email->to('skftraders@portphillip.vic.gov.au');
		//$this->email->cc($data['email']);
		$this->email->to('notify@propagate.com.au'); 
		//$this->email->to('rseptiane@gmail.com');
		$this->email->subject('Stallholder Food Application');
		$this->email->message($message);
		$this->email->send();
		$this->session->set_flashdata('form_mes','The form has been submitted successfully');
		}
		else
		{
			$this->session->set_flashdata('form_mes','Please fill in the details');
		}
		redirect(base_url().'page/sh_food_form');
	 // }
	  //else
	 // {
		  redirect(base_url().'page/member');
	  //}
	}
	
	function resend_email_food($id)
	{
		//Registration Certificate form (Class 2 & 3 Traders): <a href='".base_url().'uploads/'.$data['mfv_registration']."'>Download Here</a><br/><br/>

		//Notification Form here (Class 4 Traders): <a href='".base_url().'uploads/'.$data['mfv_registration']."'>Download Here</a><br/><br/>

		//Completed Statement of Trade form: <a href='".base_url().'uploads/'.$data['trade_statement']."'>Download Here</a><br/><br/>

		//Completed Victorian Food Safety Program for events pages 2 & 3: <a href='".base_url().'uploads/'.$data['victorian_food_safety']."'>Download Here</a><br/><br/>
		
		$data = $this->User_model->get_sh_food($id);
		$message = "
		Stallholder Food Application<br/><br/>

Application Number: FS".$id."<br/>
================================<br/>
APPLICANT DETAILS<br/>
================================<br/>
Date: ".date('d-m-Y',strtotime($data['date']))."<br/>
Given Name: ".$data['given_name']."<br/>
Surname: ".$data['surname']."<br/>
Business Name: ".$data['business_name']."<br/>
ABN: ".$data['abn']."<br/>
Mailing Address: ".$data['address']."<br/>
Suburb: ".$data['suburb']."<br/>
State: ".$data['state']."<br/>
Postcode: ".$data['postcode']."<br/>
Email: ".$data['email']."<br/>
Confirm Email: ".$data['confirm_email']."<br/>
Receive Information about the current or future St Kilda Festivals: ".$data['receive_information']."<br/>
Telephone: ".$data['telephone']."<br/>
Mobile: ".$data['mobile']."<br/>
Fax: ".$data['fax']."<br/>
Previous participant: ".$data['previous_participant']."<br/><br/>

================================<br/>
STALL INFORMATION<br/>
================================<br/>
".$data['stall_brief_description']."<br/><br/>

I will be selling goods from a: ".$data['stall_type']."<br/>
The dimensions of my stalls are: <br/>
Width/Frontage: ".$data['stall_width']."<br/>
Depth: ".$data['stall_depth']."<br/>
Height (including display signage on top of van): ".$data['stall_height']."<br/><br/>

My Structure has a towbar: ".$data['stall_towbar']."	Towbar length: ".$data['stall_towbar_length']."<br/>
Photo of my food van or stall: <a href='".base_url().'uploads/'.$data['stall_photo']."'>Download Here</a><br/><br/>

================================<br/>
PRODUCT INFORMATION<br/>
================================<br/>
".$data['product_info']."<br/><br/>

================================<br/>
PRODUCT STORAGE<br/>
================================<br/>
I wish to bring a cool room: ".$data['coolroom']."<br/>
Cool room dimensions<br/>
Width: ".$data['coolroom_width']."<br/>
Depth: ".$data['coolroom_depth']."<br/>
Towbar length: ".$data['coolroom_length']."<br/>
Photo of my cool room: <a href='".base_url().'uploads/'.$data['coolroom_photo']."'>Download Here</a><br/><br/>

Power required for cool room: ".$data['power_required_coolroom']."<br/><br/>

================================<br/>
HIRES<br/>
================================<br/>
".$data['hire_package']."<br/><br/>

================================<br/>
POWER<br/>
================================<br/>
".$data['power_option']."<br/><br/>

================================<br/>
FOOD ACT REGISTRATION<br/>
================================<br/>
".$data['health_registration']."<br/><br/>

FOOD SAFETY SUPERVISOR CONTACT DETAILS<br/><br/>

Title: ".$data['fss_title']."<br/>
First Name: ".$data['fss_fn']."<br/>
Last Name: ".$data['fss_ln']."<br/>
Other Names: ".$data['fss_on']."<br/>
Work Phone: ".$data['fss_wf']."<br/>
Home Phone: ".$data['fss_hf']."<br/>
Mobile: ".$data['fss_mo']."<br/>
Fax: ".$data['fss_fx']."<br/>
Email: ".$data['fss_em']."<br/>

CONTACT PERSON ON DAY OF EVENT<br/><br/>
Is the contact person the same as the food safety supervisor? ".$data['contact_same']."<br/><br/>

Title: ".$data['contact_title']."<br/>
First Name: ".$data['contact_fn']."<br/>
Last Name: ".$data['contact_ln']."<br/>
Other Names: ".$data['contact_on']."<br/>
Work Phone: ".$data['contact_wf']."<br/>
Home Phone: ".$data['contact_hf']."<br/>
Mobile: ".$data['contact_mo']."<br/>
Fax: ".$data['contact_fx']."<br/>
Email: ".$data['contact_em']."<br/>
 



================================<br/>
VEHICLE ACCESS & PARKING<br/>
================================<br/>
".$data['vehicle_parking']."<br/><br/>

================================<br/>
INSURANCE & IDEMNITY<br/>
================================<br/>
Insurance certificate: <a href='".base_url().'uploads/'.$data['insurance_cert']."'>Download Here</a><br/><br/>

".$data['idemnity']."<br/><br/>

I agree to Indemnify the Council as per the above Indemnity Statement: ".$data['idemnity_agree']."<br/><br/>

================================<br/>
ACCESSIBILITY<br/>
================================<br/>
".$data['accessibility']."<br/><br/>

================================<br/><br/>
POST-EVENT FEES & CHARGES<br/>
================================<br/>
I have read and clearly understand the St Kilda Festival Fee Structure: ".$data['fees_agree']."<br/><br/>

================================<br/>
TERMS & CONDITIONS<br/>
================================<br/>
I have read, clearly understand and agree to all terms and conditions as outlined in the above documents: ".$data['terms_agree']."<br/><br/>

================================<br/>
DECLARATION<br/>
================================<br/><br/>
I confirm that I have completed this application honestly and to the best of my knowledge and that I have read and clearly understood all information contained within this application process: ".$data['declaration_agree']."<br/><br/>

Below is a link to the Terms & Conditions you have read and agreed to in your online application. We recommend you print these off for your records.<br/><br/>

General Information: <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_34.pdf'>Download Here</a><br/><br/>

General Conditions: <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_37.pdf'>Download Here</a><br/><br/>

Food Trader Checklist : <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_36.pdf'>Download Here</a><br/><br/>
		";
		
		//load email content
		//$data['content'] = $message;
		//$message = $this->load->view('email_template',$data, TRUE);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';	
		$this->email->initialize($config);
		$this->email->from('noreply@stkildafestival.com.au','St Kilda Festival Website');
		$this->email->to('skftraders@portphillip.vic.gov.au');
		//$this->email->cc($data['email']);
		//$this->email->bcc('notify@propagate.com.au , skftraders@portphillip.com.au , skftraders@portphillip.vic.gov.au'); 
		$this->email->bcc('notify@propagate.com.au');
		$this->email->subject('Stallholder Food Application');
		$this->email->message($message);
		$this->email->send();
	}
	
	function form_trader_process()
	{
	  if($this->session->userdata('memberLoggedIn') && $this->session->userdata('memberLoggedIn') == 'Permanent Traders')
	  {
		$strip = array("\r\n", "\n", "\r", ",");
	   if($_POST)
	   {		
		 foreach($_POST as $name => $value) 
		 {
			$value = str_replace($strip," ",$value);
			$value = mysql_real_escape_string($value);
		 }
		
		//$date = $_POST['date']; 
		$data['contact_name'] = $_POST['contact_name']; 
		$data['business_name'] = $_POST['business_name']; 
		$data['abn'] = $_POST['abn']; 
		$data['business_address'] = $_POST['business_address']; 
		$data['business_city'] = $_POST['business_city']; 
		$data['business_state'] = $_POST['business_state']; 
		$data['business_postcode'] = $_POST['business_postcode'];
		if ($_POST['mailing_address'] == "") 
		{
			$data['mailing_address'] = $_POST['business_address']; 
			$data['city'] = $_POST['business_city']; 
			$data['state'] = $_POST['business_state']; 
			$data['postcode'] = $_POST['business_postcode'];
		}
		else
		{
			$data['mailing_address'] = $_POST['mailing_address']; 
			$data['city'] = $_POST['city']; 
			$data['state'] = $_POST['state']; 
			$data['postcode'] = $_POST['postcode'];
		}
		$data['email'] = $_POST['email'];
		$data['confirm_email'] = $_POST['confirm_email'];
		$data['telephone'] = $_POST['telephone_prefix'].$_POST['telephone']; 
		$data['mobile'] = $_POST['mobile'];
		#$data['fax'] = $_POST['fax_prefix'].$_POST['fax'];
		
		#$data['receive_information'] = "N/A";
		#if (isset($_POST['receive_information'])) { $data['receive_information'] = $_POST['receive_information']; }
		
		$data['previous_participant'] = "N/A";
		if (isset($_POST['previous_participant'])) { $data['previous_participant'] = $_POST['previous_participant']; }
		
		$data['total_area'] = $_POST['total_area'];
		
		$data['trading_area_permit'] = "N/A";
		if (isset($_POST['trading_area_permit'])) { $data['trading_area_permit'] = $_POST['trading_area_permit']; }
		
		/*$data['selling_beverages_icecream'] = "N/A";
		if (isset($_POST['selling_beverages_icecream'])) { $data['selling_beverages_icecream'] = $_POST['selling_beverages_icecream']; }
		
		$data['food_registration_number'] = $_POST['food_registration_number'];
		$data['food_list'] = $_POST['food_list'];
		$data['food_list'] = str_replace($strip,"-",$data['food_list']);
		$data['equipment_list'] = $_POST['equipment_list'];
		$data['equipment_list'] = str_replace($strip,"-",$data['equipment_list']);*/
		
		$data['idemnity'] = $_POST['idem_date']." day of ".$_POST['idem_month'].", ".$_POST['idem_year']." by ".$_POST['idem_name'];
		
		$data['idemnity_agree'] = "N/A";
		if (isset($_POST['idemnity_agree'])) { $data['idemnity_agree'] = "Yes"; }
		$data['fees_agree'] = "N/A";
		if (isset($_POST['fees_agree'])) { $data['fees_agree'] = "Yes"; }
		$data['terms_agree'] = "N/A";
		if (isset($_POST['terms_agree'])) { $data['terms_agree'] = "Yes"; }
		$data['declaration_agree'] = "N/A";
		if (isset($_POST['declaration_agree'])) { $data['declaration_agree'] = "Yes"; }
		
		//echo "<pre>". print_r($data,true) ."</pre>";
		
		$newid = $this->User_model->add_permanent_trader($data);
		
		$site_plan = "";
		if ($_FILES['site_plan']['name'] != "") 
		{
			
	  
			
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) 
				{
					if(preg_match("/\b$item\b/i", $_FILES['site_plan']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}
				
				$site_plan = "trader_sp".$newid.$_FILES['site_plan']['name'];
				move_uploaded_file($_FILES['site_plan']['tmp_name'],"uploads/".$site_plan);

		}
		
		$food_act = "";
		/*if ($_FILES['food_act']['name'] != "") 
		{
			
	  
			
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) 
				{
					if(preg_match("/\b$item\b/i", $_FILES['food_act']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}
				
				$food_act = "trader_sp".$newid.$_FILES['food_act']['name'];
				move_uploaded_file($_FILES['food_act']['tmp_name'],"uploads/".$food_act);

		}*/
		
		$liquor_license = "";
		if ($_FILES['liquor_license']['name'] != "") 
		{
			
	  
			
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) 
				{
					if(preg_match("/\b$item\b/i", $_FILES['liquor_license']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}
				
				$liquor_license = "trader_sp".$newid.$_FILES['liquor_license']['name'];
				move_uploaded_file($_FILES['liquor_license']['tmp_name'],"uploads/".$liquor_license);

		}
		
		$insurance_cert = "";
		if ($_FILES['insurance_cert']['name'] != "") 
		{
			
	  
			//$file_type = $_FILES['insurance_cert']['name'];
			//$file_type_length = strlen($file_type) - 3;
			//$file_type = substr($file_type,$file_type_length);
			//if ($file_type == "pdf" || $file_type == "doc" || $file_type == "txt") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item)
				{
					if(preg_match("/\b$item\b/i", $_FILES['insurance_cert']['name']) > 0) 
					{
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}	
				$insurance_cert = "trader_ic".$newid.$_FILES['insurance_cert']['name'];
				move_uploaded_file($_FILES['insurance_cert']['tmp_name'],"uploads/".$insurance_cert);
			
		}
		
		$data['site_plan'] = $site_plan;
		$data['food_act'] = $food_act;
		$data['liquor_license'] = $liquor_license;
		$data['insurance_cert'] = $insurance_cert;
		$this->User_model->update_permanent_trader($newid,$data);
		
		$message = "
		Permanent Trader Application<br/><br/>
		
		Application Number: PT".$newid."<br/>
		================================<br/>
		APPLICANT DETAILS<br/>
		================================<br/>
		Date: ".date('d-m-Y')."<br/>
Contact Name: ".$data['contact_name']."<br/>
Business Name: ".$data['business_name']."<br/>
ABN: ".$data['abn']."<br/>
Business Address: ".$data['business_address']."<br/>
Business City: ".$data['business_city']."<br/>
Business State: ".$data['business_state']."<br/>
Business Postcode: ".$data['business_postcode']."<br/>
Mailing Address: ".$data['mailing_address']."<br/>
City: ".$data['city']."<br/>
State: ".$data['state']."<br/>
Postcode: ".$data['postcode']."<br/>
Email: ".$data['email']."<br/>
Confirm Email: ".$data['confirm_email']."<br/>
Telephone: ".$data['telephone']."<br/>
Mobile: ".$data['mobile']."<br/>
Previous participant: ".$data['previous_participant']."<br/><br/>

================================<br/>
TRADING AREA<br/>
================================<br/><br/>

Total Area : ".$data['total_area']." <br>
Site Plan: <a href='".base_url().'uploads/'.$data['site_plan']."'>Download Here</a><br/><br/>


================================<br/>
FEES PAYABLE<br/>
================================<br/><br/>

Administration Fee $28.80 (GST inclusive) will apply<br/><br/>

Extended Trading Area Permit Fee: ".$data['trading_area_permit']."<br/><br/>


================================<br/>
LIQUOR LICENCE<br/>
================================<br/><br/>

Liquor license: <a href='".base_url().'uploads/'.$data['liquor_license']."'>Download Here</a><br/><br/>

================================<br/><br/>
INSURANCE & IDEMNITY<br/>
================================<br/><br/>
Insurance certificate: <a href='".base_url().'uploads/'.$data['insurance_cert']."'>Download Here</a><br/><br/>

INDEMNITY ".$data['idemnity']."<br/><br/>

I agree to Indemnify the Council as per the above Indemnity Statement: ".$data['idemnity_agree']."<br/><br/>

I have read and clearly understand the St Kilda Festival Fee Structure: ".$data['fees_agree']."<br/><br/>

================================<br/>
TERMS & CONDITIONS<br/>
================================<br/>
I have read, clearly understand and agree to all terms and conditions as outlined in the above documents: ".$data['terms_agree']."<br/>

================================<br/>
DECLARATION<br/>
================================<br/>
I confirm that I have completed this application honestly and to the best of my knowledge and that I have read and clearly understood all information contained within this application process: ".$data['declaration_agree']."<br/>
<br/>
Below is a link to the Terms & Conditions you have read and agreed to in your online application. We recommend you print these off for your records.<br/><br/>

Important Information : <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_105_Permanent_Traders_2015.pdf'>Download Here</a><br/><br/>

General Conditions : <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_106_Permanent_Traders_2015.pdf'>Download Here</a><br/><br/>

Extended Trading Checklist : <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_100_Permanent_Traders_2015.pdf'>Download Here</a><br/><br/>";
		
		//load email content
		//$data['content'] = $message;
		//$message = $this->load->view('email_template',$data, TRUE);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';	
		$this->email->initialize($config);
		$this->email->from('noreply@stkildafestival.com.au','St Kilda Festival Website');
		$this->email->to('skftraders@portphillip.vic.gov.au');
		$this->email->cc($data['email']);
		$this->email->bcc('notify@propagate.com.au, skftraders@portphillip.com.au , skftraders@portphillip.vic.gov.au'); 
		$this->email->subject('Permanent Trader Application');
		$this->email->message($message);
		$this->email->send();
		$this->session->set_flashdata('form_mes','The form has been submitted successfully');
		
		}
		else
		{
			$this->session->set_flashdata('form_mes','Please fill in the details');
			
		}
		redirect(base_url().'page/pt_form');
	  }
	  else
	  {
		  redirect(base_url().'page/member');
	  }
	
	}
	
	function form_market_process()
	{
	  if($this->session->userdata('memberLoggedIn') && $this->session->userdata('memberLoggedIn') == 'Stallholders - Market/General')
	  {
		$strip = array("\r\n", "\n", "\r", ",");
	    if($_POST)
		{
		 foreach($_POST as $name => $value) 
		 {
			$value = str_replace($strip," ",$value);
			//$value = mysql_real_escape_string($value);
		 }
		
		$data['given_name'] = $_POST['given_name']; 
		$data['surname'] = $_POST['surname'];
		$data['business_name'] = $_POST['business_name'];
		$data['abn'] = $_POST['abn'];
		$data['address'] = $_POST['address'];
		$data['suburb'] = $_POST['suburb'];
		$data['state'] = $_POST['state'];
		$data['postcode'] = $_POST['postcode'];
		$data['email'] = $_POST['email'];
		$data['confirm_email'] = $_POST['confirm_email'];
		$data['telephone'] = $_POST['telephone_prefix'].$_POST['telephone']; 
		$data['mobile'] = $_POST['mobile'];
		#$data['fax'] = $_POST['fax_prefix'].$_POST['fax'];
		
		#$data['receive_information'] = "N/A";
		#if (isset($_POST['receive_information'])) { $data['receive_information'] = $_POST['receive_information']; }
		
		$data['previous_participant'] = "N/A";
		if (isset($_POST['previous_participant'])) { $data['previous_participant'] = $_POST['previous_participant']; }
		
		$data['stall_brief_description'] = $_POST['stall_brief_description'];
		
		$data['stall_type'] = "N/A";
		if (isset($_POST['stall_type'])) {$data['stall_type'] = $_POST['stall_type'];}
		
		$stall_size = "N/A";
		if (isset($_POST['stall_size'])) {
			$stall_sizes = $_POST['stall_size'];
			$temp = $stall_sizes[0];
			if ($temp == "Multiple Sites") {
				$temp .= " // Quantity: ".$_POST['stall_size_quantity'].", Size: ".$_POST['stall_size_size'];
			}
			for($i=1;$i<count($stall_sizes);$i++) {
				$temp .= " - ". $stall_sizes[$i];
				if ($stall_sizes[$i] == "Multiple Sites") {
					$temp .= " // Quantity: ".$_POST['stall_size_quantity'].", Size: ".$_POST['stall_size_size'];
				}
			}
			$stall_size = $temp;
		}
		
		$data['stall_size'] = $stall_size;
		
		$stall_location = "N/A";
		if (isset($_POST['stall_location'])) {
			$stall_locations = $_POST['stall_location'];
			$temp = $stall_locations[0];
			if (count($stall_locations) > 1) {
				$temp .= " - ".$stall_locations[1];
			}
			$stall_location_consider = "N/A";
			if (isset($_POST['stall_location_consider'])) {
				$stall_location_consider = $_POST['stall_location_consider'];
			}
			$stall_location = sprintf("
	%s
	I want to be considered for a corner site within my requested zone type: %s",$temp,$stall_location_consider);
		}
		
		$data['stall_location'] = $stall_location;
		
		$product_info = "";
		for($i=1;$i<=25;$i++) {
			 if($_POST['product_name'.$i] != '' && $_POST['product_price'.$i] != '')
		   {
			$product_info .= $_POST['product_name'.$i].':'.$_POST['product_price'.$i];
			
		   }
		}
		$product_info = addslashes($product_info);
		
		$data['product_info'] = $product_info;
		
		
		$hire_package = "N/A";
		if (isset($_POST['hire_package'])) {
			$hire_packages = $_POST['hire_package'];
			$temp = $hire_packages[0];
			for($i=1;$i<count($hire_packages);$i++) {
				$temp .= " - ".$hire_packages[$i];
			}
			$hire_package = $temp;
		}
		
		$data['hire_package'] = $hire_package;
		
		$data['power_option'] = "N/A";
		if (isset($_POST['power_option'])) {
			$data['power_option'] = $_POST['power_option'];
			
		}
		
		$vehicle_parking = "N/A";
		if (isset($_POST['vehicle_parking'])) {
			$vehicle_parkings = $_POST['vehicle_parking'];
			$temp = $vehicle_parkings[0];
			for($i=1;$i<count($vehicle_parkings);$i++) {
				$temp .= " - ".$vehicle_parkings[$i];
			}
			if (isset($_POST['number_vehicle'])) {
				$number_vehicle = $_POST['number_vehicle'];
			}
			else
			{
				$number_vehicle = 0;
			}
			$temp .= " // Number of vehicles: ".$number_vehicle;
			for($i=1;$i<=$number_vehicle;$i++) {
				$temp .= " // Car ".$i.": Registration: ".$_POST['veh_'.$i.'_reg'].", Make: ".$_POST['veh_'.$i.'_make'].", Model: ".$_POST['veh_'.$i.'_model'].", Type: ".$_POST['veh_'.$i.'_type'];
			}
			
			$vehicle_parking = $temp;
			
		}
		
		$data['vehicle_parking'] = $vehicle_parking;
		
		$data['idemnity'] = $_POST['idem_date']." day of ".$_POST['idem_month'].", ".$_POST['idem_year']." by ".$_POST['idem_name'];
	
		$data['idemnity_agree'] = "N/A";
		if (isset($_POST['idemnity_agree'])) { $data['idemnity_agree'] = "Yes"; }
		
		$data['accessibility'] = "N/A";
		if (isset($_POST['accessibility'])) {
			$accessibilities = $_POST['accessibility'];
			$temp = $accessibilities[0];
			for($i=1;$i<count($accessibilities);$i++) {
				$temp .= sprintf("
	%s",$accessibilities[$i]);
			}
			$data['accessibility'] = $temp;
		}
		
		$data['fees_agree'] = "N/A";
		if (isset($_POST['fees_agree'])) { $data['fees_agree'] = "Yes"; }
		
		$data['terms_agree'] = "N/A";
		if (isset($_POST['terms_agree'])) { $data['terms_agree'] = "Yes"; }
		
		$data['declaration_agree'] = "N/A";
		if (isset($_POST['declaration_agree'])) { $data['declaration_agree'] = "Yes"; }
		
		
		//echo "<pre>". print_r($data,true) ."</pre>";
		
		$id = $this->User_model->add_sh_market($data);
		
		$stall_photo = "";
		if ($_FILES['stall_photo']['name'] != "") {
			
			$file_type = $_FILES['stall_photo']['name'];
			$file_type_length = strlen($file_type) - 3;
			$file_type = substr($file_type,$file_type_length);
			//if ($file_type == "jpg" || $file_type == "png" || $file_type == "gif") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['stall_photo']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}
				if (!getimagesize($_FILES['stall_photo']['tmp_name'])) { 
					echo "Invalid Image File..."; 
					exit(); 
				}
				
				$stall_photo = "market_stall_photo".$id.$_FILES['stall_photo']['name'];
				move_uploaded_file($_FILES['stall_photo']['tmp_name'],"uploads/".$stall_photo);
					
		}
		$data['stall_photo'] = $stall_photo;
		
		$insurance_cert = "";
		if ($_FILES['insurance_cert']['name'] != "") {
			
	  
			//$file_type = $_FILES['insurance_cert']['name'];
			//$file_type_length = strlen($file_type) - 3;
			//$file_type = substr($file_type,$file_type_length);
			//if ($file_type == "pdf" || $file_type == "doc" || $file_type == "txt") {
				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
				foreach ($blacklist as $item) {
					if(preg_match("/\b$item\b/i", $_FILES['insurance_cert']['name']) > 0) {
						echo "We do not allow uploading scripting files\n";
						exit;
					}
				}	
				$insurance_cert = "market_ic".$id.$_FILES['insurance_cert']['name'];
				move_uploaded_file($_FILES['insurance_cert']['tmp_name'],"uploads/".$insurance_cert);
				
		}
		$data['insurance_cert'] = $insurance_cert;
		

		
		$this->User_model->update_sh_market($id,$data);
		
		$message = "
		Stallholder Market/General Application<br/><br/>

Application Number: MS".$id."<br/>
================================<br/>
APPLICANT DETAILS<br/>
================================<br/>
Date: ".date('d-m-Y')."<br/>
Given Name: ".$data['given_name']."<br/>
Surname: ".$data['surname']."<br/>
Business Name: ".$data['business_name']."<br/>
ABN: ".$data['abn']."<br/>
Mailing Address: ".$data['address']."<br/>
Suburb: ".$data['suburb']."<br/>
State: ".$data['state']."<br/>
Postcode: ".$data['postcode']."<br/>
Email: ".$data['email']."<br/>
Confirm Email: ".$data['confirm_email']."<br/>
Telephone: ".$data['telephone']."<br/>
Mobile: ".$data['mobile']."<br/>
Previous participant: ".$data['previous_participant']."<br/>
<br/><br/>

================================<br/>
STALL INFORMATION<br/>
================================<br/>
".$data['stall_brief_description']."<br/><br/>

Goods will be sold from: ".$data['stall_type']."<br/><br/>

I wish to occupy: ".$data['stall_size']."<br/><br/>

Image of stall: <a href='".base_url().'uploads/'.$data['stall_photo']."'>Download Here</a><br/><br/>

================================<br/>
STALL LOCATION<br/>
================================<br/>
I wish to be located in a: ".$data['stall_location']."<br/><br/>

================================<br/>
PRODUCTION INFORMATION<br/>
================================<br/>
".$data['product_info']."<br/><br/>

================================<br/>
HIRES<br/>
================================<br/>
".$data['hire_package']."<br/><br/>

================================<br/>
POWER<br/>
================================<br/>
".$data['power_option']."<br/><br/>

================================<br/>
INSURANCE & IDEMNITY<br/>
================================<br/>
Insurance certificate: <a href='".base_url().'uploads/'.$data['insurance_cert']."'>Download Here</a><br/><br/>

".$data['idemnity']."<br/><br/>

Agree: ".$data['idemnity_agree']."<br/><br/>

================================<br/>
ACCESSIBILITY<br/>
================================<br/>
".$data['accessibility']."<br/><br/>

================================<br/>
FEES & CHARGES<br/>
================================<br/>
Agree: ".$data['fees_agree']."<br/><br/>

================================<br/>
TERMS & CONDITIONS<br/>
================================<br/>
Agree: ".$data['terms_agree']."<br/><br/>

================================<br/>
DECLARATION<br/>
================================<br/>
Agree: ".$data['declaration_agree']."<br/><br/>

Below is a link to the Terms & Conditions you have read and agreed to in your online application. We recommend you print these off for your records.<br/><br/>

General Conditions: <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_406_Itinerant_MARKET_Traders_2015.pdf'>Download Here</a><br/><br/>

Important Information - Market Stall: <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_405_Itinerant_MARKET_Traders_2015.pdf'>Download Here</a><br/><br/>

Market Trader Checklist: <a href='http://www.stkildafestival.com.au/callforentries/uploads/Doc_400_Itinerant_MARKET_Traders_2015.pdf'>Download Here</a><br/><br/>
		";
		
		//load email content
		//$data['content'] = $message;
		//$message = $this->load->view('email_template',$data, TRUE);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';	
		$this->email->initialize($config);
		$this->email->from('noreply@stkildafestival.com.au','St Kilda Festival Website');
		$this->email->to('skftraders@portphillip.vic.gov.au');
		$this->email->cc($data['email']);
		$this->email->bcc('notify@propagate.com.au , skftraders@portphillip.com.au , skftraders@portphillip.vic.gov.au'); 
		//$this->email->bcc('notify@propagate.com.au','skftraders@portphillip.vic.gov.au');
		
		//$this->email->to('rseptiane@gmail.com');
		$this->email->subject('Stallholder Market/General Application');
		$this->email->message($message);
		$this->email->send();
		$this->session->set_flashdata('form_mes','The form has been submitted successfully');
		//redirect(base_url().'page/sh_market_form');
		}
		else
		{
			$this->session->set_flashdata('form_mes','Please fill in the details');
			
		}
		redirect(base_url().'page/sh_market_form');
	  }
	  else
	  {
		  redirect(base_url().'page/member');
	  }
	}
	
	
	
	/**
		Updated Function 30 June, 2016
	*/
	
	
	/**
		$data = array(
					'dir',
					'max_size',
					'allowed_types'
				);
		add paramaters as needed
	*/
	function _add_file($data)
	{
		$dir = $data['dir'];
		$this->_create_dir($dir);
		
		$config['upload_path'] = $dir;
		$config['allowed_types'] = $data['allowed_types'];
		$config['max_size']	= $data['max_size']; // in MB
		$config['overwrite'] = FALSE;
		$config['remove_space'] = TRUE;
		
		$this->load->library('upload', $config);
	
		if ($this->upload->do_upload($data['field_name'])) {
			$upload_data = $this->upload->data();
			return $upload_data['file_name'];
		}else{			
			#print_r($this->upload->display_errors());exit;
			return false;	
		}
	}
	
	# check if dir exist and create a new one if it does not
	function _create_dir($dir){
		if(!is_dir($dir)){
		  mkdir($dir);
		  chmod($dir,0777);
		  $fp = fopen($dir.'/index.html', 'w');
		  fwrite($fp, '<html><head>Permission Denied</head><body><h3>Permission denied</h3></body></html>');
		  fclose($fp);
		}	
	}
}
?>
