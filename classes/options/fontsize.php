<?php

namespace local_accessibility\options;

defined('MOODLE_INTERNAL') or die();

class fontsize extends optionrange {
    public function __construct() {
        parent::__construct(
            get_string('fontsize', 'local_accessibility'),
            'fontsize',
            0.5,
            2,
            0.25,
            1
        );
    }

    public function init() {
        /**
         * @var \moodle_page $PAGE
         */
        global $PAGE;

        $userconfig = $this->getuserconfig();
        if ($userconfig) {
            $this->addbodyclass($userconfig);
        }

        $PAGE->requires->js_call_amd('local_accessibility/fontsize', 'init', [$userconfig]);
    }
}
