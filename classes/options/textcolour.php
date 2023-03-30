<?php

namespace local_accessibility\options;

defined('MOODLE_INTERNAL') or die();

class textcolour extends optioncolor {
    public function __construct() {
        parent::__construct('Text Colour', 'accessibility_textcolour');
    }

    public function init() {
        /**
         * @var \moodle_page $PAGE
         */
        global $PAGE;
        $PAGE->requires->js_call_amd('local_accessibility/colour', 'init', [$this->name, 'color']);
    }
}
