<?php

namespace local_accessibility\external;

use external_function_parameters;
use external_single_structure;
use external_value;

defined('MOODLE_INTERNAL') or die();

require_once(__DIR__ . '/../../lib.php');

class saveoptionconfig extends \external_api {
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
            'optionname' => new external_value(PARAM_ALPHANUMEXT, 'Option Name', VALUE_REQUIRED, NULL_NOT_ALLOWED),
            'configvalue' => new external_value(PARAM_TEXT, 'Configuration Value')
        ]);
    }

    public static function execute_returns(): external_single_structure {
        return new external_single_structure([
            'success' => new external_value(PARAM_BOOL, 'True if success')
        ]);
    }

    public static function execute($params) {
        $option = local_accessibility_getoptionbyname($params['optionname']);
        $option->setuserconfig($params['configvalue']);
        return ['success' => true];
    }
}
