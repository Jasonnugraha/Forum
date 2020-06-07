<?php
use PHPUnit\Framework\TestCase;
require_once('server.php');

class serverTest extends TestCase
{
  

  public function testConnectionIsValid()
  {
    // test to ensure that the object from an fsockopen is valid
    $connObj = new server();
    $serverName = 'localhost:8080';
    $this->assertTrue($connObj->connectToServer($serverName) !== false);
  }
}
?>