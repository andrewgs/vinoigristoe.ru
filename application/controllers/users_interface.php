<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_interface extends CI_Controller{
	
	var $language = 'ru';
	var $user = array('uid'=>0,'ulogin'=>'','uemail'=>'');
	var $loginstatus = array('status'=>FALSE);
	var $months = array("01"=>"января","02"=>"февраля","03"=>"марта","04"=>"апреля","05"=>"мая","06"=>"июня","07"=>"июля","08"=>"августа","09"=>"сентября","10"=>"октября","11"=>"ноября","12"=>"декабря");
	
	function __construct(){
		
		parent::__construct();
		$this->load->model('mdadmins');
		$this->load->model('mdevents');
		$this->load->model('mdunion');
		$this->load->model('mdcategory');
		
		$cookieuid = $this->session->userdata('logon');
		if(isset($cookieuid) and !empty($cookieuid)):
			$this->user['uid'] = $this->session->userdata('userid');
			if($this->user['uid']):
				$userinfo = $this->mdadmins->read_record($this->user['uid']);
				if($userinfo):
					$this->user['ulogin']			= $userinfo['login'];
					$this->user['uemail']			= '';
					$this->loginstatus['status'] 	= TRUE;
				endif;
			endif;
			
			if($this->session->userdata('logon') != md5($userinfo['login'])):
				$this->loginstatus['status'] = FALSE;
				$this->user = array();
			endif;
		endif;
	}
	
	public function index(){
		
		$pagevar = array(
			'title'			=> 'Цимлянские вина | Главная страница',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl' 		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'news'			=> $this->mdevents->read_records_limit(array('1'),$this->language.'_events',5,0),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		for($i=0;$i<count($pagevar['news']);$i++):
			$pagevar['news'][$i]['date'] = $this->operation_dot_date($pagevar['news'][$i]['date']);
		endfor;
		
		$this->session->set_userdata('backpath',$pagevar['baseurl'].$this->uri->uri_string());
		$this->load->view($pagevar['language']."/users_interface/index",$pagevar);
	}
	
	public function events(){
		
		$from = intval($this->uri->segment(3));
		$pagevar = array(
			'title'			=> 'Цимлянские вина | Нащи новости и события',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl' 		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'events'		=> $this->mdevents->read_records_limit(array(1),$this->language.'_events',3,$from),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		for($i=0;$i<count($pagevar['events']);$i++):
			$pagevar['events'][$i]['date'] = $this->operation_dot_date($pagevar['events'][$i]['date']);
			$pagevar['events'][$i]['content'] = strip_tags($pagevar['events'][$i]['content']);
			if(mb_strlen($pagevar['events'][$i]['content'],'UTF-8') > 450):
				$pagevar['events'][$i]['content'] = mb_substr($pagevar['events'][$i]['content'],0,450,'UTF-8');	
				$pos = mb_strrpos($pagevar['events'][$i]['content'],' ',0,'UTF-8');
				$pagevar['events'][$i]['content'] = mb_substr($pagevar['events'][$i]['content'],0,$pos,'UTF-8');
				$pagevar['events'][$i]['content'] .= ' ... ';
			endif;
		endfor;
		
		$config['base_url'] 		= $pagevar['baseurl'].'events/from/';
		$config['uri_segment'] 		= 3;
		$config['total_rows'] 		= $this->mdevents->count_records($this->language.'_events');
		$config['per_page'] 		= 3;
		$config['num_links'] 		= 6;
		$config['first_link']		= '<img src="'.$pagevar['baseurl'].'images/arrow-left.png">';
		$config['last_link'] 		= '<img src="'.$pagevar['baseurl'].'images/arrow-right.png">';
		$config['next_link'] 		= '<img src="'.$pagevar['baseurl'].'images/arrow-right.png">';
		$config['prev_link'] 		= '<img src="'.$pagevar['baseurl'].'images/arrow-left.png">';
		$config['cur_tag_open']		= '<a class="current none" href="#">';
		$config['cur_tag_close'] 	= '</a>';
		
		$this->pagination->initialize($config);
		$pagevar['pages'] = $this->pagination->create_links();
		
		$this->load->view($pagevar['language']."/users_interface/events",$pagevar);
	}
	
	public function view_events(){
	
		$eid = $this->mdevents->read_field_translit($this->uri->segment(2),'id',$this->language.'_events');
//		print_r($eid);exit;
		if(!$eid):
			redirect($_SERVER['HTTP_REFERER']);
		endif;
		$pagevar = array(
			'title'			=> 'Цимлянские вина | Нащи новости и события',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl' 		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'news'			=> $this->mdevents->read_record($eid,$this->language.'_events'),
			'readnews'		=> $this->mdunion->events_type_without_limit(array(1),$eid,$this->language,3,0),
			'events'		=> $this->mdunion->events_type_limit(array(2,3,4),$this->language,3,0),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		$pagevar['news']['date'] = $this->operation_dot_date($pagevar['news']['date']);
		for($i=0;$i<count($pagevar['readnews']);$i++):
			$pagevar['readnews'][$i]['date'] = $this->operation_dot_date($pagevar['readnews'][$i]['date']);
		endfor;
		for($i=0;$i<count($pagevar['events']);$i++):
			$pagevar['events'][$i]['date'] = $this->operation_no_year($pagevar['events'][$i]['date']);
		endfor;
		
		$this->load->view($pagevar['language']."/users_interface/view_event",$pagevar);
	}
	
	public function production(){
		
		$from = intval($this->uri->segment(3));
		$pagevar = array(
			'title'			=> 'Цимлянские вина | Нащи новости и события',
			'description'	=> 'Игристые вина',
			'author'		=> '',
			'baseurl' 		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'language'		=> $this->language,
			'userinfo'		=> $this->user,
			'category'		=> $this->mdcategory->read_records($this->language.'_category'),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		$this->load->view($pagevar['language']."/users_interface/production",$pagevar);
	}
	
	public function admin_login(){
	
		$pagevar = array(
			'title'			=> 'Цимлянские вина | Главная страница',
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
		
		if($this->input->post('submit')):
			$_POST['submit'] == NULL;
			$user = $this->mdadmins->auth_user($this->input->post('login'),$this->input->post('password'));
			if(!$user):
				$this->session->set_userdata('msgr','Имя пользователя и пароль не совпадают');
				redirect($this->uri->uri_string());
			else:
				$session_data = array('logon'=>md5($user['login']),'userid'=>$user['id']);
				$this->session->set_userdata($session_data);
				redirect("admin-panel/actions/control");
			endif;
		endif;
		
		if($this->loginstatus['status']):
			redirect('admin-panel/actions/control');
		endif;
		
		$this->load->view($pagevar['language']."/admin_interface/login",$pagevar);
	}

	/******************************************************** functions ******************************************************/	
	
	public function viewimage(){
		
		$section = $this->uri->segment(1);
		$id = $this->uri->segment(3);
		switch ($section):
			case 'events' 	: $image = $this->mdevents->get_image($id,$this->language.'_events'); break;
			case 'category' : $image = $this->mdcategory->get_image($id,$this->language.'_category'); break;
		endswitch;
		header('Content-type: image/gif');
		echo $image;
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

	public function operation_no_year($field){
			
		$list = preg_split("/-/",$field);
		$pattern = "/(\d+)(-)(\w+)(-)(\d+)/i";
		$replacement = "\$5.$3"; 
		return preg_replace($pattern, $replacement,$field);
	}

}