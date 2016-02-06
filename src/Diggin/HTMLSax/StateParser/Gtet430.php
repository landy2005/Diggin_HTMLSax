<?php


namespace Diggin\HTMLSax\StateParser;

use Diggin\HTMLSax\StateParser;



/**
* Parser for PHP Versions equal to or greater than 4.3.0. Uses a faster
* parsing mechanism than the equivalent PHP < 4.3.0 subclass of StateParser
* @package Diggin_HTMLSax
* @access protected
* @see Diggin_HTMLSax_StateParser_Lt430
*/
class Gtet430 extends StateParser {
    /**
    * Constructs Diggin_HTMLSax_StateParser_Gtet430 defining available
    * parser options
    * @var Diggin_HTMLSax instance of user front end class
    * @access protected
    */
    function __construct(& $htmlsax) {
        parent::__construct($htmlsax);
        $this->parser_options['XML_OPTION_TRIM_DATA_NODES'] = 0;
        $this->parser_options['XML_OPTION_CASE_FOLDING'] = 0;
        $this->parser_options['XML_OPTION_LINEFEED_BREAK'] = 0;
        $this->parser_options['XML_OPTION_TAB_BREAK'] = 0;
        $this->parser_options['XML_OPTION_ENTITIES_PARSED'] = 0;
        $this->parser_options['XML_OPTION_ENTITIES_UNPARSED'] = 0;
        $this->parser_options['XML_OPTION_STRIP_ESCAPES'] = 0;
    }
    /**
    * Returns a string from the current position until the first instance of
    * one of the characters in the supplied string argument.
    * @param string string to search until
    * @access protected
    * @return string
    */
    function scanUntilCharacters($string) {
        $startpos = $this->position;
        $length = strcspn($this->rawtext, $string, $startpos);
        $this->position += $length;
        return substr($this->rawtext, $startpos, $length);
    }

    /**
    * Moves the position forward past any whitespace characters
    * @access protected
    * @return void
    */
    function ignoreWhitespace() {
        $this->position += strspn($this->rawtext, " \n\r\t", $this->position);
    }

    /**
    * Begins the parsing operation, setting up the parsed and unparsed
    * Diggin entity decorators if necessary then delegating further work
    * to parent
    * @param string Diggin document to parse
    * @access protected
    * @return void
    */
    function parse($data) {
        parent::parse($data);
    }
}