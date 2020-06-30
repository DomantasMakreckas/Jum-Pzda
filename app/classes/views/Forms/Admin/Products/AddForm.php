<?php


namespace App\views\Forms\Admin\Products;


use Core\Views\Form;

class AddForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'fields' => [
                'name' => [
                    'label' => 'Pavadinimas',
                    'type' => 'text',
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
                    'label' => 'Nuotrauka(URL)',
                    'type' => 'text',
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz.: http://...'
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'submit' => [
                    'text' => 'Sukurti',
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