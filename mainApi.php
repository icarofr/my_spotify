<?php

require "connection.class.php";

function searchArtist($artistQuery)
{
    $artistArray = Connection::getConnection()->prepare("SELECT * FROM `artists`
    WHERE name 
    LIKE '%" . $artistQuery . "%';");
    $artistArray->execute();
    if ($artistArray->rowCount() < 1) {
        echo "Your search returned no queries." . PHP_EOL;
        die;
    }
    $artistArray = $artistArray->fetchAll(PDO::FETCH_ASSOC);
    $artistJson = json_encode($artistArray, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "Artists =>" . PHP_EOL . $artistJson;
}

function searchAlbum($albumQuery)
{
    $albumArray = Connection::getConnection()->prepare("SELECT albums.id, albums.name, albums.artist_id, 
    artists.name AS 'artist_name', albums.cover, albums.cover_small, albums.release_date, albums.popularity, 
    albums.description, (SELECT group_concat(name) FROM tracks where album_id=albums.id ORDER BY track_no) AS 'track_list' 
    FROM albums
    LEFT JOIN artists
    ON albums.artist_id = artists.id WHERE albums.name LIKE '%". $albumQuery . "%'");
    $albumArray->execute();
    if ($albumArray->rowCount() < 1) {
        echo "Your search returned no queries." . PHP_EOL;
        die;
    }
    $albumArray = $albumArray->fetchAll(PDO::FETCH_ASSOC);
    $albumJson = json_encode($albumArray, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "Albums =>" . PHP_EOL . $albumJson;
}

searchAlbum('cre');