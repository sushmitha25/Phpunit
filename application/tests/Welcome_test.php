<?php 
class Welcome_test extends TestCase
{
	/* public function test_index()
	{
		$output = $this->request('GET', ['Welcome', 'index']);
		$this->assertContains('<title>Welcome to CodeIgniter</title>', $output);
	}
	public function test_method_404()
	{
		$this->request('GET', ['Welcome', 'method_not_exist']);
		$this->assertResponseCode(404);
	}
	public function test_APPPATH()
	{
		$actual = realpath(APPPATH);
		$expected = realpath(__DIR__ . '/..');
		$this->assertEquals(
			$expected,
			$actual,
			'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
		);
	}*/
	 public function testsuhail(){
                $d = new Welcome();
                $e = $d->suhail();
                 $this->assertEquals("hii", $e);
       }
/*	public function testmymodel(){
		$v = new Welcome();
		$f = $v->mymodel();
		$this->assertEquals("hii", $f);

	}*/
/*	public function test_suhail(){
		$v = new Welcome();
                $f = $v->suhail();
                $this->assertEquals("hii", $f);

	}*/

}
