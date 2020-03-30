<?php

/**
 * @param array $attr
 * @return string
 */
function html_attr(array $attr): string
{
    $results = '';
    foreach ($attr as $key => $item) {
        $results .= "$key=\"$item\" ";
    }
    return $results;
}