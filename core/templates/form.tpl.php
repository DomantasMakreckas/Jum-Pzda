<form
    <?php print html_attr(($data['attr'] ?? []) + ['method' => 'POST']); ?>>
    <?php foreach ($data['fields'] ?? [] as $field_id => $field): ?>
        <label><p><?php print $field['label'] ?? '' ?></p>
            <?php if (in_array($field['type'], ['text', 'email', 'password', 'number', 'color', 'hidden'])): ?>

                <input <?php print input_attr($field_id, $field); ?>>

            <?php elseif (in_array($field['type'], ['radio'])): ?>
                <?php foreach ($field['options'] as $option_id => $radio_value): ?>
                    <label><?php print $radio_value['label'] ?></label>
                    <input <?php print radio_attr($field, $field_id, $option_id); ?>>
                <?php endforeach; ?>
            <?php elseif
            (in_array($field['type'], ['select'])): ?>
                <select <?php print select_attr($field_id, $field) ?>>
                    <?php foreach ($field['options'] as $option_id => $option): ?>
                        <option <?php print option_attr($option_id, $field) ?>>
                            <?php print $option; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php elseif (in_array($field['type'], ['textarea'])): ?>
                <textarea <?php print textarea_attr($field_id, $field); ?>>
                    <?php print $field['value'] ?? ''; ?>
        </textarea>
            <?php endif; ?>

            <?php if (isset($field['error'])): ?>
                <p><?php print $field['error']; ?></p>
            <?php endif; ?>
        </label>
    <?php endforeach; ?>
    <?php foreach ($data['buttons'] ?? [] as $button_id => $button): ?>
        <button <?php
        print html_attr(($button['extra']['attr'] ?? []) + ['value' => $button_id, 'name' => 'action']); ?>>
            <?php print $button['text']; ?>
        </button>
    <?php endforeach; ?>
    <?php if (isset($data['error'])): ?>
        <p><?php print $data['error']; ?></p>
    <?php endif; ?>
</form>