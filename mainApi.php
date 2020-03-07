<?php

require "connection.class.php";

function searchArtist($artistQuery)
{
    $artistArray = Connection::getConnection()->prepare("SELECT artists.id, artists.name, artists.description, 
    artists.bio, artists.photo, (SELECT GROUP_CONCAT(name) FROM albums WHERE artist_id=artists.id ORDER BY 
    release_date) AS 'artist_albums' FROM `artists` WHERE name LIKE '%" . $artistQuery . "%';");
    $artistArray->execute();
    if ($artistArray->rowCount() < 1) {
        echo "Your search returned no queries." . PHP_EOL;
        die;
    }
    $artistArray = $artistArray->fetchAll(PDO::FETCH_ASSOC);
    $artistJson = json_encode($artistArray, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $tempFile = fopen(".temp.json", "w");
    fwrite($tempFile, $artistJson);
    fclose($tempFile);
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
    $tempFile = fopen(".temp.json", "w");
    fwrite($tempFile, $albumJson);
    fclose($tempFile);
}

function searchTrack($trackQuery)
{
    $trackArray = Connection::getConnection()->prepare("SELECT tracks.id AS 'track_id', tracks.name AS 'track_name',
    tracks.album_id, albums.name AS 'album_name', artists.id AS 'artist_id', artists.name AS 'artist_name', 
    tracks.track_no, tracks.duration, tracks.mp3 
    FROM tracks LEFT JOIN albums ON tracks.album_id = albums.id
    LEFT JOIN artists ON albums.artist_id = artists.id
    WHERE tracks.name LIKE '%" . $trackQuery . "%'");
    $trackArray->execute();
    if ($trackArray->rowCount() < 1) {
        echo "Your search returned no queries." . PHP_EOL;
        die;
    }
    $trackArray = $trackArray->fetchAll(PDO::FETCH_ASSOC);
    $trackJson = json_encode($trackArray, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $tempFile = fopen(".temp.json", "w");
    fwrite($tempFile, $trackJson);
    fclose($tempFile);
}

function searchGenre($genreQuery)
{
    $genreArray = Connection::getConnection()->prepare("SELECT genres.*, (SELECT GROUP_CONCAT(genres_albums.album_id)
    FROM genres_albums WHERE genres_albums.genre_id=genres.id) AS 'albums_list' FROM genres WHERE genres.name 
    LIKE '%" . $genreQuery . "%'");
    $genreArray->execute();
    if ($genreArray->rowCount() < 1) {
        echo "Your search returned no queries." . PHP_EOL;
        die;
    }
    $genreArray = $genreArray->fetchAll(PDO::FETCH_ASSOC);
    $genreJson = json_encode($genreArray, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $tempFile = fopen(".temp.json", "w");
    fwrite($tempFile, $genreJson);
    fclose($tempFile);
}

function searchAll($needle, $haystack)
{
    switch ($haystack) {
        case "track": {
                searchTrack($needle);
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
                searchGenre($needle);
                break;
            }
        default:
            "Invalid command! Please try again." . PHP_EOL;
    }
}
