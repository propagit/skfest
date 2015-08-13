<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();   
        $this->load->model('Csv_model');
	}
			
	# Private function: check authentication and load neccessary models	
	function check_authentication() 
	{
		if(!$this->session->userdata('cdkAdminloggedIn')) 
		{
			
			redirect('admin/cms/login');
		}		
	}
	function index() {
		
	}
	
	function subscribe_to_csv()
	{
		$subs = $this->Csv_model->get_subscribe();
		
		//echo "<pre>". print_r($subs,true) ."</pre>";
		
		//exit;
		
		ob_start();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename=subscribe.csv');
		header('Expires: 0');
		header("Content-Transfer-Encoding: binary");
		// Generate the server headers
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
			header('Pragma: no-cache');
		}
		  
		$header = "Subscribe\r\n";  
		$csv_output = '';

		if($subs)
		{
			foreach($subs as $sub)
			{
				//$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",date('d/m/Y H:i:s',strtotime($sub['content'])))."\r\n";
				$email = $sub['email'];
				//$email = substr($email,strpos($email,'~'),(strlen($email)-strpos($email,'~'))+1);
				//$email = substr($email,1,strlen($email)-2);
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$email)."\r\n";
				//echo $email.'<br/>';
			 }
		}
		  
		echo $header.$csv_output;
		ob_end_flush();
	}
	
	function stallholder_food_app_to_csv()
	{
		$foods = $this->Csv_model->get_stallfood_holder_app();
		
		//echo "<pre>". print_r($subs,true) ."</pre>";
		
		//exit;
		
		ob_start();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename=stallfood_holder_application.csv');
		header('Expires: 0');
		header("Content-Transfer-Encoding: binary");
		// Generate the server headers
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
			header('Pragma: no-cache');
		}
		  
		#$header = "Application Number,Date,Given Name,Surname,Business Name,ABN,Address,Suburb,State,Postcode,Email,Confirm Email,Receive information,Telephone,Mobile,Fax,Previous Participant,Stall Brief Desc,Stall Type,Stall Width,Stall Depth,Stall Height,Stall Towbar,Stall Towbar Length,Stall Photo,Product Info,Coolroom,Coolroom Width,Coolroom Depth,Coolroom Length,Coolroom Photo,Power required for cool room,Hire Package,Power Option,Food Act Registration,Food Safety Supervisor Title,Food Safety Supervisor First name,Food Safety Supervisor Last name,Food Safety Supervisor Other names,Food Safety Supervisor Work phone,Food Safety Supervisor Home phone,Food Safety Supervisor Mobile,Food Safety Supervisor Fax,Food Safety Supervisor Email,Contact person Title,Contact person First name,Contact person Last name,Contact person Other names,Contact person Work phone,Contact person Home phone,Contact person Mobile,Contact person Fax,Contact person Email,Registration Certificate form (Class 2 & 3 Traders) or Notification Form here (Class 4 Traders),Completed Statement of Trade form,Completed Victorian Food Safety Program for events pages 2 & 3,Vehicle Parking,Insurance Cert,Idemnity,Idemnity Agree,Accessibility,Fees Agree,Terms Agree,Declaration Agree\r\n";  
		
		$header = "Application Number,Date,Given Name,Surname,Business Name,ABN,Address,Suburb,State,Postcode,Email,Confirm Email,Telephone,Mobile,Previous Participant,Stall Brief Desc,Stall Type,Stall Width,Stall Depth,Stall Height,Stall Towbar,Stall Towbar Length,Stall Photo,Product Info,Coolroom,Coolroom Width,Coolroom Depth,Coolroom Length,Coolroom Photo,Power required for cool room,Hire Package,Power Option,Food Act Registration,Registration Certificate form (Class 2 & 3 Traders) or Notification Form here (Class 4 Traders),Completed Statement of Trade form,Insurance Cert,Idemnity,Idemnity Agree,Accessibility,Fees Agree,Terms Agree,Declaration Agree\r\n"; 
		$csv_output = '';

		if($foods)
		{
			foreach($foods as $food)
			{
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['id']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['date']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['given_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['surname']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['business_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['abn']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['address']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['suburb']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['state']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['postcode']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['email']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['confirm_email']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['receive_information']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['telephone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['mobile']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fax']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['previous_participant']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_brief_description']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_type']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_width']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_depth']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_height']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_towbar']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_towbar_length']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_photo']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['product_info']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['coolroom']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['coolroom_width']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['coolroom_depth']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['coolroom_length']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['coolroom_photo']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['power_required_coolroom']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['hire_package']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['power_option']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['health_registration']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fss_title']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fss_fn']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fss_ln']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fss_on']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fss_wf']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fss_hf']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fss_mo']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fss_fx']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fss_em']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contact_title']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contact_fn']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contact_ln']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contact_on']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contact_wf']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contact_hf']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contact_mo']).',';
				#csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contact_fx']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contact_em']).',';
				
				/*if($food['mfv_registration']!=''){
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['mfv_registration']).',';}
				else{$csv_output .='- ,';}*/
				
				//$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['mfv_registration']).',';
				if($food['trade_statement']!=''){
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['trade_statement']).',';}
				else{$csv_output .='- ,';}
				
				//$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['trade_statement']).',';
				/*if($food['victorian_food_safety']!=''){
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['victorian_food_safety']).',';}
				else{$csv_output .='- ,';}*/
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['vehicle_parking']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['insurance_cert']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['idemnity']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['idemnity_agree']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['accessibility']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fees_agree']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['terms_agree']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['declaration_agree']);
				$csv_output .= "\r\n";
			 }
		}
		  
		echo $header.$csv_output;
		ob_end_flush();
	}
	
	function stallholder_market_app_to_csv()
	{
		$foods = $this->Csv_model->get_stallmarket_holder_app();
		
		//echo "<pre>". print_r($subs,true) ."</pre>";
		
		//exit;
		
		ob_start();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename=stallmarket_holder_application.csv');
		header('Expires: 0');
		header("Content-Transfer-Encoding: binary");
		// Generate the server headers
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
			header('Pragma: no-cache');
		}
		  
		#$header = "Application Number,Date,Given Name,Surname,Business Name,ABN,Address,Suburb,State,Postcode,Email,Confirm Email,Receive information,Phone,Mobile,Fax,Previous Participant,Stall Brief Description,Stall Type,Stall Size,Stall Photo,Stall Location,Product Info,Hire Package,Power Option,Vehicle Parking,Insurance Cert,Indemnity,Idemnity Agree,Accessibility,Fees Argee,Terms Agree,Declaration Agree\r\n";  
		$header = "Application Number,Date,Given Name,Surname,Business Name,ABN,Address,Suburb,State,Postcode,Email,Confirm Email,Phone,Mobile,Previous Participant,Stall Brief Description,Stall Type,Stall Size,Stall Photo,Stall Location,Product Info,Hire Package,Power Option,Insurance Cert,Indemnity,Idemnity Agree,Accessibility,Fees Argee,Terms Agree,Declaration Agree\r\n"; 
		$csv_output = '';

		if($foods)
		{
			foreach($foods as $food)
			{
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['id']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['date']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['given_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['surname']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['business_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['abn']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['address']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['suburb']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['state']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['postcode']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['email']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['confirm_email']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['receive_information']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['telephone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['mobile']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fax']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['previous_participant']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_brief_description']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_type']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_size']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_photo']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['stall_location']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['product_info']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['hire_package']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['power_option']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['vehicle_parking']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['insurance_cert']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['idemnity']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['idemnity_agree']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['accessibility']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fees_agree']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['terms_agree']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['declaration_agree']);
				$csv_output .= "\r\n";
			 }
		}
		  
		echo $header.$csv_output;
		ob_end_flush();
	}
	
	function permanent_trader_app_to_csv()
	{
		$foods = $this->Csv_model->get_permanent_trader_app();
		
		//echo "<pre>". print_r($subs,true) ."</pre>";
		
		//exit;
		
		ob_start();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename=permanent_trader_application.csv');
		header('Expires: 0');
		header("Content-Transfer-Encoding: binary");
		// Generate the server headers
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
			header('Pragma: no-cache');
		}
		  
		#$header = "Application Number,Date,Contact Name,Business Name,ABN,Business Address,Business city/town,Business State,Business Postcode,Mailing Address,State,Postcode,Email,Confirm Email,Receive information,Phone,Mobile,Fax,Previous Participant,Festival Site Plan,Total Area,Food Notif,Extended Trading Area,Temporary Food Premises,Temporary Food Premises Location,Food Act Registration Number,List of food,List of equipments,Liquoir License,Insurance Cert,Indemnity,Idemnity Agree,Fees Argee,Terms Agree,Declaration Agree\r\n"; 
		$header = "Application Number,Date,Contact Name,Business Name,ABN,Business Address,Business city/town,Business State,Business Postcode,Mailing Address,State,Postcode,Email,Confirm Email,Phone,Mobile,Previous Participant,Festival Site Plan,Total Area,Food Notif,Extended Trading Area,Temporary Food Premises,Temporary Food Premises Location,Food Act Registration Number,List of food,List of equipments,Liquoir License,Insurance Cert,Indemnity,Idemnity Agree,Fees Argee,Terms Agree,Declaration Agree\r\n";   
		$csv_output = '';

		if($foods)
		{
			foreach($foods as $food)
			{
				$food_act = "<a href='".base_url().'uploads/'.$food['food_act']."'>download here</a>";
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['id']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['date']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contact_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['business_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['abn']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['business_address']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['business_city']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['business_state']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['business_postcode']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['mailing_address']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['state']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['postcode']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['email']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['confirm_email']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['receive_information']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['telephone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['mobile']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fax']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['previous_participant']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['site_plan']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['total_area']).',';
				//$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['food_act']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food_act).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['trading_area_permit']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['food_premises_permit']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['food_premises_location']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['food_registration_number']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['food_list']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['equipment_list']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['liquor_license']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['insurance_cert']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['idemnity']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['idemnity_agree']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fees_agree']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['terms_agree']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['declaration_agree']).',';
				$csv_output .= "\r\n";
			 }
		}
		  
		echo $header.$csv_output;
		ob_end_flush();
	}
	
	function design_competition_to_csv()
	{
		$foods = $this->Csv_model->get_design_competition();
		
		//echo "<pre>". print_r($subs,true) ."</pre>";
		
		//exit;
		
		ob_start();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename=design_competition.csv');
		header('Expires: 0');
		header("Content-Transfer-Encoding: binary");
		// Generate the server headers
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
			header('Pragma: no-cache');
		}
		  
		$header = "id,Firstname,Surname,Phone,Email,File,File Link,Live/Work/Study in City of Port Philip,Details\r\n";  
		$csv_output = '';

		if($foods)
		{
			foreach($foods as $food)
			{
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['id']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['firstname']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['lastname']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['phone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['email']).',';
				
				# file
				if($food['file']){
					$file_info = '';
					$file_info = json_decode($food['file']);
					$csv_output .= $file_info->file_name . ',' . $file_info->file_path . ',';
				}else{
					$csv_output .= 'NA,NA,'; 
				}
				
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['lws']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['details']).',';
				
				$csv_output .= "\r\n";
			 }
		}
		  
		echo $header.$csv_output;
		ob_end_flush();
	}
	
	function email_subscription_to_csv()
	{
		$foods = $this->Csv_model->get_email_subscription();
		
		//echo "<pre>". print_r($subs,true) ."</pre>";
		
		//exit;
		
		ob_start();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename=Email_Subscription.csv');
		header('Expires: 0');
		header("Content-Transfer-Encoding: binary");
		// Generate the server headers
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
			header('Pragma: no-cache');
		}
		  
		$header = "id,Name,Lastname,Postcode,Phone,Email\r\n";  
		$csv_output = '';

		if($foods)
		{
			foreach($foods as $food)
			{
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['id']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['lastname']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['postcode']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['phone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['email']).',';
				
				$csv_output .= "\r\n";
			 }
		}
		  
		echo $header.$csv_output;
		ob_end_flush();
	}
	
	function expression_of_interest_to_csv()
	{
		$foods = $this->Csv_model->get_expression_of_interest();
		
		//echo "<pre>". print_r($subs,true) ."</pre>";
		
		//exit;
		
		ob_start();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename=Expression_of_Interest.csv');
		header('Expires: 0');
		header("Content-Transfer-Encoding: binary");
		// Generate the server headers
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
			header('Pragma: no-cache');
		}
		  
		$header = "id,Yalukit,Contact Name,Business Name,Address,Suburb,State,Postcode,Email,Phone,Website,Detail,Yalukit Before\r\n";  
		$csv_output = '';

		if($foods)
		{
			foreach($foods as $food)
			{
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['id']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['yalukit']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['business']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['address']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['suburb']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['state']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['postcode']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['email']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['phone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['web']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['detail']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['yalukit_bfr']).',';
				
				$csv_output .= "\r\n";
			 }
		}
		  
		echo $header.$csv_output;
		ob_end_flush();
	}
	
	function community_grants_to_csv()
	{
		$foods = $this->Csv_model->get_community_grants();
		
		//echo "<pre>". print_r($subs,true) ."</pre>";
		
		//exit;
		
		ob_start();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename=Community_Grants.csv');
		header('Expires: 0');
		header("Content-Transfer-Encoding: binary");
		// Generate the server headers
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
			header('Pragma: no-cache');
		}
		  
		$header = "id,Group Name,Event/Activity,Within Port Phillip,Group Benefit,Festival Benefit,Amount,Funding For,Contact Name,Contact Phone,Contact Email\r\n";  
		$csv_output = '';

		if($foods)
		{
			foreach($foods as $food)
			{
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['id']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['group']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['event']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['withinpp']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['group_benefit']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['festival_benefit']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['amount']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['funding_for']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['ct_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['ct_phone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['ct_email']).',';
				
				$csv_output .= "\r\n";
			 }
		}
		  
		echo $header.$csv_output;
		ob_end_flush();
	}
	
	function event_proposal_to_csv()
	{
		$foods = $this->Csv_model->get_event_proposal();
		
		//echo "<pre>". print_r($foods,true) ."</pre>";
		
		//exit;
		
		ob_start();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename=event_activity_proposal.csv');
		header('Expires: 0');
		header("Content-Transfer-Encoding: binary");
		// Generate the server headers
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
			header('Pragma: no-cache');
		}
		  
		$header = "id,Contact Name,Contact Address,Contact Email,Contact Phone,Activity,Group Name,Event Description,Considered For,Referees,Requirements,Manage Impact,Website\r\n";  
		$csv_output = '';

		if($foods)
		{
			foreach($foods as $food)
			{
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['id']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['ct_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['ct_address']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['ct_email']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['ct_phone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['activity']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['group_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['event_desc']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['considered_for']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['referees']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['requirements']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['manage_impact']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['website']).',';
				
				$csv_output .= "\r\n";
			 }
		}
		  
		echo $header.$csv_output;
		ob_end_flush();
	}
	
	function host_to_csv()
	{
		$foods = $this->Csv_model->get_host();
		
		//echo "<pre>". print_r($subs,true) ."</pre>";
		
		//exit;
		
		ob_start();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename=business_host.csv');
		header('Expires: 0');
		header("Content-Transfer-Encoding: binary");
		// Generate the server headers
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
			header('Pragma: no-cache');
		}
		  
		#$header = "id,Business Name,Contact Name,Address,Phone,Email,Website,Business Type,Availability,Night Description,Equipment,Equipment Description,Comedy Host,Logo,Social Media,Activity During Festival\r\n";
		$header = "id,Business Name,Contact Name,Address,Phone,Email,Website,Business Type,Availability,Night Description,Equipment,Equipment Description,Host Other Events,Social Media,Activity During Festival\r\n";  
		$csv_output = '';

		if($foods)
		{
			foreach($foods as $food)
			{
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['id']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['business_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['ct_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['address']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['phone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['email']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['website']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['business_type']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['availability']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['night_desc']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['equipment']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['equipment_desc']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['comedy_host']).',';
				#$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['logo']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['forum_host']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['social_media']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['activity']).',';
				
				$csv_output .= "\r\n";
			 }
		}
		  
		echo $header.$csv_output;
		ob_end_flush();
	}
	
	function musicians_to_csv()
	{
		$foods = $this->Csv_model->get_musicians();
		
		//echo "<pre>". print_r($subs,true) ."</pre>";
		
		//exit;
		
		ob_start();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename=musicians_entry.csv');
		header('Expires: 0');
		header("Content-Transfer-Encoding: binary");
		// Generate the server headers
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
			header('Pragma: no-cache');
		}
		  
		#$header = "id,Band Name,Music Type,Contact Name,Phone,Alt Phone,Email,Track1,Track2,Receive Email,Live Work Study,Band Member Name,Role,Suburb Live Work Study,Mailing Address,Place Of Work/Study,Band Details,Band Website,Band Online,Willing To Play,Equipment,Previous,Push Stage,Fee Exempt,Payment Method,Contact Email,Billing Name,Billing Address,Payment Number\r\n"; 
		
		$header = "id,Band Name,Music Type,Contact Name,Phone,Alt Phone,Email,Track1,Track2,File Name,File Link,Receive Email,Live Work Study,Band Member Name,Role,Suburb Live Work Study,Mailing Address,Place Of Work/Study,Band Details,Band Website,Facebook,Youtube,Twitter, Other Weblinks, Short Bio, Long Bio,Willing To Play,Equipment,Previous,Push Stage,Fee Exempt,Payment Method,Contact Email,Billing Name,Billing Address,Payment Number\r\n"; 
		 
		$csv_output = '';

		if($foods)
		{
			foreach($foods as $food)
			{
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['id']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['bandname']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['musictype']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contactname']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['phone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['alt_phone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['email']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['track1']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['track2']).',';
				
				# file
				if($food['file']){
					$file_info = '';
					$file_info = json_decode($food['file']);
					$csv_output .= $file_info->file_name . ',' . $file_info->file_path . ',';
				}else{
					$csv_output .= 'NA,NA,'; 
				}	
				
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['receive_email']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['live_work_study']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['band_member_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['role_in_band']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['suburb_live_work_study']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['mailing_address']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['work_address']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['band_details']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['band_website']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['facebook']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['youtube']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['twitter']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['other_weblinks']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['biography_short']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['biography_long']).',';	
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['play_push_stage']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['willing_to_play']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['equipment']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['previous']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['push_stage']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['fee_exempt']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['payment_method']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contact_email']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['billing_name']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['billing_address']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['payment_number']).',';
	
				$csv_output .= "\r\n";
			 }
		}
		  
		echo $header.$csv_output;
		ob_end_flush();
	}
	
	function children_entertainers_to_csv()
	{
		$foods = $this->Csv_model->get_children_entertainers();
		
		//echo "<pre>". print_r($subs,true) ."</pre>";
		
		//exit;
		
		ob_start();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename=children_entertainers.csv');
		header('Expires: 0');
		header("Content-Transfer-Encoding: binary");
		// Generate the server headers
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
			header('Pragma: no-cache');
		}
		  
		$header = "id,Contact Name,Individual Name,Performance Type,Phone,Alt Phone,Email,Website,Receive Email,Live Work Study,Experience\r\n";  
		$csv_output = '';

		if($foods)
		{
			foreach($foods as $food)
			{
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['id']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['contactname']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['individualname']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['performancetype']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['phone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['alt_phone']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['email']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['webaddress']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['receive_email']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['live_work_study']).',';
				$csv_output .= str_replace(array("\r", "\r\n", "\n", ","), "-",$food['band_details']).',';
				
				$csv_output .= "\r\n";
			 }
		}
		  
		echo $header.$csv_output;
		ob_end_flush();
	}
}
?>