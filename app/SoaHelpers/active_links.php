<?php

/**
 * @param $link_name
 *
 * @param string $active
 * @return string
 */
function set_active($link_name, $link)
{
    $active = '<span class="nav-current">' . $link_name
        . '</span>';
    $menu_link = '<a href="/' . strtolower($link
        ) .'">' . $link_name
        . '</a>';


    return Request::is(strtolower($link_name
    )) ? $active : $menu_link;






}