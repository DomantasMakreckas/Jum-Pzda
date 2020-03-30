<?php

/**
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_max_100($field_input, &$field)
{
    if (strlen($field_input > 100)) {
        $field['error'] = 'Ivesta per daug simboliu';
        return false;
    }
    return true;
}