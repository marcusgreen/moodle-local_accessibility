<?php

function local_accessibility_before_http_headers() {
    /**
     * @var \moodle_page $PAGE
     */
    global $PAGE;
    $PAGE->requires->css('/local/accessibility/styles2.css');
}

function local_accessibility_before_footer() {
    /**
     * @var \core_renderer $OUTPUT
     * @var \moodle_page $PAGE
     */
    global $OUTPUT, $PAGE;
    $PAGE->requires->js_call_amd('local_accessibility/init', 'init');
    $mainbutton = $OUTPUT->render_from_template('local_accessibility/mainbutton', null);
    return $mainbutton;
}
