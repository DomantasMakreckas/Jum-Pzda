<?php
namespace Core\Views;

use Core\View;

class Table extends View
{
    /**
     * @param string $template_path
     * @return false|string
     * @throws \Exception
     */
    public function render(string $template_path = ROOT . '/core/templates/table.tpl.php')
    {
        return parent::render($template_path);
    }
}