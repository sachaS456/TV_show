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
        $tvShowId = (int) $_GET['seasonId'];

        // next code
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
}
catch (Exception)
{
    http_response_code(500);
}