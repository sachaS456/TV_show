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

$webPage = new AppWebpage("Séries TV :  {$stmt->getName()}");

$webPage->appendContent("<div  class=\"list\">");
foreach ($stmt->getSeasons() as $season) {
    $seas = $webPage->escapeString($season->getName());
    $posterId = $seas->getPosterId();
    $webPage->appendContent("<div class =\"tvshow\"><div class =\"tvshow__poster\"><img src='./cover.php?coverId=$posterId'></div><div class = \"tvshow__title\">$seas</div></div>");
}

$webPage->appendContent("</div>");
