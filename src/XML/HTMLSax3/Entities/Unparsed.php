<?php
/**
 * Breaks up data by XML entities but leaves them unparsed,
 * resulting in additional calls to the data handler<br />
 * @package XML_HTMLSax3
 * @access protected
 */
class XML_HTMLSax3_Entities_Unparsed {
    /**
     * Original handler object
     * @var object
     * @access private
     */
    var $orig_obj;
    /**
     * Original handler method
     * @var string
     * @access private
     */
    var $orig_method;
    /**
     * Constructs XML_HTMLSax3_Entities_Unparsed
     * @param object handler object being decorated
     * @param string original handler method
     * @access protected
     */
    function __construct($orig_obj, $orig_method) {
        $this->orig_obj = $orig_obj;
        $this->orig_method = $orig_method;
    }
    /**
     * Breaks the data up by XML entities
     * @param XML_HTMLSax3
     * @param string element data
     * @access protected
     */
    function breakData($parser, $data) {
        $data = preg_split('/(&.+?;)/',$data,-1,PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        foreach ( $data as $chunk ) {
            $this->orig_obj->{$this->orig_method}($this, $chunk);
        }
    }
}