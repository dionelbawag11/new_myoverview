define(['jquery', 'core/ajax', 'core/templates'], function($, ajax, templates) {
    return {
        init: function() {
            var root = $('[data-region="courses-view"]');
            var view = root.attr('data-display');
            var grouping = root.attr('data-grouping');
            var sort = root.attr('data-sort');

            // Fetch courses via AJAX.
            ajax.call([{
                methodname: 'block_myoverview_plus_get_courses',
                args: {
                    view: view,
                    grouping: grouping,
                    sort: sort
                },
                done: function(response) {
                    templates.render('block_myoverview_plus/courses', response)
                        .then(function(html) {
                            $('[data-region="course-view-content"]').html(html);
                        });
                },
                fail: function(error) {
                    console.error('Failed to fetch courses:', error);
                }
            }]);
        }
    };
});