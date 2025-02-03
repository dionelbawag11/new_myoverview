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

use block_myoverview_plus\output\main;

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/blocks/myoverview_plus/lib.php');
require_once($CFG->dirroot . '/blocks/myoverview/block_myoverview.php');

class block_myoverview_plus extends block_myoverview {

    /**
     * Initializes class member variables.
     */
    public function init() {
        // Set block title.
        $this->title = get_string('pluginname', 'block_myoverview_plus');
    }

    /**
     * Returns the block contents.
     *
     * @return stdClass The block contents.
     */
    public function get_content() {
        if (isset($this->content)) {
            return $this->content;
        }

        // Fetch user preferences.
        $group = get_user_preferences('block_myoverview_user_grouping_preference');
        $sort = get_user_preferences('block_myoverview_user_sort_preference');
        $view = get_user_preferences('block_myoverview_user_view_preference', BLOCK_MYOVERVIEW_VIEW_CARD);
        $paging = get_user_preferences('block_myoverview_user_paging_preference');
        $customfieldvalue = get_user_preferences('block_myoverview_user_grouping_customfieldvalue_preference');

        // Ensure carousel view is included.
        if (!in_array($view, [
            BLOCK_MYOVERVIEW_VIEW_CARD,
            BLOCK_MYOVERVIEW_VIEW_LIST,
            BLOCK_MYOVERVIEW_VIEW_SUMMARY,
            BLOCK_MYOVERVIEW_VIEW_CAROUSEL // Added carousel view support.
        ])) {
            $view = BLOCK_MYOVERVIEW_VIEW_CARD; // Default fallback.
        }
        var_dump($group, $sort, $view, $paging);
        // Create renderable output.
        $renderable = new main($group, $sort, $view, $paging, $customfieldvalue);
        $this->content = new stdClass();
        
        // Use the custom renderer.
        $renderer = $this->page->get_renderer('block_myoverview_plus');
        $this->content->text = $renderer->render($renderable);
        $this->content->footer = '';
        return $this->content;
    }

    /**
     * Defines configuration data.
     *
     * The function is called immediately after init().
     */
    public function specialization() {
        // Load user-defined title and make sure it's never empty.
        if (empty($this->config->title)) {
            $this->title = get_string('pluginname', 'block_myoverview_plus');
        } else {
            $this->title = $this->config->title;
        }
    }

    /**
     * Enables global configuration of the block in settings.php.
     *
     * @return bool True if the global configuration is enabled.
     */
    public function has_config() {
        return true;
    }

    /**
     * Self-test method for the block.
     *
     * @return bool True if the self-test passes.
     */
    public function _self_test() {
        return true;
    }
}