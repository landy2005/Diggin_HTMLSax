<?php
namespace DigginTest\HTMLSax;

use Diggin\HTMLSax\HTMLSax;

class MethodArgumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException 
     */
    public function testSetObjectMethod()
    {
        $parser = new HTMLSax();
        $parser->set_object('string');
    }
    
    /**
     * @expectedException \InvalidArgumentException 
     */
    public function testSetOptionMethod()
    {
        $parser = new HTMLSax();
        $parser->set_option('unexpected option name ', false);
    }
}