<?php

/**
 * Deals with XML processing instructions
 * @package XML_HTMLSax3
 * @access protected
 */
class XML_HTMLSax3_PiState {
    /**
     * @param XML_HTMLSax3_StateParser subclass
     * @return constant XML_HTMLSAX3_STATE_START
     * @access protected
     */
    function parse($context) {
        $target = $context->scanUntilCharacters(" \n\r\t");
        $data = $context->scanUntilString('?>');
        if ($data != '') {
            $context->handler_object_pi->
            {$context->handler_method_pi}($context->htmlsax, $target, $data);
        }
        $context->IgnoreCharacter();
        $context->IgnoreCharacter();
        return XML_HTMLSAX3_STATE_START;
    }
}