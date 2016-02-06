<?php


namespace XML\HTMLSax3;

use XML\HTMLSax3\StateInterface;



/**
 * Deals with XML escapes handling comments and CDATA correctly
 * @package XML_HTMLSax3
 * @access protected
 */
class EscapeState {
    /**
     * @param XML_HTMLSax3_StateParser subclass
     * @return XML_HTMLSax3_StateInterface::STATE_START
     * @access protected
     */
    function parse($context) {
        $char = $context->ScanCharacter();
        if ($char == '-') {
            $char = $context->ScanCharacter();
            if ($char == '-') {
                $context->unscanCharacter();
                $context->unscanCharacter();
                $text = $context->scanUntilString('-->');
                $text .= $context->scanCharacter();
                $text .= $context->scanCharacter();
            } else {
                $context->unscanCharacter();
                $text = $context->scanUntilString('>');
            }
        } else if ( $char == '[') {
            $context->unscanCharacter();
            $text = $context->scanUntilString(']>');
            $text.= $context->scanCharacter();
        } else {
            $context->unscanCharacter();
            $text = $context->scanUntilString('>');
        }

        $context->IgnoreCharacter();
        if ($text != '') {
            $context->handler_object_escape->
            {$context->handler_method_escape}($context->htmlsax, $text);
        }
        return StateInterface::STATE_START;
    }
}