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
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
    'fields' => [
        'first_name' => [
            'label' => 'First Name',
            'type' => 'text',
//            'value' => 'Algis',
            'validate' => [
                'validate_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                ]
            ]
        ],
        'last_name' => [
            'label' => 'Last Name',
            'type' => 'text',
//            'value' => 'Macijauskas',
            'validate' => [
                'validate_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                ]
            ]
        ],
        'age' => [
            'filter' => FILTER_SANITIZE_NUMBER_INT,
            'label' => 'Age',
            'type' => 'number',
//            'value' => '18',
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_max_100'
            ],
            'extra' => [
                'attr' => [
                    'min' => '18',
                    'max' => '99',
                ]
            ]
        ],
        'email' => [
            'label' => 'Email',
            'type' => 'email',
            'validate' => [
                'validate_not_empty'
            ],
//            'value' => 'email'
        ],
        'level' => [
            'label' => 'Level',
            'type' => 'select',
            'value' => 'beginner',
            'validate' => [
                'validate_not_empty'
            ],
            'options' => [
                'beginner' => 'beginner',
                'expert' => 'expert',
                'professional' => 'professional'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'select-class',
                    'id' => 'id-class'
                ]
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Patvirtinti',
            'name' => 'action',
            'extra' => [
                'attr' => [
                    'class' => 'submit-button'
                ]
            ]
        ]
    ]
];


if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);

}


//var_dump($form['fields']);
var_dump($_POST);

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
<h1>Hack It!</h1>
<?php include 'core/templates/form.tpl.php'; ?>
</body>
</html>
