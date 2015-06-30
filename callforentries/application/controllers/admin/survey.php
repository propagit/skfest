<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();   
        $this->load->model('Survey_model');
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
		$this->check_authentication();
		$data['survey'] = $this->Survey_model->get_all_survey();
		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/survey/list',$data);
		$this->load->view('admin/footer');		
	}
	function add() {
		/*
		$this->load->model('Cute_model');
		$this->Cute_model->init();
		$this->Cute_model->setConfigure("Simple");
		$this->Cute_model->setWidth("600px");
		$this->Cute_model->setHeight("300px");
		*/
		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/news_sticker/add');
		$this->load->view('admin/footer');		
	}
	
	function adding() {
		$published = 0;
		if (isset($_POST['published'])) { $published = 1; }
		$data = array(
			'heading' => $_POST['heading'],
			'subheading' => $_POST['subheading'],
			'description' => $_POST['description'],
			'url'     => $_POST['url'],
			'created' => date('Y-m-d H:i:s'),
			'published' => $published
		);
		$news_id = $this->News_sticker_model->add($data);
		$image = '';
		$config['upload_path'] = "./photos/news_sticker";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048'; // 2 MB
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		$config['overwrite'] = FALSE;
		$config['remove_space'] = TRUE;
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error_addimage',$this->upload->display_errors());			
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$image = $data['upload_data']['file_name'];
			
			
			$width = $data['upload_data']['image_width'];
			$height = $data['upload_data']['image_height'];
			if ($width > 600 || $height > 400) {
				$config = array();
				// Resize image
				$config['source_image'] = "./photos/news_sticker/".$image;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = 100;
				$config['width'] = 600;
				$config['height'] = 400;
				$config['master_dim'] = 'auto';
				$this->load->library('image_lib');
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				unlink("./photos/news_sticker/".$image);
				rename("./photos/news_sticker/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./photos/news_sticker/".$image);
				$this->image_lib->clear();
			}
						
			
			# Thumbnail creation
			$config = array();
			$config['source_image'] = "./photos/news_sticker/".$image;
			$config['create_thumb'] = TRUE;
			$config['new_image'] = "./photos/news_sticker/thumbnails/".$image;
			$config['maintain_ratio'] = TRUE;
			$config['quality'] = 100;
			if ($width < $height) {		
				$config['width'] = 100;
				$config['height'] = intval(100 * ($height/$width));
			} else {				
				$config['width'] = intval(100 * ($width/$height));
				$config['height'] = 100;
			}
			$this->load->library('image_lib');
			$this->image_lib->clear();
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			rename("./photos/news_sticker/thumbnails/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./photos/news_sticker/thumbnails/".$image);
			$this->image_lib->clear();
			
			# Crop thumbnail			
			$config['image_library'] = 'GD2';
			$config['source_image'] = "./photos/news_sticker/thumbnails/".$image;
			
			$config['width'] = 90;
			$config['height'] = 90;
			if ($width > $height) {
				$config['x_axis'] = 5;
				$config['y_axis'] = 0;
			} else {
				$config['x_axis'] = 0;
				$config['y_axis'] = 5;
			}
			$config['maintain_ratio'] = FALSE;
			$this->image_lib->initialize($config);
			$crop_thumbnail = $this->image_lib->crop();
			if ( ! $crop_thumbnail)
			{
				$this->session->set_flashdata('error_addimage',$this->upload->display_errors());
			}
			unlink("./photos/news_sticker/thumbnails/".$image);
			rename("./photos/news_sticker/thumbnails/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./photos/news_sticker/thumbnails/".$image);
			
		}

		
		$this->News_sticker_model->update($news_id,array('image' => $image, 'news_order' => $news_id));
		redirect('admin/news_sticker');
	}
	
	function edit($news_id='') {
		$data['news'] = $this->News_sticker_model->id($news_id);
		/*
		$this->load->model('Cute_model');
		$this->Cute_model->init();
		$this->Cute_model->setConfigure("Simple");
		$this->Cute_model->setWidth("600px");
		$this->Cute_model->setHeight("300px");
		*/
		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/news_sticker/edit',$data);
		$this->load->view('admin/footer');		
	}
	function update() {
		$id = $_POST['news_id'];
		$published = 0;
		if (isset($_POST['published'])) {
			$published = 1;
		}
		$image = '';
		$config['upload_path'] = "./photos/news_sticker";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048'; // 2 MB
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		$config['overwrite'] = FALSE;
		$config['remove_space'] = TRUE;
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error_addimage',$this->upload->display_errors());			
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$image = $data['upload_data']['file_name'];
			
			$width = $data['upload_data']['image_width'];
			$height = $data['upload_data']['image_height'];
			if ($width > 600 || $height > 400) {
				$config = array();
				// Resize image
				$config['source_image'] = "./photos/news_sticker/".$image;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = 100;
				if ($width < $height) {		
				$config['width'] = 600;
				$config['height'] = intval(400 * ($height/$width));
			    
			} else {				
				$config['width'] = intval(600 * ($width/$height));
				$config['height'] = 400;
			}
				$this->load->library('image_lib');
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				//unlink("./photos/news/".$image);
				//rename("./photos/news/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./photos/news/".$image);
				$this->image_lib->clear();
						# Crop thumbnail			
			   $config['image_library'] = 'GD2';
			   $config['source_image'] = "./photos/news_sticker/".$image;
			    $config['width'] = 600;
				$config['height'] = 400;
			   if ($width < $height) {	
				$config['x_axis'] = 0;
				$config['y_axis'] = intval(400 * ($height/$width)) - 400;
			   }
			   else {	
				$config['x_axis'] =  intval(600 * ($width/$height)) - 600;
				$config['y_axis'] = 0;
			   }
			    $config['maintain_ratio'] = FALSE;
			    $this->image_lib->initialize($config);
			    $crop_thumbnail = $this->image_lib->crop();
			    if ( ! $crop_thumbnail)
			    {
				 $this->session->set_flashdata('error_addimage',$this->upload->display_errors());
		    	}
				unlink("./photos/news_sticker/".$image);
				rename("./photos/news_sticker/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./photos/news_sticker/".$image);
			}
						
			
			# Thumbnail creation
			$config = array();
			$config['source_image'] = "./photos/news_sticker/".$image;
			$config['create_thumb'] = TRUE;
			$config['new_image'] = "./photos/news_sticker/thumbnails/".$image;
			$config['maintain_ratio'] = TRUE;
			$config['quality'] = 100;
			if ($width < $height) {		
				$config['width'] = 100;
				$config['height'] = intval(100 * ($height/$width));
			} else {				
				$config['width'] = intval(100 * ($width/$height));
				$config['height'] = 100;
			}
			$this->load->library('image_lib');
			$this->image_lib->clear();
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			rename("./photos/news_sticker/thumbnails/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./photos/news_sticker/thumbnails/".$image);
			$this->image_lib->clear();
			
			# Crop thumbnail			
			$config['image_library'] = 'GD2';
			$config['source_image'] = "./photos/news_sticker/thumbnails/".$image;
			
			$config['width'] = 90;
			$config['height'] = 90;
			if ($width > $height) {
				$config['x_axis'] = 5;
				$config['y_axis'] = 0;
			} else {
				$config['x_axis'] = 0;
				$config['y_axis'] = 5;
			}
			$config['maintain_ratio'] = FALSE;
			$this->image_lib->initialize($config);
			$crop_thumbnail = $this->image_lib->crop();
			if ( ! $crop_thumbnail)
			{
				$this->session->set_flashdata('error_addimage',$this->upload->display_errors());
			}
			unlink("./photos/news_sticker/thumbnails/".$image);
			rename("./photos/news_sticker/thumbnails/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./photos/news_sticker/thumbnails/".$image);
		}
		$data = array(
			'heading' => $_POST['heading'],
			'subheading' => $_POST['subheading'],
			'description' => $_POST['description'],
			'url'     => $_POST['url'],
			'published' => $published,
			'modified' => date('Y-m-d H:i:s')
		);
		if (isset($image) && !empty($image)) { $data['image'] = $image; }
		$this->News_sticker_model->update($id,$data);
		redirect('admin/news_sticker/edit/'.$id);
	}
	function reorder() {
		$array = $_POST['news'];
		if ($_POST['update'] == "update"){			
			$count = 1;
			for($i=count($array)-1;$i>=0;$i--) {
			#foreach ($array as $idval) {
				$this->News_sticker_model->update($array[$i],array('news_order' => $count));
				$count ++;	
			}	
		}
	}
	function switchstatus() {
		$news = $this->News_sticker_model->id($_POST['id']);
		if ($news['published']) {
			$this->News_sticker_model->update($news['id'],array('published' => 0));
			print base_url().'img/icon-unpublished.png';
		} else {
			$this->News_sticker_model->update($news['id'],array('published' => 1));
			print base_url().'img/icon-published.png';
		}
	}
	function delete() {
		$this->News_sticker_model->delete($_POST['id']);
	}
}
?>