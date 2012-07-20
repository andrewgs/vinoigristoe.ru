<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_interface extends CI_Controller{
	
	var $language = 'ru';
	var $user = array('uid'=>0,'ulogin'=>'','uemail'=>'');
	var $loginstatus = array('status'=>FALSE);
	var $months = array("01"=>"января","02"=>"февраля","03"=>"марта","04"=>"апреля","05"=>"мая","06"=>"июня","07"=>"июля","08"=>"августа","09"=>"сентября","10"=>"октября","11"=>"ноября","12"=>"декабря");
	
	function __construct(){
		
		parent::__construct();
		$this->load->model('mdadmins');
		$this->load->model('mdevents');
		$this->load->model('mdunion');
		$this->load->model('mdtypeevents');
		$this->load->model('mdcategory');
		$this->load->model('mdseries');
		$this->load->model('mdproducts');
		$this->load->model('mdmedals');
		$this->load->model('mdmagazines');
		$this->load->model('mdcity');
		$this->load->model('mdcountry');
		$this->load->model('mdwhereby');
		
		$cookieuid = $this->session->userdata('logon');
		if(isset($cookieuid) and !empty($cookieuid)):
			$this->user['uid'] = $this->session->userdata('userid');
			if($this->user['uid']):
				$userinfo = $this->mdadmins->read_record($this->user['uid']);
				if($userinfo):
					$this->user['ulogin']			= $userinfo['login'];
					$this->user['uemail']			= '';
					$this->loginstatus['status'] 	= TRUE;
				else:
					redirect('');
				endif;
			endif;
			
			if($this->session->userdata('logon') != md5($userinfo['login'])):
				$this->loginstatus['status'] = FALSE;
				redirect('');
			endif;
		else:
			redirect('');
		endif;
	}
	
	public function admin_panel(){
		
		$pagevar = array(
			'title'			=> 'Панель администрирования',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl' 		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		$this->session->set_userdata('backpath',$pagevar['baseurl'].$this->uri->uri_string());
		$this->load->view($pagevar['language']."/admin_interface/admin-panel",$pagevar);
	}
	
	public function admin_logoff(){
		
		$this->session->sess_destroy();
			redirect('');
	}
	
	/******************************************************* events ************************************************************/
	
	public function control_events(){
		
		$from = intval($this->uri->segment(5));
		$pagevar = array(
			'title'			=> 'Панель администрирования | Новости',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'events'		=> $this->mdunion->events_limit($this->language,7,$from),
			'pages'			=> array(),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		for($i=0;$i<count($pagevar['events']);$i++):
			$pagevar['events'][$i]['date'] = $this->operation_dot_date($pagevar['events'][$i]['date']);
			$pagevar['events'][$i]['content'] = strip_tags($pagevar['events'][$i]['content']);
			if(mb_strlen($pagevar['events'][$i]['content'],'UTF-8') > 250):
				$pagevar['events'][$i]['content'] = mb_substr($pagevar['events'][$i]['content'],0,250,'UTF-8');	
				$pos = mb_strrpos($pagevar['events'][$i]['content'],' ',0,'UTF-8');
				$pagevar['events'][$i]['content'] = mb_substr($pagevar['events'][$i]['content'],0,$pos,'UTF-8');
				$pagevar['events'][$i]['content'] .= ' ... ';
			endif;
		endfor;
		
		$config['base_url'] 		= $pagevar['baseurl'].'admin-panel/actions/events/from/';
		$config['uri_segment'] 		= 5;
		$config['total_rows'] 		= $this->mdevents->count_records($this->language.'_events');
		$config['per_page'] 		= 7;
		$config['num_links'] 		= 4;
		$config['first_link']		= 'В начало';
		$config['last_link'] 		= 'В конец';
		$config['next_link'] 		= 'Далее &raquo;';
		$config['prev_link'] 		= '&laquo; Назад';
		$config['cur_tag_open']		= '<span class="actpage">';
		$config['cur_tag_close'] 	= '</span>';
		
		$this->pagination->initialize($config);
		$pagevar['pages'] = $this->pagination->create_links();
		
		$this->session->set_userdata('backpath',$pagevar['baseurl'].$this->uri->uri_string());
		$this->load->view($pagevar['language']."/admin_interface/events/list-events",$pagevar);
	}
	
	public function control_add_events(){
		
		$pagevar = array(
			'title'			=> 'Панель администрирования | Добавление новости или события',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'types_events'	=> $this->mdtypeevents->read_records($this->language.'_type_events'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('content',' ','required|trim');
			$this->form_validation->set_rules('type_event',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				$this->control_add_events();
				return FALSE;
			else:
				if($_FILES['image']['error'] != 4):
					$_POST['image'] = file_get_contents($_FILES['image']['tmp_name']);
				else:
					$_POST['image'] = file_get_contents(base_url().'images/noimages/no_events.png');
				endif;
				$translit = $this->translite($_POST['title']);
				$result = $this->mdevents->insert_record($_POST,$translit,$this->language.'_events');
				if($result):
					$this->session->set_userdata('msgs','Запись создана успешно.');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/events/add-events",$pagevar);
	}
	
	public function control_edit_events(){
		
		$nid = $this->mdevents->read_field_translit($this->uri->segment(5),'id',$this->language.'_events');
		if(!$nid):
			redirect($this->session->userdata('backpath'));
		endif;
		$pagevar = array(
			'title'			=> 'Панель администрирования | Редактирование новости или события',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'event'			=> $this->mdevents->read_record($nid,$this->language.'_events'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('content',' ','trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				$this->control_edit_events();
				return FALSE;
			else:
				if($_FILES['image']['error'] != 4):
					$_POST['image'] = file_get_contents($_FILES['image']['tmp_name']);
				endif;
				$translit = $this->translite($_POST['title']);
				$result = $this->mdevents->update_record($nid,$_POST,$translit,$this->language.'_events');
				if($result):
					$this->session->set_userdata('msgs','Запись сохранена успешно.');
				endif;
				redirect($this->session->userdata('backpath'));
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/events/edit-events",$pagevar);
	}
	
	public function control_delete_events(){
		
		$nid = $this->uri->segment(6);
		if($nid):
			$result = $this->mdevents->delete_record($nid,$this->language.'_events');
			if($result):
				$this->session->set_userdata('msgs','Новость удалена успешно.');
			else:
				$this->session->set_userdata('msgr','Новость не удалена.');
			endif;
			redirect($this->session->userdata('backpath'));
		else:
			show_404();
		endif;
	}
	
	/******************************************************* category ************************************************************/
	
	public function control_category(){
		
		$pagevar = array(
			'title'			=> 'Панель администрирования | Категории продуктов',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'category'		=> $this->mdcategory->read_records($this->language.'_category'),
			'series'		=> $this->mdseries->read_records($this->language.'_series'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				$translit = $this->translite($_POST['title']);
				$result = $this->mdseries->insert_record($_POST['title'],$translit,$_POST['cid'],$this->language.'_series');
				if($result):
					$this->session->set_userdata('msgs','Запись создана успешно.');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->session->set_userdata('backpath',$pagevar['baseurl'].$this->uri->uri_string());
		$this->load->view($pagevar['language']."/admin_interface/products/category",$pagevar);
	}
	
	public function control_add_category(){
		
		$pagevar = array(
			'title'			=> 'Панель администрирования | Добавдение категории',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				$this->control_add_category();
				return FALSE;
			else:
				if($_FILES['icon']['error'] != 4):
					$_POST['icon'] = file_get_contents($_FILES['image']['tmp_name']);
				else:
					$_POST['icon'] = file_get_contents(base_url().'images/noimages/no_icon.jpg');
				endif;
				$translit = $this->translite($_POST['title']);
				$cid = $this->mdcategory->insert_record($_POST,$translit,$this->language.'_category');
				if($cid):
					$this->mdseries->insert_record('Категория по умолчанию','default',$cid,$this->language.'_series');
					$this->session->set_userdata('msgs','Запись создана успешно.');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/products/add-category",$pagevar);
	}
	
	public function control_edit_category(){
		
		$nid = $this->mdcategory->read_field_translit($this->uri->segment(5),'id',$this->language.'_category');
		if(!$nid):
			redirect($this->session->userdata('backpath'));
		endif;
		$pagevar = array(
			'title'			=> 'Панель администрирования | Редактирование категории товара',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'category'		=> $this->mdcategory->read_record($nid,$this->language.'_category'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('content',' ','trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				$this->control_edit_category();
				return FALSE;
			else:
				if($_FILES['icon']['error'] != 4):
					$_POST['icon'] = file_get_contents($_FILES['image']['tmp_name']);
				endif;
				$translit = $this->translite($_POST['title']);
				$result = $this->mdcategory->update_record($nid,$_POST,$translit,$this->language.'_category');
				if($result):
					$this->session->set_userdata('msgs','Запись сохранена успешно.');
				endif;
				redirect($this->session->userdata('backpath'));
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/products/edit-category",$pagevar);
	}
	
	public function control_delete_category(){
		
		$cid = $this->uri->segment(6);
		if($cid):
			$result = $this->mdcategory->delete_record($cid,$this->language.'_category');
			if($result):
				$this->mdseries->delete_records($cid,$this->language.'_series');
				$this->mdproducts->delete_records_category($cid,$this->language.'_products');
				$this->mdmedals->delete_records_category($cid,$this->language.'_medals');
				$this->mdwhereby->delete_records_category($cid,$this->language.'_whereby');
				$this->session->set_userdata('msgs','Категория удалена успешно.');
			else:
				$this->session->set_userdata('msgr','Категория не удалена.');
			endif;
			redirect($this->session->userdata('backpath'));
		else:
			show_404();
		endif;
	}
	
	/******************************************************* series ************************************************************/
	
	public function control_edit_series(){
		
		$cid = $this->mdcategory->read_field_translit($this->uri->segment(4),'id',$this->language.'_category');
		if(!$cid):
			redirect($this->session->userdata('backpath'));
		endif;
		$sid = $this->mdseries->read_field_translit($this->uri->segment(5),'id',$this->language.'_series');
		if(!$sid):
			redirect($this->session->userdata('backpath'));
		endif;
		$pagevar = array(
			'title'			=> 'Панель администрирования | Редактирование серии товара',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'series'		=> $this->mdseries->read_record($sid,$this->language.'_series'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				$this->control_edit_series();
				return FALSE;
			else:
				if($this->uri->segment(5) == 'default'):
					$translit = 'default';
				else:
					$translit = $this->translite($_POST['title']);
				endif;
				if(isset($_POST['delseries'])):
					$result = $this->mdseries->delete_record($sid,$this->language.'_series');
					if($result):
						$this->mdproducts->delete_records_series($sid,$this->language.'_products');
						$this->mdmedals->delete_records_series($sid,$this->language.'_medals');
						$this->mdwhereby->delete_records_series($sid,$this->language.'_whereby');
						$this->session->set_userdata('msgs','Серия удалена успешно.');
					endif;
				else:
					$result = $this->mdseries->update_record($sid,$_POST['title'],$translit,$this->language.'_series');
					if($result):
						$this->session->set_userdata('msgs','Серия сохранена успешно.');
					endif;
				endif;
				redirect($this->session->userdata('backpath'));
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/products/edit-series",$pagevar);
	}
	
	/******************************************************* products ************************************************************/
	
	public function control_products(){
		
		$from = intval($this->uri->segment(5));
		$pagevar = array(
			'title'			=> 'Панель администрирования | Продукты',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'category'		=> $this->mdcategory->read_records($this->language.'_category'),
			'series'		=> $this->mdseries->read_records($this->language.'_series'),
			'products'		=> $this->mdproducts->read_limit_records($this->language.'_products',7,$from),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		for($i=0;$i<count($pagevar['products']);$i++):
			$pagevar['products'][$i]['content'] = strip_tags($pagevar['products'][$i]['content']);
			if(mb_strlen($pagevar['products'][$i]['content'],'UTF-8') > 250):
				$pagevar['products'][$i]['content'] = mb_substr($pagevar['products'][$i]['content'],0,250,'UTF-8');	
				$pos = mb_strrpos($pagevar['products'][$i]['content'],' ',0,'UTF-8');
				$pagevar['products'][$i]['content'] = mb_substr($pagevar['products'][$i]['content'],0,$pos,'UTF-8');
				$pagevar['products'][$i]['content'] .= ' ... ';
			endif;
		endfor;
		
		$config['base_url'] 		= $pagevar['baseurl'].'admin-panel/actions/products/from/';
		$config['uri_segment'] 		= 5;
		$config['total_rows'] 		= $this->mdproducts->count_records($this->language.'_products');
		$config['per_page'] 		= 7;
		$config['num_links'] 		= 4;
		$config['first_link']		= 'В начало';
		$config['last_link'] 		= 'В конец';
		$config['next_link'] 		= 'Далее &raquo;';
		$config['prev_link'] 		= '&laquo; Назад';
		$config['cur_tag_open']		= '<span class="actpage">';
		$config['cur_tag_close'] 	= '</span>';
		
		$this->pagination->initialize($config);
		$pagevar['pages'] = $this->pagination->create_links();
		
		$this->session->set_userdata('backpath',$pagevar['baseurl'].$this->uri->uri_string());
		$this->load->view($pagevar['language']."/admin_interface/products/products",$pagevar);
	}
	
	public function control_add_product(){
		
		$pagevar = array(
			'title'			=> 'Панель администрирования | Добавдение продукта',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'category'		=> $this->mdcategory->read_records($this->language.'_category'),
			'series'		=> $this->mdseries->read_records($this->language.'_series'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('type',' ','required|trim');
			$this->form_validation->set_rules('alcohol',' ','required|trim');
			$this->form_validation->set_rules('sugar',' ','required|trim');
			$this->form_validation->set_rules('content',' ','required|trim');
			$this->form_validation->set_rules('series',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				$this->control_add_product();
				return FALSE;
			else:
				if($_FILES['image']['error'] != 4):
					$_POST['image'] = file_get_contents($_FILES['image']['tmp_name']);
				else:
					$_POST['image'] = file_get_contents(base_url().'images/noimages/no_icon.jpg');
				endif;
				$translit = $this->translite($_POST['title']);
				$category = $this->mdseries->read_field($_POST['series'],'category',$this->language.'_series');
				$cid = $this->mdproducts->insert_record($_POST,$translit,$category,$_POST['series'],$this->language.'_products');
				if($cid):
					$this->session->set_userdata('msgs','Продукт создан успешно.');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/products/add-product",$pagevar);
	}
	
	public function control_edit_product(){
		
		
		$pid = $this->mdproducts->read_field_translit($this->uri->segment(5),$this->uri->segment(7),$this->uri->segment(9),'id',$this->language.'_products');
		if(!$pid):
			redirect($this->session->userdata('backpath'));
		endif;
		$pagevar = array(
			'title'			=> 'Панель администрирования | Редактирование продукта',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'product'		=> $this->mdproducts->read_record($pid,$this->language.'_products'),
			'category'		=> $this->mdcategory->read_records($this->language.'_category'),
			'series'		=> $this->mdseries->read_records($this->language.'_series'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('type',' ','required|trim');
			$this->form_validation->set_rules('alcohol',' ','required|trim');
			$this->form_validation->set_rules('sugar',' ','required|trim');
			$this->form_validation->set_rules('content',' ','required|trim');
			$this->form_validation->set_rules('series',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				$this->control_edit_product();
				return FALSE;
			else:
				if($_FILES['image']['error'] != 4):
					$_POST['image'] = file_get_contents($_FILES['image']['tmp_name']);
				endif;
				$translit = $this->translite($_POST['title']);
				$category = $this->mdseries->read_field($_POST['series'],'category',$this->language.'_series');
				$id = $this->mdproducts->update_record($pid,$_POST,$translit,$category,$_POST['series'],$this->language.'_products');
				if($id):
					$this->session->set_userdata('msgs','Продукт сохранен успешно.');
				endif;
				redirect($this->session->userdata('backpath'));
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/products/edit-product",$pagevar);
	}
	
	public function control_delete_product(){
		
		$pid = $this->uri->segment(6);
		if($pid):
			$result = $this->mdproducts->delete_record($pid,$this->language.'_products');
			if($result):
				$this->mdmedals->delete_records_products($pid,$this->language.'_medals');
				$this->mdwhereby->delete_records_products($pid,$this->language.'_whereby');
				$this->session->set_userdata('msgs','Товар удален успешно.');
			else:
				$this->session->set_userdata('msgr','Товар не удалена.');
			endif;
			redirect($this->session->userdata('backpath'));
		else:
			show_404();
		endif;
	}
	
	/******************************************************* medals ************************************************************/
	
	public function control_medals_product(){

		$pid = $this->uri->segment(8);
		$pagevar = array(
			'title'			=> 'Панель администрирования | Награды',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'medals'		=> $this->mdmedals->read_records($pid,$this->language.'_medals'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				$this->control_medals_product();
				return FALSE;
			else:
				if($_FILES['image']['error'] != 4):
					$_POST['image'] = file_get_contents($_FILES['image']['tmp_name']);
				else:
					$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
					redirect($this->uri->uri_string());
				endif;
				$mid = $this->mdmedals->insert_record($_POST,$pid,$this->uri->segment(5),$this->uri->segment(7),$this->language.'_medals');
				if($mid):
					$this->session->set_userdata('msgs','Награда создана успешно.');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/products/medals",$pagevar);
	}
	
	public function control_delete_medal(){
		
		$mid = $this->uri->segment(13);
		if($mid):
			$result = $this->mdmedals->delete_record($mid,$this->language.'_medals');
			if($result):
				$this->session->set_userdata('msgs','Награда удалена успешно.');
			else:
				$this->session->set_userdata('msgr','Награда не удалена.');
			endif;
			redirect('admin-panel/actions/products/category/'.$this->uri->segment(5).'/series/'.$this->uri->segment(7).'/product/'.$this->uri->segment(9).'/medals');
		else:
			show_404();
		endif;
	}
	
	/******************************************************* whereby ************************************************************/
	
	public function control_whereby_product(){

		$pid = $this->uri->segment(9);
		$pagevar = array(
			'title'			=> 'Панель администрирования | Где купить',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'whereby'		=> $this->mdunion->magazines_product($pid,$this->language),
			'city'			=> $this->mdcity->read_records($this->language.'_city'),
			'magazines'		=> $this->mdmagazines->read_records($this->language.'_magazines'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
	
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('magazine',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				$country = $this->mdmagazines->read_field($_POST['magazine'],'country',$this->language.'_magazines');
				$city = $this->mdmagazines->read_field($_POST['magazine'],'city',$this->language.'_magazines');
				$wbid = $this->mdwhereby->insert_record($this->uri->segment(5),$this->uri->segment(7),$this->uri->segment(9),$country,$_POST['magazine'],$city,$this->language.'_whereby');
				if($wbid):
					$this->session->set_userdata('msgs','Запись создана успешно.');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/products/whereby",$pagevar);
	}
	
	public function control_delete_whereby(){
		
		$wbid = $this->uri->segment(13);
		if($wbid):
			$result = $this->mdwhereby->delete_record($wbid,$this->language.'_whereby');
			if($result):
				$this->session->set_userdata('msgs','Запись удалена успешно.');
			else:
				$this->session->set_userdata('msgr','Запись не удалена.');
			endif;
			redirect('admin-panel/actions/products/category/'.$this->uri->segment(5).'/series/'.$this->uri->segment(7).'/product/'.$this->uri->segment(9).'/whereby');
		else:
			show_404();
		endif;
	}
	
	/******************************************************* country ************************************************************/
	
	public function control_country(){
		
		$pagevar = array(
			'title'			=> 'Панель администрирования | Страны и города',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'country'		=> $this->mdcountry->read_records($this->language.'_country'),
			'city'			=> $this->mdcity->read_records($this->language.'_city'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				$translit = $this->translite($_POST['title']);
				$result = $this->mdcountry->insert_record($_POST['title'],$translit,$this->language.'_country');
				if($result):
					$this->session->set_userdata('msgs','Запись создана успешно.');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->session->set_userdata('backpath',$pagevar['baseurl'].$this->uri->uri_string());
		$this->load->view($pagevar['language']."/admin_interface/magazines/country",$pagevar);
	}
	
	public function control_edit_country(){
		
		$cid = $this->mdcountry->read_field_translit($this->uri->segment(5),'id',$this->language.'_country');
		if(!$cid):
			redirect($this->session->userdata('backpath'));
		endif;
		$pagevar = array(
			'title'			=> 'Панель администрирования | Редактирование страны',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'country'		=> $this->mdcountry->read_record($cid,$this->language.'_country'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				$translit = $this->translite($_POST['title']);
				$result = $this->mdcountry->update_record($cid,$_POST['title'],$translit,$this->language.'_country');
				if($result):
					$this->session->set_userdata('msgs','Страна сохранена успешно.');
				endif;
				redirect($this->session->userdata('backpath'));
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/magazines/edit-country",$pagevar);
	}
	
	public function control_delete_country(){
		
		$cid = $this->uri->segment(6);
		if($cid):
			$result = $this->mdcountry->delete_record($cid,$this->language.'_country');
			if($result):
				$this->mdcity->delete_records_country($cid,$this->language.'_city');
				$this->mdmagazines->delete_records_country($cid,$this->language.'_magazines');
				$this->mdwhereby->delete_records_country($cid,$this->language.'_whereby');
				$this->session->set_userdata('msgs','Страна удалена успешно.');
			else:
				$this->session->set_userdata('msgr','Страна не удалена.');
			endif;
			redirect($this->session->userdata('backpath'));
		else:
			show_404();
		endif;
	}
	
	/******************************************************* city ************************************************************/
	
	public function control_add_city(){
		
		$pagevar = array(
			'title'			=> 'Панель администрирования | Добавление города',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				$translit = $this->translite($_POST['title']);
				$result = $this->mdcity->insert_record($_POST['title'],$translit,$this->uri->segment(5),$this->language.'_city');
				if($result):
					$this->session->set_userdata('msgs','Запись создана успешно.');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/magazines/add-city",$pagevar);
	}
	
	public function control_edit_city(){
		
		$cid = $this->mdcity->read_field_translit($this->uri->segment(7),'id',$this->language.'_city');
		if(!$cid):
			redirect($this->session->userdata('backpath'));
		endif;
		$pagevar = array(
			'title'			=> 'Панель администрирования | Редактирование города',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'city'			=> $this->mdcity->read_record($cid,$this->language.'_city'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				if(isset($_POST['delcity'])):
					$result = $this->mdcity->delete_record($cid,$this->language.'_city');
					if($result):
						//удаление товаров
						$this->session->set_userdata('msgs','Город удален успешно.');
					endif;
				else:
					$translit = $this->translite($_POST['title']);
					$result = $this->mdcity->update_record($cid,$_POST['title'],$translit,$this->language.'_city');
					if($result):
						$this->session->set_userdata('msgs','Город сохранен успешно.');
					endif;
				endif;
				redirect($this->session->userdata('backpath'));
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/magazines/edit-city",$pagevar);
	}
	
	public function control_delete_city(){
		
		$cid = $this->uri->segment(6);
		if($cid):
			$result = $this->mdcity->delete_record($cid,$this->language.'_city');
			if($result):
				$this->mdmagazines->delete_records_city($cid,$this->language.'_magazines');
				$this->mdwhereby->delete_records_city($cid,$this->language.'_whereby');
				$this->session->set_userdata('msgs','Город удален успешно.');
			else:
				$this->session->set_userdata('msgr','Город не удалена.');
			endif;
			redirect($this->session->userdata('backpath'));
		else:
			show_404();
		endif;
	}
	
	/******************************************************* shops ************************************************************/
	
	public function control_shops(){
	
		$from = intval($this->uri->segment(5));
		$pagevar = array(
			'title'			=> 'Панель администрирования | Магазины',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'magazines'		=> $this->mdunion->magazines_limit($this->language,7,$from),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				if($_FILES['image']['error'] != 4):
					$_POST['image'] = file_get_contents($_FILES['image']['tmp_name']);
				else:
					$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
					redirect($this->uri->uri_string());
				endif;
				$mid = $this->mdmedals->insert_record($_POST,$pid,$this->uri->segment(5),$this->uri->segment(7),$this->language.'_medals');
				if($mid):
					$this->session->set_userdata('msgs','Награда создана успешно.');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$config['base_url'] 		= $pagevar['baseurl'].'admin-panel/actions/shops/from/';
		$config['uri_segment'] 		= 5;
		$config['total_rows'] 		= $this->mdevents->count_records($this->language.'_events');
		$config['per_page'] 		= 7;
		$config['num_links'] 		= 4;
		$config['first_link']		= 'В начало';
		$config['last_link'] 		= 'В конец';
		$config['next_link'] 		= 'Далее &raquo;';
		$config['prev_link'] 		= '&laquo; Назад';
		$config['cur_tag_open']		= '<span class="actpage">';
		$config['cur_tag_close'] 	= '</span>';
		
		$this->pagination->initialize($config);
		$pagevar['pages'] = $this->pagination->create_links();
		$this->session->set_userdata('backpath',$pagevar['baseurl'].$this->uri->uri_string());
		$this->load->view($pagevar['language']."/admin_interface/magazines/magazines",$pagevar);
	}
	
	public function control_add_shops(){
		
		$pagevar = array(
			'title'			=> 'Панель администрирования | Добавление магазина',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'country'		=> $this->mdcountry->read_records($this->language.'_country'),
			'city'			=> $this->mdcity->read_records($this->language.'_city'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('address',' ','required|trim');
			$this->form_validation->set_rules('phones',' ','required|trim');
			$this->form_validation->set_rules('city',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				$translit = $this->translite($_POST['title']);
				$country = $this->mdcity->read_field($_POST['city'],'country',$this->language.'_city');
				$result = $this->mdmagazines->insert_record($_POST,$translit,$country,$_POST['city'],$this->language.'_magazines');
				if($result):
					$this->session->set_userdata('msgs','Магазин создан успешно.');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/magazines/add-magazine",$pagevar);
	}
	
	public function control_edit_shops(){
		
		$cid = $this->mdmagazines->read_field_translit($this->uri->segment(5),$this->uri->segment(7),$this->uri->segment(9),'id',$this->language.'_magazines');
		if(!$cid):
			redirect($this->session->userdata('backpath'));
		endif;
		$pagevar = array(
			'title'			=> 'Панель администрирования | Редактирование магазина',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'country'		=> $this->mdcountry->read_records($this->language.'_country'),
			'city'			=> $this->mdcity->read_records($this->language.'_city'),
			'shop'			=> $this->mdmagazines->read_record($cid,$this->language.'_magazines'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('address',' ','required|trim');
			$this->form_validation->set_rules('phones',' ','required|trim');
			$this->form_validation->set_rules('city',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				$translit = $this->translite($_POST['title']);
				$country = $this->mdcity->read_field($_POST['city'],'country',$this->language.'_city');
				$result = $this->mdmagazines->update_record($cid,$_POST,$translit,$country,$_POST['city'],$this->language.'_magazines');
				if($result):
					$this->session->set_userdata('msgs','Магазин сохранен успешно.');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/magazines/edit-magazine",$pagevar);
	}
	
	public function control_delete_shop(){
		
		$mid = $this->uri->segment(6);
		if($mid):
			$result = $this->mdmagazines->delete_record($mid,$this->language.'_magazines');
			if($result):
				$this->mdwhereby->delete_records_shop($mid,$this->language.'_whereby');
				$this->session->set_userdata('msgs','Магазин удален успешно.');
			else:
				$this->session->set_userdata('msgr','Магазин не удален.');
			endif;
			redirect($this->session->userdata('backpath'));
		else:
			show_404();
		endif;
	}
	
	/******************************************************** functions ******************************************************/	
	
	public function translite($string){
	
		$rus = array("1","2","3","4","5","6","7","8","9","0","ё","й","ю","ь","ч","щ","ц","у","к","е","н","г","ш","з","х","ъ","ф","ы","в","а","п","р","о","л","д","ж","э","я","с","м","и","т","б","Ё","Й","Ю","Ч","Ь","Щ","Ц","У","К","Е","Н","Г","Ш","З","Х","Ъ","Ф","Ы","В","А","П","Р","О","Л","Д","Ж","Э","Я","С","М","И","Т","Б"," ");
		$eng = array("1","2","3","4","5","6","7","8","9","0","yo","iy","yu","","ch","sh","c","u","k","e","n","g","sh","z","h","","f","y","v","a","p","r","o","l","d","j","е","ya","s","m","i","t","b","Yo","Iy","Yu","CH","","SH","C","U","K","E","N","G","SH","Z","H","","F","Y","V","A","P","R","O","L","D","J","E","YA","S","M","I","T","B","-");
		$string = str_replace($rus,$eng,$string);
		if(!empty($string)):
			return preg_replace('/[^a-z,-]/','',strtolower($string));
		else:
			return FALSE;
		endif;
	}
	
	public function operation_date($field){
			
		$list = preg_split("/-/",$field);
		$nmonth = $this->months[$list[1]];
		$pattern = "/(\d+)(-)(\w+)(-)(\d+)/i";
		$replacement = "\$5 $nmonth \$1 г."; 
		return preg_replace($pattern, $replacement,$field);
	}
	
	public function operation_dot_date($field){
			
		$list = preg_split("/-/",$field);
		$pattern = "/(\d+)(-)(\w+)(-)(\d+)/i";
		$replacement = "\$5.$3.\$1"; 
		return preg_replace($pattern, $replacement,$field);
	}
}