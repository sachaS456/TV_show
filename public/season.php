<?php

declare(strict_types=1);

use Entity\Exception\EntityNotFoundException;
use Html\AppWebPage;
use Entity\Collection\TVshowCollection;
use Database\MyPdo;
use Entity\Season;
use Entity\TVshow;
use Entity\Poster;
use Entity\Collection\GenreCollecion;

if (!isset($_GET['TVshowId']) || !is_numeric($_GET['TVshowId'])) {
    header('Location: ./index.php');
    exit();
} else {
    $tvShowId = (int) $_GET['TVshowId'];
}

try {
    $stmt = TVshow::findById($tvShowId);
} catch (EntityNotFoundException) {
    http_response_code(404);
    exit();
}

$webPage = new AppWebpage("Séries TV :  {$stmt->getName()}");

$webPage->addMenu('Modifier', "\"location.href='admin/tvshow-form.php?TVshowId={$stmt->getId()}'\"");
$webPage->addMenu('Supprimer', "\"location.href='admin/tvshow-delete.php?TVshowId={$stmt->getId()}'\"");
$webPage->addMenu('Retour à l\'accueil', "location.href='/index.php'");

$webPage->appendContent("<ul class=\"list\">");

$posterTvShowId = $stmt->getPosterId();
$webPage->appendContent("<div class=\"season\"><div class=\"season__poster\"><img src='./poster.php?posterId=$posterTvShowId'></div><div class='season__title'>{$stmt->getName()}</div><div class='season__original'>{$stmt->getOriginalName()}</div><div class='season__description'>{$stmt->getOverview()}</div></div>");

foreach ($stmt->getSeasons() as $season) {
    $seas = $webPage->escapeString($season->getName());
    $posterId = $season->getPosterId();
    $seasonId = $season->getId();
    $webPage->appendContent("<a href='./episode.php?seasonId=$seasonId' class =\"season\"><div class =\"season__poster\"><img src='./poster.php?posterId=$posterId'></div><div class = \"season__title\">$seas</div></a>");
}

$webPage->appendContent("</ul>");

echo $webPage->toHTML();
