// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Javascript to initialise the myoverview block.
 *
 * @copyright  2018 Bas Brands <bas@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import * as View from "block_myoverview_plus/view";
import * as ViewNav from "block_myoverview_plus/view_nav";


require(["jquery", "block_myoverview_plus/main"], function ($, Main) {
  var root = $("#block-myoverview-plus-{{uniqid}}");
  Main.init(root);
});
/**
 * Initialise all of the modules for the overview block.
 *
 * @param {object} root The root element for the overview block.
 */
export const init = (root) => {
  // Initialise the course navigation elements.
  ViewNav.init(root);
  // Initialise the courses view modules.
  View.init(root);
};

