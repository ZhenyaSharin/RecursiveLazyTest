<?php

// $str = 'Товарищи!< С другой стороны::< Равным:: Таким > образом> практика показывает, что <реализация <намеченных заданий::развития <<организационной::форм> деятельности::обучения кадров:: плановых заданий>>::постоянный рост активности> требует от нас анализа <новых предложений::<финансовых::административных> условий:: поставленных <задач::целей>>';

require_once 'functions.php';

$instock = getAllVariants();

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
        <h3>
            Текст-шаблон
        </h3>
        <form action="action.php" method="POST">
            <div class="form-group my-4">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text">Товарищи!< С другой стороны::< Равным:: Таким > образом> практика показывает, что <реализация <намеченных заданий::развития <<организационной::форм> деятельности::обучения кадров:: плановых заданий>>::постоянный рост активности> требует от нас анализа <новых предложений::<финансовых::административных> условий:: поставленных <задач::целей>></textarea>
                <button type="submit" class="btn btn-primary mt-4">Отработать</button>
            </div>
        </form>
        <ul class="my-4">
            <?php if ($instock): ?>
                <h3>
                    Список вариантов из базы данных:
                </h3>
                <?php foreach ($instock as $item) :?>
                <li>
                    <?php echo($item);?>
                </li>
                <?php endforeach ;?>
            <?php else :?>
                <h3>
                    Список вариантов пока пуст...
                </h3>
            <?php endif ?>
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>