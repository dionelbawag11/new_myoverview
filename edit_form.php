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
 * Form for editing block instances.
 *
 * @package     block_myoverview_plus
 * @copyright   2021 Laurent David <laurent@call-learning.fr>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_myoverview_plus_edit_form extends block_edit_form {

    /**
     * Extends the configuration form for block_myoverview.
     *
     * @param object $mform
     * @throws coding_exception
     */
    protected function specific_definition($mform) {
        
        // Section header title.
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));
        $mform->addElement('text',
            'config_title',
            get_string('title', 'block_myoverview_plus')
        );
        $mform->setDefault('config_title', get_string('pluginname', 'block_myoverview_plus'));
        $mform->setType('config_title', PARAM_TEXT);
    }
}
