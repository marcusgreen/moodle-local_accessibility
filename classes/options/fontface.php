<?php

namespace local_accessibility\options;

defined('MOODLE_INTERNAL') or die();

class fontface extends optionbase {
    public function __construct() {
        parent::__construct(get_string('fontface', 'local_accessibility'), 'accessibility_fontface');
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

        $PAGE->requires->js_call_amd('local_accessibility/fontface', 'init');
    }

    public function getcontent() {
        /**
         * @var \core_renderer $OUTPUT
         */
        global $OUTPUT;
        return $OUTPUT->render_from_template('local_accessibility/options/fontface', [
            'name' => $this->name
        ]);
    }
}
