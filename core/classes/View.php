<?php

namespace Core;

class View
{
    protected $data;

    /**
     * View constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param string $template_path
     * @return false|string
     * @throws \Exception
     */
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