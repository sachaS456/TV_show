<?php
declare(strict_types=1);

use Entity\Exception\EntityNotFoundException;
use Exception\ParameterException;
use Entity\Poster;

try{
    if (!isset($_GET['posterId']) || empty($_GET['posterId']) || !is_numeric($_GET['posterId'])) {
        throw new ParameterException("parameter are not valid");
    }

    $img = Poster::findById((int)$_GET['posterId']);
    header('content-type: jpeg');
    echo $img->getJpeg();
}
catch (ParameterException)
{
    http_response_code(400);
}
catch (EntityNotFoundException)
{
    http_response_code(404);
}
catch (Exception)
{
    http_response_code(500);
}