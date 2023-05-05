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
 * Plugin upgrade steps are defined here.
 *
 * @package     local_accessibility
 * @category    upgrade
 * @copyright   2023 Ponlawat Weerapanpisit <ponlawat_w@outlook.co.th>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Execute local_accessibility upgrade from the given old version.
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_local_accessibility_upgrade($oldversion) {
    /**
     * @var \moodle_database $DB
     */
    global $DB, $CFG;

    $dbman = $DB->get_manager();

    if ($oldversion < 2023050500) {
        $dbman->install_from_xmldb_file($CFG->dirroot . '/local/accessibility/db/install.xml');
        upgrade_plugin_savepoint(true, 2023050500, 'local', 'accessibility');
    }

    return true;
}
