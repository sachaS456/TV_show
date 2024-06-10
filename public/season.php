<?php
declare(strict_types=1);

use Html\AppWebPage;
use Entity\Collection\TVshowCollection;
use Database\MyPdo;
use Entity\Season;
use Entity\TVshow;
use Entity\Poster;

if (!isset($_GET['TvshowId']) || !is_numeric($_GET['TvshowId'])) {
    header('Location: ./index.php');
    exit();
} else {
    $tvShowId = (int) $_GET['TvshowId'];
}

try {
    $stmt = TVshow::findById($tvShowId);
} catch (\Entity\Exception\EntityNotFoundException) {
    http_response_code(404);
    exit();
}