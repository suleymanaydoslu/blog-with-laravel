<?php

/**
 * Fixes turkish slug character problem
 *
 * @param string $title
 * @param string $separator
 *
 * @return string
 */
if (!function_exists('turkish_slug')) {
    function turkish_slug($title = '', $separator = '-')
    {
        $title = str_replace(
            ['ü', 'Ü', 'ö', 'Ö'],
            ['u', 'U', 'o', 'O'],
            $title
        );
        return str_slug($title, $separator);
    }
}
