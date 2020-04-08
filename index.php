<?php
require 'bootloader.php';

$title = 'formos';

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form',
    ],
    'fields' => [
//        'username' => [
//            'label' => 'Username',
//            'type' => 'text',
//            'validate' => [
//                'validate_not_empty',
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'first-name',
//                    'id' => 'first-name',
//                    'placeholder' => 'Username'
//                ]
//            ]
//        ],
//        'X' => [
//            'label' => 'X:',
//            'type' => 'number',
//            'validate' => [
//                'validate_not_empty',
//                'validate_is_number'
//            ],
//            'extra' => [
//                'attr' => [
//                    'placeholder' => 'Iveskite skaiciu'
//                ]
//            ]
//        ],
//        'Y' => [
//            'label' => 'Y:',
//            'type' => 'number',
//            'validate' => [
//                'validate_not_empty',
//                'validate_is_number'
//            ],
//            'extra' => [
//                'attr' => [
//                    'placeholder' => 'Iveskite skaiciu'
//                ]
//            ]
//        ],

//        'password' => [
//            'label' => 'Password',
//            'type' => 'password',
//            'validate' => [
//                'validate_not_empty',
//                'validate_text_length' => [
//                    'min' => 6,
//                    'max' => 20
//                ]
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'first-name',
//                    'id' => 'first-name',
//                    'placeholder' => ''
//                ]
//            ]
//        ],
//        'password_repeat' => [
//            'label' => 'Password Repeat',
//            'type' => 'password',
//            'validate' => [
//                'validate_not_empty',
//                'validate_text_length' => [
//                    'min' => 6,
//                    'max' => 20
//                ]
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'first-name',
//                    'id' => 'first-name',
//                    'placeholder' => ''
//                ]
//            ]
//        ],
//        'telefono_nr' => [
//            'label' => 'Telefono nr',
//            'type' => 'text',
//            'validate' => [
//                'validate_not_empty',
//                'validate_is_number',
//                'validate_phone'
//            ],
//            'extra' => [
//                'attr' => [
//                    'placeholder' => 'Iveskite skaiciu'
//                ]
//            ]
//        ],
//        'matematikas' => [
//            'label' => 'Spek kokia bus saknis is',
//            'type' => 'text',
//            'value' => rand(0, 100),
//            'validate' => [
//                'validate_not_empty',
//                'validate_is_number',
//            ],
//            'extra' => [
//                'attr' => [
//                    'readonly' => true,
//                    'placeholder' => 'Iveskite skaiciu'
//                ]
//            ]
//        ],
//        'atsakymas' => [
//            'label' => 'Atsakymas',
//            'type' => 'text',
//            'validate' => [
//                'validate_not_empty',
//                'validate_is_number',
//            ],
//            'extra' => [
//                'attr' => [
//
//                ]
//            ]
//        ],
//        'options' => [
//            'label' => 'Veiksmas:',
//            'type' => 'select',
//            'validate' => [
//                'validate_not_empty',
//                'validate_select'
//            ],
//            'value' => 'sudetis',
//            'options' => [
//                'sudetis' => 'Sudetis',
//                'atimtis' => 'Atimtis'
//            ]
//        ],
        'kardanas' => [
            'type' => 'radio',
            'label' => 'Ar laikai kardana?',

            'validate' => [
                'validate_not_empty',
            ],
            'options' => [
                'taip' => [
                    'label' => 'Taip',
                    'value' => 'taip'
                ],
                'ne' => [
                    'label' => 'Ne',
                    'value' => 'ne'
                ]
            ],
        ],
        'bakas' => [
            'type' => 'radio',
            'label' => 'Ar pili i baka?',
            'value' => '',
            'checked',
            'validate' => [
                'validate_not_empty',
            ],
            'options' => [
                'taip' => [
                    'label' => 'Taip',
                    'value' => 'taip'
                ],
                'ne' => [
                    'label' => 'Ne',
                    'value' => 'ne'
                ]
            ],
        ],
        'zole' => [
            'type' => 'radio',
            'label' => 'Ar rukai zoliu arbata?',
            'value' => '',
            'validate' => [
                'validate_not_empty',
            ],
            'options' => [
                'taip' => [
                    'label' => 'Taip',
                    'value' => 'taip'
                ],
                'ne' => [
                    'label' => 'Ne',
                    'value' => 'ne',
                ]
            ],

        ]
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Ziureti statistika',
            'name' => 'action',
            'extra' => [
                'attr' => [
                    'class' => 'submit-button'
                ]
            ]
        ]
    ],
//    'validators' => [
//        'validate_fields_match' => [
//            'password',
//            'password_repeat'
//        ]
//    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]

];

//$table = [
//    'head' => [
//        'username',
//        'password',
//    ],
//    'rows' => [
//
//    ]
//];


if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

/**
 * @param $form
 * @param $safe_input
 */
function form_success($safe_input, $form)
{
    $data = file_to_array(DB_FILE) ?: [];

    $data[] = [
        'kardanas' => $safe_input['kardanas'],
        'bakas' => $safe_input['bakas'],
        'zole' => $safe_input['zole']
    ];
    array_to_file($data, DB_FILE);

    setcookie('submited', 'done', strtotime('+1 hour'));
    header("Location: /users.php");
}

$user_id = $_COOKIE['user_id'] ?? microtime();
$visits = ($_COOKIE['visits'] ?? 0) + 1;

if (isset($_COOKIE['submited'])) {
    header("Location: http://phpsualum.lt/users.php");
}

function form_fail($safe_input, $form)
{
    $valid_fields = [];
    var_dump('Eik nx');
    foreach ($form['fields'] as $field_index => $field) {
        if (!isset($field['error'])) {
            $valid_fields[$field_index] = $field['value'];
        }
    }

    $string = json_encode($valid_fields);
    setcookie('string', $string, time() + 3600);
}

if (isset($_COOKIE['string'])) {
    var_dump($_COOKIE);

    $decode_data = json_decode($_COOKIE['string'], true);
    var_dump($decode_data);

    fill_form($form, $decode_data);
}

var_dump($_POST);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="app/assets/style.css">
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<style>

</style>
<body>
<section>
    <?php include 'core/templates/form.tpl.php'; ?>
</section>

</body>
</html>
