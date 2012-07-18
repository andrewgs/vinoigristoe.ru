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
				$this->control_add_events();
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