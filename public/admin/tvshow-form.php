<?php
declare(strict_types=1);

use Entity\TVshow;
use Entity\Exception\EntityNotFoundException;
use Exception\ParameterException;

try{
    if (!isset($_GET['artistId'])) {
        $artist = null;


    } else {
        if (!is_numeric($_GET['artistId'])) {
            throw new ParameterException('artist-form.php : valeur de l\'artiste incorrecte');
        }
        $artist = Artist::findById((int)$_GET['artistId']);
    }
    $form = new \Html\Form\TVshowForm($artist);
    $html = new \Html\AppWebPage('Form', '', $form->getHtmlForm($url = 'artist-save.php'));
    echo $html->toHTML();
} catch (ParameterException) {
http_response_code(400);
} catch (EntityNotFoundException) {
http_response_code(404);
} catch (Exception) {
http_response_code(500);
}