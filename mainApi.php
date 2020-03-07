<?php

require "connection.class.php";

function searchArtist($artistQuery)
{
    $artistArray = Connection::getConnection()->prepare("SELECT artists.id, artists.name, artists.description, 
    artists.bio, artists.photo, (SELECT GROUP_CONCAT(name) FROM albums WHERE artist_id=artists.id ORDER BY release_date)
    AS 'artist_albums' FROM `artists`
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
    albums.description, (SELECT GROUP_CONCAT(name) FROM tracks WHERE album_id=albums.id ORDER BY track_no) 
    AS 'track_list' 
    FROM albums
    LEFT JOIN artists
    ON albums.artist_id = artists.id WHERE albums.name LIKE '%" . $albumQuery . "%'");
    $albumArray->execute();
    if ($albumArray->rowCount() < 1) {
        echo "Your search returned no queries." . PHP_EOL;
        die;
    }
    $albumArray = $albumArray->fetchAll(PDO::FETCH_ASSOC);
    $albumJson = json_encode($albumArray, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "Albums =>" . PHP_EOL . $albumJson;
}

function searchGenre($genreQuery)
{
    $albumArray = Connection::getConnection()->prepare("SELECT albums.id, albums.name, albums.artist_id, 
    artists.name AS 'artist_name', albums.cover, albums.cover_small, albums.release_date, albums.popularity, 
    albums.description, (SELECT GROUP_CONCAT(name) FROM tracks WHERE album_id=albums.id ORDER BY track_no) 
    AS 'track_list' 
    FROM albums
    LEFT JOIN artists
    ON albums.artist_id = artists.id WHERE albums.name LIKE '%" . $albumQuery . "%'");
    $albumArray->execute();
    if ($albumArray->rowCount() < 1) {
        echo "Your search returned no queries." . PHP_EOL;
        die;
    }
    $albumArray = $albumArray->fetchAll(PDO::FETCH_ASSOC);
    $albumJson = json_encode($albumArray, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "Albums =>" . PHP_EOL . $albumJson;
}

function searchAll($needle, $haystack)
{
    switch ($haystack) {
        case "track": {
                //implement code here
                break;
            }
        case "album": {
                searchAlbum($needle);
                break;
            }
        case "artist": {
                searchArtist($needle);
                break;
            }
        case "genre": {
                // implement code here
                break;
            }
        default:
            "Invalid command! Please try again.";
    }
}

searchArtist('adam');