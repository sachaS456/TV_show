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
}
catch (ParameterException)
{
    header('Location: ./index.php');
    exit();
}
catch (EntityNotFoundException)
{
    http_response_code(404);
    exit();
}
catch (Exception)
{
    http_response_code(500);
    exit();
}

$webPage = new AppWebpage("Séries TV :  {$season->getName()}");


$posterSeasonId = $season->getPosterId();
$webPage->appendContent(<<<HTML
<div class=\"season\">
    <div class=\"season__poster\">
        <img src='./poster.php?posterId=$posterSeasonId'>
    </div>
    <div class='season__title'>{$season->getName()}</div>
    <div class='season__original'>{$season->getName()}</div>
</div>
HTML

);

$webPage->appendContent("<ul class=\"list\">");

for ($i = 0; $i < count($EpisodeCollection); $i++) {


}

$webPage->appendContent("</ul>");

echo $webPage->toHTML();