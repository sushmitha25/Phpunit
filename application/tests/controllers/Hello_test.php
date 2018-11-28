<?php
class Hello_test extends TestCase {
	public function test_get_hello()
	{
		$output=$this->request('GET',['Hello','get_hello']);
		$expected='<h2>hello</h2>';
		$this->assertContains($expected,$output);
	}
}