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
    $TVshowTab = Genre::findByGenre($genre);
} catch (EntityNotFoundException) {
    http_response_code(404);
    exit();
}
$genreName = Genre::findById($genre)->getName();
$indexPage = new AppWebpage("Séries TV, Genre : $genreName"); // nom à retoucher

$indexPage->addMenu('Retour à l\'accueil', "location.href='/index.php'");

$indexPage->appendContent("<ul class=\"list\">");

for ($i = 0; $i < count($TVshowTab); $i++) {
    $id = $TVshowTab[$i]->getId();
    $title = $indexPage->escapeString($TVshowTab[$i]->getName());
    $description = $indexPage->escapeString($TVshowTab[$i]->getOverview());
    $coverId = $TVshowTab[$i]->getPosterId();
    $tvshowClassCss = $i % 2 == 0 ? 'tvshow1' : 'tvshow2';

    $indexPage->appendContent(<<<HTML
        <a class="tvshow $tvshowClassCss" href="./season.php?TVshowId=$id">
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
