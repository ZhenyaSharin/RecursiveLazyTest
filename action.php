<?php

require_once 'functions.php';

$str = trim($_POST['text']);

$instock = getAllVariants();


if (bracketsMatch($str)) {
    makeSentence($str, $instock);
    $error = false;
} else {
    $error = true;
}

?>
<html>
<head>
    <title>Get Sentences</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br>
        <?php if ($error == true):?>
        <div class="alert alert-danger" role="alert">
            Brackets error!!!
        </div>
        <?php else :?>
        <div class="alert alert-success" role="alert">
            Variants added successfully...
        </div>
        <?php endif ;?>
        <div class="form-group my-4">
            <a href="/" type="button" class="btn btn-secondary" style="text-decoration: none; border: none;">
                НАЗАД
            </a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>