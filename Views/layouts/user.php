<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <h2>Header</h2>
    <?php
        $this -> render($content, $subcontent);
    ?>
    <h2>Footer</h2>
</body>
</html>