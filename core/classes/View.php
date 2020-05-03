<?php
namespace Core;

class View
{
    protected $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function render(string $template_path)
    {
        if (!file_exists($template_path)) {
            throw (new \Exception('Template with filename: '
                . "$template_path does not exist!"));
        }

        $data = $this->data;

        ob_start();

        require $template_path;

        return ob_get_clean();
    }
}