<?php
/**
 * StartingState searches for the start of any XML tag
 * @package XML_HTMLSax3
 * @access protected
 */

namespace XML\HTMLSax3;

class StartingState  {
    /**
     * @param XML_HTMLSax3_StateParser subclass
     * @return StateInterface::STATE_TAG
     * @access protected
     */
    function parse($context) {
        $data = $context->scanUntilString('<');
        if ($data != '') {
            $context->handler_object_data->
            {$context->handler_method_data}($context->htmlsax, $data);
        }
        $context->IgnoreCharacter();
        return StateInterface::STATE_TAG;
    }
}