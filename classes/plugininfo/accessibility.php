<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Accessibility widget plugin info
 *
 * @package     local_accessibility
 * @copyright   2023 Ponlawat Weerapanpisit <ponlawat_w@outlook.co.th>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_accessibility\plugininfo;

use core\plugininfo\base;

defined('MOODLE_INTERNAL') || die();

/**
 * Accessibility widget plugin info class
 */
class accessibility extends base {
    public function is_uninstall_allowed() {
        return true;
    }

    public function uninstall_cleanup() {
        /**
         * @var \moodle_database $DB
         */
        global $DB;

        $DB->delete_records('accessibility_userconfigs', ['widget' => $this->name]);

        parent::uninstall_cleanup();
    }
}
