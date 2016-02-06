<?php
/**
 * Decides which state to move one from after StartingState
 * @package XML_HTMLSax3
 * @access protected
 */
class XML_HTMLSax3_TagState {
    /**
     * @param XML_HTMLSax3_StateParser subclass
     * @return constant the next state to move into
     * @access protected
     */
    function parse($context) {
        switch($context->ScanCharacter()) {
            case '/':
                return XML_HTMLSAX3_STATE_CLOSING_TAG;
                break;
            case '?':
                return XML_HTMLSAX3_STATE_PI;
                break;
            case '%':
                return XML_HTMLSAX3_STATE_JASP;
                break;
            case '!':
                return XML_HTMLSAX3_STATE_ESCAPE;
                break;
            default:
                $context->unscanCharacter();
                return XML_HTMLSAX3_STATE_OPENING_TAG;
        }
    }
}