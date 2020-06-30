<?php


namespace App\views\Forms\Auth;


use Core\Views\Form;

class LoginForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'attr' => [
                'action' => 'login',
                'method' => 'POST',
            ],
            'fields' => [
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'validate' => [
                        'validate_not_empty',
                        'validate_email'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Username'
                        ]
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'class' => 'first-name',
                            'id' => 'first-name',
                            'placeholder' => 'Password'
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'submit' => [
                    'text' => 'Login',
                    'name' => 'action',
                    'extra' => [
                        'attr' => [
                            'class' => 'submit-button'
                        ]
                    ]
                ]
            ],
            'validators' => [
                'validate_login'
            ]
        ];

        parent::__construct($form);
    }
}