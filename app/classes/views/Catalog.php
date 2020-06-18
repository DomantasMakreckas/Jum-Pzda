<?php
namespace App\Views;

use Core\View;

class Catalog extends View
{
    /**
     * @param string $template_path
     * @return false|string
     * @throws \Exception
     */
    public function render(string $template_path = ROOT . '/app/templates/catalog.tpl.php')
    {
        return parent::render($template_path);
    }
}