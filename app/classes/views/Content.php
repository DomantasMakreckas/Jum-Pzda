<?php


namespace App\views;


class Content extends \App\Abstracts\Views\Content
{

    /**
     * Visi content'ų template'ai saugomi app/templates/content/*
     * Faktiškai kiekvienas page turės savo content'o template'ą,
     * bet kiekvienam iš jų kurt po atskirą View nėra prasmės.
     *
     * Šis metodas turi tiesiog sutrumpinti template'o path'o nurodymą,
     * pvz vietoj to, kad paduoti ROOT . '/app/templates/content/my-content.tpl.php'
     * į $template_path užtektų paduoti my-content.tpl.php
     *
     * @param string $template_path
     * @return mixed
     */
    public function render(string $template_path)
    {
        $template_path = ROOT . "/app/templates/content/$template_path";

        return parent::render($template_path);
    }
}