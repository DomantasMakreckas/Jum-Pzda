<?php

namespace Core\Abstracts\Views;

use Core\View;

/**
 * Class Form
 *
 * @package Core\Abstracts\Views\Form
 * @author  Dainius Vaičiulis   <denncath@gmail.com>
 */
abstract class Form extends View
{
    public function __construct(array $form = [])
    {
        $this->data = $form;
    }

    /**
     * Validates form based on $this->data
     * Does NOT call any callbacks, just returns the result
     * of the form
     *
     * Does not call function validate_form !!!,
     * implements all functionality inside
     *
     * @return bool
     */
    abstract public function validate(): bool;

    /**
     * Checks if the form is submitted
     *
     * Gets submit action from $_POST, and checks if form array
     * has a button with such index
     *
     * @return bool
     */
    abstract public function isSubmitted(): bool;

    /**
     * Gets form subitted data
     * If $filtered = false, returns $_POST if not empty (or null)
     * If $filtered = true, returns filtered $_POST array
     * based on form array: $this->data
     *
     * @param bool $filter
     * @return array|null
     */
    abstract public function getSubmitData($filter = true): ?array;

    /**
     * Determines which button was pressed by reading "action"
     * index in $_POST.
     * If $_POST is empty, or doesnt contain action, returns null
     *
     * @return string|null
     */
    abstract static function getSubmitAction(): ?string;

    public function render(string $template_path = ROOT . '/core/templates/form.tpl.php')
    {
        return parent::render($template_path);
    }
}
