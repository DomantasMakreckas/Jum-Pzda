<?php


namespace App\views\Forms\Admin\Products;


use App\Drink\DrinkModel;
use Core\Views\Form;

class EditForm extends Form
{
    public function __construct(array $form = [])
    {
        $id = $_GET['id'] ?? null;
        $drink = DrinkModel::get((int)$id);

        $form = [
            'fields' => [
                'name' => [
                    'label' => 'Pavadinimas',
                    'type' => 'text',
                    'value' => $drink->getName(),
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz.: Lithuanica'
                        ]
                    ]
                ],
                'degrees' => [
                    'label' => 'Laipsniai',
                    'type' => 'number',
                    'value' => $drink->getDegrees(),
                    'validate' => [
                        'validate_not_empty',
                        'validate_field_range' => [
                            'min' => 1,
                            'max' => 100,
                        ]
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz.: 40'
                        ]
                    ]
                ],
                'size' => [
                    'label' => 'Tūris(ml)',
                    'type' => 'number',
                    'value' => $drink->getSize(),
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz.: 700'
                        ]
                    ]
                ],
                'quantity' => [
                    'label' => 'Kiekis sandėlyje',
                    'type' => 'number',
                    'value' => $drink->getQuantity(),
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz.: 10'
                        ]
                    ]
                ],
                'price' => [
                    'label' => 'Kaina (EUR)',
                    'type' => 'number',
                    'value' => $drink->getPrice(),
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz.: 14,99'
                        ]
                    ]
                ],
                'image' => [
                    'label' => 'Nuotrauka',
                    'type' => 'text',
                    'value' => $drink->getImage(),
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'http://'
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'submit' => [
                    'text' => 'Atnaujinti',
                    'name' => 'action',
                    'extra' => [
                        'attr' => [
                            'class' => 'submit-button'
                        ]
                    ]
                ]
            ],
            'callbacks' => [
                'success' => 'form_success',
            ]
        ];

        parent::__construct($form);
    }
}