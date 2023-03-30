<?php

namespace local_accessibility\options;

defined('MOODLE_INTERNAL') or die();

class backgroundcolour extends optioncolor {
    public function __construct() {
        parent::__construct('Background Colour', 'accessibility_backgroundcolour');
    }

    public function init() {
        /**
         * @var \moodle_page $PAGE
         */
        global $PAGE;
        $PAGE->requires->js_call_amd('local_accessibility/colour', 'init', [$this->name, 'background-color']);
    }
}
