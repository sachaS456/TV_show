<?php
declare(strict_types=1);

use Entity\Exception\EntityNotFoundException;
use Html\AppWebPage;
use Entity\Genre;

if (!isset($_GET['genre']) || !is_numeric($_GET['genre'])) {
    header('Location: ./index.php');
    exit();
} else {
    $genre = (int) $_GET['genre'];
}

try {
    $lst_tvshow = Genre::findByGenre($genre);
} catch (EntityNotFoundException) {
    http_response_code(404);
    exit();
}

$indexPage = new AppWebpage("Séries TV, Genre : $genre"); // nom à retoucher
