<?php
$bool = true;
$str = '1';
$flt = 1.23;
$int = 1;
$str_1 = '1.23';

if($bool == $int) {
   $li_1 = 'lygus';
} if ($bool === $int){
    $li_1 = 'Identiski';
}
if($str == $bool) {
   $li_2 = 'lygus';
} if ($str == $bool){
    $li_2 = 'Identiski';
}
if($flt == $str_1) {
   $li_3 = 'lygus';
} if ($flt == $str_1){
    $li_3 = 'Identiski';
}

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>
    </head>
    <body>
        <ul>
            <li><?php print $li_1?></li>
            <li><?php print $li_2?></li>
            <li><?php print $li_3?></li>
        </ul>
    </body>
</html>

