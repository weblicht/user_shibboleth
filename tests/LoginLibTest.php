<?php

require_once(__DIR__ . '/../../../lib/base.php');

use \OCA\user_shibboleth\LoginLib as LoginLib;

class LoginLibTest extends PHPUnit_Framework_TestCase {

	public function testEndsWith() {
		$suffix = '@example.com';
		
		$ew = LoginLib::endsWith('tom@example.com', $suffix);
		$this->assertTrue($ew);
		
		$ew = LoginLib::endsWith('tom@bad-example.com', $suffix);
                $this->assertFalse($ew);
		
		$ew = LoginLib::endsWith('tom@Example.com', $suffix, true);
                $this->assertTrue($ew);
                
                $ew = LoginLib::endsWith('tom@Example.com', $suffix, false);
                $this->assertFalse($ew);
	}
	
	public function testCheckMailOrigin() {
		$idp = 'https://idp.example.com/idp/test';
		
		$result = LoginLib::checkMailOrigin($idp, 'tom@example.com');
		$this->assertTrue($result);
		
		$result = LoginLib::checkMailOrigin($idp, 'tom@example.com.ch'); 
                $this->assertFalse($result);
	}
}
?>
