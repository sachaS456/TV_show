<?php
declare(strict_types=1);

use Entity\TVshow;
use Entity\Exception\EntityNotFoundException;
use Exception\ParameterException;
use Html\AppWebPage;
use Html\Form\TVshowForm;

try{
    if (!isset($_GET['TVshowId'])) {
        $tvshow = null;
    } else {
        if (!is_numeric($_GET['TVshowId'])) {
            throw new ParameterException('tvshow-form.php : valeur du tvshow incorrecte');
        }
        $tvshow = TVshow::findById((int)$_GET['TVshowId']);
    }
    $form = new TVshowForm($tvshow);
    $html = new AppWebPage('Form', '', $form->getHtmlForm($url = 'tvshow-save.php'));
    echo $html->toHTML();
} catch (ParameterException) {
http_response_code(400);
} catch (EntityNotFoundException) {
http_response_code(404);
} catch (Exception) {
http_response_code(500);
}