<?php

class Tenant_model_Test extends CI_Model{

	function testgetTenants(){
		
		$a = new Tenant_model();
		$b = $a->getTenants();
		echo "test";
		print_r($b);
		$this->assertTrue($b->$rs->result());
	}
}
?>
		
		
