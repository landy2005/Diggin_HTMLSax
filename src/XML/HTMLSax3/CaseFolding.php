<?php
/**
 * Coverts tag names to upper case
 * @package XML_HTMLSax3
 * @access protected
 */
class XML_HTMLSax3_CaseFolding {
    /**
     * Original handler object
     * @var object
     * @access private
     */
    var $orig_obj;
    /**
     * Original open handler method
     * @var string
     * @access private
     */
    var $orig_open_method;
    /**
     * Original close handler method
     * @var string
     * @access private
     */
    var $orig_close_method;
    /**
     * Constructs XML_HTMLSax3_CaseFolding
     * @param object handler object being decorated
     * @param string original open handler method
     * @param string original close handler method
     * @access protected
     */
    function __construct($orig_obj, $orig_open_method, $orig_close_method) {
        $this->orig_obj = $orig_obj;
        $this->orig_open_method = $orig_open_method;
        $this->orig_close_method = $orig_close_method;
    }
    /**
     * Folds up open tag callbacks
     * @param XML_HTMLSax3
     * @param string tag name
     * @param array tag attributes
     * @access protected
     */
    function foldOpen($parser, $tag, $attrs=array(), $empty = FALSE) {
        $this->orig_obj->{$this->orig_open_method}($parser, strtoupper($tag), $attrs, $empty);
    }
    /**
     * Folds up close tag callbacks
     * @param XML_HTMLSax3
     * @param string tag name
     * @access protected
     */
    function foldClose($parser, $tag, $empty = FALSE) {
        $this->orig_obj->{$this->orig_close_method}($parser, strtoupper($tag), $empty);
    }
}