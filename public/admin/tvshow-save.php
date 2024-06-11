<?php
declare(strict_types=1);


use Exception\ParameterException;
use Html\Form\TVshowForm;

try {
    $tvshowform = new TVshowForm();
    $tvshowform->setEntityFromQueryString();
    $tvshowform->getTVshow()->save();
    header('Location: /index.php');
    exit();

} catch (ParameterException) {
    http_response_code(400);
} catch (Exception) {
    http_response_code(500);
}