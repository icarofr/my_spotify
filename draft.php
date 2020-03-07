<?php

$genreArray = Connection::getConnection()->prepare("SELECT");
$genreArray->execute();
if ($genreArray->rowCount() < 1) {
    echo "Your search returned no queries." . PHP_EOL;
    die;
}
$genreArray = $genreArray->fetchAll(PDO::FETCH_ASSOC);
$genreJson = json_encode($genreArray, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
echo "Genres =>" . PHP_EOL . $genreJson;
