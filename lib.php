<?php

require_once(__DIR__ . '/classes/optionbase.php');
require_once(__DIR__ . '/classes/optionrange.php');
require_once(__DIR__ . '/classes/optioncolour.php');
require_once(__DIR__ . '/classes/options/fontsize.php');
require_once(__DIR__ . '/classes/options/fontface.php');
require_once(__DIR__ . '/classes/options/backgroundcolour.php');
require_once(__DIR__ . '/classes/options/textcolour.php');

/**
 * @return local_accessibility\options\optionbase[]
 */
function local_accessibility_get_options() {
    return [
        new local_accessibility\options\fontsize(),
        new local_accessibility\options\fontface(),
        new local_accessibility\options\backgroundcolour(),
        new local_accessibility\options\textcolour()
    ];
}

function local_accessibility_before_http_headers() {
    /**
     * @var \moodle_page $PAGE
     */
    global $PAGE;
    $PAGE->requires->css('/local/accessibility/styles-dev.css');
    $PAGE->requires->css('/local/accessibility/classes/options/fontsize.css');
    $PAGE->requires->css('/local/accessibility/classes/options/fontface.css');
}

function local_accessibility_before_footer() {
    /**
     * @var \core_renderer $OUTPUT
     * @var \moodle_page $PAGE
     */
    global $OUTPUT, $PAGE;
    
    $PAGE->requires->js_call_amd('local_accessibility/panel', 'init');
    
    $mainbutton = $OUTPUT->render_from_template('local_accessibility/mainbutton', null);
    
    $options = [];
    $optioninstances = local_accessibility_get_options();
    foreach ($optioninstances as $optioninstance) {
        $optioninstance->init();
        $options[] = [
            'name' => $optioninstance->getname(),
            'title' => $optioninstance->gettitle(),
            'class' => $optioninstance->getclass(),
            'content' => $optioninstance->getcontent()
        ];
    }
    $panel = $OUTPUT->render_from_template('local_accessibility/panel', ['options' => $options]);

    return $mainbutton . $panel;
}
