<?php

declare(strict_types=1);

use Html\AppWebPage;
use Entity\Collection\ArtistCollection;

$indexPage = new AppWebPage('Série TV');

$TVshowTab = Entity\Collection\ArtistCollection::findAll();

$indexPage->appendContent(<<<HTML
<ul class="list"> 
HTML);

for ($i = 0; $i < count($TVshowTab); $i++)
{
    $id = $TVshowTab[$i]->getId();
    $title = $indexPage->escapeString($TVshowTab[$i]->getName());
    $description = $indexPage->escapeString($TVshowTab[$i]->getOverview());
    $coverId = $TVshowTab[$i]->getPosterId();

    if ($i%2 == 0)
    {
        $indexPage->appendContent(<<<HTML
        <a class="Serie" href="./TVshow.php?TVshowId=$i">
            <img class="tvshow__poster" src="poster.php?coverId=$coverId" alt="Image du poster de la série.">
            <h3 class="tvshow__title">$title</h3>
            <h3 class="tvshow__description">$description</h3>
        </a>
        HTML);
    }
    else
    {
        $indexPage->appendContent(<<<HTML
        <a class="Serie" href="./TVshow.php?TVshowId=$i">
            <h3 class="tvshow__title">$title</h3>
            <h3 class="tvshow__description">$description</h3>
            <img class="tvshow__poster" src="poster.php?coverId=$coverId" alt="Image du poster de la série.">
        </a>
        HTML);
    }
}

$indexPage->appendContent(<<<HTML
</ul>
HTML);