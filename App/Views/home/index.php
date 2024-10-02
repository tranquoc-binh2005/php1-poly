<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/php1/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pageTitle?></title>
    <link rel="stylesheet" href="./Public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include './App/Views/home/header.php';?>
    <?php include './App/Views/' . $path . '.php';?>
    <?php include './App/Views/home/footer.php';?>

    <script src="./Public/js/main.js"></script>
</body>
</html>