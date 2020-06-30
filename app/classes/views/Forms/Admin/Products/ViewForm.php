<?php


namespace App\views\Forms\Admin\Products;


use Core\Views\Form;

class ViewForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'fields' => [
                'id' => [
                    'type' => 'hidden',
                ],
            ],
            'buttons' => [
                'send' => [
                    'text' => 'delete',
                ],
            ]
        ];

        parent::__construct($form);
    }

    public function setId($id)
    {
        $this->data['fields']['id']['value'] = $id;
    }

}