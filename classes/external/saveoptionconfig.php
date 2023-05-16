<?php

namespace local_accessibility\external;

defined('MOODLE_INTERNAL') or die();

require_once(__DIR__ . '/../../lib.php');
require_once(__DIR__ . '/../../../../lib/externallib.php');

class saveoptionconfig extends \core_external\external_api {
    public static function execute_parameters(): \core_external\external_function_parameters {
        return new \core_external\external_function_parameters([
            'optionname' => new \core_external\external_value(PARAM_ALPHANUMEXT, 'Option Name', VALUE_REQUIRED, '', NULL_NOT_ALLOWED),
            'configvalue' => new \core_external\external_value(PARAM_TEXT, 'Configuration Value', VALUE_OPTIONAL, null, NULL_ALLOWED)
        ]);
    }

    public static function execute_returns(): \core_external\external_single_structure {
        return new \core_external\external_single_structure([
            'success' => new \core_external\external_value(PARAM_BOOL, 'True if success')
        ]);
    }

    public static function execute(string $optionname, $configvalue): array {
        self::validate_parameters(self::execute_parameters(), ['optionname' => $optionname, 'configvalue' => $configvalue]);
        $option = local_accessibility_getoptioninstancebyname($optionname);
        $option->setuserconfig($configvalue);
        return ['success' => true];
    }
}
