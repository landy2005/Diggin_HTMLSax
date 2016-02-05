<?php
class MethodArgumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException 
     */
    public function testSetObjectMethod()
    {
        $parser = new XML_HTMLSax3();
        $parser->set_object('string');
    }
    
    /**
     * @expectedException \InvalidArgumentException 
     */
    public function testSetOptionMethod()
    {
        $parser = new XML_HTMLSax3();
        $parser->set_option('unexpected option name ', false);
    }
}