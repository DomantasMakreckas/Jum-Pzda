<?php

/**
 * funkcija grazina errora, jei laukelis tuscias
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_not_empty($field_input, &$field)
{
    if (empty($field_input)) {
        $field['error'] = 'Laukas negali buti tuscias';
        return false;
    }
    return true;
}

/**
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_is_number($field_input, &$field)
{
    if (!is_numeric($field_input)) {
        $field['error'] = 'Laukas privalo buti skaicius';
        return false;
    }
    return true;
}

/**
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_is_positive($field_input, &$field)
{
    if ($field_input <= 0) {
        $field['error'] = 'Lauko verte privalo buti teigimas skaicius';
        return false;
    }
    return true;
}

