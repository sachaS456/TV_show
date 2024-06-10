<?php

declare(strict_types=1);

use Html\AppWebPage;
use Entity\Collection\TVshowCollection;

$indexPage = new AppWebPage('Séries TV');

$TVshowTab = TVshowCollection::findAll();

$indexPage->appendContent(<<<HTML
<ul class="list"> 
HTML);

for ($i = 0; $i < count($TVshowTab); $i++) {
    $id = $TVshowTab[$i]->getId();
    $title = $indexPage->escapeString($TVshowTab[$i]->getName());
    $description = $indexPage->escapeString($TVshowTab[$i]->getOverview());
    $coverId = $TVshowTab[$i]->getPosterId();
    $tvshowClassCss = $i % 2 == 0 ? 'tvshow1' : 'tvshow2';

    $indexPage->appendContent(<<<HTML
        <a class="tvshow $tvshowClassCss" href="./TVshow.php?TVshowId=$id">
            <div class="tvshow__text">
                <h3 class="tvshow__title">$title</h3>
                <h3 class="tvshow__description">$description</h3>
            </div>
            
            <img class="tvshow__poster" src="poster.php?posterId=$coverId" alt="Image du poster de la série.">
        </a>
        HTML);
}

$indexPage->appendContent(<<<HTML
</ul>
HTML);

echo $indexPage->toHTML();
