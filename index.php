<?php
$bool = true;
$str = '1';
$flt = 1.23;
$int = 1;
$str_1 = '1.23';

if ($bool == $int) {
    $li_1_ats = 'lygus';
} if ($bool === $int) {
    $li_1_ats = 'Identiski';
}
if ($str == $bool) {
    $li_2_ats = 'lygus';
} if ($str === $bool) {
    $li_2_ats = 'Identiski';
}
if ($flt == $str_1) {
    $li_3_ats = 'lygus';
} if ($flt === $str_1) {
    $li_3_ats = 'Identiski';
}

$li_1 = "Bool (true) ir Integer (1): $li_1_ats";
$li_2 = "String (1) ir Boolean (1): $li_2_ats";
$li_3 = "Float (1.23) ir String(1.23): $li_3_ats";
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>
    </head>
    <body>
        <ul>
            <li><?php print $li_1 ?></li>
            <li><?php print $li_2 ?></li>
            <li><?php print $li_3 ?></li>
        </ul>
    </body>
</html>

