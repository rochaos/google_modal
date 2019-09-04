<?php

namespace SchuWeb;

class Modal extends \ContentElement
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'gm_sample';

    /**
     * Compile the content element
     */
    protected function compile()
    {
        if (TL_MODE == 'BE') {
            $this->genBeOutput();
        } else {
            $this->genFeOutput();
        }
    }

    /**
     * Create backend view
     * @return string
     */
    private function genBeOutput()
    {
        $this->strTemplate          = 'be_wildcard';
        $this->Template             = new \BackendTemplate($this->strTemplate);
        $this->Template->title      = 'Test element';
    }

    /**
     * Create frontend view
     *
     */
    private function genFeOutput()
    {
        $GLOBALS['TL_CSS'][]        = 'system/modules/google_modal/assets/styles.css';
        $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/google_modal/assets/script.js';

        
    }
}
