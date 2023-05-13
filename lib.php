<?php

require_once(__DIR__ . '/classes/optionbase.php');
require_once(__DIR__ . '/classes/optionrange.php');
require_once(__DIR__ . '/classes/optioncolour.php');
require_once(__DIR__ . '/classes/options/textcolour.php');

/**
 * @return local_accessibility\options\optionbase[]
 */
function local_accessibility_getoptions() {
    return [
        new local_accessibility\options\textcolour()
    ];
}

/**
 * Undocumented function
 *
 * @param string $optionname
 * @return local_accessibility\options\optionbase
 */
function local_accessibility_getoptionbyname($optionname) {
    switch ($optionname) {
        case 'textcolour': return new local_accessibility\options\textcolour();
    }
    throw new moodle_exception('INVALID_OPTIONNAME', 'local_accessibility');
}

function local_accessibility_before_http_headers() {
    $optioninstances = local_accessibility_getoptions();
    foreach ($optioninstances as $optioninstance) {
        $optioninstance->init();
    }
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
    $optioninstances = local_accessibility_getoptions();
    foreach ($optioninstances as $optioninstance) {
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
