<?php
namespace DigginTest\HTMLSax;

class ContentTest extends \PHPUnit_Framework_TestCase
{
    use BasicSetupTrait;

    function testSimple() {
        $this->listener->expects($this->once())->method('dataHandler')->with($this->parser, 'stuff');
        $this->parser->parse('stuff');
    }
    function testPreservingWhiteSpace() {
        $this->listener->expects($this->once())->method('dataHandler')->with($this->parser, " stuff\t\r\n ");
        $this->parser->parse(" stuff\t\r\n ");
    }
    function testTrimmingWhiteSpace() {
        $this->listener->expects($this->once())->method('dataHandler')->with($this->parser, "stuff");
        $this->parser->set_option('XML_OPTION_TRIM_DATA_NODES');
        $this->parser->parse(" stuff\t\r\n ");
    }
}
