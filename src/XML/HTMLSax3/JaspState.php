<?php


namespace XML\HTMLSax3;

use XML\HTMLSax3\StateInterface;



/**
 * Deals with JASP/ASP markup
 * @package XML_HTMLSax3
 * @access protected
 */
class JaspState {
    /**
     * @param XML_HTMLSax3_StateParser subclass
     * @return constant XML_HTMLSax3_StateInterface::STATE_START
     * @access protected
     */
    function parse($context) {
        $text = $context->scanUntilString('%>');
        if ($text != '') {
            $context->handler_object_jasp->
            {$context->handler_method_jasp}($context->htmlsax, $text);
        }
        $context->IgnoreCharacter();
        $context->IgnoreCharacter();
        return StateInterface::STATE_START;
    }
}