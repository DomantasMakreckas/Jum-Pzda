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

/**
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_space($field_input, &$field)
{
    if (!strpos($field_input, ' ')) {
        $field['error'] = 'Prasau ivesti Varda ir Pavarde';
        return false;
    }
    return true;
}

/**
 * patikrina ar yra pasirinkimas egzistuoja fieldo masyve
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_select($field_input, array &$field): bool
{
    if (!isset($field['options'][$field_input])) {
        $field['error'] = 'Tokio pasirinkimo nera';
        return false;
    }

    return true;
}

/**
 * funkcija patikrinanti ar fieldai sutampa
 * @param $safe_input isfiltruotas POST masyvas
 * @param $form
 * @param $params sutampanciu fieldu imdeksu masyvas
 * @return bool
 */
function validate_fields_match(array $safe_input, array &$form, array $params): bool
{
    $comparison_field_id = $params[0];
    $comparison = $safe_input[$comparison_field_id];

    foreach ($params as $field_id) {
        if ($comparison != $safe_input[$field_id]) {
            $form['error'] = 'Laukai nesutampa';

            return false;
        }
    }

    return true;
}

/**
 * @param $field_input
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_field_range($field_input, array &$field, array $params): bool
{
    if ($field_input < $params['min'] || $field_input > $params['max']) {

        $field['error'] = strtr('Skaicius turi buti daugiau nei @min ir maziau nei @max', [
            '@min' => $params['min'],
            '@max' => $params['max']
        ]);
        return false;
    }

    return true;
}

/**
 * @param $field_input
 * @param $field
 * @param $params
 * @return bool
 */
function validate_text_length($field_input, array &$field, array $params): bool
{
    $text_length = strlen($field_input);

    if ($text_length < $params['min'] || $text_length > $params['max']) {
        $field['error'] = strtr('Laukelyje turi buti maziausiai @min simboliu ir daugiausiai @max simboliu', [
            '@min' => $params['min'],
            '@max' => $params['max']
        ]);
        return false;
    }

    return true;
}
