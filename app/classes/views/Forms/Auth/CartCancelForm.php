<?php


namespace App\views\Forms\Auth;


use Core\Views\Form;

class CartCancelForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'fields' => [
                'id' => [
                    'type' => 'hidden'
                ],
            ],
            'buttons' => [
                'send' => [
                    'text' => 'Nebenuoru',
                ],
            ]
        ];

        parent::__construct($form);
    }

    public function setId($id) {
        $this->data['fields']['id']['value'] = $id;
    }

}