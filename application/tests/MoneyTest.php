<?php
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{


	public function testindex(){
		$d = new Welcome();
		$e = $d->index();
		 $this->assertEquals("hii", $e);


	}	


}
