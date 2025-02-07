<?php 

defined('MOODLE_INTERNAL') || die;
$functions = [
    'block_myoverview_plus_get_enrolled_courses_by_timeline_classification' => [
        'classname' => 'block_myoverview_plus\external\get_enrolled_courses_by_timeline',
        'methodname' => 'get_enrolled_courses_by_timeline_classification',
        'description' => 'List of enrolled courses for the given timeline classification (past, inprogress, or future). Filter'
            . ' course by role on the course',
        'type' => 'read',
        'ajax' => true,
        'services' => array(MOODLE_OFFICIAL_MOBILE_SERVICE),
    ]
];
