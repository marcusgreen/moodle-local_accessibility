<?php

namespace local_accessibility\options;

defined('MOODLE_INTERNAL') or die();

class backgroundcolour extends optioncolor {
    public function __construct() {
        parent::__construct(get_string('backgroundcolour', 'local_accessibility'), 'accessibility_backgroundcolour');
    }

    public function init() {
        /**
         * @var \moodle_page $PAGE
         */
        global $PAGE;

        $userconfig = $this->getuserconfig();
        if ($userconfig) {
            $this->addbodyclass('accessibility-backgroundcolour');
            $PAGE->requires->css('/local/accessibility/backgroundcolourstyle.php');
        }

        $PAGE->requires->js_call_amd('local_accessibility/colour', 'init', [
            $this->name,
            'backgroundcolour',
            'background-color',
            'accessibility-backgroundcolour'
        ]);
    }
}
