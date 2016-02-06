<?php
/**
 * Strips the HTML comment markers or CDATA sections from an escape.
 * If XML_OPTIONS_FULL_ESCAPES is on, this decorator is not used.<br />
 * @package XML_HTMLSax3
 * @access protected
 */

namespace XML\HTMLSax3\Escape;




class Stripper {
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
    function strip($parser, $data) {
        // Check for HTML comments first
        if ( substr($data,0,2) == '--' ) {
            $patterns = array(
                '/^\-\-/',          // Opening comment: --
                '/\-\-$/',          // Closing comment: --
            );
            $data = preg_replace($patterns,'',$data);

            // Check for XML CDATA sections (note: don't do both!)
        } else if ( substr($data,0,1) == '[' ) {
            $patterns = array(
                '/^\[.*CDATA.*\[/s', // Opening CDATA
                '/\].*\]$/s',       // Closing CDATA
            );
            $data = preg_replace($patterns,'',$data);
        }

        $this->orig_obj->{$this->orig_method}($this, $data);
    }
}