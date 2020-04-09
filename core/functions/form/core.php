<?php

/**
 * funkcija validuojanti laukus
 * (sukuria errorus fieldams/formai)
 * @param $form
 * @param $safe_input isfiltruotas POST mastyvas
 * @return bool
 */
function validate_form(array &$form, array $safe_input): bool
{
    $success = true;
    foreach ($form['fields'] as $field_index => &$field) {

        $field['value'] = $safe_input[$field_index];
        foreach ($field['validate'] ?? [] as $validator_index => $field_validator) {
            if (is_array($field_validator)) {
                $validator_function = $validator_index;
                $validate_params = $field_validator;
                $valid = $validator_function($field['value'], $field, $validate_params);
            } else {
                $validator_function = $field_validator;

                $valid = $validator_function($field['value'], $field);
            }
            if (!$valid) {
                $success = false;
                break;
            }
        }
    }

    // dabar tikrinsim fors lygio validatorius
    if ($success) {
        foreach ($form['validators'] ?? [] as $validator_index => $form_validator) {
            if (is_array($form_validator)) {
                $validator_function = $validator_index;
                $validate_params = $form_validator;
                $valid = $validator_function($safe_input, $form, $validate_params);
            } else {
                $validator_function = $form_validator;

                $valid = $validator_function($safe_input, $form);
            }
            if (!$valid) {
                $success = false;
                break;
            }
        }
    }

//    var_dump($success);
    if (isset($form['callbacks']['success']) && $success) {
        $form['callbacks']['success']($safe_input, $form);
    } elseif (isset($form['callbacks']['fail']) && !$success) {
        $form['callbacks']['fail']($safe_input, $form);
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

/**
 * @param array $form
 * @param array $data
 */
function fill_form(array &$form, array $data):void
{
    foreach ($form['fields'] as $field_id => &$field) {
        if (isset($data[$field_id])) {
            $field['value'] = $data[$field_id];
        }
    }


}


