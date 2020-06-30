<?php


namespace App\views\Forms\Auth;


use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'attr' => [
                'action' => 'register.php',
                'method' => 'POST',
            ],
            'fields' => [
                'username' => [
                    'label' => 'Username',
                    'type' => 'text',
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Username'
                        ]
                    ]
                ],
                'firstname' => [
                    'label' => 'FirstName',
                    'type' => 'text',
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'First Name'
                        ]
                    ]
                ],
                'lastname' => [
                    'label' => 'LastName',
                    'type' => 'text',
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Last Name'
                        ]
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'validate' => [
                        'validate_not_empty',
                        'validate_email',
                        'validate_email_unique'
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
                'password_repeat' => [
                    'label' => 'Password Repeat',
                    'type' => 'password',
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'class' => 'first-name',
                            'id' => 'first-name',
                            'placeholder' => 'Repeat password'
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'submit' => [
                    'text' => 'Register',
                    'name' => 'action',
                    'extra' => [
                        'attr' => [
                            'class' => 'submit-button'
                        ]
                    ]
                ]
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'password_repeat'
                ]
            ]
        ];

        parent::__construct($form);
    }

}