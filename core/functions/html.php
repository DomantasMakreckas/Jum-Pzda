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

/**
 * @param array $field
 * @param $field_id
 * @param $option_id
 * @return string
 */
function radio_attr(array $field, $field_id, $option_id): string
{
    $option = $field['options'][$option_id];
    $checked = ($field['value'] ?? null) == $option['value'];
    $attrs = $field['extra']['attr'] ?? [];
    $attrs += [
        'name' => $field_id,
        'type' => 'radio',
        'value' => $option['value'] ?? ''
    ];

    if ($checked) {
        $attrs += [
            'checked' => true
        ];
    }

    return html_attr($attrs);
}

/**
 * @param $field_id
 * @param $field
 * @return string
 */
function input_attr($field_id, $field): string
{
    $attrs = $field['extra']['attr'] ?? [];
    $attrs += [
        'name' => $field_id,
        'type' => $field['type'],
        'value' => $field['value'] ?? ''
    ];

    return html_attr($attrs);
}

/**
 * @param $field_id
 * @param $field
 * @return string
 */
function select_attr($field_id, $field): string
{
    $attrs = $field['extra']['attr'] ?? [];
    $attrs += [
        'name' => $field_id
    ];

    return html_attr($attrs);
}

/**
 * @param $option_id
 * @param $field
 * @return string
 */
function option_attr($option_id, $field): string
{
    $attrs = $field['extra']['attr'] ?? [];
    $attrs += [
        'value' => $option_id,
    ];

    if ($field['value'] == $option_id) {
        $attrs['selected'] = true;
    }

    return html_attr($attrs);
}

/**
 * @param $field_id
 * @param $field
 * @return string
 */
function textarea_attr($field_id, $field): string
{
    $attrs = $field['extra']['attr'] ?? [];
    $attrs += [
        'name' => $field_id
    ];

    return html_attr($attrs);
}