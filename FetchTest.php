<?php

include("FetchBase.php");
include("Fetch.php");
include("FetchResponse.php");
include("out_class.php");

class FetchTest extends PHPUnit_Framework_TestCase {

  public function testRequest(){

    $url = 'http://marcyes.com';
    $f = new Fetch($url);
    $r = $f->get();
    $this->assertTrue($r->isCode(200));
    $this->assertFalse($r->failed());

  }//method





}//class
