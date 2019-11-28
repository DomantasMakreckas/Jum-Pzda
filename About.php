<?php
$random_img = rand(0, 1);
$story_number = rand(1, 3);
if ($random_img) {
    $bg_img = 'body-red';
} else {
    $bg_img = 'body-blue';
}

if ($story_number == 1) {
    $p = 'Nemeluosiu istikro mum yra pizda';
} elseif ($story_number == 2) {
    $p = 'Kiausiniai nukrito ant zemes ir suduzo, ir gimeme mes';
} else {
    $p = 'Dainius mus ivaikino ir pasitenge ismokyti php';
}
?>
<html>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <title>ABOUT</title>
</head>
<body id="my-body" class="<?php print $bg_img; ?>">

    <nav>
        <a href="" class="navText logo">JUM PZDA  </a>
        <a href="index.php" class="navText">HOME</a>
        <a href="#" class="navText">ABOUT US</a>
        <a href="Contacts.php" class="navText">CONTACTS</a>
        <a href="Kiausrakulas.php" class="navText kiausrakulas">KIAUŠRAKULAS</a>
    </nav>
    <div id="flex-div">
        <h1>WE ARE "JUM PIZDA"</h1>
        <h2>How it works?</h2>
        <p><?php print $p; ?></p>
    </div>

</body>
</html>