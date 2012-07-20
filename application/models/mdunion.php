<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Mdunion extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function events_limit($prefix,$count,$from){
		
		$events = $prefix.'_events';
		$type = $prefix.'_type_events';
		
		$query = "SELECT $events.id,$events.title,$events.translit,$events.content,$events.date,$type.title AS tptitle FROM $events INNER JOIN $type ON $events.type_event = $type.id ORDER BY $events.date DESC,$events.id DESC LIMIT $from,$count";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function events_type_limit($types,$prefix,$count,$from){
		
		$events = $prefix.'_events';$type = $prefix.'_type_events';
		$in = '';
		for($i=0;$i<count($types);$i++):
			$in .=$types[$i];
			if(isset($types[$i+1])):
				$in .= ',';
			endif;
		endfor;
		$query = "SELECT $events.id,$events.title,$events.translit,$events.content,$events.date,$type.title AS tptitle FROM $events INNER JOIN $type ON $events.type_event = $type.id WHERE $events.type_event IN ($in) ORDER BY $events.date DESC,$events.id DESC LIMIT $from,$count";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function events_type_without_limit($types,$without,$prefix,$count,$from){
		
		$events = $prefix.'_events';$type = $prefix.'_type_events';
		$in = '';
		for($i=0;$i<count($types);$i++):
			$in .=$types[$i];
			if(isset($types[$i+1])):
				$in .= ',';
			endif;
		endfor;
		$query = "SELECT $events.id,$events.title,$events.translit,$events.content,$events.date,$type.title AS tptitle FROM $events INNER JOIN $type ON $events.type_event = $type.id WHERE $events.type_event IN ($in) AND $events.id != $without ORDER BY $events.date DESC,$events.id DESC LIMIT $from,$count";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}

	function magazines_limit($prefix,$count,$from){
		
		$magazine = $prefix.'_magazines';
		$country = $prefix.'_country';
		$city = $prefix.'_city';
		
		$query = "SELECT $magazine.id,$magazine.title,$magazine.translit,$magazine.address,$magazine.phones,$magazine.country AS countryid,$magazine.city AS cityid,$country.title AS country,$city.title AS city FROM $magazine INNER JOIN $country ON $magazine.country = $country.id INNER JOIN $city ON $magazine.city = $city.id ORDER BY $magazine.title ASC,$country.title, $city.title LIMIT $from,$count";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function magazines_all($prefix){
		
		$magazine = $prefix.'_magazines';
		$country = $prefix.'_country';
		$city = $prefix.'_city';
		
		$query = "SELECT $magazine.id,$magazine.title,$magazine.translit,$magazine.address,$magazine.phones,$magazine.country AS countryid,$magazine.city AS cityid,$country.title AS country,$city.title AS city FROM $magazine INNER JOIN $country ON $magazine.country = $country.id INNER JOIN $city ON $magazine.city = $city.id ORDER BY $magazine.title ASC,$country.title, $city.title";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function magazines_product($product,$prefix){
		
		$magazine = $prefix.'_magazines';
		$country = $prefix.'_country';
		$city = $prefix.'_city';
		
		$query = "SELECT $magazine.id,$magazine.title,$magazine.translit,$magazine.address,$magazine.phones,$magazine.country AS countryid,$magazine.city AS cityid,$country.title AS country,$city.title AS city FROM $magazine INNER JOIN $country ON $magazine.country = $country.id INNER JOIN $city ON $magazine.city = $city.id ORDER BY $magazine.title ASC,$country.title, $city.title";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
}