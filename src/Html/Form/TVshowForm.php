<?php

namespace Html\Form;

use Entity\Artist;
use Entity\TVshow;
use Exception\ParameterException;
use Html\StringEscaper;
use Html\Webpage;
use Html\AppWebPage;

class TVshowForm
{
    use StringEscaper;
    private ?TVshow $TVshow;

    /**
     * @param TVshow|null $TVshow
     */
    public function __construct(?TVshow $TVshow = null)
    {
        $this->$TVshow = $TVshow;
    }

    public function getTVshow(): ?TVshow
    {
        return $this->TVshow;
    }




}
