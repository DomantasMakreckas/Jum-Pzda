<?php
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

/**
 * @param $safe_input
 * @param $form
 * @return bool|string
 */
function validate_kick($safe_input, &$form)
{
    $data = file_to_array(TEAM_FILE) ?: [];
    $found = false;
    if (isset($_SESSION['player'])) {
        $decoded = json_decode($_SESSION['player'], true);
        $team = &$data[$decoded['teams']];

        foreach ($team['players'] as &$player) {
            if ($player['nickname'] == $decoded['nickname']) {
                $found = true;
                break;
            }
        }
    }
    if (!$found) {
        $form['error'] = 'Zaidejas neegzistuoja';
        return false;
    }
    return true;
}

function validate_email_unique($field_input, &$field)
{
    $data = file_to_array(USERS) ?: [];
    $found = false;

    foreach($data as $data_index) {
        if($data_index['email'] == $field_input) {
            $found = true;
            break;

        }
    }

    if($found) {
        $field['error'] = 'Email already registered';
        return false;

    }

    return true;
}

/**
 * @param $safe_input
 * @param $form
 * @return bool
 */
function validate_login($safe_input, &$form)
{
    $data = file_to_array(USERS) ?: [];

    $found = false;
    foreach ($data as $data_id) {
        if ($data_id['email'] == $safe_input['email'] && $data_id['password'] == $safe_input['password']) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        $form['error'] = 'Neteisingi prisijungimo duomenys';
        return false;
    }
    return true;
}

