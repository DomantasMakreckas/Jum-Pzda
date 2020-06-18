<?php

namespace Core\Views;

use Core\View;

class Form extends View
{
    /**
     * @param string $template_path
     * @return false|string
     * @throws \Exception
     */
    public function render(string $template_path = ROOT . '/core/templates/form.tpl.php')
    {
        return parent::render($template_path);
    }
}