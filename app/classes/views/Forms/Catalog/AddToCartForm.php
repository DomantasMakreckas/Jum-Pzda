<?php


namespace App\views\Forms\Catalog;


use App\Drink\Drink;
use App\Drink\DrinkModel;
use Core\Views\Form;
use function Sodium\crypto_box_keypair_from_secretkey_and_publickey;

class AddToCartForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'fields' => [
                'user_id' => [
                    'type' => 'hidden',
                    'value' => '',
                ],
                'drink_id' => [
                    'type' => 'hidden',
                    'value' => '',
                ],
            ],
            'buttons' => [
                'send' => [
                    'text' => 'pirk alkoholi',
                    'extra' => [
                        'attr' => [
                            'class' => 'buy-btn'
                        ]
                    ]
                ],
            ],
        ];

        parent::__construct($form);
    }

    public function getData()
    {
        return $this->data;
    }

    public function setDrinkId($id)
    {
        $this->data['fields']['drink_id']['value'] = $id;
    }

    public function setUserId($id)
    {
        $this->data['fields']['user_id']['value'] = $id;
    }
}