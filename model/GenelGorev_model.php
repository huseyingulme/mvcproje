<?php

class GenelGorev_model extends Model {
	
	
	function __construct() {		
		parent:: __construct();
	}
	
	function Verial($tabloisim,$kosul) {
		
		return $this->db->listele($tabloisim,$kosul);
	
		
		
	}
	
	
	function YorumEkleme($tabloisim,$sutunadlari,$veriler) {
		
		return $this->db->Ekle($tabloisim,$sutunadlari,$veriler);
	
		
		
	}
	
		
	
			function iletisimForm($tabloisim,$sutunadlari,$veriler) {
		
		return $this->db->Ekle($tabloisim,$sutunadlari,$veriler);
	
		
		
	}
	
		

	

	
	

	

	
}




?>