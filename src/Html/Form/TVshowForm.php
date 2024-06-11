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



    public function getHtmlForm(string $url): string
    {
        return <<<HTML
        
<form name="form" method="post" action="$url">

    <input name="id" type="hidden" maxlength="5" value="{$this->TVshow?->getId()}">
    <label>
    Nom
    <input name="name" type="text" maxlength="50" value="{$this->escapeString($this->TVshow?->getName())}" required>
</label>
    <label>
    <button type="submit">Enregistrer</button>
</label>
</form>
HTML;
    }



}
