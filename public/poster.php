<?php

declare(strict_types=1);

use Entity\Exception\EntityNotFoundException;
use Exception\ParameterException;
use Entity\Poster;

try {
    if (!isset($_GET['posterId']) || empty($_GET['posterId']) || !is_numeric($_GET['posterId'])) {
        throw new ParameterException("parameter is not valid");
    }

    $img = Poster::findById((int)$_GET['posterId']);
    header('Content-type: jpeg');
    echo $img->getJpeg();
} catch (ParameterException) {
    header('Content-type: png');
    header('Location: ./img/default.png');
    exit();
} catch (EntityNotFoundException) {
    //http_response_code(404);
    header('Content-type: png');
    header('Location: ./img/default.png');
    exit();
} catch (Exception) {
    http_response_code(500);
    exit();
}
