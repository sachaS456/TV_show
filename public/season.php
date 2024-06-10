<?php
declare(strict_types=1);

use Html\AppWebPage;
use Entity\Collection\TVshowCollection;
use Database\MyPdo;
use Entity\Season;
use Entity\TVshow;
use Entity\Poster;

if (!isset($_GET['TVshowId']) || !is_numeric($_GET['TVshowId'])) {
    header('Location: ./index.php');
    exit();
} else {
    $tvShowId = (int) $_GET['TVshowId'];
}

try {
    $stmt = TVshow::findById($tvShowId);
} catch (\Entity\Exception\EntityNotFoundException) {
    http_response_code(404);
    exit();
}

$webPage = new AppWebpage("Séries TV :  {$stmt->getName()}");


$webPage->appendContent("<div  class=\"list\">");

$posterTvShowId = Poster::findById($stmt->getPosterId())->getId();
$webPage->appendContent("<div class=\"season\"><div class=\"tvshow__poster\"><img src='./poster.php?posterId=$posterTvShowId'></div><div class='tvshow__title'>{$stmt->getName()}</div><div class='tvshow__original'>{$stmt->getOriginalName()}</div><div class='tvshow__description'>{$stmt->getOverview()}</div></div>");

foreach ($stmt->getSeasons() as $season) {
    $seas = $webPage->escapeString($season->getName());
    $posterId = Poster::findById($season->getPosterId())->getId();
    $webPage->appendContent("<div class =\"tvshow\"><div class =\"tvshow__poster\"><img src='./poster.php?posterId=$posterId'></div><div class = \"tvshow__title\">$seas</div></div>");
}

$webPage->appendContent("</div>");

echo $webPage->toHTML();