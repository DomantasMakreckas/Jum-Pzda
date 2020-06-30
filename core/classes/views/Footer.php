<?php


namespace Core\views;


use Core\View;

class Footer extends View
{
    public function __construct($data = [])
    {
        $data = [
            'class' => 'footer',
            'footer-content' => 'Footeris'
        ];

        parent::__construct($data);
    }

    /**
     * @param string $template_path
     * @return false|string
     * @throws \Exception
     */
    public function render(string $template_path = ROOT . '/core/templates/footer.tpl.php')
    {
        return parent::render($template_path);
    }

}