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
		
		$whereby = $prefix.'_whereby';
		$country = $prefix.'_country';
		$city = $prefix.'_city';
		$products = $prefix.'_products';
		$magazines = $prefix.'_magazines';
		
		$query = "SELECT $whereby.id,$country.title AS country,$city.title AS city,$magazines.title,$magazines.translit,$magazines.address,$magazines.phones FROM $whereby INNER JOIN $country ON $whereby.country = $country.id INNER JOIN $city ON $whereby.city = $city.id INNER JOIN $products ON $whereby.product = $products.id INNER JOIN $magazines ON $whereby.magazine = $magazines.id WHERE $whereby.product = $product ORDER BY $magazines.title, $country.title, $city.title";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}

	function products_catalog_limit($prefix,$count,$from){
		
		$products = $prefix.'_products';
		$category = $prefix.'_category';
		$series = $prefix.'_series';
		
		$query = "SELECT $products.id,$products.title,$products.translit,$products.type,$products.category,$products.series,$category.title AS ctitle,$category.id AS cid,$category.translit AS ctranslit,$series.title AS stitle,$series.translit AS stranslit, $series.default AS sdefault FROM $products INNER JOIN $category ON $products.category = $category.id INNER JOIN $series ON $products.series = $series.id WHERE $products.showitem = 1 ORDER BY $products.category,$products.series,$products.title LIMIT $from,$count";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function products_random_without_limit($cid,$product,$prefix,$count){
		
		$products = $prefix.'_products';
		$category = $prefix.'_category';
		$series = $prefix.'_series';
		
		$query = "SELECT $products.id,$products.title,$products.translit,$products.type,$products.category,$products.series,$category.title AS ctitle,$category.translit AS ctranslit,$series.title AS stitle,$series.translit AS stranslit FROM $products INNER JOIN $category ON $products.category = $category.id INNER JOIN $series ON $products.series = $series.id WHERE $products.id != $product AND $products.category = $cid AND $products.showitem = 1 ORDER BY RAND() LIMIT $count";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function product_catalog($product,$prefix){
		
		$products = $prefix.'_products';
		$category = $prefix.'_category';
		$series = $prefix.'_series';
		
		$query = "SELECT $products.id,$products.title,$products.translit,$products.content,$products.type,$products.category,$products.series,$products.alcohol,$products.sugar,$category.title AS ctitle,$category.translit AS ctranslit,$series.title AS stitle,$series.translit AS stranslit FROM $products INNER JOIN $category ON $products.category = $category.id INNER JOIN $series ON $products.series = $series.id WHERE $products.id = $product AND $products.showitem = 1";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0];
		return NULL;
	}

	function groupby_series($prefix){
		
		$products = $prefix.'_products';
		$series = $prefix.'_series';
		
		$query = "SELECT $series.id,$series.title,$series.default,$series.category FROM $products INNER JOIN $series ON $products.series = $series.id GROUP BY $series.id ORDER BY $series.id,$series.title";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}

	function products_filtr_limit($filtr,$filtr_field,$prefix,$count,$from){
		
		$products = $prefix.'_products';
		$category = $prefix.'_category';
		$series = $prefix.'_series';
		
		$query = "SELECT $products.id,$products.title,$products.translit,$products.type,$products.category,$products.series,$category.title AS ctitle,$category.translit AS ctranslit,$series.title AS stitle,$series.translit AS stranslit FROM $products INNER JOIN $category ON $products.category = $category.id INNER JOIN $series ON $products.series = $series.id WHERE $products.$filtr_field = $filtr AND $products.showitem = 1 ORDER BY $products.category,$products.series,$products.title LIMIT $from,$count";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}

}