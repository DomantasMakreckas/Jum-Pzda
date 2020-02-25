<?php
$foto = rand(0, 1);
if ($foto) {
    $bg = 'Priekis';
} else {
    $bg = 'Galas';
}
?>

<style>
    .priekis {
        height: 100vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-image: url(https://www.just2euro.lt/wp-content/uploads/2019/09/2-euro-coin-2019-Lithuania-Zemaitija.jpg);
    }

    .galas {
        background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT2NG_D1FxvmRbnJ5P5XacnxPI8D3GW922S7rEQlvKmkC8P20BV);
        height: 100vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    div {
        display: flex;
        justify-content: center;
        align-items: center;
        color: red;
        font-size: 80px;
    }
</style>

<!DOCTYPE html>
<html>
    <head>
        <title>Coin-Flip</title>
    </head>
    <body>
        <div class="<?php print $bg ?>">
            <span><?php print $bg ?></span>
        </div>
    </body>
</html>
