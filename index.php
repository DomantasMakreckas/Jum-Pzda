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
        'username' => [
            'label' => 'Username',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                    'placeholder' => 'Username'
                ]
            ]
        ],
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
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'validate' => [
                'validate_not_empty',
                'validate_text_length' => [
                    'min' => 6,
                    'max' => 20
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                    'placeholder' => ''
                ]
            ]
        ],
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
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Ar as adaptas?',
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
        'username' => $safe_input['username'],
        'password' => $safe_input['password']
    ];
    array_to_file($data, DB_FILE);

}

//var_dump(file_to_array(DB_FILE));


///**
// * @param $form
// * @param $safe_input
// */
//function form_success($safe_input, $form)
//{
//    $value = round(sqrt($safe_input['matematikas']), 2);
//    $answer = $safe_input['atsakymas'];
//    $result = $value - $answer;
//    var_dump($result);
//}

function form_fail($safe_input, $form)
{
    var_dump('Eik nx');

}

file_to_array(DB_FILE);


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
<section>

</section>
</body>
</html>
