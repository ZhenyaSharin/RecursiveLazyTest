<?php

function bracketsMatch($str)
{
    preg_match_all("/[\<|\>]/u", $str, $matches);
    $brackets = ['<' => '>'];
    $leftBrackets = [];
    foreach ($matches[0] as $item[0]) {
        if ($item[0] === '<') {
            array_push($leftBrackets, $item[0]);
        } else {
            if (empty($leftBrackets) || $brackets['<'] !== $item[0]) {
                return false;
            }
            array_pop($leftBrackets);
        }
    }
    return empty($leftBrackets);
}


function makeSentence($str, $instock, &$hash = [])
{
    if (preg_match("/<([^<>]*)>/u", $str, $match)) {
        foreach (explode('::', $match[1]) as $item) {
            makeSentence(preg_replace('/<[^<>]*>/u', preg_quote($item), $str, 1), $instock, $hash);
        }
    } elseif (!isset($hash[$str])) {
        $hash[$str] = 1;
        if (!in_array($str, $instock) && ($str != '')) {
            insertVariants($str);
        }
    }
}

function pdoCreator()
{
    return new PDO("mysql:host=127.0.0.1;dbname=test", "root", "");
    // return new PDO("pgsql:host=127.0.0.1;dbname=BJbase", "postgres", "postgres");
}

function getAllVariants(): array
{
    try {
        $pdo = pdoCreator();
        $pdo->beginTransaction();
        $stmt = $pdo->prepare('SELECT "sentence" FROM "variants"');
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_COLUMN);
        $pdo->commit();
        return $result;
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}


function insertVariants($data)
{
    try {
        $pdo = pdoCreator();
        $pdo->beginTransaction();
        $stmt = $pdo->prepare('INSERT INTO "variants" ("sentence") VALUES (:data)');
        $stmt->bindValue('data', $data);
        $stmt->execute();
        $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $pdo->commit();
        return true;
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}