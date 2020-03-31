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
//        'first_name' => [
//            'label' => '',
//            'type' => 'text',
//            'validate' => [
//                'validate_not_empty',
//                'validate_space'
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'first-name',
//                    'id' => 'first-name',
//                    'placeholder' => 'Vardas ir pavarde'
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
            'label' => '',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',

            ],
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                    'placeholder' => 'Ivesk kazka'
                ]
            ]
        ],
        'password_repeat' => [
            'label' => '',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                    'placeholder' => 'Pakartok ka ivedei'
                ]
            ]
        ],
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
    'validators' => [
        'validate_fields_match' => [
            'password',
            'password_repeat'
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];


if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

/**
 * @param $form
 * @param $safe_input
 */
function form_success($form, $safe_input)
{
//    switch ($safe_input['options']) {
//        case 'atimtis' :
//            $result = $safe_input['X'] - $safe_input['Y'];
//            break;
//        case 'sudetis' :
//            $result = $safe_input['X'] + $safe_input['Y'];
//            break;
//        default:
//            $result = 0;
//    }
//    var_dump($result);

    var_dump('Viskas ok su tavim');
}

function form_fail($form, $safe_input)
{
    var_dump('Confirmed. Adaptas');

}

//var_dump($_POST);
//var_dump($form);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<style>

</style>
<body>
<h1></h1>
<?php include 'core/templates/form.tpl.php'; ?>
</body>
</html>
