<?php
// extend_lib.php
defined('MOODLE_INTERNAL') || die();
define('BLOCK_MYOVERVIEW_VIEW_CAROUSEL', 'carousel');

// Add more custom definitions or functions here
$preferences['block_myoverview_user_view_preference'] = array(
    'null' => NULL_NOT_ALLOWED,
    'default' => BLOCK_MYOVERVIEW_VIEW_CAROUSEL,
    'type' => PARAM_ALPHA,
    'choices' => array(
        BLOCK_MYOVERVIEW_VIEW_CARD,
        BLOCK_MYOVERVIEW_VIEW_LIST,
        BLOCK_MYOVERVIEW_VIEW_CAROUSEL,
        BLOCK_MYOVERVIEW_VIEW_SUMMARY,
 
    ),
    'permissioncallback' => [core_user::class, 'is_current_user'],
);