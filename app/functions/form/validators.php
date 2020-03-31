<?php


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

//function validate_count($field_input, &$field)
//{
//    var_dump($field_input);
//    if ($field_input == 'sudetis') {
//        $field_ats = $field['X']['value'] + $field['Y']['value'];
//        var_dump($field_ats);
//    } elseif ($field_input == 'atimtis') {
//        $field_ats = $field['X']['value'] - $field['Y']['value'];
//        var_dump($field_ats);
//    } else {
//        $field_ats = 'Klaida';
//        var_dump($field_ats);
//    }
//}