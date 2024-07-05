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
 * Block new_myoverview is defined here.
 *
 * @package     block_new_myoverview
 * @copyright   2024 Dionel <bawagdionel@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use block_new_myoverview\output\main;
defined('MOODLE_INTERNAL') || die();

global $CFG;

 require_once($CFG->dirroot . '/blocks/myoverview/block_myoverview.php');
class block_new_myoverview extends block_myoverview {

    
    /**
     * Initializes class member variables.
     */
    public function init() {
        // Needed by Moodle to differentiate between blocks.
        $this->title = get_string('pluginname', 'block_new_myoverview');
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
        $group = get_user_preferences('block_myoverview_user_grouping_preference');
        $sort = get_user_preferences('block_myoverview_user_sort_preference');
        $view = get_user_preferences('block_myoverview_user_view_preference');
        $paging = get_user_preferences('block_myoverview_user_paging_preference');
        $customfieldvalue = get_user_preferences('block_myoverview_user_grouping_customfieldvalue_preference');
        $renderable = new main($group, $sort, $view, $paging, $customfieldvalue);
        $renderer = $this->page->get_renderer('block_new_myoverview');
        $this->content = new stdClass();
        $this->content->text = $renderer->render($renderable);
        $this->content->footer = '';
        $this->page->requires->js_call_amd('block_new_myoverview', 'init');
        return $this->content;
    }

    /**
     * Defines configuration data.
     *
     * The function is called immediately after init().
     */
    public function specialization() {

        // Load user defined title and make sure it's never empty.
        if (empty($this->config->title)) {
            $this->title = get_string('pluginname', 'block_new_myoverview');
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

    // /**
    //  * Sets the applicable formats for the block.
    //  *
    //  * @return string[] Array of pages and permissions.
    //  */
    // public function applicable_formats() {
    //         return [
    //             'course-view' => true,
    //             'site' => true,
    //             'mod' => false,
    //             'my' => false,
    //         ];
        
    // }
    public function _self_test()
    {
        return true;
    }
}
