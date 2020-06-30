<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <?php foreach ($data['head']['css']  as $css_file): ?>
        <link rel="stylesheet" href="<?php print $css_file ?>">
    <?php endforeach; ?>
    <?php foreach ($data['head']['js'] as $js_file): ?>
        <script src="<?php print $js_file; ?>" defer></script>
    <?php endforeach; ?>
    <meta charset="utf-8">
    <title><?php print $data['head']['title']; ?></title>
</head>
<body>
<?php print $data['header']; ?>
<?php print $data['content']; ?>
<?php print $data['footer']; ?>
</body>
</html>