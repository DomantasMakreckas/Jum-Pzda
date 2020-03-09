<?php
$title = 'Banko israsas';

$bank_reports = [
    [
        'name' => 'Alga',
        'amount' => 600
    ],
    [
        'name' => 'Nacnykas',
        'amount' => -30
    ],
    [
        'name' => 'Maxima',
        'amount' => -20
    ],
    [
        'name' => 'Nacnykas',
        'amount' => -15
    ]
];

foreach ($bank_reports as $key => $report) {

    if ($report['amount'] > 0) {
        $bank_reports[$key]['budget'] = 'income';
    } else {
        $bank_reports[$key]['budget'] = 'expense';
    }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<style>
    .income {
        color: green;
    }

    .expense {
        color: red;
    }
</style>
<body>
<h1>Banko israsas</h1>
<ul>
    <?php foreach ($bank_reports as $report): ?>
        <li class="<?php print $report['budget'] ?>"><?php print $report['name'] ?> :
            <?php print $report['amount'] ?>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>