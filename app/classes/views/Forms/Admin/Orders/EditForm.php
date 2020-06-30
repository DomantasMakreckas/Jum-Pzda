<?php


namespace App\views\Forms\Admin\Orders;


use App\Cart\Orders\Order;
use App\Cart\Orders\OrderModel;
use Core\Views\Form;

class EditForm extends Form
{
    public function __construct(array $form = [])
    {
        $id = $_GET['id'] ?? null;
        $order = OrderModel::get((int)$id);

        $form = [
            'fields' => [
                'order_id' => [
                    'type' => 'hidden',
                    'value' => $order->getId(),
                ],
                'status' => [
                    'label' => 'Bukle',
                    'type' => 'select',
                    'validate' => [
                        'validate_select'
                    ],
                    'value' => 'status_select',
                    'options' => [
                        Order::STATUS_SUBMITTED => 'Patvirtinta',
                        Order::STATUS_SHIPPED => 'Pakeliui',
                        Order::STATUS_DELIVERED => 'Pristatyta',
                        Order::STATUS_CANCELED => 'Atsaukta',
                    ]
                ],
            ],
            'buttons' => [
                'submit' => [
                    'text' => 'Issaugoti',
                    'name' => 'action',
                    'extra' => [
                        'attr' => [
                            'class' => 'submit-button'
                        ]
                    ]
                ]
            ]
        ];


        parent::__construct($form);
    }

}