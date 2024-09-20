<?php

function dobrogo_body_classes($classes)
{
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'dobrogo_body_classes');
