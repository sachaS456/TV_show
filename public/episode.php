<?php
declare(strict_types=1);

use Entity\Exception\EntityNotFoundException;
use Html\AppWebPage;
use Entity\Collection;
use Database\MyPdo;
use Entity\Season;
use Entity\TVshow;
use Entity\Episode;
use Entity\Poster;
use Exception\ParameterException;

try{
    if (!isset($_GET['seasonId']) || empty($_GET['seasonId']) || !is_numeric($_GET['seasonId']))
    {
        throw new ParameterException('parameter is not valid');
    }
    else{
        $SeasonId = (int) $_GET['seasonId'];

        $season = Season::findById($SeasonId);
        $EpisodeCollection = $season->getEpisode();
    }
} catch (ParameterException) {
    header('Location: ./index.php');
    exit();
} catch (EntityNotFoundException) {
    http_response_code(404);
    exit();
} catch (Exception) {
    http_response_code(500);
    exit();
}

$webPage = new AppWebpage("Séries TV :  {$season->getName()}");

$webPage->addMenu('Retour à l\'accueil', "location.href='/index.php'");


$posterSeasonId = $season->getPosterId();
$show = TVshow::findById($season->getTvShowId());

$webPage->appendContent(<<<HTML
<article class="season2">
    <img class="season2__poster" src='./poster.php?posterId=$posterSeasonId'>
    <div class="season2__text">
        <a href="season.php?TVshowId={$show->getId()}" class='season2__title_serie'>{$show->getName()}</a>
        <div class='season2__title'>{$season->getName()}</div>
    </div>
    
</article>
HTML
);

$webPage->appendContent("<ul class=\"list\">");

for ($i = 0; $i < count($EpisodeCollection); $i++) {

    $epiName = $webPage->escapeString($EpisodeCollection[$i]->getName());
    $epiDesc = $webPage->escapeString($EpisodeCollection[$i]->getOverview());
    $epiNumb = $EpisodeCollection[$i]->getEpisodeNumber();

    $webPage->appendContent(<<<HTML
<div class="episode">
    <h3 class="episode__title"><span>$epiNumb</span> - $epiName</h3>
    <p class="episode__description">$epiDesc</p>
</div>
HTML);
}

$webPage->appendContent("</ul>");

echo $webPage->toHTML();
