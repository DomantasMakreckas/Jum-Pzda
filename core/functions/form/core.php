<?php

/**
 * funkcija validuojanti laukus
 * @param $form
 * @param $safe_input
 * @return bool
 */
function validate_form(array &$form, array $safe_input): bool
{
    $success = true;
    foreach ($safe_input as $field_index => $value) {
        $field = &$form['fields'][$field_index];
        $field['value'] = $value;
        foreach ($field['validate'] ?? [] as $validation) {
            $valid = $validation($value, $field);
            if (!$valid) {
                $success = false;
//                break
            }
        }
    }
    return $success;
}

/**
 *  funkcija apsauganti nuo pavojingu ivesciu (POST)
 * @param array $form
 * @return array|null
 */
function get_filtered_input(array $form): ?array
{
    $filter_params = [];

    foreach ($form['fields'] as $key => $field) {
        if (isset($field['filter'])) {
            $filter_params[$key] = $field['filter'];
        } else {
            $filter_params[$key] = FILTER_SANITIZE_SPECIAL_CHARS;
        }
    }
    return filter_input_array(INPUT_POST, $filter_params);
}