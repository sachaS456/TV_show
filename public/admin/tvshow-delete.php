<?php

declare(strict_types=1);
use Entity\TVshow;
use Entity\Exception\EntityNotFoundException;
use Exception\ParameterException;

try {

    if (!isset($_GET['TVshowId'])) {
        throw new ParameterException('tvshow-delete.php : valeur du tvshow incorrecte');


    } else {
        if (!is_numeric($_GET['TVshowId'])) {
            throw new ParameterException('tvshow-delete.php : valeur du tvshow incorrecte');
        }
        $TVshow = TVshow::findById((int)$_GET['TVshowId']);
    }
    $TVshow->delete();
    header('Location: /index.php');
    exit();

} catch (ParameterException) {
    http_response_code(400);
} catch (EntityNotFoundException) {
    http_response_code(404);
} catch (Exception) {
    http_response_code(500);
}