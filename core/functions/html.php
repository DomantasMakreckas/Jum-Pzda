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

function radio_attr(array $field, $field_id, $option_id)
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