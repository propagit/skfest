<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();   
		
        $this->load->model('Menu_model'); 
        $this->load->model('Gallery_model');      
        $this->load->model('User_model'); 
		$this->load->model('Cute_model');
		$this->load->model('Cute_model2');    		
	}
	
	#Dashboard
	function index()
	{
		$this->check_authentication();
		$this->load->view('admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/navigation');
		$this->load->view('admin/footer');
	}
	
	# Check authentication and load neccessary models
	function check_authentication() 
	{
		if(!$this->session->userdata('cdkAdminloggedIn')) 
		{
			
			redirect('login');
		}
		//$this->load->model('Page_model');
		
		//$this->load->model('Menu_model');
		//$this->load->model('Page_Menu_model');
		//$this->load->model('Document_model');
		//$this->load->model('Project_model');
	}
	
	# Log in
	function login() 
	{
		if (isset($_POST['username']) && isset($_POST['password'])) {
			
			$user = $this->User_model->authenticate($_POST);
			if ($user) {
				$this->session->set_userdata('cdkAdminloggedIn', $user['id']);
				redirect('admin');
			}
			else
			{
				
				$this->session->set_flashdata('error_authentication','Wrong username/password');
			}
		}
		
		$this->load->view('admin/login');
		$this->load->view('admin/footer');
	}
	
	# Log out and delete session data
	function logout() 
	{
		//$this->session->unset_userdata('fitnationAdminloggedIn');
		$this->session->sess_destroy();
		redirect('admin');
	}
	
	/** PAGE MANAGER SECTION **/
	/*
	function page_manager() 
	{
		
		
		$this->check_authentication();
	
		$categories = $this->Page_model->get_categories();
		
		
		$categories_list = '';
		foreach($categories as $category) {
	      if($category['id']!=6)
		  {
			if ($category['parent'] == 0) {
				$categories_list .= '<option value="'.$category['id'].'">'.$category['title'].'</option>';
			}
			else {
				$parent = $this->Page_model->get_category($category['parent']);
				$categories_list .= '<option value="'.$category['id'].'">'.$parent['title'].' -- '.$category['title'].'</option>';
			}
		  }
		}
		
		$data['categories_list'] = $categories_list;
		$data['languages'] = $this->Page_model->get_languages();
		$data['templates'] = $this->Page_model->get_templates();
		$data['galleries'] = $this->Gallery_model->get_galleries();
		$data['menus'] = $this->Page_Menu_model->get_page_menus();
		
		$this->load->model('Cute_model');
		$this->Cute_model->init();
		
		$this->load->view('admin/header-big');
		
		$this->load->view('admin/cms/page-manager',$data);
	
		
		$this->load->view('admin/footer');
		
	}
	
	# Get pages list by category and language
	function get_pages_list() 
	{
		$this->check_authentication();
		$cid = $_POST['cid'];
		$lid = $_POST['lid'];
		$pages = $this->Page_model->get_pages($cid,$lid);
		if (count($pages) == 0) {
			print '<p>There is no page in this section yet! Click the <b><u>Add page</u></b> button above to create new page for this section.</p>';
		}
		else {
			$output = '';
			foreach($pages as $page) {
				$category = $this->Page_model->get_category($page['category_id']);
				$view_link = base_url().$category['name'].'/'.$page['name'];
				
				$output .= '<div class="page-row" id="page-row-'.$page['id'].'">';
				$output .= '<div class="page-name">'.$page['title'].'</div>';
				$output .= '<div class="page-view"><a href="'.$view_link.'" target="_blank"><img src="'.base_url().'images/icon-view.png" /></a></div>';
				$output .= '<div class="page-view"><a href="#"><img src="'.base_url().'images/icon-properties.png" onClick="page_properties('.$page['id'].');" title="Update Properties" /></a></div>';
				$output .= '<div class="page-view"><a href="#"><img src="'.base_url().'images/icon-edit.png" onClick="page_content('.$page['id'].');" title="Update Content" /></a></div>';
				$output .= '<div class="page-view"><a href="#"><img src="'.base_url().'images/icon-delete.png" onClick="return page_delete('.$page['id'].');" title="Delete" /></a></div>';
				$is_published = $page['published'];
				$published = "";
				if ($is_published == 1) {
					$published = "published";
				} else {
					$published = "unpublished";
				}
				$output .= '<div class="page-view"><img src="'.base_url().'images/icon-'.$published.'.png" /></div>';
				$time = strtotime($page['modified']);
				$time = date("j-m-Y",$time);
				$output .= '<div class="page-view">'.$time.'</div>';
				$output .= '</div>';
			}
			print $output;
		}
	}	
	
	# Add new page within a category and a language
	function add_page($cid=null,$lid=null) 
	{
		$this->check_authentication();
		$data = array(
			'category_id' => $cid,
			'title' => 'New Blank Page',
			'user_id' => $this->session->userdata('printsoftAdminloggedIn'),
			'created' => date('Y-m-d H:i:s'),
			'modified' => date('Y-m-d H:i:s'),
			'language_id' => $lid
		);
		if ($this->Page_model->add_page($data)) {
			print "Ok";
		} else {
			print "Error";
		}
	}	
	
	# Delete page
	function delete_page($id) 
	{
		$this->check_authentication();		
		if ($this->Page_model->delete_page($id)) {
			print "Ok";
		} else {
			print "Error";
		}
	}
	
	# Get page properties
	function get_page_properties($id=null) 
	{
		$this->check_authentication();
		$page = $this->Page_model->get_page($id);
		$output = "";
		$output .= $page['name']."~";
		$output .= $page['title']."~";
		$output .= $page['category_id']."~";
		$output .= $page['description']."~";
		$output .= $page['keywords']."~";
		$output .= $page['template_id']."~";
		$output .= $page['gallery_id']."~";
		$output .= $page['menu_id']."~";
		$output .= $page['published']."~";
		$output .= $page['searchable'];
		print $output;
	}
	
	# Get page content
	function get_page_content($id=null) 
	{
		$this->check_authentication();
		$page = $this->Page_model->get_page($id);
		$output = $page['content'];
		print $output;
	}
	
	# Update page properties
	function update_page_properties() 
	{
		$this->check_authentication();
		$name = $_POST['name'];
		$name = str_replace(" ","-",$name);
		$published = 0;
		
		$data = array(
				'name' => $name,
				'title' => ucwords($_POST['title']),
				
				'category_id' => $_POST['category_id'],
				'description' => $_POST['description'],
				'keywords' => $_POST['keywords'],
			
				'published' => $_POST['published'],
				'searchable' => '1',
				'modified' => date('Y-m-d H:i:s')
			);
		
		
		   
		  
			
			$data['gallery_id'] = $_POST['gallery_id'];
				  
				
		   
		
		
		$this->Page_model->update_page($_POST['page_id'],$data);
		$this->session->set_userdata('cid',$_POST['category_id']);
	if (isset($_POST['browser'])) {
			redirect($_POST['browser']);
		} else {
			redirect('admin/cms/page-manager');
		}
		
	}
	// MANAGE HOME PAGE
	function home_page_manager() 
	{
		$this->check_authentication();
		$data['page'] = $this->Page_model->get_page(1);
		$this->load->model('Cute_model_fourth');
		$this->Cute_model_fourth->init();
		$this->load->model('Cute_model_second');
		$this->Cute_model_second->init();
		$this->load->model('Cute_model_third');
		$this->Cute_model_third->init();
		$this->load->view('admin/header');
		$this->load->view('admin/cms/home_page',$data);
		$this->load->view('admin/navigation');
		$this->load->view('admin/footer');
	}
	# Update home page content
	function updating_home_page_content() 
	{
		$this->check_authentication();
		$content = $_POST['left_box'].'~~'.$_POST['middle_box'].'~~'.$_POST['right_box'];
		$data = array(
				'content' => $content,
				'modified' => date('Y-m-d H:i:s')
			);
		$this->Page_model->update_home_page($data);
		redirect('admin/cms/home_page_manager');
		
	}
	# Update page content
	function update_page_content() 
	{
		$this->check_authentication();
		$data = array(
				'content' => $_POST['content_text'],
				'modified' => date('Y-m-d H:i:s')
			);
		$this->Page_model->update_page($_POST['page_id2'],$data);
		$this->session->set_userdata('cid',$_POST['category_id2']);
		if (isset($_POST['browser'])) {
			redirect($_POST['browser']);
		} else {
			redirect('admin/cms/page-manager');
		}
	}
	
	*/
	// GALLERIES SECTION 
	function galleries($id=null,$pid=null) 
	{
		$this->check_authentication();
		# Check authentication and load models
		$this->check_authentication();
		
		# load normal header view
		$this->load->view('admin/header');
		
		# if not a particular gallery
		if ($id == null) {
			# Get all galleries
			$galleries = $this->Gallery_model->get_galleries();
			# Determine the thumbnail
			$thumbnails = array();
			foreach($galleries as $gallery) {
				$photos = $this->Gallery_model->get_photos($gallery['id']);
				if (count($photos) == 0) {
					$thumbnails[$gallery['id']] = '<a href="'.base_url().'admin/cms/galleries/'.$gallery['id'].'"><img src="'.base_url().'images/thumbnail-no-image.jpg" title="'.$gallery['title'].'" /></a>';
				} else {
					$thumbnail = $this->Gallery_model->get_gallery_thumbnail($gallery['id']);
					$thumbnails[$gallery['id']] = '<a href="'.base_url().'admin/cms/galleries/'.$gallery['id'].'"><img src="'.base_url().'uploads/galleries/'.md5("cdkgallery".$gallery['id']).'/thumbnails/'.$thumbnail.'" title="'.$gallery['title'].'" /></a>';
				}
			}
			
			# Pass data to the view
			$data['galleries'] = $galleries;
			$data['thumbnails'] = $thumbnails;			
			$this->load->view('admin/cms/galleries',$data);
		} 
		
		# Viewing a particular gallery
		else {
			# Get the gallery
			$data['gallery'] = $this->Gallery_model->get_gallery($id);
			if(!$data['gallery'])
			{
				redirect('admin/cms/galleries/');
			}
			# Get all photos in the gallery
			$data['photos'] = $this->Gallery_model->get_photos($id);
			# If no photo yet
			if ($pid == null) {
				$this->load->view('admin/cms/gallery',$data);
			} else {
				$data['photo'] = $this->Gallery_model->get_photo($pid);
				if($data['photo'])
				{
				$this->load->view('admin/cms/photo',$data);
				}
				else
				{
					redirect('admin/cms/galleries/'.$id);
				}
			}		
		}
		
		$this->load->view('admin/navigation');
		$this->load->view('admin/footer');		
	}
	
    #reorder with jquery list
    function listorder()
    {
        $this->check_authentication();
        $orders=$this->input->post('textorder');
        $id=$this->input->post('idgallery');
        if($orders<>'')
        {
            
            $order = explode(",", $orders);
            $image=array();                      
            for($i=0;$i<count($order);$i++)
            {                             
                $data=array(
                    'gallery_id' => $id,
                    'order'=> $i
                );
                $this->Gallery_model->update_photo($order[$i],$data);
                
            }   
            $this->session->set_flashdata('update',true);     
        }
        else
        {
            $this->session->set_flashdata('warning',true);
        }
        redirect('admin/cms/galleries/'.$id);       
    }
    
    
	
	# Reorder image within a gallery
	function reorder($id=null,$move=null) 
	{
		$this->check_authentication();
		$this->check_authentication();
		$photo = $this->Gallery_model->get_photo($id);
		$gallery = $this->Gallery_model->get_gallery($photo['gallery_id']);
		
		if ($move == 1) {
			$next_photo = $this->Gallery_model->get_next_photo($photo['order'],$gallery['id']);
			$this->Gallery_model->swap_order($photo,$next_photo);
			
		} else if ($move == -1) {
			$previous_photo = $this->Gallery_model->get_previous_photo($photo['order'],$gallery['id']);
			$this->Gallery_model->swap_order($photo,$previous_photo);
		}		
		
		redirect('admin/cms/galleries/'.$gallery['id']);
	}
	
	# Create a new gallery
	function create_gallery() 
	{
		$this->check_authentication();
		$this->check_authentication();
		if (trim($_POST['title']) == "") {
			$this->session->set_flashdata('error_cg',true);
			redirect('admin/cms/galleries');
		}
		$data = array(
			'title' => $_POST['title'],
			'created' => date('Y-m-d H:i:s'),
			'modified' => date('Y-m-d H:i:s')
		);
		$gid = $this->Gallery_model->create_gallery($data);
		
		$path = "/home/stkildaf/public_html/callfor_entries/uploads/galleries";
		$newfolder = md5('cdkgallery'.$gid);
		$dir = $path."/".$newfolder;
		if(!is_dir($dir))
		{
		  mkdir($dir);
		  chmod($dir,0777);
		  $fp = fopen($dir.'/index.html', 'w');
		  fwrite($fp, '<html><head>Permission Denied</head><body><h3>Permission denied</h3></body></html>');
		  fclose($fp);
		}
		
		$dir .= "/thumbnails";
		if(!is_dir($dir))
		{
		  mkdir($dir);
		  chmod($dir,0777);
		  $fp = fopen($dir.'/index.html', 'w');
		  fwrite($fp, '<html><head>Permission Denied</head><body><h3>Permission denied</h3></body></html>');
		  fclose($fp);
		}		
		redirect('admin/cms/galleries');
	}
	
	#add video
	function add_video()
	{
		$this->check_authentication();
		//
		$gid = $_POST['gallery_id'];
		$radio = $_POST['radio'];
		$link = $_POST['youtube_link'];
		$pos = strpos($link,'src="');
		$back = substr($link,$pos+5,strlen($link) - $pos);
		$pos = strpos($back,'"');
		$middle = substr($back,0,$pos);
		//echo $middle;
		
		$photo = array(
				'name' => $middle,
				'created' => date('Y-m-d H:i:s'),
				'modified' => date('Y-m-d H:i:s'),
				'gallery_id' => $gid,
				'order' => 0,
				'video' => 1,
				'radio' => $radio
			);
			
		$pid = $this->Gallery_model->add_photo($photo);
		$this->Gallery_model->update_photo($pid,array('order'=>$pid));
		
		redirect('admin/cms/galleries/'.$gid);
		
	}
	
	# Add photo to a gallery, resize, crop image
	function add_photo()
	{
		$this->check_authentication();
		$gid = $_POST['gallery_id'];		
		$config['upload_path'] = "/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid);
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '4096'; // 4 MB
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		$config['overwrite'] = FALSE;
		$config['remove_space'] = TRUE;
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error_addphoto',$this->upload->display_errors());			
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$file_name = $data['upload_data']['file_name'];
			$width = $data['upload_data']['image_width'];
			$height = $data['upload_data']['image_height'];
			$photo = array(
				'name' => $file_name,
				'created' => date('Y-m-d H:i:s'),
				'modified' => date('Y-m-d H:i:s'),
				'gallery_id' => $gid,
				'order' => 0
			);
			$pid = $this->Gallery_model->add_photo($photo);
			$this->Gallery_model->update_photo($pid,array('order'=>$pid));
			if($gid != 4)
			{
				//420
				if ($height != 625)
				{
				$config = array();
				// Resize image
				$config['source_image'] = "/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid)."/".$file_name;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = 100;
				$config['width'] = (625 * $width) / $height;
				$config['height'] = 625;
				$config['master_dim'] = 'height';
				$this->load->library('image_lib');
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				unlink("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid)."/".$file_name);
				rename("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid)."/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid)."/".$file_name);
				$this->image_lib->clear();
			    }	
			}
			// Thumbnail creation
			$config = array();
			$config['source_image'] = "/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid)."/".$file_name;
			$config['create_thumb'] = TRUE;
			$config['new_image'] = "/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid)."/thumbnails/".$file_name;
			$config['maintain_ratio'] = TRUE;
			$config['quality'] = 100;
			  if ($width < $height) 
			  {		
			    if(($height/$width) < (112/138))
				{
					$config['height'] = 138;
				$config['width'] = intval(138 * ($height/$width));
				$config['master_dim'] = 'height';
				}
				else
				{
				$config['width'] = 138;
				$config['height'] = intval(112 * ($height/$width));
				$config['master_dim'] = 'width';
				}
				
			  } 
			  else if($width > $height)
			  {		
			   
					
				if(($width/$height) < (138/112))
				{
					$config['width'] = 138;
					$config['height'] = intval(112 * ($width/$height));
					$config['master_dim'] = 'width';
				}
				else
				{
					$config['width'] = intval(138 * ($width/$height));
					
				$config['height'] = 112;
				$config['master_dim'] = 'height';
				}
				
				
			  }
			  else  // for square image
			  {		
			  
				$config['width'] = 138;
				$config['height'] = intval(138 * ($height/$width));
				// if the thumbnail width is longer set to width otherwise set to height
				$config['master_dim'] = 'width';
				
			  }
			
			$this->load->library('image_lib');
			$this->image_lib->clear();
			$this->image_lib->initialize($config);
			if(!$this->image_lib->resize())
			{
				$this->session->set_flashdata('error_addphoto',$this->upload->display_errors());	
			}
			
			rename("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid)."/thumbnails/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid)."/thumbnails/".$file_name);
			$this->image_lib->clear();
			
			// Crop thumbnail			
			$config['image_library'] = 'GD2';
			$config['source_image'] = "/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid)."/thumbnails/".$file_name;
			
			$config['width'] = 138;
			$config['height'] = 112;
		    // really important shoud be crop from top 0 left 0
				$config['x_axis'] = 0;
				$config['y_axis'] = 0;
			$config['maintain_ratio'] = FALSE;
			
			$this->image_lib->initialize($config);
			$crop_thumbnail = $this->image_lib->crop();
			if ( ! $crop_thumbnail)
			{
				$this->session->set_flashdata('error_addphoto',$this->upload->display_errors());
			}
			unlink("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid)."/thumbnails/".$file_name);
			rename("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid)."/thumbnails/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5('cdkgallery'.$gid)."/thumbnails/".$file_name);
		  
			$this->session->set_flashdata('addphoto_id',$pid);
			$this->session->set_flashdata('addphoto_src',$file_name);
		}
		redirect('admin/cms/galleries/'.$gid);
	}
	
	# Delete a gallery and all images within that gallery
	function delete_gallery($id) 
	{
		$this->check_authentication();
		$photos = $this->Gallery_model->get_photos($id);
		foreach($photos as $photo) {
			if ($this->Gallery_model->delete_photo($photo['id'])) {
				unlink("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5("cdkgallery".$id)."/".$photo['name']);
				unlink("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5("cdkgallery".$id)."/thumbnails/".$photo['name']);				
			}
		}
		//print_r('test');
		unlink("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5("cdkgallery".$id)."/index.html");
		unlink("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5("cdkgallery".$id)."/thumbnails/index.html");
		
		if ($this->Gallery_model->delete_gallery($id)) {
			rmdir("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5("cdkgallery".$id)."/thumbnails");
			rmdir("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5("cdkgallery".$id));
			//$this->Page_model->reset_gallery($id);
			print "Ok";
		} 
		
		else {
			print "Error";
		}
				
		
	}	
	
	# Delete a photo  
	function delete_photo($id) 
	{
		$this->check_authentication();
		$photo = $this->Gallery_model->get_photo($id);
		
		if($photo['video'] == 1)
		{
			$this->Gallery_model->delete_photo($id);
		}
		else
		{
			if ($this->Gallery_model->delete_photo($id)) 
			{
				$this->Gallery_model->reset_thumbnail($id);
				unlink("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5("cdkgallery".$photo['gallery_id'])."/".$photo['name']);
				unlink("/home/stkildaf/public_html/callfor_entries/uploads/galleries/".md5("cdkgallery".$photo['gallery_id'])."/thumbnails/".$photo['name']);
				
			} else {
				
			}
		}
		
		
		redirect('admin/cms/galleries/'.$photo['gallery_id']);
	}
	
	# Add caption title for a photo
	function add_photo_title()
	{
		$this->check_authentication();
		$id = $_POST['photo_id'];
		$data = array(
			'title' => $_POST['title'],			
			'modified' => date('Y-m-d H:i:s')
			);
		$this->Gallery_model->update_photo($id,$data);
		redirect('admin/cms/galleries/'.$_POST['gallery_id']);
	}
	function navigation($action="",$menu_id="") 
	{
		$this->check_authentication();        
         if ($action == "update") 
		 {
            $data['menu'] = $this->Menu_model->id($menu_id);
			if($data['menu'] == NULL)
			{
				 redirect('admin/cms');
			}
            $data['links'] = $this->Menu_model->get_links($menu_id,0);
            $data['root'] = $this->Menu_model->root_categories();
            $data['pages'] = $this->Menu_model->get(1); 
        
        $this->load->view('admin/header');
        $this->load->view('admin/page/navigation/navigation',$data);
        $this->load->view('admin/navigation');
        $this->load->view('admin/footer');
		 }
		 else
		 {
			 redirect('admin/cms');
		 }
    }
    
    function addlink() 
	{
		$this->check_authentication();
        $url = $_POST['url'];
        if ($url == "http://" || $url == "") { $url = "#"; }
        $data = array(
            'menu_id' => $_POST['menu_id'],
            'parent_id' => $_POST['parent_id'],
            'name' => $_POST['name'],
            'url' => $url
        );
        $link_id = $this->Menu_model->insert_link($data);
        //$pos = $_POST['position'];
        $order = $link_id;
        /*
		if ($pos != "") { 
            $after = $this->Menu_model->get_link($pos);
            $order = $after['order'];
            $this->Menu_model->update_link($after['id'],array('order' => $link_id));
        }
		*/
        $this->Menu_model->update_link($link_id,array('order' => $order));
        redirect('admin/cms/navigation/update/'.$_POST['menu_id']);
    }
    function getlink() 
	{
		$this->check_authentication();
        $link = $this->Menu_model->get_link($_POST['id']);
        $root = $this->Menu_model->root_categories();
        $out = '';
        $parent_id=$link['parent_id'];  
		$pages = $this->Menu_model->get(1); 
        if ($link) {
            $out = '<h3>Update</h3>
        <form name="editForm" method="post" action="'.base_url().'admin/cms/updatelink">
        <input type="hidden" name="id" value="'.$link['id'].'" />
        <table>
		<tr>
		<td>Name</td>
        <td><input type="text"  name="name" style="width:250px;border:1px solid #cdcdcd; height:25px; padding:3px;" value="'.$link['name'].'" /></td>
        </tr>
		<tr>
        <td>Page </td><td><select id="page-title2"  onchange="updateurl2()" style="height:25px; padding:3px;">
                <option>Please select a page</option>';
                 if ($pages) { 
                    foreach($pages as $page) { 
                    $out .='<option value="'.$page['id'].'">|-- '.$page['title'].'</option>';
                 	}
                } 				
            $out .= '</select>
        </td></tr>
		<tr>
        <td>URL </td><td><input type="text"  style="width:250px;border:1px solid #cdcdcd;height:25px; padding:3px;" name="url" id="url2" value="'.$link['url'].'" /></td></tr>
        <tr>
		<td><input type="submit" class="button rounded" value="Update" /></td>
		</tr>
        </form>';
		}
        print $out;
    }
    function updatelink() 
	{
		$this->check_authentication();
        $id = $_POST['id'];
        $link = $this->Menu_model->get_link($id);
        $data = array(
            'name' => $_POST['name'],
            'url' => $_POST['url']
        );
        $this->Menu_model->update_link($id,$data);
        redirect('admin/cms/navigation/update/'.$link['menu_id']);
    }
    function deletelink($id="") 
	{
		$this->check_authentication();
        $link = $this->Menu_model->get_link($id);
        if ($link) {
            $this->Menu_model->delete_link($id);
            redirect('admin/cms/navigation/update/'.$link['menu_id']);
        }
    }
	function reorderlink() 
	{
		$this->check_authentication();
		$array = $_POST['link'];
		if ($_POST['update'] == "update"){			
			$count = 1;
			foreach ($array as $idval) {
				$this->Menu_model->update_link($idval,array('order' => $count));
				$count ++;	
			}	
		}
	}
	function getposlist2()
	{
		$this->check_authentication();
		$parent_id=$_POST['parentid'];
		$menu_id=$_POST['menuid'];
		$out='';
    	$links = $this->Menu_model->get_links($menu_id,$parent_id);
		foreach($links as $link) {		
        	$out .=	'<li id="'.$link['id'].'" class="ui-state-default"><a href="#" onClick="javascript:editlink('.$link['id'].')">'.$link['name'].'</a> </li>';
		} 

		print $out;
	}
	function listposorder()
	{
		$this->check_authentication();
		$orders=$this->input->post('pos');
        $parentid=$this->input->post('parentidpos');
		
        if($orders<>'')
        {
            
            $order = explode(",", $orders);
            $image=array();                      
            for($i=0;$i<count($order);$i++)
            {                             
                $data=array(                   
                    'order'=> $i
                );
                $this->Menu_model->update_link($order[$i],$data);
                
            }   
            
        }
        $this->session->set_flashdata('link',$parentid);
        redirect('admin/cms/navigation/update/1');       
	}
	
    function getposlist() 
	{
		$this->check_authentication();
        $parentid = $_POST['parentid'];
        $out = '';
        if ($parentid == 0) {
            $links = $this->Menu_model->get_links($_POST['menuid'],0);
            $out .= '<select name="position">
                <option value="">At the end</option>';
                foreach($links as $link) {
                    $out .= '<option value="'.$link['id'].'">Before : '.$link['name'].'</option>';
                }
            $out .= '</select>';
        } else {
            $links = $this->Menu_model->get_links($_POST['menuid'],$parentid);
            $parent = $this->Menu_model->get_link($parentid);
            $out .= '<select name="position">
                <option disabled="disabled">'.$parent['name'].'</option>
                <option value="">-- At the end</option>';
                foreach($links as $link) {
                    $out .= '<option value="'.$link['id'].'">-- Before : '.$link['name'].'</option>';
                }
            $out .= '</select>';
        }
        print $out;
    }
    function updatemenu() 
	{
		$this->check_authentication();
        $array    = $_POST['arrayorder'];
        if ($_POST['update'] == "update"){
            $count = 1;
            foreach ($array as $idval) {                
                $count ++;    
            }
        }
        print var_dump($array);
    }
    function addpage()
    {
		$this->check_authentication();
        $this->load->model('Cute_model');
		$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
        $data['root'] = $this->Menu_model->root_categories();
        $data['galleries'] =$this->Gallery_model->get_galleries();
		
        
        $this->load->view('admin/header');
        $this->load->view('admin/page/content/add',$data);
        $this->load->view('admin/navigation');
        $this->load->view('admin/footer');
    }
    function createpage()
    {
        $this->check_authentication();
        $title=$this->input->post('title');
        $content=$this->input->post('content_text');
        $gallery=$this->input->post('galleryopt');
        
          //print_r($gallery);
        
        
            $data=array(
                'title' => $title,
                'content' => $content,
                'gallery' => $gallery,
                'modified' => date('Y-m-d H:i:s'), 
                'created' => date('Y-m-d H:i:s') 
            );
            $id=$this->Menu_model->addpage($data);
			if($id)
            {
            $this->session->set_flashdata('status','success');
            redirect('admin/cms/editpage/'.$id);
            }                
    }
    
    function listpage()
    {
		$this->check_authentication();
        $data['pages'] = $this->Menu_model->get(1); 
        $this->load->view('admin/header');
        $this->load->view('admin/page/content/list',$data);
        $this->load->view('admin/navigation');
        $this->load->view('admin/footer'); 
    }
    function editpage($id='')
    {
		$this->check_authentication();
        $data['pages'] = $this->Menu_model->getpage($id);
        $data['galleries'] =$this->Gallery_model->get_galleries();
        $this->load->view('admin/header');
        $this->load->view('admin/page/content/edit',$data);
        $this->load->view('admin/navigation');
        $this->load->view('admin/footer'); 
        
    }
    function updatepage()
    {
		$this->check_authentication();
        $id=$this->input->post('id');
        $title=$this->input->post('title');
        $content=$this->input->post('content_text');
		
		if($content==''){$content="     ";}
		if (strpos($content,'&lt') !== false)
		{
			$c1=str_replace('&lt;','<',$content);
			$c2=str_replace('&gt;','>',$c1);
			
			//$contents = str_replace('<style type="text/css">@import url(/10feettall2/css/template.css);</style>','', $c2);
			
			$content=$c2;
		}
        
        $gallery=$this->input->post('galleryopt');
                        
        $data=array(
            'title' => $title,
            'content' => $content,
            'gallery' => $gallery,
            'modified' => date('Y-m-d H:i:s') 
        );
        if($this->Menu_model->updatepage($id,$data))
        {
            $this->session->set_flashdata('status','success');
			if($id==50)
			{
				redirect('admin/cms/update_home_page/');
			}
			else{
            redirect('admin/cms/editpage/'.$id);
			}
        }       
        
    }
    function deletepage($id)
    {
		$this->check_authentication();
         if($this->Menu_model->deletepage($id))
        {            
            redirect('admin/cms/listpage');
        }
    }
    
    function addnews()
    {
		$this->check_authentication();
        $this->load->model('Cute_model');
		$data['menu'] = $this->Menu_model->id(1);
        $data['links'] = $this->Menu_model->get_links(1,0);
        $data['root'] = $this->Menu_model->root_categories();
        $data['galleries'] =$this->Gallery_model->get_galleries();
		
        
        $this->load->view('admin/header');
        $this->load->view('admin/page/news/add',$data);
        $this->load->view('admin/navigation');
        $this->load->view('admin/footer');
    }
    function createnews()
    {
        $this->check_authentication();    				
        $title=$this->input->post('title');
        $content=$this->input->post('content_text');
		$media=$_POST['content_media'];
		/*
		if($content==''){$content="     ";}
		if (strpos($content,'&lt') !== false)
		{
			$c1=str_replace('&lt;','<',$content);
			$c2=str_replace('&gt;','>',$c1);
			//$con=explode($content_all,'<style type="text/css">@import url(/10feettall2/css/template.css);</style>');
			$contents = str_replace('<style type="text/css">@import url(/10feettall2/css/template.css);</style>','', $c2);
			//print_r($content.'<br>'.$contents);
			//$content=$con[0];
			$content=$contents;
		}
		
		if($media==''){$media="     ";}
		if (strpos($media,'&lt') !== false)
		{
			$c1=str_replace('&lt;','<',$media);
			$c2=str_replace('&gt;','>',$c1);
			//$con=explode($content_all,'<style type="text/css">@import url(/10feettall2/css/template.css);</style>');
			$contents = str_replace('<style type="text/css">@import url(/10feettall2/css/template.css);</style>','', $c2);
			//print_r($content.'<br>'.$contents);
			//$content=$con[0];
			$media=$contents;
		}
		*/
		$data=array(
				'title' => $title,
				'content' => $content,
				'media' => $media,				
				'modified' => date('Y-m-d H:i:s') 
		);
			
		$id=$this->Menu_model->addnews($data);
		if($id)
		{
			$this->session->set_flashdata('status','success');
			redirect('admin/cms/editnews/'.$id);
		}                                
    }
    function listnews()
    {
		$this->check_authentication();
        $data['pages'] = $this->Menu_model->getallnews(); 
        $this->load->view('admin/header');
        $this->load->view('admin/page/news/list',$data);
        $this->load->view('admin/navigation');
        $this->load->view('admin/footer'); 
    }
    function editnews($id='')
    {
		$this->check_authentication();
        $data['pages'] = $this->Menu_model->getnews($id);
        $data['galleries'] =$this->Gallery_model->get_galleries();
        $this->load->view('admin/header');
        $this->load->view('admin/page/news/edit',$data);
        $this->load->view('admin/navigation');
        $this->load->view('admin/footer'); 
        
    }
    function updatenews()
    {
		$this->check_authentication();
        $id=$this->input->post('id');
        $title=$this->input->post('title');
        $content=$this->input->post('content_text');
		//print_r($content);
		/*
		if($content==''){$content="     ";}
		if (strpos($content,'&lt') !== false)
		{
			$c1=str_replace('&lt;','<',$content);
			$c2=str_replace('&gt;','>',$c1);
			//$con=explode($content_all,'<style type="text/css">@import url(/10feettall2/css/template.css);</style>');
			$contents = str_replace('<style type="text/css">@import url(/10feettall2/css/template.css);</style>','', $c2);
			//print_r($content.'<br>'.$contents);
			//$content=$con[0];
			$content=$contents;
		}
		*/
		$media1=$_POST['content_media'];
		/*
		$media=str_replace('&lt;','<',$media1);
		$media2=str_replace('&gt;','>',$media);
		if($media1==""){$media2='';}
		*/
	
		$data=array(
			'title' => $title,
			'content' => $content,
			'media' => $media2,				
			'modified' => date('Y-m-d H:i:s') 
		);
		//print_r($data);
		if($this->Menu_model->updatenews($id,$data))
		{
			$this->session->set_flashdata('status','success');
			redirect('admin/cms/editnews/'.$id);
		}                        
		

    }
    function deletenews($id)
    {
		$this->check_authentication();
        $news=$this->Menu_model->getnews($id);
		//if($news['media1']){unlink("/home/stkildaf/public_html/callfor_entries/uploads/news/".$news['media1']);}
		//if($news['media2']){unlink("/home/stkildaf/public_html/callfor_entries/uploads/news/".$news['media2']);}
		if($this->Menu_model->deletenews($id))
        {            
            redirect('admin/cms/listnews');
        }
    }
	function delete_image($id) 
	{
		$this->check_authentication();
		if ($news=$this->Menu_model->getnews($id)) {
			unlink("/home/stkildaf/public_html/callfor_entries/uploads/news/".$news['media1']);
			$data=array(				
				'media1' => '',				
				'modified' => date('Y-m-d H:i:s') 
			);
			
			if($this->Menu_model->updatenews($id,$data))
			{
				$this->session->set_flashdata('status','success');
				redirect('admin/cms/editnews/'.$id);
			}                        
			
		} else {
			redirect('admin/cms/editnews/'.$id);
		}
		
	}
	function delete_image2($id) 
	{
		$this->check_authentication();
		if ($news=$this->Menu_model->getnews($id)) {
			unlink("/home/stkildaf/public_html/callfor_entries/uploads/news/".$news['media2']);
			$data=array(				
				'media2' => '',				
				'modified' => date('Y-m-d H:i:s') 
			);
			
			if($this->Menu_model->updatenews($id,$data))
			{
				$this->session->set_flashdata('status','success');
				redirect('admin/cms/editnews/'.$id);
			}                        
			
		} else {
			redirect('admin/cms/editnews/'.$id);
		}
		
	}
	function listnewsorder()
	{
		$this->check_authentication();
		$orders=$this->input->post('pos');
        //$parentid=$this->input->post('parentidpos');
		
        if($orders<>'')
        {
            
            $order = explode(",", $orders);
            $image=array();                      
            for($i=0;$i<count($order);$i++)
            {                             
                $data=array(                   
                    'order'=> $i
                );
                $this->Menu_model->update_order_news($order[$i],$data);
                
            }   
            
        }
        //$this->session->set_flashdata('link',$parentid);
        redirect('admin/cms/listnews');       
	}
	
	function update_home_page()
	{
		$this->check_authentication();
		$data['pages'] = $this->Menu_model->getpage(50);        
        $this->load->view('admin/header');
        $this->load->view('admin/page/edit',$data);
        $this->load->view('admin/navigation');
        $this->load->view('admin/footer'); 
	}
}
?>