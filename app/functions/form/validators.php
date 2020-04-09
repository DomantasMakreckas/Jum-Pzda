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

/**
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_phone($field_input, array &$field): bool
{
    $pattern = '/\+3706[0-9]{7}$/';
    if (!preg_match_all($pattern, $field_input)) {
        $field['error'] = 'Blogai ivestas telefono numeris';
        return false;
    }
    return true;
}

/**
 * @param array $field_input
 * @param array $field
 * @return bool
 */
function validate_team($field_input, array &$field): bool
{
    $data = file_to_array(TEAM_FILE);

    foreach ($data ?? [] as $team) {
        if ($field_input == $team['team_name']) {
            $field['error'] = 'Komanda egzistuoja';

            return false;
        }
    }

    return true;
}

/**
 * @param array $safe_input
 * @param array $form
 * @return bool
 */
function validate_player(array $safe_input, array &$form): bool
{
    $data = file_to_array(TEAM_FILE);
    $team = $data[$safe_input['teams']];

    foreach ($team['players'] as $player) {
        if ($player['nickname'] == $safe_input['nickname']) {
            $form['error'] = 'Nickname uzimtas';

            return false;
        }


    }

    return true;
}

