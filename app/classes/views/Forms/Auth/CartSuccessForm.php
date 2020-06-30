<?php


namespace App\views\Forms\Auth;


use Core\Views\Form;

class CartSuccessForm extends Form
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
                'order' => [
                    'text' => 'Uzsakyti',
                ],
            ]
        ];

        parent::__construct($form);
    }

}